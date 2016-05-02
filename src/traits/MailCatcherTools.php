<?php

/**
 * Created by PhpStorm.
 * User: Alessandro
 * Date: 01/12/2015
 * Time: 12:37
 */

namespace Padosoft\Test\traits;

use GuzzleHttp\Psr7\Response;

trait MailCatcherTools
{
    protected $mailcatcher;

    /**
     *
     */
    protected function getMailCatcher()
    {
        if(!isset($this->mailcatcher)) $this->mailcatcher = new \GuzzleHttp\Client(['base_uri' => env('MAIL_HOST','127.0.0.1').':'.env('MAIL_PORT_WEB','1080')]);
        return $this->mailcatcher;
    }

    /**
     * @return mixed
     */
    public function getAllEmails()
    {
        $emails = json_decode($this->getMailCatcher()->get('/messages')->getBody()->getContents(),true);
        if(empty($emails)) {
            $this->fail('No messages returned.');
        }

        return $emails;
    }

    /**
     * @return mixed
     */
    public function deleteAllMails()
    {
        return $this->getMailCatcher()->delete('/messages');
    }

    /**
     * @return mixed
     */
    public function getLastEmailHtml()
    {
        $emailId = $this->getAllEmails()[max(array_keys($this->getAllEmails()))]['id'];
        return $this->getMailCatcher()->get("/messages/{$emailId}.html");
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getEmailById($id)
    {

        foreach($this->getAllEmails() as $email) {
            if ($email['id']==$id) {
                return $email;
            }
        }
    }

    /**
     * @return mixed
     */
    public function getLastEmailJson()
    {
        //return $this->getAllEmails()[0];
        $emailId = $this->getAllEmails()[max(array_keys($this->getAllEmails()))]['id'];
        return $this->getMailCatcher()->get("/messages/{$emailId}.json");

    }

    /**
     * @param $body
     * @param Response $email
     */
    public function assertEmailBodyContains($body, Response $email)
    {
        $this->assertContains($body,(string)$email->getBody());
    }

    /**
     * @param $body
     * @param Response $email
     */
    public function assertNotEmailBodyContains($body, Response $email)
    {
        $this->assertNotContains($body,(string)$email->getBody());
    }

    /**
     * @param $recipient
     * @param Response $email
     */
    public function assertEmailWasSentoTo($recipient, Response $email)
    {
        $emailDecode = json_decode($email->getBody()->getContents(),true);
        $this->assertContains ("<{$recipient}>", $emailDecode['recipients']);
    }

    /**
     * @param $recipient
     * @param $email
     */
    public function assertNotEmailWasSentoTo($recipient, $email)
    {
        $this->assertNotContains ("<{$recipient}>", $email['recipients']);
    }

}
