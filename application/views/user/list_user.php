<link rel="stylesheet" href="<?php echo base_url('assets/select2/css/select2.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/select2/css/select2-bootstrap.css');?>">
<link href="<?php echo base_url('assets/adminlte/css/datatables/dataTables.bootstrap.css');?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/bootstrap3-editable/css/bootstrap-editable.css');?>" rel="stylesheet" type="text/css" />
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		User
		<small>Lister utilisateur</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
		<li class="active">User</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Liste utilisateur</h3>
				</div><!-- /.box-header -->
				<div class="box-body table-responsive ">
					<table class="table table-bordered table-striped" id="table-utilisateur">				
						<thead>
							<tr>
								<th style="width: 10px">#</th>
								<th>Nom</th>
								<th style="width: 300px">Role</th>
								<th>Birao</th>
							</tr>
						</thead>
						<tbody>
							<?php if (isset($users) && count($users)) {
								foreach ($users as $item) {
									$isBirao = false;
								if (array_key_exists('birao', $item)) {
									$isBirao = true;
									$biraoId = $item['birao']['id'];
									$biraoName = $item['birao']['fokotany'];
								}?>
							<tr id="row-<?php echo $item['id']; ?>">
								<td><?php echo $item['id']; ?>.</td>
								<td><?php echo $item['name']; ?></td>
								<td><a href="#" class="role-user" data-type="select2" data-pk="<?php echo $item['id']; ?>" data-title="Selectionner role" data-value="<?php echo $item['role']['id']; ?>"><?php echo $item['role']['name']; ?></a></td>
								<?php if ($isBirao) {?>
									<td class="birao-to-edit"><a href="#" class="birao-user" data-type="select2" data-pk="<?php echo $item['id']; ?>" data-title="Selectionner birao" data-value="<?php echo $biraoId; ?>"><?php echo $biraoName; ?></a></td>
								<?php } else {?>
									<td class="birao-to-edit"> - </td>
								<?php }?>
								
							</tr>		
							<?php }
							} ?>
						</tbody>
					</table>	
					
			</div><!-- /.box -->
		</div><!--/.col (right) -->
	</div>   <!-- /.row -->
</section><!-- /.content -->
<script src="<?php echo base_url('assets/select2/js/select2.min.js');?>"></script>
<script src="<?php echo base_url('assets/adminlte/js/plugins/datatables/jquery.dataTables.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/adminlte/js/plugins/datatables/dataTables.bootstrap.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/bootstrap3-editable/js/bootstrap-editable.min.js');?>" type="text/javascript"></script>
<script type="text/javascript">
var listRoleUrl = "<?php echo site_url('admin/role/list');?>";
var listBiraoUrl = "<?php echo site_url('fokotany/birao/ajax');?>";
var changeRoleUrl = "<?php echo site_url('admin/role/change'); ?>";
var changeBiraoUrl = "<?php echo site_url('admin/birao/change'); ?>";
$(document).ready(function() {
	$('.my-tooltip').tooltip();
	var oTable = $("#table-utilisateur").dataTable({
		"bLengthChange": false,
		"bInfo": false,
		"bProcessing": true
	});
	$.fn.editable.defaults.mode = 'inline';
	
	$('.role-user').editable({
		url: changeRoleUrl,
		source: listRoleUrl,
        select2: {
            placeholder: 'Selectionner role'
        },
        ajaxOptions: {
            dataType: 'json' //assuming json response
        },
        success: function(response, newValue) {
            if (response.success == true) {
            	if (response.isFkt == true) {
                    $(this).parents('tr').find('.birao-to-edit').html('<a href="#" class="birao-user" data-type="select2" data-pk="'+$(this).data("pk")+'" data-title="Selectionner birao" data-value=""></a>');
                    $('.birao-user').editable({
                		url: changeBiraoUrl,
                		source: listBiraoUrl,
                        select2: {
                            placeholder: 'Selectionner birao'
                        }
                    });
                } else {
                	$(this).parents('tr').find('.birao-to-edit').html(' - ');
                }
            } else {
                return "Une erreur s'est produite";
            }
            
        }
    });
	$('.birao-user').editable({
		url: changeBiraoUrl,
		source: listBiraoUrl,
        select2: {
            placeholder: 'Selectionner birao'
        },
        ajaxOptions: {
            dataType: 'json' //assuming json response
        },
        success: function(response, newValue) {
            if (response.success == true) {
            } else {
            	return "Une erreur s'est produite";
            }
        }
    });
});
</script>

