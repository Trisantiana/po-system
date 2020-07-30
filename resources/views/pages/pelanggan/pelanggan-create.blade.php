@extends('layouts._master')

@section('tite', 'Tambah Pelanggan Website')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Tambah Pelanggan Baru</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#"><i class="fa fa-users"></i></a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

@endsection

@section('content')
<div class="login-form">
                    <form action="{{ route('pelanggan.addProses') }}" method="post">
                    	@csrf
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="input" name="name" class="form-control" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label>Bio</label>
                            <input type="input" name="bio" class="form-control" placeholder="Bio">
                        </div>

                        <input type="hidden" name="id_level" value="3">

                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                       
                    </form>
                </div>

@endsection