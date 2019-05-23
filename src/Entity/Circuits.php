<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     collectionOperations={"get"},
 *     itemOperations={"get"}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\CircuitsRepository")
 */
class Circuits
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"results", "races"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Groups({"results", "races"})
     */
    private $reference;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"results", "races"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=100)
     * @Groups({"results", "races"})
     */
    private $location;

    /**
     * @ORM\Column(type="string", length=100)
     * @Groups({"results", "races"})
     */
    private $country;

    /**
     * @ORM\Column(type="float")
     * @Groups({"results", "races"})
     */
    private $lat;

    /**
     * @ORM\Column(type="float")
     * @Groups({"results", "races"})
     */
    private $lng;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"results", "races"})
     */
    private $alt;

    /**
     * @ORM\Column(type="string", length=2000)
     * @Groups({"results", "races"})
     */
    private $url;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getLat(): ?float
    {
        return $this->lat;
    }

    public function setLat(float $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLng(): ?float
    {
        return $this->lng;
    }

    public function setLng(float $lng): self
    {
        $this->lng = $lng;

        return $this;
    }

    public function getAlt(): ?float
    {
        return $this->alt;
    }

    public function setAlt(?float $alt): self
    {
        $this->alt = $alt;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
