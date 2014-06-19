<link href="<?php echo base_url('assets/adminlte/css/datatables/dataTables.bootstrap.css');?>" rel="stylesheet" type="text/css" />
<div class="box box-primary">	
	<div class="box-header">
		<h3 class="box-title">Adiresy: <small><?php echo $karatra['adiresy'] ?></small></h3>
	</div><!-- /.box-header -->
	<div class="box-body">
		<table class="table table-bordered table-striped" id="table-olona">			
			<thead>
				<tr>
					<th>Anarana</th>
					<th>Taona</th>
					<th>Sex</th>
					<th>Karazany</th>
				</tr>
			</thead>
			<tbody>
				<?php if (isset($data) && count($data)) {
					foreach ($data as $item) {?>
				<tr id="row-<?php echo $item['id']; ?>">
					<td><?php echo $item['name']; ?></td>
					<td><?php echo $item['age']; ?></td>
					<td><?php echo $item['sex']; ?></td>
					<td><?php echo $item['type']; ?></td>
				</tr>		
				<?php }
					}?>
				
			</tbody>					
		</table>	
		
</div><!-- /.box -->
<script type="text/javascript">
	$(function() {
		var oTable = $("#table-olona").dataTable({
			"bLengthChange": false,
			"bInfo": false,
			"bFilter": true
		});
	});
</script>