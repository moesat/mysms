<?php
/**
 * Created by PhpStorm.
 * User: Angelo
 * Date: 18/05/2018
 * Time: 8:43 PM
 */

namespace angelo\MySms;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;


class SmsAction
{
    public function __construct($apikey, $secret, $sender)
    {
        $this->apikey = $apikey;
        $this->secret = $secret;
        $this->sender = $sender;
        $this->guzzle = new Client();
    }

    public function send($payload)
    {
        try{
            $response = $this->guzzle->post('https://rest.nexmo.com/sms/json', [
                'verify' => false,
                'form_params' => [
                    'api_key' => $this->apikey,
                    'api_secret' => $this->secret,
                    'text' => $payload['message'],
                    'from' => $this->sender,
                    'to' => '95943011736',
                ],
            ]);
            $response = json_decode($response->getBody(), true);
            return $response;
        }catch (ClientException $e){
            if($e->getCode()===401){
                throw new AuthorizationException(
                    "Authorization failed.",
                    401
                );
            } elseif ($e->getCode()===403) {
                throw new BadRequestException(
                    $e->getMessage(),
                    403
                );
            }
        }
    }
}