<?php
/**
 * Created by PhpStorm.
 * User: Angelo
 * Date: 18/05/2018
 * Time: 7:57 PM
 */

namespace angelo\MySms;


class SmsService
{
    public function __construct($apikey, $secret,$sender)
    {
        $this->apikey=$apikey;
        $this->secret=$secret;
        $this->sender=$sender;
        $this->client= new SmsAction($apikey,$secret,$sender);
    }

    public function send($to, $message)
    {
        return $this->client->send([
            'to' => $to,
            'message' => $message,

        ]);
    }
}