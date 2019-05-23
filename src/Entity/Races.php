<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ApiResource(
 *     collectionOperations={"get"},
 *     itemOperations={
 *         "get"={
 *             "normalization_context"={"groups"={"races"}}
 *         }
 *     }
 * )
 * @ApiFilter(SearchFilter::class, properties={"year": "exact"})
 * @ORM\Entity(repositoryClass="App\Repository\RacesRepository")
 */
class Races
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"results", "races"})
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"results", "races"})
     */
    private $year;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"results", "races"})
     */
    private $round;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Circuits")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"results", "races"})
     */
    private $circuit;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"results", "races"})
     */
    private $name;

    /**
     * @ORM\Column(type="date")
     * @Groups({"results", "races"})
     */
    private $date;

    /**
     * @ORM\Column(type="time")
     * @Groups({"results", "races"})
     */
    private $time;

    /**
     * @ORM\Column(type="string", length=2000)
     * @Groups({"results", "races"})
     */
    private $url;

//    /**
//     * @ORM\OneToMany(targetEntity="App\Entity\LapTimes", mappedBy="race", orphanRemoval=true)
//     */
//    private $lapTimes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Results", mappedBy="race", orphanRemoval=true)
     * @Groups("races")
     */
    private $results;

    public function __construct()
    {
//        $this->lapTimes = new ArrayCollection();
        $this->results = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getRound(): ?int
    {
        return $this->round;
    }

    public function setRound(int $round): self
    {
        $this->round = $round;

        return $this;
    }

    public function getCircuit(): ?circuits
    {
        return $this->circuit;
    }

    public function setCircuit(?circuits $circuit): self
    {
        $this->circuit = $circuit;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(\DateTimeInterface $time): self
    {
        $this->time = $time;

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
//     * @return Collection|LapTimes[]
//     */
//    public function getLapTimes(): Collection
//    {
//        return $this->lapTimes;
//    }
//
//    public function addLapTime(LapTimes $lapTime): self
//    {
//        if (!$this->lapTimes->contains($lapTime)) {
//            $this->lapTimes[] = $lapTime;
//            $lapTime->setRace($this);
//        }
//
//        return $this;
//    }
//
//    public function removeLapTime(LapTimes $lapTime): self
//    {
//        if ($this->lapTimes->contains($lapTime)) {
//            $this->lapTimes->removeElement($lapTime);
//            // set the owning side to null (unless already changed)
//            if ($lapTime->getRace() === $this) {
//                $lapTime->setRace(null);
//            }
//        }
//
//        return $this;
//    }

    /**
     * @return Collection|Results[]
     */
    public function getResults(): Collection
    {
        return $this->results;
    }

    public function addResult(Results $result): self
    {
        if (!$this->results->contains($result)) {
            $this->results[] = $result;
            $result->setRace($this);
        }

        return $this;
    }

    public function removeResult(Results $result): self
    {
        if ($this->results->contains($result)) {
            $this->results->removeElement($result);
            // set the owning side to null (unless already changed)
            if ($result->getRace() === $this) {
                $result->setRace(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
