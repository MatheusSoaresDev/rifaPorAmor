<?php

namespace Rifa\Poramor\Usuario;

use Doctrine\ORM\EntityRepository;
use Rifa\Poramor\Helper\EntityManagerFactory;
use Rifa\Poramor\Helper\EntityManagerRepository;

class Participante extends Usuario implements EntityManagerRepository
{
    private string $contato;

    protected function createUniqueID(): void
    {
        $this->id = uniqid("par_");
    }

    public function classRepository(): EntityRepository
    {
        return EntityManagerFactory::returnEntityManagerFactory()->getRepository(Participante::class);
    }
}