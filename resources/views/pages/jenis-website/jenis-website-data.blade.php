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
                    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
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
                    </div>  <!-- end .card-header -->
                    
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Jenis Website</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jenisWebsite as $key => $jenisWebsite)
                                    <tr>
                                        <td> {{ $key+1 }} </td>
                                        <td> {{ $jenisWebsite->jenis_website }} </td>
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
