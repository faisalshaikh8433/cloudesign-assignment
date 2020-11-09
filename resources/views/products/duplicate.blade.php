@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="row align-items-center">
					<div class="col">
						<h3>Products with duplicate name</h3>
					</div>
				</div>
			</div>
			<div class="card-body">
				@if(count($products) > 0)
				<table class="table table-hover">
					<thead>
						<tr>
							<td>Name</td>
							<td>Count</td>
						</tr>
					</thead>
					<tbody>
						@foreach ($products as $product)
						<tr>
							<td>{{$product->name}}</td>
							<td>{{$product->duplicate_count}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>

			</div>
			<div class="card-footer">
				{{ $products->links() }}
			</div>
			@else
			<div class="text-center">
				<h4>No duplicate products.</h4>
			</div>
			@endif
		</div>
	</div>
</div>
@endsection