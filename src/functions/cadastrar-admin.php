<?php

require_once("../../vendor/autoload.php");

use Rifa\Poramor\Helper\EntityManagerFactory;
use Rifa\Poramor\Usuario\Admin;

try{

    $admin = new Admin();
    $admin->cadastraAdmin
    (
        "Matheus Soares",
        "matheus_onlive@live.com2",
        password_hash("Killer@123", PASSWORD_DEFAULT),
    );

    $entityManagerFactory = new EntityManagerFactory();
    $entityManager = $entityManagerFactory->getEntityManager();

    $entityManager->persist($admin);
    $entityManager->flush();

    echo json_encode("Administrador cadastrado com sucesso!");

} catch (Exception $error){
    echo $error->getMessage();
}
