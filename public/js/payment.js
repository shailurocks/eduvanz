$('#search').click(function(e){
	e.preventDefault();
	$("#dataTable").DataTable().ajax.reload();
	//getDetails(DOMAIN_URL+"/search");
});

$(window).on('load', function(){
	$( ".datepicker" ).datetimepicker({autoclose:true, minView: 2, format: 'yyyy-mm-dd'});
});

function getDetails(url){
	$.ajax({
		url: url,
		method: 'POST',
		data: $('#getDetails').serializeArray(),
		beforeSend:function(){
			$('#loadingDiv').show();
		},
		success: function(res){
			$('#loadingDiv').hide();
			$('#search_result').html(res);
		}
	});
}
/*
$('body').on('click', '.pagination a', function(e) {
    e.preventDefault();
    var url = $(this).attr('href');  
    getDetails(url);
});
*/