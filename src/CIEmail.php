<?php

namespace cryptappz\CIEmail;

class CIEmail
{
  public $protocol = 'smtp'; // 'mail', 'sendmail', or 'smtp'
  public $smtp_host = 'srv70.cloudserverzone.com';
  public $smtp_port = 465;
  public $smtp_user = 'noreply@webprismits.com';
  public $smtp_user_name; // Username or AppName
  public $smtp_pass;
  public $smtp_crypto = 'ssl'; // can be 'ssl' or 'tls' for example
  public $mailtype = 'html'; // plaintext 'text' mails or 'html'
  public $smtp_timeout = '4'; // in seconds
  public $charset = 'iso-8859-1';
  public $wordwrap = TRUE;
  public $email_template_data = [];
  
  public $config= [
    'charset' => 'utf-8',
    'wordwrap' => TRUE,
    'mailtype' => 'html'
  ];

  public $set_newline = "\r\n";

  public function __construct()
  {
    // do nothing
  }

  public function getMessage()
  {
    $CI =& get_instance();

    $msg = '';
    if(isset($this->email_template_data['message'])){
      $msg .= $this->email_template_data['message'];
    }
    if(isset($this->email_template_data['template'])){
      $msg .= $CI->load->view($this->email_template_data['template'], $this->email_template_data['page_data'], true);
    }
    if(isset($this->email_template_data['footer'])){
      $msg .= $CI->load->view($this->email_template_data['footer'],[], true);
    }
    return $msg;
  }
}
