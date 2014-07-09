<?php if (isset($pasteur) && count($pasteur)) {
	$profile = relative_image_path('md', $pasteur['id']);
	?>
	<h3 class="text-light-blue form-title">Mombamomba</h3>
	<div class="col-md-3">
	<?php if (strlen($profile)) {?>
		<div class="thumbnail"><img src="<?php echo base_url("assets".$profile); ?>" class="profile-picture"></div>
	<?php } else {?>
		<div class="thumbnail"><i class="fa fa-picture-o fa-5x"></i></div>
	<?php } ?>
	</div>
	<div class="col-md-9">
		<div class="personne-info personne-info-striped">
			<div class="personne-info-row">
				<div class="personne-info-name">Anarana</div>
				<div class="personne-info-value"><?php echo $pasteur['name']; ?></div>
			</div>
			<div class="personne-info-row">
				<div class="personne-info-name">Taona</div>
				<div class="personne-info-value"><?php echo $pasteur['age']; ?></div>
			</div>
			<div class="personne-info-row">
				<div class="personne-info-name">Fananahana</div>
				<div class="personne-info-value"><?php echo $pasteur['sexe']; ?></div>
			</div>
			<?php if (isset($pasteur['phone']) && strlen($pasteur['phone'])) {?>
			<div class="personne-info-row">
				<div class="personne-info-name">Finday</div>
				<div class="personne-info-value"><?php echo $pasteur['phone']; ?></div>
			</div>		
			<?php } ?>
		</div>
	</div>
	<div class="clearfix"></div>
	<h3 class="text-light-blue form-title">Asa</h3>
	<div class="col-md-12">
		<div class="personne-info personne-info-striped">
			<div class="personne-info-row">
				<div class="personne-info-name">Andraikitra</div>
				<div class="personne-info-value"><?php echo $pasteur['occupation']; ?></div>
			</div>
			<?php if (isset($pasteur['datesab']) && strlen($pasteur['datesab'])) {?>
				<div class="personne-info-row">
					<div class="personne-info-name">Daty nidirana SAB</div>
					<div class="personne-info-value"><?php echo $pasteur['datesab']; ?></div>
				</div>
			<?php } ?>
			<?php if (isset($pasteur['dateosotra']) && strlen($pasteur['dateosotra'])) {?>
				<div class="personne-info-row">
					<div class="personne-info-name">Daty nanosorana</div>
					<div class="personne-info-value"><?php echo $pasteur['dateosotra']; ?></div>
				</div>
			<?php } ?>
			<?php if (isset($pasteur['current_poste']) && strlen($pasteur['current_poste'])) {?>
				<div class="personne-info-row">
					<div class="personne-info-name">Toerana iasana</div>
					<div class="personne-info-value"><?php echo $pasteur['current_poste']; ?></div>
				</div>
			<?php } ?>		
			<?php if (isset($pasteur['current_debut']) && strlen($pasteur['current_debut'])) {?>
				<div class="personne-info-row">
					<div class="personne-info-name">Daty nahatongavana</div>
					<div class="personne-info-value"><?php echo $pasteur['current_debut']; ?></div>
				</div>
			<?php } ?>				
		</div>
	</div>
	<div class="clearfix"></div>
	<?php if (isset($pasteur['last_poste']) && count($pasteur['last_poste'])) {?>
		<h3 class="text-light-blue form-title">Niasana taloha</h3>
		<div class="col-md-12">
			<div class="personne-info personne-info-striped">
				<?php foreach ($pasteur['last_poste'] as $last_poste) {?>
					<div class="personne-info-row">
						<div class="personne-info-name"><?php echo $last_poste['eglise']; ?></div>
						<div class="personne-info-value"><?php echo $last_poste['date']; ?></div>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="clearfix"></div>
	<?php } ?>
<?php } ?>
