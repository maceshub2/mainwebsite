<script>
	$(document).ready(function(){
		$('#maker_id').val({{ isset($form['maker_id'])?$form['maker_id']:'' }});
		$('#model_id').val({{ isset($form['model_no'])?$form['model_no']:'' }});
		$('#drivetrain').val({{ isset($form['drive_type'])?$form['drive_type']:'' }});
		$('#fuel').val('{{ isset($form['fuel_type'])?$form['fuel_type']:'' }}');
		$('#body_type').val({{ isset($form['veh_type'])?$form['veh_type']:'' }});
		$('#steering').val({{ isset($form['steering'])?$form['steering']:'' }});
		$('#transmission').val({{ isset($form['transmission'])?$form['transmission']:'' }});
		$('#engine_capacity_from').val({{ isset($form['engine_capacity_from'])?$form['engine_capacity_from']:'' }});
		$('#engine_capacity_to').val({{ isset($form['engine_capacity_to'])?$form['engine_capacity_to']:'' }});
		$('#year_from').val({{ isset($form['year_from'])?$form['year_from']:'' }});
		$('#year_to').val({{ isset($form['year_to'])?$form['year_to']:'' }});
		$('#price_from').val({{ isset($form['price_from'])?$form['price_from']:'' }});
		$('#price_to').val({{ isset($form['price_to'])?$form['price_to']:'' }});


		$('#reset_btn').on('click',function(){
			$('#maker_id').val('');
			$('#model_id').val('');
			$('#drivetrain').val('');
			$('#fuel').val('');
			$('#body_type').val('');
			$('#steering').val('');
			$('#transmission').val('');
			$('#engine_capacity_from').val('');
			$('#engine_capacity_to').val('');
			$('#year_from').val('');
			$('#year_to').val('');
			$('#price_from').val('');
			$('#price_to').val('');

		});
	});
</script>