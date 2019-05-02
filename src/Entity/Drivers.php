<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     collectionOperations={"get"},
 *     itemOperations={"get"}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\DriversRepository")
 */
class Drivers
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"results"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Groups({"results"})
     */
    private $reference;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"results"})
     */
    private $number;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     * @Groups({"results"})
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=50)
     * @Groups({"results"})
     */
    private $forename;

    /**
     * @ORM\Column(type="string", length=50)
     * @Groups({"results"})
     */
    private $surname;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"results"})
     */
    private $dob;

    /**
     * @ORM\Column(type="string", length=50)
     * @Groups({"results"})
     */
    private $nationality;

    /**
     * @ORM\Column(type="string", length=2000)
     * @Groups({"results"})
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=2000)
     * @Groups({"results"})
     */
    private $imgUrl;

//    /**
//     * @ORM\OneToMany(targetEntity="App\Entity\Results", mappedBy="driver", orphanRemoval=true)
//     */
//    private $results;

    public function __construct()
    {
//        $this->results = new ArrayCollection();
    }

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

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getForename(): ?string
    {
        return $this->forename;
    }

    public function setForename(string $forename): self
    {
        $this->forename = $forename;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getDob(): ?\DateTimeInterface
    {
        return $this->dob;
    }

    public function setDob(\DateTimeInterface $dob): self
    {
        $this->dob = $dob;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(string $nationality): self
    {
        $this->nationality = $nationality;

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

    public function getImgUrl(): ?string
    {
        return $this->imgUrl;
    }

    public function setImgUrl(string $imgUrl): self
    {
        $this->imgUrl = $imgUrl;

        return $this;
    }

//    /**
//     * @return Collection|Results[]
//     */
//    public function getResults(): Collection
//    {
//        return $this->results;
//    }
//
//    public function addResult(Results $result): self
//    {
//        if (!$this->results->contains($result)) {
//            $this->results[] = $result;
//            $result->setDriver($this);
//        }
//
//        return $this;
//    }
//
//    public function removeResult(Results $result): self
//    {
//        if ($this->results->contains($result)) {
//            $this->results->removeElement($result);
//            // set the owning side to null (unless already changed)
//            if ($result->getDriver() === $this) {
//                $result->setDriver(null);
//            }
//        }
//
//        return $this;
//    }

    public function __toString()
    {
        return $this->getSurname();
    }
}
