<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CompaniesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompaniesRepository::class)]
#[ApiResource]
class Companies
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Countries::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $Cities;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $no;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $revenue;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCities(): ?Countries
    {
        return $this->Cities;
    }

    public function setCities(?Countries $Cities): self
    {
        $this->Cities = $Cities;

        return $this;
    }

    public function getNo(): ?string
    {
        return $this->no;
    }

    public function setNo(?string $no): self
    {
        $this->no = $no;

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

    public function getRevenue(): ?string
    {
        return $this->revenue;
    }

    public function setRevenue(string $revenue): self
    {
        $this->revenue = $revenue;

        return $this;
    }
}
