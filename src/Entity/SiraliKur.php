<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SiraliKurRepository")
 */
class SiraliKur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="json")
     */
    private $usd = [];

    /**
     * @ORM\Column(type="json")
     */
    private $eur = [];

    /**
     * @ORM\Column(type="json")
     */
    private $gbp = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsd(): ?array
    {
        return $this->usd;
    }

    public function setUsd(array $usd): self
    {
        $this->usd = $usd;

        return $this;
    }

    public function getEur(): ?array
    {
        return $this->eur;
    }

    public function setEur(array $eur): self
    {
        $this->eur = $eur;

        return $this;
    }

    public function getGbp(): ?array
    {
        return $this->gbp;
    }

    public function setGbp(array $gbp): self
    {
        $this->gbp = $gbp;

        return $this;
    }
}
