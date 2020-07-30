@extends('layouts._master')

@section('tite', 'Edit Pelanggan Website')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Pelanggan Baru</h1>
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
                    <form action="{{ route('pelanggan.editProses', $pelanggan->id) }}" method="post">
                    	@method('put')
                    	@csrf
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="input" name="name" class="form-control" value="{{ $pelanggan->name }}">  
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value=" {{ $pelanggan->email }} ">
                        </div>
                       
                        <div class="form-group">
                            <label>Bio</label>
                            <input type="input" name="bio" class="form-control" value=" {{ $pelanggan->bio }} ">
                        </div>

                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Update</button>
                       
                    </form>
                </div>

@endsection