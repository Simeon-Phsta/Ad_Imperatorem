<?php 

//chargement des classes
require_once 'model/UserManager.php';

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
else {
    $action = "accueil";
}

switch ($action){
    
    
    // affiche la liste de tous les billets du blog
    case 'accueil': 
    {
        if (isset($_SESSION['name'])){
            require 'view/viewHome.php';
        }
        else{
            require 'view/viewNotCo.php';
        }
        break;
    }


    case 'connection':
    {
        if(isset($_POST['pwd']) && $_POST['pwd']!="" && isset($_POST['nameUser']) && $_POST['nameUser']!="" )
        {       
            //keep the POST 
            $pwd =  $_POST['pwd'];
            $nameUser = $_POST['nameUser'];
            
            //instantiate a UserManager
            $userManager = new UserManager();
            //use it for recover all informations from the table user
            $userInformation = $userManager->getUserInformation($nameUser,$pwd);
            
            if(!empty($userInformation))
            {
                //session_start();
                $_SESSION['id'] = $userInformation[0];
                $_SESSION['name']= $userInformation[1];
                $_SESSION['lvl']= $userInformation[3]; 
                $_SESSION['sex']= $userInformation[4]; 
                $_SESSION['race']= $userInformation[5];   
                
                require 'view/viewHome.php';               
                
            }
            else
            {
                $msgErreur =  "Mot de passe incorrect";
                require 'view/vueErreur.php';
            }
        }
        else
        {
            $msgErreur =  "Connexion echouee";
            require 'view/vueErreur.php';
        }

    break;
    
    }

    case 'creationForm';
    {
        //instantiate a UserManager
        $userManager = new UserManager();
        $theSexs = $userManager->getSex();
        $theRaces = $userManager->getRace();
        require 'view/viewCreationAccount.php';
        break;
    }

    case 'creation':
    {
        $nameUser = $_POST['nameUser'];
        $pwd = $_POST['pwd'];
        $_SESSION['libSex']  = $_POST['lstSex'];
        $_SESSION['libRace']  = $_POST['lstRace'];

        $userManager = new UserManager();
        $idSex = $userManager->getIdSex($_SESSION['libSex']);
        $idRace = $userManager->getIdRace($_SESSION['libRace']);
        $userManager->addAccount($nameUser, $pwd, $idRace, $idSex);

        require 'view/viewHome.php';
        break;
    }

    case 'leave':
    {
        session_destroy();
        require 'view/viewNotCo.php';
    break;
    }



    case '':
        echo("vous n'avez pas le bon uc");
    break;

}