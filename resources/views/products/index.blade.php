@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="row align-items-center">
					<div class="col">
						<h3>Products</h3>
					</div>
					<div class="col text-right">
						<a class="btn btn-primary" href="{{ route('products.create') }}">Add Products</a>
					</div>
				</div>
			</div>
			<div class="card-body">
				<table class="table table-hover">
					<thead>
						<tr>
							<td>Name</td>
							<td>Category</td>
							<td>Qty.</td>
							<td>Cost</td>
							<td>Rate</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach ($products as $product)
						<tr>
							<td>{{$product->name}}</td>
							<td>{{$product->category->name}}</td>
							<td>{{$product->qty}}</td>
							<td>{{$product->cost}}</td>
							<td>{{$product->rate}}</td>
							<td>
								<div class="btn-group">
									<a href="{{route('products.show', $product->id)}}" class="btn btn-success">View</a>
									<a href="{{route('products.edit', $product->id)}}"
										class="btn btn-secondary">Edit</a>
									<form action="{{ route('products.destroy', $product->id) }}" method="POST"
										onsubmit="return confirm('Are you sure you want to delete ?')">
										@method('DELETE')
										@csrf
										<input type="submit" value="Delete" class="btn btn-danger">
									</form>
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="card-footer">
				{{ $products->links() }}
			</div>
		</div>
	</div>
</div>
@endsection