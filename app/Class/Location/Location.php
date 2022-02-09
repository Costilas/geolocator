<?php

namespace Class\Location;


class Location
{
    public function __construct(
       private string $country,
       private ?string $region,
       private ?string $city
    )
    {}

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @return string|null
     */
    public function getRegion(): ?string
    {
        return $this->region;
    }

    /**
     * @param string|null
     */
    public function getCountry(): string
    {
        return $this->country;
    }
}
