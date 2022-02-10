<?php

namespace Class\Location;


class Location
{
    public function __construct(
       private string $country,
       private ?string $region,
       private ?string $city,
       private ?float $latitude,
       private ?float $longitude
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

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }
}
