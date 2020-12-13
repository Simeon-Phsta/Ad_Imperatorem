<?php
require_once("model/Manager.php"); 

class UserManager extends Manager
{
    public function getUserInformation($nameUser,$pwd)
    {
        // connection to db
        $bdd = $this->getDB();

        $req = $bdd -> prepare("SELECT user.id, user.nameUser, user.pwd, user.lvl, sex.libelle, race.libelle FROM sex INNER JOIN user INNER JOIN race ON race.id = user.idRace ON user.idSex = sex.id WHERE user.nameUser='$nameUser' AND user.pwd ='$pwd'" );
        $req->execute();
        $res = $req -> fetch();
        return $res;
        

    }

    public function getSex()
    {
        $bdd = $this->getDB();

        $req = $bdd -> prepare("SELECT sex.libelle FROM sex" );
        $req->execute();
        $res = $req -> fetchAll();
        return $res;
    }
    
    public function getIdSex($libSex)
    {
        $bdd = $this->getDB();

        $req = $bdd -> prepare("SELECT sex.id FROM sex WHERE sex.libelle = ' $libSex '" );
        $req->execute();
        $res = $req -> fetch();
        return $res;
    }

    public function getRace()
    {
        $bdd = $this->getDB();

        $req = $bdd -> prepare("SELECT race.libelle FROM race" );
        $req->execute();
        $res = $req -> fetchAll();
        return $res;
    }
    
    public function getIdRace($libRace)
    {
        $bdd = $this->getDB();

        $req = $bdd -> prepare("SELECT race.id FROM race WHERE race.libelle = ' $libRace '" );
        $req->execute();
        $res = $req -> fetch();
        return $res;
    }

    public function addAccount( $nameUser, $pwd, $idRace, $idSex )
    {
        
        $bdd = $this->getDB();
                            
        $req = $bdd->prepare("INSERT INTO user (nameUser, pwd, idRace, idSex) VALUES ( :theNameUser, :thePwd, :theIdRace, :theIdSex)");

        $req->bindParam(':theNameUser', $nameUser);
        $req->bindParam(':thePwd', $pwd);
        $req->bindParam(':theIdRace', $idRace);
        $req->bindParam(':theIdSex', $idSex);
        $req->execute();
        

        $req = $bdd->prepare("SELECT user.id FROM user WHERE user.nameUser = '$nameUser' AND user.pwd = '$pwd' AND user.idRace = '$idRace' AND user.idSex = '$idSex' AND user.lvl = 1");
        $req->bindParam(':theNameUser', $nameUser);
        $req->bindParam(':thePwd', $pwd);
        $req->bindParam(':theIdRace', $idRace);
        $req->bindParam(':theIdSex', $idSex);
        $req->execute();
        $res = $req->fetch();

        $requ = $bdd->prepare("INSERT INTO stuffuser (idUser) VALUES (:theIdUser");
        $requ->bindParam(':theIdUser', $res);
        $requ->execute();
        
    }

}
