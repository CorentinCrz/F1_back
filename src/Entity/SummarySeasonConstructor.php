<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"summarySeason"}},
 *     collectionOperations={"get"},
 *     itemOperations={"get"}
 * )
 * @ApiFilter(SearchFilter::class, properties={"year": "exact"})
 * @ApiFilter(OrderFilter::class, properties={"score"}, arguments={"orderParameterName"="order"})
 * @ORM\Entity(repositoryClass="App\Repository\SummarySeasonConstructorRepository")
 */
class SummarySeasonConstructor
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"summarySeason"})
     */
    private $year;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Constructors")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"summarySeason"})
     */
    private $constructor;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Drivers")
     * @Groups({"summarySeason"})
     */
    private $drivers;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"summarySeason"})
     */
    private $score;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"summarySeason"})
     */
    private $position;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"summarySeason"})
     */
    private $wins;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     * @Groups({"summarySeason"})
     */
    private $cumulativeTime;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"summarySeason"})
     */
    private $cumulativeMillisecond;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"summarySeason"})
     */
    private $fastestLapSpeed;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"summarySeason"})
     */
    private $mediumGrid;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"summarySeason"})
     */
    private $pitStopTime;

    public function __construct()
    {
        $this->drivers = new ArrayCollection();
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

    public function getConstructor(): ?Constructors
    {
        return $this->constructor;
    }

    public function setConstructor(?Constructors $constructor): self
    {
        $this->constructor = $constructor;

        return $this;
    }

    /**
     * @return Collection|Drivers[]
     */
    public function getDrivers(): Collection
    {
        return $this->drivers;
    }

    public function addDriver(Drivers $driver): self
    {
        if (!$this->drivers->contains($driver)) {
            $this->drivers[] = $driver;
        }

        return $this;
    }

    public function removeDriver(Drivers $driver): self
    {
        if ($this->drivers->contains($driver)) {
            $this->drivers->removeElement($driver);
        }

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getWins(): ?int
    {
        return $this->wins;
    }

    public function setWins(int $wins): self
    {
        $this->wins = $wins;

        return $this;
    }

    public function getCumulativeTime(): ?string
    {
        return $this->cumulativeTime;
    }

    public function setCumulativeTime(?string $cumulativeTime): self
    {
        $this->cumulativeTime = $cumulativeTime;

        return $this;
    }

    public function getCumulativeMillisecond(): ?int
    {
        return $this->cumulativeMillisecond;
    }

    public function setCumulativeMillisecond(?int $cumulativeMillisecond): self
    {
        $this->cumulativeMillisecond = $cumulativeMillisecond;

        return $this;
    }

    public function getFastestLapSpeed(): ?float
    {
        return $this->fastestLapSpeed;
    }

    public function setFastestLapSpeed(?float $fastestLapSpeed): self
    {
        $this->fastestLapSpeed = $fastestLapSpeed;

        return $this;
    }

    public function getMediumGrid(): ?int
    {
        return $this->mediumGrid;
    }

    public function setMediumGrid(?int $mediumGrid): self
    {
        $this->mediumGrid = $mediumGrid;

        return $this;
    }

    public function getPitStopTime(): ?int
    {
        return $this->pitStopTime;
    }

    public function setPitStopTime(?int $pitStopTime): self
    {
        $this->pitStopTime = $pitStopTime;

        return $this;
    }
}
