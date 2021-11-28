<?php

require_once("../../vendor/autoload.php");

use Rifa\Poramor\Helper\EntityManagerFactory;
use Rifa\Poramor\Usuario\Admin;

try{

    $admin = new Admin();
    $admin->logarAdmin
    (
        "matheus_onlive@live.com",
        "Killer@123"
    );

    echo json_encode("logado");

} catch (Exception $error){
    echo $error->getMessage();
}
