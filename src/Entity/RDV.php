<?php

namespace App\Entity;

use App\Entity\Enum\EtatRDV;
use App\Entity\Enum\TypeConsultation;
use App\Entity\Enum\TypePrestation;
use App\Entity\Enum\TypeRDV;
use App\Repository\RDVRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RDVRepository::class)]
class RDV
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(enumType: TypeRDV::class)]
    private ?TypeRDV $typeRDV = null;

    #[ORM\Column(nullable: true, enumType: TypeConsultation::class)]
    private ?TypeConsultation $typeConsultation = null;

    #[ORM\Column(nullable: true, enumType: TypePrestation::class)]
    private ?TypePrestation $typePrestation = null;

    #[ORM\Column(enumType: EtatRDV::class)]
    private ?EtatRDV $etatRDV = null;

    #[ORM\ManyToOne(inversedBy: 'rDVs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Patient $patient = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateCreation = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $dateFixee = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(string $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getTypeRDV(): ?TypeRDV
    {
        return $this->typeRDV;
    }

    public function setTypeRDV(TypeRDV $typeRDV): static
    {
        $this->typeRDV = $typeRDV;

        return $this;
    }

    public function getTypeConsultation(): ?TypeConsultation
    {
        return $this->typeConsultation;
    }

    public function setTypeConsultation(?TypeConsultation $typeConsultation): static
    {
        $this->typeConsultation = $typeConsultation;

        return $this;
    }

    public function getTypePrestation(): ?TypePrestation
    {
        return $this->typePrestation;
    }

    public function setTypePrestation(?TypePrestation $typePrestation): static
    {
        $this->typePrestation = $typePrestation;

        return $this;
    }

    public function getEtatRDV(): ?EtatRDV
    {
        return $this->etatRDV;
    }

    public function setEtatRDV(EtatRDV $etatRDV): static
    {
        $this->etatRDV = $etatRDV;

        return $this;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): static
    {
        $this->patient = $patient;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeImmutable
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeImmutable $dateCreation): static
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getDateFixee(): ?\DateTimeImmutable
    {
        return $this->dateFixee;
    }

    public function setDateFixee(?\DateTimeImmutable $dateFixee): static
    {
        $this->dateFixee = $dateFixee;

        return $this;
    }
}
