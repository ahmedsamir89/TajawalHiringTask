<?php

namespace App\Entities\Filters;

class PriceFilter implements SortFilter, RangeFilter
{
    /** float $from */
    private $from;

    /** @var  float $to */
    private $to;

    /** @var bool $ascending */
    private $ascending;

    /**
     * @return string
     */
    public function getName(): string
    {
        return FilterWrapper::PRICE_FILTER_NAME;
    }

    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param mixed $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @return float
     */
    public function getTo(): float
    {
        return $this->to;
    }

    /**
     * @param float $to
     */
    public function setTo(float $to)
    {
        $this->to = $to;
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