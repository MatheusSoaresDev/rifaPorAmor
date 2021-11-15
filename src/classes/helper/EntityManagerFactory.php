<?php

namespace Rifa\Poramor\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{
    public function getEntityManager():EntityManager
    {
        $rootDir = __DIR__.'/../Usuario/';
        $config = Setup::createAnnotationMetadataConfiguration(
            [$rootDir],
            true
        );
        $connection = [
            'driver'=> 'pdo_mysql',
            'host' => '213.190.6.85',
            'dbname' => 'u940287720_petshop',
            'user' => 'u940287720_mathsilva',
            'password' => '6n/+Ca~K',
            'charset'  => 'utf8',
            'driverOptions' => array(
                1002 => 'SET NAMES utf8'
            )
        ];
        return EntityManager::create($connection, $config);
    }

    public static function returnEntityManagerFactory():EntityManager{
        $entityManagerFactory = new EntityManagerFactory();

        return $entityManagerFactory->getEntityManager();
    }
}