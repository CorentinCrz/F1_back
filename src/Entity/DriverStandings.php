<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;

/**
 * @ApiResource(
 *     collectionOperations={"get"},
 *     itemOperations={"get"}
 * )
 * @ApiFilter(SearchFilter::class, properties={"race.year": "exact", "driver.id": "exact"})
 * @ApiFilter(OrderFilter::class, properties={"points"}, arguments={"orderParameterName"="order"})
 * @ORM\Entity(repositoryClass="App\Repository\DriverStandingsRepository")
 */
class DriverStandings
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Races")
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
    private $points;

    /**
     * @ORM\Column(type="integer")
     */
    private $position;

    /**
     * @ORM\Column(type="integer")
     */
    private $wins;

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

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(int $points): self
    {
        $this->points = $points;

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
}
