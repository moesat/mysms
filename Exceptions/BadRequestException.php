<?php
/**
 * Created by PhpStorm.
 * User: Angelo
 * Date: 18/05/2018
 * Time: 8:58 PM
 */

namespace angelo\MySms;

use Exception;

class BadRequestException extends Exception
{
    public function __construct($message, $code)
    {
        $this->message = $message;
    }
}