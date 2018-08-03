<?php

namespace App\Exceptions;

use Exception;

class ApiRestClientException extends Exception
{
    protected $message = 'Rest client for External Api Exception';

}