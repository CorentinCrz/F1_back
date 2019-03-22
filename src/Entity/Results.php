<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResultsRepository")
 */
class Results
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Races", inversedBy="results")
     * @ORM\JoinColumn(nullable=false)
     */
    private $race;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Drivers", inversedBy="results")
     * @ORM\JoinColumn(nullable=false)
     */
    private $driver;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Constructors", inversedBy="results")
     * @ORM\JoinColumn(nullable=false)
     */
    private $constructor;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $number;

    /**
     * @ORM\Column(type="integer")
     */
    private $grid;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $position;

    /**
     * @ORM\Column(type="integer")
     */
    private $positionOrder;

    /**
     * @ORM\Column(type="integer")
     */
    private $points;

    /**
     * @ORM\Column(type="integer")
     */
    private $laps;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $time;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $milliseconds;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $fastestLap;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $rank;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $fastestLapTime;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $fastestLapSpeed;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Status")
     */
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRace(): ?races
    {
        return $this->race;
    }

    public function setRace(?races $race): self
    {
        $this->race = $race;

        return $this;
    }

    public function getDriver(): ?drivers
    {
        return $this->driver;
    }

    public function setDriver(?drivers $driver): self
    {
        $this->driver = $driver;

        return $this;
    }

    public function getConstructor(): ?constructors
    {
        return $this->constructor;
    }

    public function setConstructor(?constructors $constructor): self
    {
        $this->constructor = $constructor;

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

    public function getGrid(): ?int
    {
        return $this->grid;
    }

    public function setGrid(int $grid): self
    {
        $this->grid = $grid;

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

    public function getPositionOrder(): ?int
    {
        return $this->positionOrder;
    }

    public function setPositionOrder(int $positionOrder): self
    {
        $this->positionOrder = $positionOrder;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(int $points): self
    {
        $this->points = $points;

        return $this;
    }

    public function getLaps(): ?int
    {
        return $this->laps;
    }

    public function setLaps(int $laps): self
    {
        $this->laps = $laps;

        return $this;
    }

    public function getTime(): ?string
    {
        return $this->time;
    }

    public function setTime(string $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getMilliseconds(): ?int
    {
        return $this->milliseconds;
    }

    public function setMilliseconds(int $milliseconds): self
    {
        $this->milliseconds = $milliseconds;

        return $this;
    }

    public function getFastestLap(): ?int
    {
        return $this->fastestLap;
    }

    public function setFastestLap(int $fastestLap): self
    {
        $this->fastestLap = $fastestLap;

        return $this;
    }

    public function getRank(): ?int
    {
        return $this->rank;
    }

    public function setRank(int $rank): self
    {
        $this->rank = $rank;

        return $this;
    }

    public function getFastestLapTime(): ?string
    {
        return $this->fastestLapTime;
    }

    public function setFastestLapTime(string $fastestLapTime): self
    {
        $this->fastestLapTime = $fastestLapTime;

        return $this;
    }

    public function getFastestLapSpeed(): ?string
    {
        return $this->fastestLapSpeed;
    }

    public function setFastestLapSpeed(string $fastestLapSpeed): self
    {
        $this->fastestLapSpeed = $fastestLapSpeed;

        return $this;
    }

    public function getStatus(): ?status
    {
        return $this->status;
    }

    public function setStatus(?status $status): self
    {
        $this->status = $status;

        return $this;
    }
}
