<?php

function GetDefaultBreadcrumbs ( $PageTitle, $Separator ) {

  if ( !$Separator ) $Separator = $GLOBALS [ '$BreadcrumbSeparator' ];

  if ( $PageTitle ) {
    return '<a href="/">Home</a>' . $Separator . $PageTitle;
  } else {
    return '';
  }
}

/**
 * Send an email
 * @param $FromAddr          string  Email address of sender
 * @param $FromName          string  Human-readable name of sender
 * @param $ToAddr            string  Email address of recipient
 * @param $ToName            string  Human-readable name of recipient
 * @param $Subject           string  Subject line of email receipt
 * @param $Body              string  Body of the email receipt
 * @param $RecipientTitle    string  Title of recipient for auditing & error-handling purposes
 * @return
 */
function SendPHPMailer ( $FromAddr, $FromName, $ToAddr, $ToName, $Subject, $Body, $RecipientTitle ) {

  $Result = '';

  $mailer = new PHPMailer ( );
  
  $mailer->ClearAddresses     ( );
  $mailer->ClearAllRecipients ( );
  $mailer->ClearAttachments   ( );
  $mailer->ClearBCCs          ( );
  $mailer->ClearCCs           ( );
  $mailer->ClearCustomHeaders ( );
  $mailer->ClearReplyTos      ( );

  $mailer->IsSMTP ( );
  $mailer->IsHTML ( true );

  $mailer->CharSet = 'utf-8';

  if ( $_SERVER [ 'SERVER_NAME' ] == 'journeyscomo.com' ) {
    $mail->SMTPAuth      = true;                              // enable SMTP authentication
    $mail->SMTPKeepAlive = true;                              // SMTP connection will not close after each email sent
    $mail->Host          = "relay-hosting.secureserver.net";  // sets the SMTP server
    $mail->Port          = 25;                                // set the SMTP port for the GoDaddy server
    $mail->Username      = "cheryl@journeyscomo.com";         // SMTP account username
    $mail->Password      = "password";                        // SMTP account password
  }

  $mailer->AddAddress ( $ToAddr, $ToName );

  $mailer->From     = $FromAddr;
  $mailer->FromName = $FromName;
  $mailer->Subject  = $Subject;
  $mailer->Body     = $Body;

  if ( $mailer->Send ( ) )
  {
    $Result  = "Successfully sent email receipt to <b>$RecipientTitle</b>.\n";
  } else {
    $Result  = "Failed sending email receipt to <b>$RecipientTitle</b>: $mailer->ErrorInfo.<br />\n";
    $Result .= "From: $FromName &lt;$FromAddr&gt;<br />To: $ToAddr &lt;$ToAddr&gt;<br />Subject: $Subject\n\n";
  }

  return ( $Result );

}

/**
 * Send an email
 * @param $FromAddr          string  Email address of sender
 * @param $FromName          string  Human-readable name of sender
 * @param $ToAddr            string  Email address of recipient
 * @param $ToName            string  Human-readable name of recipient
 * @param $Subject           string  Subject line of email receipt
 * @param $Body              string  Body of the email receipt
 * @param $RecipientTitle    string  Title of recipient for auditing & error-handling purposes
 * @return
 */
function SendGDMailer ( $FromAddr, $FromName, $ToAddr, $ToName, $Subject, $Body, $RecipientTitle ) {

  $Result = '';
  
  // To send HTML mail, the Content-type header must be set
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

  // Additional headers
  $headers .= 'To: '   . $ToName   . '<' . $ToAddr   . '>' . "\r\n";
  $headers .= 'From: ' . $FromName . '<' . $FromAddr . '>' . "\r\n";

  if ( mail ( $ToAddr, $Subject, $Body, $headers ) ) {
    $Result  = "Successfully sent email receipt to <b>$RecipientTitle</b>.\n";
  } else {
    $Result  = "Failed sending email receipt to <b>$RecipientTitle</b>.<br />\n";
    $Result .= "From: $FromName &lt;$FromAddr&gt;<br />To: $ToAddr &lt;$ToAddr&gt;<br />Subject: $Subject\n\n";
  }

  return ( $Result );

}

/**
 * Send an email
 * @param $FromAddr          string  Email address of sender
 * @param $FromName          string  Human-readable name of sender
 * @param $ToAddr            string  Email address of recipient
 * @param $ToName            string  Human-readable name of recipient
 * @param $Subject           string  Subject line of email receipt
 * @param $Body              string  Body of the email receipt
 * @param $RecipientTitle    string  Title of recipient for auditing & error-handling purposes
 * @return
 */
function SendEmail ( $FromAddr, $FromName, $ToAddr, $ToName, $Subject, $Body, $RecipientTitle ) {
  if ( $_SERVER [ 'SERVER_NAME' ] == 'journeyscomo.com' ) {
    $Result = SendGDMailer ( $FromAddr, $FromName, $ToAddr, $ToName, $Subject, $Body, $RecipientTitle );
  } else {
    $Result = SendPHPMailer ( $FromAddr, $FromName, $ToAddr, $ToName, $Subject, $Body, $RecipientTitle );
  }
  return ( $Result );
}
