<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="public/css/style.css" />
    <title><?= $titre ?></title>

  
  
  </head>
  <body>
    <div id="global">
      <header>
        <a href="index.php"><h1 id="titreBlog">Accueil</h1></a>
      </header>
      <div id="contenu">

    

        <?= $contenu ?> <!-- élément spécifique -->
      </div> <!-- #contenu -->
      <footer id="piedBlog">
        Blog réalisé avec PHP, HTML5 et CSS.
      </footer>
    </div> <!-- #global -->
  </body>
</html>