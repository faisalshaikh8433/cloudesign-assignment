@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">Product</div>
			<div class="card-body">
				<div class="form-group">
					<div>Name: {{$product->name}}</div>
				</div>
				<div class="form-group">
					Category: {{$product->category->name}}
				</div>
				<div class="form-group">
					Qty.: {{$product->qty}}
				</div>
				<div class="form-group">
					Cost: {{$product->cost}}
				</div>
				<div class="form-group">
					Rate: {{$product->rate}}
				</div>
				<label for="">Photo:</label>
				<div class="form-group">
					<img src="{{ asset('storage/images/products/' . $product->photo)}}" class="img-fluid rounded"
						width="30%" />
				</div>
			</div>
		</div>
	</div>
	@endsection