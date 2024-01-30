<?php

namespace App\Entity;

use App\Repository\RéservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RéservationRepository::class)]
class Réservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateReservation = null;

    #[ORM\Column]
    private ?float $montant = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $Id): static
    {
        $this->id = $Id;

        return $this;
    }

    public function getDateReservation(): ?\DateTimeInterface
    {
        return $this->dateReservation;
    }

    public function setDateReservation(\DateTimeInterface $dateReservation): static
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): static
    {
        $this->montant = $montant;

        return $this;
    }
}
