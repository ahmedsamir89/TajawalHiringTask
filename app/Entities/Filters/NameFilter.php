<?php

namespace App\Entities\Filters;

class NameFilter implements SortFilter
{
    /** @var  string */
    private $value;

    /** @var bool $ascending */
    private $ascending;

    /**
     * @return string
     */
    public function getName(): string
    {
        return FilterWrapper::NAME_FILTER_NAME;
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

    /**
     * @param bool $ascending
     */
    public function setAscending(bool $ascending)
    {
        $this->ascending = $ascending;
    }

    /**
     * @return bool
     */
    public function ascending() : bool {

        return $this->ascending;
    }


}