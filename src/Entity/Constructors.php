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
 * @ORM\Entity(repositoryClass="App\Repository\ConstructorsRepository")
 */
class Constructors
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
     * @Groups({"results", "races", "summarySeason"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=50)
     * @Groups({"results", "races", "summarySeason"})
     */
    private $nationality;

    /**
     * @ORM\Column(type="string", length=2000)
     * @Groups({"results", "races"})
     */
    private $url;

//    /**
//     * @ORM\OneToMany(targetEntity="App\Entity\Results", mappedBy="constructor", orphanRemoval=true)
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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
//            $result->setConstructor($this);
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
//            if ($result->getConstructor() === $this) {
//                $result->setConstructor(null);
//            }
//        }
//
//        return $this;
//    }

    public function __toString()
    {
        return $this->getName();
    }
}
