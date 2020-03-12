@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Hover Data Table</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Product (ID & Name)</th>
									<th>INQUIRY USER</th>
									<th>INQUIRY TIME</th>
									<th>PRICE</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $item)
								<tr>
									<td>
										<div style="display: inline-block;">
											<img src="{{ $item->product_photo  }}" style="width: 50px; height: 35px; float: left;"/>
											<div style="float:left; margin-left: 10px">
												{{ $item->product_title }}
												<br>
												{{ $item->product_ref_no }}
											</div>									
										</div>
									</td>
									<td>{{ $item->user_name }}<br>{{ $item->user_email }}</td>
									<td>{{ $item->created_at->format('Y-m-d H:i:s') }}</td>
									<td>$ {{  $item->price }}</td>
								</tr>
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th>Product (ID & Name)</th>
									<th>INQUIRY USER</th>
									<th>INQUIRY TIME</th>
									<th>PRICE</th>
								</tr>
							</tfoot>
						</table>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>
<script>
	$(function () {
		$('#example2').DataTable({
			'paging'      : true,
			'lengthChange': true,
			'searching'   : true,
			'ordering'    : false,
			'info'        : true,
		})
	})
</script>
@stop
