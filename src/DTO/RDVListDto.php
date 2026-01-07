<?php

namespace App\DTO;
use App\Entity\RDV;
use \DateTimeImmutable;
class RDVListDto
{
    public int $id;
    public string $name;
    public string $typeRDV;
    public ?string $typeConsultation = null;
    public ?string $typePrestation = null;
    public DateTimeImmutable $dateDemande;

    public static function fromEntity(RDV $entity): RDVListDto
    {
        $dto = new RDVListDto();
        $dto->id = $entity->getId();
        $dto->name = $entity->getPatient()->getNom() . $entity->getPatient()->getPrenom();
        $dto->dateDemande = $entity->getDateCreation();
        $dto->typeRDV = $entity->getTypeRDV()->name;
        $dto->typeConsultation = $entity->getTypeConsultation()->name;
        $dto->typePrestation = $entity->getTypePrestation()->name;
        return $dto;
    }

    public static function fromEntities(array $entities): array
    {
        return array_map(function (RDV $entity) {
            return self::fromEntity($entity);
        }, $entities);
    }
}
