<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource(
 *     collectionOperations={"get"},
 *     itemOperations={"get"}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\LapTimesRepository")
 */
class LapTimes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Races", inversedBy="lapTimes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $race;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Drivers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $driver;

    /**
     * @ORM\Column(type="integer")
     */
    private $lap;

    /**
     * @ORM\Column(type="integer")
     */
    private $position;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $time;

    /**
     * @ORM\Column(type="integer")
     */
    private $milliseconds;

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

    public function getLap(): ?int
    {
        return $this->lap;
    }

    public function setLap(int $lap): self
    {
        $this->lap = $lap;

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
}
