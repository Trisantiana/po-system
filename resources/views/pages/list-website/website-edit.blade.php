@extends('layouts._master')

@section('title', 'Edit Website')

@section('breadcrumbs')

<div class="content mt-3">
	<div class="card">
		<div class="card-header">
			<div class="pull-left">
				<strong>Edit Website</strong>
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
					<form action=" {{url('/list-website/editProses', $listWebsite->id)}} " method="post">
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
							<input type="text" name="nama_website" class="form-control" value=" {{ $listWebsite->nama_website }} " required>
						</div>

						<div class="form-group">
							<label for=""> Url Website </label>
							<input type="text" name="url_website" class="form-control" value=" {{ $listWebsite->url_website }} " required>
						</div>

						<div class="form-group">
							<label for=""> Merk </label>
							<input type="text" name="merk" class="form-control" value=" {{ $listWebsite->merk }} " required>
						</div>

						<div class="form-group">
							<label for=""> Wilayah </label>
							<input type="text" name="wilayah" class="form-control" value=" {{ $listWebsite->wilayah }} " required>
						</div>

						<div class="form-group">
							<label for=""> Tanggal Aktif </label>
							<input type="text" name="tgl_aktif" class="form-control" value=" {{ $listWebsite->tgl_aktif }} " required>

						</div>

						<div class="form-group">
							<label for=""> Tanggal Selesai </label>
							<input type="text" name="tgl_selesai" class="form-control" value=" {{ $listWebsite->tgl_selesai}} " selected  required>
						</div>

						<div class="form-group">
							<label for=""> Periode </label>
							<input type="text" name="periode" class="form-control" value=" {{ $listWebsite->periode }} " required>
						</div>

						<div class="form-group">
							<label for=""> Status </label>
							<input type="text" name="status" class="form-control" value=" {{ $listWebsite->status }} " required>
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

						<button type="submit" class="btn btn-lg btn-primary"> <i class="fa fa-edit"></i> Update </button>

						<button type="reset" class="btn btn-lg btn-primary"> <i class="fa fa-reset"></i> Batal </button>


					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection