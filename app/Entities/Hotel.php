<?php

namespace App\Entities;

class Hotel extends Entity
{
    /** @var  string $name */
    private $name;

    /** @var  float $price */
    private $price;

    /** @var  string $city */
    private $city;

    /** @var  Availability[] */
    private $availabilities;


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city)
    {
        $this->city = $city;
    }

    /**
     * @return Availability[]
     */
    public function getAvailabilities(): array
    {
        return $this->availabilities;
    }

    /**
     * @param Availability[] $availabilities
     */
    public function setAvailabilities(array $availabilities)
    {
        $this->availabilities = $availabilities;
    }




}