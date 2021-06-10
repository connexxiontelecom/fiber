<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="x-apple-disable-message-reformatting">
  <title></title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,600" rel="stylesheet" type="text/css">
  <!-- Web Font / @font-face : BEGIN -->
  <!--[if mso]>
  <style>
    * {
      font-family: 'Roboto', sans-serif !important;
    }
  </style>
  <![endif]-->

  <!--[if !mso]>
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,600" rel="stylesheet" type="text/css">
  <![endif]-->
  <!-- Web Font / @font-face : END -->
  <!-- CSS Reset : BEGIN -->
  <style>
      /* What it does: Remove spaces around the email design added by some email clients. */
      /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
      html,
      body {
          margin: 0 auto !important;
          padding: 0 !important;
          height: 100% !important;
          width: 100% !important;
          font-family: 'Roboto', sans-serif !important;
          font-size: 14px;
          margin-bottom: 10px;
          line-height: 24px;
          color:#8094ae;
          font-weight: 400;
      }
      * {
          -ms-text-size-adjust: 100%;
          -webkit-text-size-adjust: 100%;
          margin: 0;
          padding: 0;
      }
      table,
      td {
          mso-table-lspace: 0pt !important;
          mso-table-rspace: 0pt !important;
      }
      table {
          border-spacing: 0 !important;
          border-collapse: collapse !important;
          table-layout: fixed !important;
          margin: 0 auto !important;
      }
      table table table {
          table-layout: auto;
      }
      a {
          text-decoration: none;
      }
      img {
          -ms-interpolation-mode:bicubic;
      }
  </style>
</head>
<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f5f6fa;">
<center style="width: 100%; background-color: #f5f6fa;">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#f5f6fa">
    <tr>
      <td style="padding: 20px 0;">
        <table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;">
          <tbody>
          <tr>
            <td style="padding: 30px 30px 20px">
              <p style="margin-bottom: 15px;">Hi <?=$name?>,</p>
              <p style="margin-bottom: 10px;">The following subscription on the Fiber Portal has expired. You can send a request for an extension or a cancellation in the portal: </p>
              <p style="margin-bottom: 10px">
                Subscription Description: <?=$description?> <br>
                End Date: <?=$end_date?>
              </p>
              <p style="margin-bottom: 20px;">We're here if you have any questions about your experience. You can either submit a ticket in the portal or drop us a line at <a style="color: #6576ff; text-decoration:none;" href="mailto:support@connexxiontelecom.com">support@connexxiontelecom.com</a> anytime. </p>
              <p style="margin-bottom: 15px;">
                Thank you, <br>
                The Connexxion Telecom Support Team
              </p>
            </td>
          </tr>
          </tbody>
        </table>
        <table style="width:100%;max-width:620px;margin:0 auto;">
          <tbody>
          <tr>
            <td style="text-align: center; padding:25px 20px 0;">
              <p style="font-size: 13px;">Copyright © 2021 Fiber Portal. All rights reserved. <br> Powered by <a style="color: #6576ff; text-decoration:none;" href="https://connexxiontelecom.com">Connexxion telecom</a>.</p>
            </td>
          </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </table>
</center>
</body>
</html>