@extends('layouts._master')

@section('title', 'Jenis Website')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Jenis Website</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#"><i class="fa fa-globe"></i></a></li>
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
                        <strong class="card-title">Data Jenis Website</strong>
                        <div class="pull-right">
                        <a href=" {{ url('/jenis-website/create') }} " class="btn btn-secondary btn-sm">
                            <i class="fa fa-plus"></i> Add
                        </a>
                    </div>
                    </div>  <!-- end .card-header -->
                    
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Jenis Website</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jenisWebsite as $key => $jenisWebsite)
                                <tr>
                                    <td> {{ $key+1 }} </td>
                                    <td> {{ $jenisWebsite->jenis_website }} </td>
                                    <td colspan="2">
                                        <a href=" {{ route('jenis-website.edit', $jenisWebsite->id) }} " class="btn btn-sm btn-outline-primary"><i class="fa fa-edit"></i></a>

                                        <a href="{{ route('jenis-website.delete', $jenisWebsite->id) }}" method="post" type="submit" class="btn btn-sm btn-outline-danger">
                                            @csrf
                                            @method('delete')
                                            <i class="fa fa-trash" onclick="return confirm('Yakin Hapus Data Ini ?')"></i></a>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div> <!-- end .card -->
                </div> <!-- end .col-md-12 -->
            </div> <!-- end .row -->

        </div><!-- .animated -->
    </div><!-- .content -->
    @endsection
