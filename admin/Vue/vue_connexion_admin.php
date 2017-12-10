<center>
    <div class="liste">
        <!--Contenu de la page-->
        <div id='content'>
			<form action="index.php?do=admin&mem=adm" method="POST">
				<div style="overflow-x:auto;">
					<table style="width:40%; border-collapse: separate; border-spacing: 30;">
						<tr>
							<td class="coord">Login : </td> <td><input type="text" class="form-control" name="login_admin"></td>
						</tr>
						<tr>
							<td class="coord">Mot de passe :</td> <td><input type="password" class="form-control" name="pass_admin"></td>
						</tr>
						<tr>
							<td colspan="2" align="right">
								<input type="submit" class="btn btn-default" class="form-control" value="Connexion" id="connexion" style="width: 25%; min-width: 100px;">
								<input type="reset" class="btn btn-default" value="Annuler" id="annuler" style="width: 20%; min-width: 70px;">
							</td>
						</tr>
					</table>
				</div>
			</form> 
		</div>
    </div>
</center>