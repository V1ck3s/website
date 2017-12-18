<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Détails planning</title>

    
    <?php include('../navbar.php'); ?>
    <script src="/js/details.js"></script>
    <!-- Custom styles for this template -->
    <link href="/css/details.css" rel="stylesheet">
  </head>

  <body>
    <header>
      
    </header>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-1 col-lg-1 d-none d-sm-block bg-light sidebar">
          
        </div>

        <main role="main" class="col-sm-6 ml-sm-auto col-lg-11 col-md-10 pt-3">
          <h1>Détails du planning</h1>

          

          
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Recette</th>
                  <th>Auteur</th>
                  <th>Date servie</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    foreach($uneRecette as $donnees) {
                    {
                        echo "<tr>
                            <td>".$donnees->recNom."</td>
                            <td>".$donnees->utilPrenom." ".$donnees->utilNom."</td>
                            <td>".$donnees->dateServi."</td>
                        </tr>";

                    }
                ?>
              </tbody>
            </table>
          </div>
        </main>
          <div class="col-sm-3 col-md-1 col-lg-1 d-none d-sm-block bg-light rightsidebar">
          
        </div>
      </div>
    </div>

    
  </body>
</html>