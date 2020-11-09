@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">Edit Product</div>
			<form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<div class="card-body">
					<div class="form-group">
						<label for="name" class="label-control">Name</label>
						<input type="text" id="name" class="form-control" name="name" value="{{ $product->name }}">
					</div>
					<div class="form-group">
						<label for="category_id" class="label-control">Category</label>
						<select name="category_id" id="category_id" class="form-control">
							<option value="">Select an category</option>
							@foreach ($categories as $category)
							<option value="{{$category->id}}"
								{{($category->id === $product->category_id) ? 'selected': ''}}>{{$category->name}}
							</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="qty" class="label-control">Qty.</label>
						<input type="text" id="qty" class="form-control" name="qty" value="{{ $product->qty }}"
							placeholder="0.00">
					</div>
					<div class="form-group">
						<label for="cost" class="label-control">Cost</label>
						<input type="text" id="cost" class="form-control" name="cost" value="{{ $product->cost }}"
							placeholder="0.00">
					</div>
					<div class="form-group">
						<label for="rate" class="label-control">Rate</label>
						<input type="text" id="rate" class="form-control" name="rate" value="{{ $product->rate }}"
							placeholder="0.00">
					</div>
					<div class="form-group">
						<label for="photo" class="label-control">Photo</label>
						<input type="file" id="photo" class="form-control" name="photo" accept="image/*">

					</div>
					<div class="form-group">
						<img src="{{ asset('storage/images/products/' . $product->photo)}}" class="img-fluid rounded "
							width="30%" />
					</div>
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection