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

      <form class="form-signin" name="inscription" action="/Controleur/ctrl_connexion_membre.php?mem=true" method="POST">
        <h2 class="form-signin-heading">Se connecter</h2>
        
          </br>
        
        <label for="fin">Login</label>
        <input type="text" name="conn_login" id="conn_login" class="form-control" placeholder="Login" required>

        <label for="fin">Mot de passe</label>
        <input type="password" name="conn_pass" id="conn_pass" class="form-control" placeholder="Mot de passe" required>
          
        <br>
          
          
        <button class="btn btn-lg btn-primary btn-block" type="submit" id="envoyer">Se connecter</button>
      </form>

    </div> <!-- /container -->
  </body>
</html>