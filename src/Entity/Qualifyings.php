<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QualifyingsRepository")
 */
class Qualifyings
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\races")
     * @ORM\JoinColumn(nullable=false)
     */
    private $race;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\drivers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $driver;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\constructors")
     * @ORM\JoinColumn(nullable=false)
     */
    private $constructor;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     * @ORM\Column(type="integer")
     */
    private $position;

    /**
     * @ORM\Column(type="time")
     */
    private $q1;

    /**
     * @ORM\Column(type="time")
     */
    private $q2;

    /**
     * @ORM\Column(type="time")
     */
    private $q3;

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

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getQ1(): ?\DateTimeInterface
    {
        return $this->q1;
    }

    public function setQ1(\DateTimeInterface $q1): self
    {
        $this->q1 = $q1;

        return $this;
    }

    public function getQ2(): ?\DateTimeInterface
    {
        return $this->q2;
    }

    public function setQ2(\DateTimeInterface $q2): self
    {
        $this->q2 = $q2;

        return $this;
    }

    public function getQ3(): ?\DateTimeInterface
    {
        return $this->q3;
    }

    public function setQ3(\DateTimeInterface $q3): self
    {
        $this->q3 = $q3;

        return $this;
    }
}
