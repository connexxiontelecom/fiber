<?php

namespace App\Controllers;

use App\Models\CustomerInfoModel;
use App\Models\InvoiceModel;
use App\Models\InvoicePaymentModel;
use App\Models\NotificationModel;
use App\Models\PaymentMethodModel;
use App\Models\PaymentModel;
use App\Models\PlanModel;
use App\Models\ServiceModel;
use App\Models\SubscriptionModel;
use App\Models\SubscriptionRequestModel;
use App\Models\TicketModel;
use App\Models\TicketResponseModel;
use App\Models\UserModel;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use SendinBlue\Client\Configuration;
use SendinBlue\Client\Api\TransactionalEmailsApi;
use SendinBlue\Client\Model\SendSmtpEmail;
use SendinBlue\Client\ApiException;
use GuzzleHttp\Client;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class BaseController extends Controller
{
	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['form', 'url'];
	protected $session;
	protected $validation;

	protected $customerInfoModel;
	protected $invoiceModel;
	protected $invoicePaymentModel;
	protected $notificationModel;
	protected $paymentMethodModel;
	protected $paymentModel;
	protected $planModel;
	protected $serviceModel;
	protected $subscriptionModel;
	protected $subscriptionRequestModel;
	protected $ticketModel;
	protected $ticketResponseModel;
	protected $userModel;

	protected $mail;
	protected $api_instance;

	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
    $this->session = \CodeIgniter\Config\Services::session();
    $this->validation = \CodeIgniter\Config\Services::validation();

    $this->customerInfoModel = new CustomerInfoModel();
    $this->invoiceModel = new InvoiceModel();
    $this->invoicePaymentModel = new InvoicePaymentModel();
		$this->notificationModel = new NotificationModel();
    $this->paymentMethodModel = new PaymentMethodModel();
    $this->paymentModel = new PaymentModel();
    $this->planModel = new PlanModel();
    $this->serviceModel = new ServiceModel();
    $this->subscriptionModel = new SubscriptionModel();
    $this->subscriptionRequestModel = new SubscriptionRequestModel();
    $this->ticketModel = new TicketModel();
    $this->ticketResponseModel = new TicketResponseModel();
    $this->userModel = new UserModel();

    $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', getenv('API_KEY'));
    $this->api_instance = new TransactionalEmailsApi(new Client(), $config);
    $this->mail = new SendSmtpEmail();
	}

	protected function _unauthorized(): string {
    $page_data['title'] = 'Unauthorized';
    return view('_401', $page_data);
  }

  protected function _not_found(): string {
    $page_data['title'] = 'Not Found';
    return view('_404', $page_data);
  }

	protected function _create_new_notification($sender_id, $receiver_id, $subject_id, $type, $topic) {
		$notification_data = array(
			'sender_id' => $sender_id,
			'receiver_id' => $receiver_id,
			'subject_id' => $subject_id,
			'type' => $type,
			'topic' => $topic,
			'seen' => 0
		);
		$this->notificationModel->save($notification_data);
	}

	protected function send_mail($email_data) {
    $this->mail['subject'] = $email_data['subject'];
    $this->mail['htmlContent'] = view('email/'.$email_data['email_body'], $email_data['data']);
    $this->mail['sender'] = array('name' => $email_data['from_name'], 'email' => $email_data['from_email']);
    $this->mail['to'] = array(array('email' => $email_data['email']));
    try {
      $result = $this->api_instance->sendTransacEmail($this->mail);
//      print_r($result);
    } catch (Exception $e) {
      print_r('Exception when calling TransactionalEmailsApi->sendTransacEmail:'.$e->getMessage());
    }
  }
}
