<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\SummarySeasonRepository")
 */
class SummarySeason
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $year;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Drivers")
     */
    private $driver;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Constructors")
     * @ORM\JoinColumn(nullable=false)
     */
    private $constructor;

    /**
     * @ORM\Column(type="integer")
     */
    private $score;

    /**
     * @ORM\Column(type="integer")
     */
    private $position;

    /**
     * @ORM\Column(type="integer")
     */
    private $wins;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $cumulativeTime;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $fastestLapSpeed;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $mediumGrid;

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

    public function getDriver(): ?Drivers
    {
        return $this->driver;
    }

    public function setDriver(?Drivers $driver): self
    {
        $this->driver = $driver;

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

    public function getCumulativeTime(): ?\DateTimeInterface
    {
        return $this->cumulativeTime;
    }

    public function setCumulativeTime(?\DateTimeInterface $cumulativeTime): self
    {
        $this->cumulativeTime = $cumulativeTime;

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
}
