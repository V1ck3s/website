<center>
		<div class="liste">
			<form name="suppression" method="POST">
			<?php
				echo '<select id="util" name="util">';
				while($unUser=$lesUsers->fetch(PDO::FETCH_OBJ))
				{
					$id=$unUser->idUtil;
					$prenom=$unUser->prenom;
					$nom=$unUser->nom;
					echo'<option value="'.$id.'">'.$id.' '.$nom.'</option>';
				}
				echo "</select>";
			?>
			</br>
			<tr>
				<td colspan="2" align="right">
					<input type="submit" class="btn btn-default" value="Supprimer" id="envoyer" style="width: 25%; min-width: 80px;">
				</td>
			</tr>
			</form>
		</div>
</center>
