<?php
session_start();



if (isset($_GET['uc'])){
  $uc = $_GET['uc'];
}else{
  $uc = '';
}


    switch ($uc){

      case 'accueil':
        require_once('controller/controllerHome.php');
      break;

      case '':  
        require_once('controller/controllerHome.php');
      break;
      
    } 



