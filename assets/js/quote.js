$(document).ready(function(){

	
	$('#country').on('change',function(){
		// alert('change working...', $(this).val());
		get_ports($(this).val());
	});

	function get_ports(id){
		$.ajax({
			method:'Get',
			url: '/ajax/'+id+'/fetchPorts',
			success:function(result){
				console.log(result);

				let data='<option>Select Port</option>';
				for (i in result) {
					data+='<option value="'+result[i]['id']+'">'+result[i]['name']+'</option>';
				}
				console.log(data);
				$('#ports').html(data);
			}
		});
	}

	
});