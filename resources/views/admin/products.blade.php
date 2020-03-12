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
						<h3 class="box-title">All Products</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="row">
							<div class="col-md-12">
								<h3>
									Default additional price increases: {{ $setting->price }} {{ $setting->type==1?'USD':'%' }} 
									<a href="javascript:void(0)" data-toggle="modal" data-target="#modal-default">edit</a>
								</h3>
								This price is the default price increases that will be added to all cars' original price.(Except those whose additional price was edited manually.)
								<br><br><br><br>
							</div>
						</div>
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Product (ID & Name)</th>
									<th>ORI PRICE</th>
									<th>ADD PRICE</th>
									<th>FINAL PRICE</th>
									<th>SECTION ON HP</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $item)
								<tr>
									<td>
										<div style="display: inline-block;">
											<img src="{{ env('MAIN_APP_URL') }}{{$item->photo?$item->photo->path:'assets/main/NO_image.png'}}" style="width: 50px; height: 35px; float: left;"/>
											<div style="float:left; margin-left: 10px">
												{{ $item->product_company?$item->product_company->name:'' }}
												{{ $item->product_model?$item->product_model->model:'' }}
												<br>
												{{ $item->ref_no }}
											</div>									
										</div>
									</td>
									<td>
										{{ $item->total_price }} $
									</td>
									<td>
										@php
										if($item->options && $item->options->price_type!=0){
											$additional=$item->options->price_type==1?
											$item->options->price:
											(($item->options->price/100)*$item->total_price);
										}else{
											$additional=$setting->type==1?$setting->price:(($setting->price/100)*$item->total_price);
										}
										@endphp
									{{ $additional }} $</td>
									<td>{{ $item->total_price+$additional }} $</td>
									<td>
										{{ $item->options?$item->options->deal_name:'' }}
									</td>
									<td style="align-content: center;">
										<label class="btn btn-{{ $item->status_product==1?'success':'danger' }}">
											{{ $item->status_product==1?'Live':'Hidden' }}
										</label>
										
									</td>
									<td style="text-align: center;">
										<a href="javascript:void(0)" 
										data-product-id="{{ $item->id }}"
										data-ref="{{ $item->ref_no }}"
										data-name="{{ $item->product_company?
											$item->product_company->name:
											''
										}}
										{{ $item->product_model?
											$item->product_model->model:
											'' 
										}}"

										data-deal-id="{{ $item->options?$item->options->deal_id:'' }}"
										data-id="{{ $item->options?$item->options->id:0 }}"
										data-status="{{ $item->status_product }}"
										data-price-type="{{ $item->options?$item->options->price_type:0 }}"
										data-price="{{ $item->options?$item->options->price:0 }}"
										class="btn-edit">
										edit
									</a>
								</td>

							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th>Product (ID & Name)</th>
								<th>ORI PRICE</th>
								<th>ADD PRICE</th>
								<th>FINAL PRICE</th>
								<th>SECTION ON HP</th>
								<th>HIDDEN</th>
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
<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Edit default additional price increases</h4>
			</div>
			<form action="{{ route('admin.additional.price') }}" method="post">
				@csrf
				<div class="modal-body">

					<div class="form-group col-md-12">
						<label>Choose Addittion Price option:</label>
						<select class="form-control" name="type" id="type_price">
							<option  value="1">By USD Amount</option>
							<option  value="2">By % Amount</option>
						</select>
					</div>
					<div class="form-group col-md-12">
						<div class="form-group" id="priceDiv">
							<label>Enter USD Amount:</label>
							<input type="number" min="0" name="usd" class="form-control" value="{{ $setting->type==1?$setting->price:0 }}">
						</div>
						<div class="clearFix"></div>
						<div class="form-group" id="percentDiv">
							<label>Enter % of Amount:</label>
							<input type="number" min="0" max="100" name="percent" class="form-control" value="{{ $setting->type==2?$setting->price:0 }}">
						</div>
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
<div class="modal fade" id="modal-edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Edit default Product Price</h4>
			</div>
			<form action="{{ route('admin.additional.option') }}" method="post">
				@csrf
				<div class="modal-body">
					<input type="hidden" name="id" id="option_id">
					<div class="form-group row">
						<div class="col-md-4">
							<label>ID / Name :</label>
						</div>
						<div class="col-md-8">
							<p id="product-name">
								
							</p>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-4">
							<label>Section on Home Page :</label>
						</div>
						<div class="col-md-8">
							<select class="form-control" name="deal_id" id="deal_id">
								<option value="0"></option>
								@foreach(\App\ProductDeal::where('status',1)->get() as $item)
								<option value="{{ $item->id }}">{{ $item->name }}</option>
								@endforeach
							</select>
						</div>
						<input type="hidden" name="product_id" id="product_id">
					</div>
					<div class="form-group row">
						<div class="col-md-4">
							<label>Choose Addittion Price option:</label>
						</div>
						<div class="col-md-8">
							<select class="form-control" name="price_type" id="product_type_price">
								<option  value="0">By Default</option>
								<option  value="1">By USD Amount</option>
								<option  value="2">By % Amount</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<div id="priceDivProduct">
							<div class="col-md-4">
								<label>Enter USD Amount:</label>							
							</div>
							<div class="col-md-8">
								<input type="number" min="0" name="usd" id="usd_price" class="form-control" value="0">
							</div>
						</div>
						<div class="clearFix"></div>
						<div id="percentDivProduct" style="display: none">
							<div class="col-md-4">
								<label>Enter % of Amount:</label>							
							</div>
							<div class="col-md-8">
								<input type="number" min="0" max="100" id="percent_price" name="percent" class="form-control" value="0">
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-4">
							<label>Status :</label>
						</div>
						<div class="col-md-8">
							<select class="form-control" name="status" id="status">
								<option value="1">Active</option>
								<option value="0">Hidden</option>
							</select>							
						</div>
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

<script>
	$(function () {
		$('#example2').DataTable({
			'ordering'    : false,
		})
	})
	$(document).ready(function(){
		let type='{{ $setting->type }}';
		$('#type_price').val(type);
		divControl(type);
		
		$('#type_price').on('change',function(){
			divControl($(this).val());
		});
		$('#product_type_price').on('change',function(){
			divControlProduct($(this).val());
		});

		$('#example2').on('click','.btn-edit',function(){
			name= $(this).attr('data-name');
			ref_no= $(this).attr('data-ref');
			
			product_id = $(this).attr('data-product-id');
			deal_id = $(this).attr('data-deal-id');
			status = $(this).attr('data-status');
			price_type = $(this).attr('data-price-type');
			price = $(this).attr('data-price');
			option_id =$(this).attr('data-id');

			$('#product_id').val(product_id);
			$('#deal_id').val(deal_id);
			$('#product_type_price').val(price_type);
			$('#status').val(status);
			$('#option_id').val(option_id);
			if(price_type==1){
				$('#usd_price').val(price);
			}else if(price_type==2){
				$('#percent_price').val(price);
			}
			
			divControlProduct(price_type);
			$('#product-name').html(ref_no+'/'+name);
			$('#modal-edit').modal('show');
		})

		function divControl(type){
			if(type==1){
				$('#priceDiv').css('display','block');
				$('#percentDiv').css('display','none');
			}else{
				$('#priceDiv').css('display','none');
				$('#percentDiv').css('display','block');
			}			
		}

		function divControlProduct(type){
			if(type==1){
				$('#priceDivProduct').css('display','block');
				$('#percentDivProduct').css('display','none');
			}else if(type==2){
				$('#priceDivProduct').css('display','none');
				$('#percentDivProduct').css('display','block');
			}else{
				$('#priceDivProduct').css('display','none');
				$('#percentDivProduct').css('display','none');
			}			
		}
	});
</script>
@stop
