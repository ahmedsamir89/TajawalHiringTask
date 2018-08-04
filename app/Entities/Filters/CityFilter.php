<?php

namespace App\Entities\Filters;

class CityFilter implements Filter
{

    protected $name = 'city';

    /** @var string $value */
    private $value;

    /**
     * @return string
     */
    public function getName(): string
    {
        return FilterWrapper::CITY_FILTER_NAME;
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