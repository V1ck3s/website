<?php
	if(!isset($_SESSION['login']))
	{	
		if(isset($_GET['ins']))
		{
			if($_POST != null)
			{
				require ("Modele/modele_inscription.php");
				
				$i= new Inscription();			
				
				$reussi=$i->create();
				
				if($reussi)
				{
					echo"<script> alert ('Votre inscription a été prise en compte !');</script>";
					// et redirection vers la page d'accueil
					print ("<script language = \"JavaScript\">");
					print ("location.href = 'index.php?do=connexionMembre';");
					print ("</script>");
				}
				else
				{
					echo"<script> alert('Email déja présent dans la base de données !');</script>";
					// et redirection vers la page d'inscription
					print ("<script language = \"JavaScript\">");
					print ("location.href = 'index.php?do=inscription';");
					print ("</script>");				
				}
			}
			else
			{
				?>		
				<script type="text/javascript">
					alert('Veuillez remplir les champs afin de vous inscrire');
					location.href = 'index.php?do=inscription';
				</script>
				<?php
			}
		}
		else
		{
			include("Vue/vue_inscription.php");
		}
	}
	else
	{
		?>		
		<script type="text/javascript">
			alert('Vous êtes déjà connecté');
			window.history.back();
		</script>
		<?php
	}
?>