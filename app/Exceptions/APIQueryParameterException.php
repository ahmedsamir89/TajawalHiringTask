<?php

namespace App\Exceptions;


use Throwable;

class APIQueryParameterException extends \Exception
{
    protected $message = 'API query Parameter Exception';

    /** @var  string $key */
    private $key ;

    /** @var  string $value **/
    private $value;

    /**
     * APIQueryParameterException constructor.
     * @param string $key
     * @param string $value
     */
    public function __construct(string $key , string $value)
    {
        parent::__construct($this->getMessage() , 0, null);

        $this->key = $key;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey(string $key)
    {
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value)
    {
        $this->value = $value;
    }



}