<?php $titre = 'Accueil'; ?>

<?php ob_start(); ?>

<?php if(isset($_SESSION['name']) && isset($_SESSION['lvl']) ){ 
    
    echo "Bienvenue " . $_SESSION['name'] ;
          ?><br><a href="index.php?action=leave">Déconnexion</a>

    <form method="post" action="index.php?action=creationBillet">
      <div class="inputs">
      <p>Postez vous aussi un billet:</p>
        <input type="text" name="unBillet" placeholder=" Nom du billet" size="30" maxlength="100"/><br>
            <textarea type="text" name="unContenu" placeholder=" Contenu du billet" rows="5" size="50" maxlength="1000"></textarea>
            
            </div>
        <input type="submit" name="valider" class="button" value="Valider la saisie"/>
    </form>
<?php }

if(isset($_POST['lstSex']))
{
  echo($_POST['lstSex']);
}
if(isset($_POST['lstRace']))
{
  echo($_POST['lstRace']);
}


  $contenu = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>