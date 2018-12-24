<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UcuzKurRepository")
 */
class UcuzKur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $usdRate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $usdApiUrl;

    /**
     * @ORM\Column(type="float")
     */
    private $eurRate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $eurApiUrl;

    /**
     * @ORM\Column(type="float")
     */
    private $gbpRate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gbpApiUrl;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsdRate(): ?float
    {
        return $this->usdRate;
    }

    public function setUsdRate(float $usdRate): self
    {
        $this->usdRate = $usdRate;

        return $this;
    }

    public function getUsdApiUrl(): ?string
    {
        return $this->usdApiUrl;
    }

    public function setUsdApiUrl(string $usdApiUrl): self
    {
        $this->usdApiUrl = $usdApiUrl;

        return $this;
    }

    public function getEurRate(): ?float
    {
        return $this->eurRate;
    }

    public function setEurRate(float $eurRate): self
    {
        $this->eurRate = $eurRate;

        return $this;
    }

    public function getEurApiUrl(): ?string
    {
        return $this->eurApiUrl;
    }

    public function setEurApiUrl(string $eurApiUrl): self
    {
        $this->eurApiUrl = $eurApiUrl;

        return $this;
    }

    public function getGbpRate(): ?float
    {
        return $this->gbpRate;
    }

    public function setGbpRate(float $gbpRate): self
    {
        $this->gbpRate = $gbpRate;

        return $this;
    }

    public function getGbpApiUrl(): ?string
    {
        return $this->gbpApiUrl;
    }

    public function setGbpApiUrl(string $gbpApiUrl): self
    {
        $this->gbpApiUrl = $gbpApiUrl;

        return $this;
    }
}
