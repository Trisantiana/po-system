@extends('layouts._master')

@section('title', 'Detail Website')

@section('breadcrumbs')
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Detail Website</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<a href="{{ route('list-website.data') }}" class="btn btn-secondary btn-sm">
						<i class="fa fa-undo"></i> Back
					</a>
				</ol>
			</div>
		</div>
	</div>
</div>

@endsection


@section('content')
<div class="content mt-3">
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<strong class="card-title">Data Website</strong>

						<div class="pull-right">
							@if ($result > 0)
							<p style="font-weight : bold; color: #000">Masa Sewa Web : {{$result}} Hari Lagi</p>
							@else
							<p style="color: red; font-weight: bold;">Masa Sewa Web Sudah Habis</p>
							@endif

						</div>

					</div>  <!-- end .card-header -->
					<div class="card-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="col-lg-6">
									<div class="form-group">
										<label> Pemilik </label>
										<input type="text" class="form-control" value=" {{ $website->user->name }} " readonly="">
									</div>

									<div class="form-group">
										<label for=""> Nama Website </label>
										<input type="text" name="nama_website" class="form-control" value=" {{ $website->nama_website }} " readonly>
									</div>

									<div class="form-group">
										<label for=""> Url Website </label>
										<input type="text" name="url_website" class="form-control" value=" {{ $website->url_website }} " readonly>
									</div>

									<div class="form-group">
										<label for=""> Merk </label>
										<input type="text" name="merk" class="form-control" value=" {{ $website->merk }} " readonly>
									</div>

									<div class="form-group">
										<label for=""> Wilayah </label>
										<input type="text" name="wilayah" class="form-control" value=" {{ $website->wilayah }} " readonly>
									</div>

								</div>

								<div class="col-lg-6">
									<div class="form-group">
										<label for=""> Tanggal Aktif </label>
										<input type="text" name="tgl_aktif" class="form-control" value=" {{ date('d-m-Y', strtotime($website->tgl_aktif)) }} " readonly>

									</div>

									<div class="form-group">
										<label for=""> Tanggal Selesai </label>
										<input type="text" name="tgl_selesai" class="form-control" value=" {{ date('d-m-Y', strtotime($website->tgl_selesai)) }} "  readonly>
									</div>

									<div class="form-group">
										<label for=""> Periode </label>
										<input type="text" name="periode" class="form-control" value=" {{ $website->periode }} " readonly>
									</div>

									<div class="form-group">
										<label for=""> Status </label>
										<input type="text" name="status" class="form-control" value=" {{ $website->status }} " readonly>
									</div>

									<div class="form-group">
										<label> Jenis Website </label>
										<input type="text" class="form-control" value=" {{ $website->jenisWebsite->jenis_website }} " readonly="">

									</div>
								</div>


							</div>
						</div>
					</div>
				</div>
			</div> <!-- end .card -->
		</div> <!-- end .col-md-12 -->
	</div> <!-- end .row -->

</div><!-- .animated -->
</div><!-- .content -->
@endsection
