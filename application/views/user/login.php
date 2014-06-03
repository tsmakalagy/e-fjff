<div class="form-box" id="login-box">
	<div class="header">Se connecter</div>
	<form action="" method="post">
		<div class="body bg-gray">
			<?php echo validation_errors(); ?>
			<div class="form-group">
				<input type="text" name="identity" class="form-control" placeholder="Utilisateur"/>
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Mot de passe"/>
			</div>
			<div class="form-group">
				<label class="ckb_label"><input type="checkbox" name="remember_me" value="1"/> Se souvenir de moi</label>
			</div>
		</div>
		<div class="footer">
			<button type="submit" class="btn bg-olive btn-block">Connecter</button>
			<p><a href="#">Mot de passe oubli&eacute;</a><a href="<?php echo site_url('user/register'); ?>" class="pull-right">S'enregistrer</a></p>
			
		</div>
	</form>	
</div>
