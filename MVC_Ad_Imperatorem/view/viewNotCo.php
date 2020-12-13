<?php $titre = "Ad Imperatorem" ?>

<?php ob_start(); ?>
<br><br>
          
  <p>Bienvenue, identifies toi pour acceder au site ou inscries toi:</p>

  <form method="post" action="index.php?action=connection">
  <label for="nameUser">Pseudo / Nom d'aventurier</label> :
      <input type="text" name="nameUser" id="nameUser" name="nameUser" placeholder="Votre nom ..."/><br><br>
    <label for="pwd">Mot de passe</label> :
      <input type="password" name="pwd" id="pwd" name="pwd" placeholder="Votre mot de passe ..."/><br><br>
    <button id="valider">Connexion</button>
  </form>
  
  <br><br>
  <a href="index.php?action=creationForm">Inscription</a>
          
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>
