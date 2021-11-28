<?php

namespace Rifa\Poramor\Helper;

use Doctrine\ORM\EntityRepository;

interface EntityManagerRepository
{
    public function classRepository(): EntityRepository;
}