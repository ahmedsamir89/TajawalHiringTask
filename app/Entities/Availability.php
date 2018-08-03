<?php

namespace App\Entities;

use Carbon\Carbon;

class availability
{
    /** @var Carbon $from */
    private $from;

    /** @var  Carbon $to */
    private $to;

    /**
     * @return Carbon
     */
    public function getFrom(): Carbon
    {
        return $this->from;
    }

    /**
     * @param Carbon $from
     */
    public function setFrom(Carbon $from)
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



}