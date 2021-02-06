<?php

namespace Source\Core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception as PHPMailerException;

class Email {
  
    private $data;

    /** @var PHPMailer */
    private $email;

    /** @var Message */
    private $message;

    /**
     * Email Constructor
     */
    public function __construct() {
        $this->email = new PHPMailer(true);
        $this->message = new Message();

        //DEBUG
        //$this->email->SMTPDebug = SMTP::DEBUG_SERVER;  

        //setup
        $this->email->isSMTP();
        $this->email->setLanguage(CONF_MAIL_OPTION_LANG);
        $this->email->isHTML(CONF_MAIL_OPTION_HTML);
        $this->email->SMTPAuth = CONF_MAIL_OPTION_AUTH;
        $this->email->SMTPSecure = CONF_MAIL_OPTION_SECURE;
        $this->email->CharSet = CONF_MAIL_OPTION_CHARSET;

        //auth
        $this->email->Host = CONF_MAIL_HOST;
        $this->email->Port = CONF_MAIL_PORT;
        $this->email->Username = CONF_MAIL_USER;
        $this->email->Password = CONF_MAIL_PASS;
    }

    /**
     * @param string $subject
     * @param string $message
     * @param string $toEmail
     * @param string $toName
     * @return void
     */
    public function boostrap(string $subject, string $message, string $toEmail, string $toName): Email {
        $this->data = new \stdClass();
        $this->data->subject = $subject;
        $this->data->message = $message;
        $this->data->toEmail = $toEmail;
        $this->data->toName = $toName;
        return $this;
    }


    public function attach(string $filePath, string $fileName): Email {
        $this->data->attach[$filePath] = $fileName;
        return $this;
    }

    /**
     * @param  $fromEmail
     * @param  $fromName
     * @return boolean
     */
    public function send($fromEmail = CONF_MAIL_SENDER["address"], $fromName = CONF_MAIL_SENDER["name"]): bool {
        if(empty($this->data)) {
            $this->message->error("Error ao enviar, favor verifique os dados");
            return false;
        }

        if(!is_email($this->data->toEmail)) {
            $this->message->warning("O E-mail do destinatário na é válido");
            return false;
        }

        if(!is_email($fromEmail)) {
            $this->message->warning("O E-mail do remetente na é válido");
            return false;
        }

        try {
            $this->email->Subject = $this->data->subject;
            $this->email->msgHTML($this->data->message);
            $this->email->addAddress($this->data->toEmail, $this->data->toName);
            $this->email->setFrom($fromEmail, $fromName);

            if (!empty($this->data->attach)) {
                foreach ($this->data->attach as $path => $name) {
                    $this->email->addAttachment($path, $name);
                }
            }

            $this->email->send();
            return true;
            
        } catch (PHPMailerException $exception) {
            $this->message->error($exception->getMessage());
            return false;
        }

    }

    /**
     * @return PHPMailer
     */
    public function mail(): PHPMailer {
        return $this->email;
    }

    /**
     * @return Message
     */
    public function message(): Message {
        return $this->message;
    }

}

