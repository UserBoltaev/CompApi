<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CitiesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CitiesRepository::class)]
#[ApiResource]
class Cities
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $population;

    #[ORM\Column(type: 'date_immutable')]
    private $founded;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Countries;

    #[ORM\ManyToOne(targetEntity: Countries::class, inversedBy: 'cities')]
    #[ORM\JoinColumn(nullable: false)]
    private $countries;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPopulation(): ?string
    {
        return $this->population;
    }

    public function setPopulation(string $population): self
    {
        $this->population = $population;

        return $this;
    }

    public function getFounded(): ?\DateTimeImmutable
    {
        return $this->founded;
    }

    public function setFounded(\DateTimeImmutable $founded): self
    {
        $this->founded = $founded;

        return $this;
    }

    public function getCountries(): ?string
    {
        return $this->Countries;
    }

    public function setCountries(?string $Countries): self
    {
        $this->Countries = $Countries;

        return $this;
    }
}
