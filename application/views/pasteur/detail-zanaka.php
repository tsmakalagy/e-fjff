<h3 class="text-light-blue form-title">Lisitry ny zanaka</h3>
<div class="col-md-12">
	<table class="table">
		<thead>
			<tr><th>#</th><th>Anarana</th><th>Taona</th><th>Kilasy</th><th>Fananahana</th></tr>
		</thead>
		<tbody>
		<?php foreach ($enfants as $enfant) { ?>
			<tr>
				<td><?php echo $enfant['num']; ?></td>
				<td><?php echo $enfant['name']; ?></td>
				<td><?php echo $enfant['age']; ?></td>
				<td><?php echo $enfant['classe']; ?></td>
				<td><?php echo $enfant['sexe']; ?></td>
			</tr>	
		<?php } ?>
		</tbody>
	</table>
</div>
<div class="clearfix"></div>