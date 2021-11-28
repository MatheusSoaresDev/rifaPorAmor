<?php

require_once("vendor/autoload.php");

use Rifa\Poramor\Helper\EntityManagerFactory;
use Rifa\Poramor\Rifa;
use Carbon\Carbon;

try{

    $rifa = new Rifa();
    $rifa->criarRifa
    (
        "Rifa de final de ano",
        "28/11/2021",
        10 ,
        "Card ifood",
        "Ajudar as criança!"
    );

    $entityManagerFactory = new EntityManagerFactory();
    $entityManager = $entityManagerFactory->getEntityManager();

    $entityManager->persist($rifa);
    $entityManager->flush();

    echo "<pre>";
    var_dump($rifa);

    //echo json_encode($rifa);

} catch (Exception $error){
    echo $error->getMessage();
}