@extends('layouts._master')

@section('title', 'Create New Website')

@section('breadcrumbs')

<div class="content mt-3">
	<div class="card">
		<div class="card-header">
			<div class="pull-left">
				<strong>Create New Website</strong>
			</div>
			<div class="pull-right">
				<a href="#" class="btn btn-secondary btn-sm">
					<i class="fa fa-undo"></i> Back
				</a>
			</div>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-4 offset-md-4">
					<form action=" {{url('list-website/', $listWebsite->id)}} " method="post">
						@method('PUT')
						@csrf
						<div class="form-group">
							<label> Pemilik </label>
							<select name="id_pelanggan" class="form-control" id="">
								<option value="">--Pilih--</option>
								@foreach($users as $user)
								@if ($user->id == $listWebsite->id_pelanggan)
								<option value="{{ $user->id }}" selected=""> {{ $user->name }} </option>
								@else
								<option value="{{ $user->id }}"> {{ $user->name }} </option>
								@endif
								
								@endforeach
							</select>
						</div>

						<div class="form-group">
							<label for=""> Nama Website </label>
							<input type="text" name="nama_website" class="form-control" value=" {{ $listWebiste->nama_website }} " required>
						</div>

						<div class="form-group">
							<label for=""> Url Website </label>
							<input type="text" name="url_website" class="form-control" value=" {{ $listWebiste->url_website }} " required>
						</div>

						<div class="form-group">
							<label for=""> Merk </label>
							<input type="text" name="merk" class="form-control" value=" {{ $listWebiste->merk }} " required>
						</div>

						<div class="form-group">
							<label for=""> Wilayah </label>
							<input type="text" name="wilayah" class="form-control" value=" {{ $listWebiste->wilayah }} " required>
						</div>

						<div class="form-group">
							<label for=""> Tanggal Aktif </label>
							<input type="date" name="tgl_aktif" class="form-control" value=" {{ $listWebiste->tgl_aktif }} " required>
						</div>

						<div class="form-group">
							<label for=""> Tanggal Selesai </label>
							<input type="date" name="tgl_selesai" class="form-control" value=" {{ $listWebiste->tgl_selesai }} " required>
						</div>

						<div class="form-group">
							<label for=""> Periode </label>
							<input type="text" name="periode" class="form-control" value=" {{ $listWebiste->periode }} " required>
						</div>

						<div class="form-group">
							<label for=""> Status </label>
							<input type="text" name="status" class="form-control" value=" {{ $listWebiste->status }} " required>
						</div>

						<div class="form-group">
							<label> Jenis Website </label>
							<select name="id_jenis_website" class="form-control" id="">
								<option value="">--Pilih--</option>
								@foreach($jenisWebsite as $jnsWebsite)
								@if ($jnsWebsite->id == $listWebsite->id_jenis_website)
								<option value="{{ $jnsWebsite->id }}" selected=""> {{ $jnsWebsite->jenis_website }} </option>
								@else
								<option value="{{ $jnsWebsite->id }}"> {{ $jnsWebsite->jenis_website }} </option>
								@endif
								@endforeach
							</select>
						</div>

						<button type="submit" name="submit" class="btn btn-lg btn-primary">Save</button>


					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection