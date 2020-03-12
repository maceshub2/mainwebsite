@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				@if(Session::has('message'))
				<div class="alert {{ Session::get('result')?'alert-success':'alert-danger' }}">
					{{ Session::get('message') }}
				</div>
				@endif
				
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">All Deals for homepage</h3>
						<a href="javascript:void(0)" class="btn btn-success btn-add" style="float: right;">
							<i class="fa fa-plus"></i>
							Add
						</a>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Name</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $item)
								<tr>
									<td>
										{{ $item->name }}
									</td>
									<td>
										<label class="btn btn-{{ $item->status==1?'success':'danger' }}">
											{{ $item->status==1?'Active':'Hidden' }}
										</label>
									</td>
									<td style="text-align: center;">
										<a href="javascript:void(0)" class="btn btn-warning btn-update" data-id="{{ $item->id }}" data-name="{{ $item->name }}" data-status="{{ $item->status }}">
											<i class="fa fa-edit"></i>
											Edit
										</a>
										<a href="javascript:void(0)" class="btn btn-danger btn-delete" data-id="{{ $item->id }}">
											<i class="fa fa-trash"></i>
											Delete
										</a>
									</td>

								</tr>
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th>Name</th>
									<th>Status</th>
									<th>Action</th>
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
<div class="modal fade" id="deals-create">
	<div class="modal-dialog sm-modal">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Add New Deal For Home Page</h4>
			</div>
			<form action="{{ route('admin.product.deals.store') }}" method="post">
				@csrf
				<div class="modal-body">
					<div class="form-group col-md-12">
						<label>Name:</label>
						<input type="text" name="name" class="form-control">
					</div>
					<div class="form-group col-md-12">
						<label>Status:</label>
						<select class="form-control" name="status">
							<option  value="1">Active</option>
							<option  value="0">Hidden</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>

		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<div class="modal fade" id="deals-update">
	<div class="modal-dialog sm-modal">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Update Deal For Home Page</h4>
			</div>
			<form action="{{ route('admin.product.deals.update') }}" method="post">
				@csrf
				<div class="modal-body">
					<input type="hidden" name="id" value="" id="uid">
					<div class="form-group col-md-12">
						<label>Name:</label>
						<input type="text" name="name" class="form-control" id="name">
					</div>
					<div class="form-group col-md-12">
						<label>Status:</label>
						<select class="form-control" name="status" id="status">
							<option  value="1">Active</option>
							<option  value="0">Hidden</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>

		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<div class="modal fade" id="deals-delete">
	<div class="modal-dialog sm-modal">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Delete Deal of Home Page</h4>
			</div>
			<form action="{{ route('admin.product.deals.delete') }}" method="post">
				@csrf
				<div class="modal-body">
					<input type="hidden" name="id" id="did">
					<label style="text-align: center;">
						Are you Sure You want to delete?
					</label>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-danger">Delete</button>
				</div>
			</form>

		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
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
	$(document).ready(function(){
		$('.btn-add').on('click',function(){
			$('#deals-create').modal('show');
		});
		$('.btn-update').on('click',function(){
			$('#uid').val($(this).attr('data-id'));
			$('#name').val($(this).attr('data-name'));
			$('#status').val($(this).attr('data-status'));
			$('#deals-update').modal('show');
		});
		$('.btn-delete').on('click',function(){
			$('#did').val($(this).attr('data-id'));
			$('#deals-delete').modal('show');
		});
	});
</script>
@stop
