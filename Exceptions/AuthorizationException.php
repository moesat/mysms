<?php
/**
 * Created by PhpStorm.
 * User: Angelo
 * Date: 18/05/2018
 * Time: 9:00 PM
 */

namespace angelo\MySms;

use Exception;
class AuthorizationException extends Exception
{
    public function __construct($message, $code)
    {
        $this->message = $message;
    }
}