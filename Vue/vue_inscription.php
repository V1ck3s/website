<HTML>
    <HEAD>
        <script type="text/javascript" src="JS/control_inscription.js"></script>
    </HEAD>
    
    <BODY>
		<center>
			<div class="liste">
				<h3 class="coord">Vous n'êtes pas encore inscrit sur notre site? N'hésitez pas un instant!<h3>
				<form name="inscription" action="index.php?do=inscription&ins=true" method="POST">
					<div style="overflow-x:auto;">
						<table style="width:50%; border-collapse: separate; border-spacing: 30;" >
							<tr>
								<td class="coord">Nom :</td>
								<td><input type="text" class="form-control" name="ins_nom" id="ins_nom"></td>
							</tr>
					
							<tr>
								<td class="coord">Prénom :</td>
								<td><input type="text" class="form-control" name="ins_prenom" id="ins_prenom"></td>
							</tr>
		
							<tr>
								<td class="coord">Login :</td>
								<td><input type="text" class="form-control" name="ins_login" id="ins_login"></td>
							</tr>
		
                            
							<tr>
								<td class="coord">E-mail :</td>
								<td><input type="text" class="form-control" name="ins_mail" id="ins_mail"></td>
							</tr>   

		                    <tr>
								<td class="coord">Mot de passe :</td>
								<td><input type="password" class="form-control" name="pass" id="pass"></td>
							</tr>					
		
							<tr>
								<td class="coord">Confirmation du mot de passe :</td>
								<td><input type="password" class="form-control" name="pass2" id="pass2"></td>
							</tr> 
					
							<tr>
								<td colspan="2" align="right">
									<input type="submit" class="btn btn-default" value="Envoyer" id="envoyer" style="width: 25%; min-width: 80px;">
									<input type="reset" class="btn btn-default" value="Annuler" style="width: 15%; min-width: 65px;">
								</td>
							</tr>
						</table>
					</div>
				</form>
			</div>
		</center>
    </BODY>
</HTML>