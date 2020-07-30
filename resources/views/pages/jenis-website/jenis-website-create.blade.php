@extends('layouts._master')

@section('title', 'Create New Jenis Website')

@section('breadcrumbs')

<div class="content mt-3">
	<div class="card">
		<div class="card-header">
			<div class="pull-left">
				<strong>Create New Jenis Website</strong>
			</div>
			<div class="pull-right">
				<a href=" {{ route('jenis-website.data') }} " class="btn btn-secondary btn-sm">
					<i class="fa fa-undo"></i> Back
				</a>
			</div>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-lg-12">
					<form action=" {{ route('jenis-website.create') }} " method="post">
					@csrf
					
					<div class="form-group">
						<label for=""> Jenis Website </label>
						<input type="text" name="jenis_website" class="form-control" required>
					</div>
					<button type="submit"  class="btn btn-primary"> <i class="fa fa-save"></i> Save</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection