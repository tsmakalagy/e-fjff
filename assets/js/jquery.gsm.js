$(document).ready(function(e) {
    $(".region-select").select2({minimumResultsForSearch: 10});
    $('#myModal').on('hide.bs.modal', function () {
       $('#myModal').removeData();
    })
    $("form#districtForm").submit(function(e) {
		var $this = $(this);
		e.preventDefault();
		$('.btn-register').button('loading');
		$.ajax({
        	type: "POST",
            url: url_save_district,
            data: $("form#districtForm").serialize(),
            dataType: "json",
			beforeSend: function() {    
    					
    		},
            success: function(res) {
    			if (res.success == false) {
                	 $("form#districtForm").prepend(res.message);
                } else {
                     $('table#listDistrict tbody').prepend(res.item);
                     $('#myModal').modal('hide');               	
                }
                $('.save-district').addClass('disabled');
    			
    		}
        });
        return false;    	  
    });  
});