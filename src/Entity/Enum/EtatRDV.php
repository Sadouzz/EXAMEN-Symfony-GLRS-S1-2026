<?php

namespace App\Entity\Enum;
enum EtatRDV: string
{
    case ACCEPTEE = 'ACCEPTEE';
    case ANNULEE = 'ANNULEE';
    case EN_ATTENTE = 'EN_ATTENTE';
}
