<?php
/**
 * Created by PhpStorm.
 * User: Angelo
 * Date: 18/05/2018
 * Time: 7:56 PM
 */

namespace angelo\MySms\Facade;


use Illuminate\Support\Facades\Facade;

class SmsServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return app()->make(\angelo\MySms\SmsService::class);
    }
}