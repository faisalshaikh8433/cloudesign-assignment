@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card-columns">
			<div class="card">
				<div class="card-body">
					<p class="card-text">Total Products <h4>{{$productCount}}</h4>
					</p>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<p class="card-text">Total Categories <h4>{{$categoryCount}}</h4>
					</p>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<p class="card-text">Duplicate Products <h4>{{$duplicateCount}}</h4>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection