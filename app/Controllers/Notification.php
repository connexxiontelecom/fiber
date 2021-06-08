<?php
namespace App\Controllers;

class Notification extends BaseController {

  public function get_user_notifications() {
    if ($this->session->active) {
      $user_id = $this->session->user_id;
      $user_notifications = $this->notificationModel->where(['receiver_id' => $user_id, 'seen' => 0])->findAll();
      return $this->response->setJSON($user_notifications);
    }
    return redirect('auth/login');
  }
}