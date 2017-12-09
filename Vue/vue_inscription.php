<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <?php include('../navbar.php'); ?>

    <!-- Custom styles for this template -->
    <link href="/css/signin.css" rel="stylesheet">
      
  </head>

  <body>

    <div class="container">

      <form class="form-signin" name="inscription" action="/Controleur/ctrl_inscription.php?ins=true" method="POST">
        <h2 class="form-signin-heading">S'enregistrer</h2>
        
          </br>
        <label for="fin">Nom</label>
        <input type="text" name="ins_nom" id="ins_nom" class="form-control" placeholder="Mot de passe" required>
        
        <label for="fin">Prénom</label>
        <input type="text" name="ins_prenom" id="ins_prenom" class="form-control" placeholder="Mot de passe" required>
        
        <label for="fin">Login</label>
        <input type="text" name="ins_login" id="ins_login" class="form-control" placeholder="Mot de passe" required>
        
          <label for="debut">E-mail</label>
        <input type="email" name="ins_mail" id="ins_mail" class="form-control" placeholder="E-mail" required autofocus>
          
          
          
          
        <label for="fin">Mot de passe</label>
        <input type="password" name="ins_pass" id="pass" class="form-control" placeholder="Mot de passe" required>
          
        <br>
          
          
        <button class="btn btn-lg btn-primary btn-block" type="submit" id="envoyer">Créer mon compte</button>
      </form>

    </div> <!-- /container -->
  </body>
</html>