<form method="post" action="index.php?action=creation">

  <label for="nameUser">Pseudo / Nom d'aventurier</label> :
      <input type="text" name="nameUser" id="nameUser" name="nameUser" placeholder="Votre nom ..."/><br><br>

    <label for="pwd">Mot de passe</label> :
      <input type="password" name="pwd" id="pwd" name="pwd" placeholder="Votre mot de passe ..."/><br><br>

    <label for="sex">Sexe</label>:
      <select name="lstSex" id="lstSex">
        <?php 
        foreach($theSexs as $sex)
        {
          $sex = $sex['libelle']
          ?><option selected value="<?php echo $sex ?>"><?php echo  $sex ?> </option><?php 
        }
        ?>
      </select>

    <label for="race">Race</label>:
      <select name="lstRace" id="lstRace">
        <?php 
        foreach($theRaces as $race)
        {
          $race = $race['libelle']
          ?><option selected value="<?php echo $race ?>"><?php echo  $race ?> </option><?php 
        }
        ?>
      </select>

    <button id="valider">Creation du compte</button>
</form>
