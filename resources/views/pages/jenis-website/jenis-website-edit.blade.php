@extends('layouts._master')

@section('title', 'Edit Jenis Website')

@section('breadcrumbs')

<div class="content mt-3">
	<div class="card">
		<div class="card-header">
			<div class="pull-left">
				<strong>Edit Jenis Website</strong>
			</div>
			<div class="pull-right">
				<a href=" {{ route('jenis-website.data') }} " class="btn btn-secondary btn-sm">
					<i class="fa fa-undo"></i> Back
				</a>
			</div>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-12">
					<form action=" {{ route('jenis-website.editProses', $jenisWebsite->id) }} " method="post">
					@csrf
					@method('put')
					<div class="form-group">
						<label for=""> Jenis Website </label>
						<input type="text" name="jenis_website" class="form-control" value="{{ $jenisWebsite->jenis_website }}" >
					</div>
					<button type="submit"  class="btn btn-sm btn-primary">Update</button>


					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection