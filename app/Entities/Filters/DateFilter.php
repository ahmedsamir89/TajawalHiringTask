<?php

namespace App\Entities\Filters;

use Carbon\Carbon;

class DateFilter implements RangeFilter, SortFilter
{
    /** Carbon $from */
    private $from;

    /** @var  Carbon $to */
    private $to;

    /** @var bool $ascending */
    private $ascending;

    /**
     * @return string
     */
    public function getName(): string
    {
        return FilterWrapper::DATE_FILTER_NAME;
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
     * @return Carbon
     */
    public function getTo(): Carbon
    {
        return $this->to;
    }

    /**
     * @param Carbon $to
     */
    public function setTo(Carbon $to)
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