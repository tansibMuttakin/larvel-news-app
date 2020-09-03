@extends('admin.layout.master')

@section('content')
    <link rel="stylesheet" href="/admin/assets/css/normalize.css">
    <link rel="stylesheet" href="/admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/admin/assets/css/themify-icons.css">
    <link rel="stylesheet" href="/admin/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="/admin/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="/admin/assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="/admin/assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="/admin/assets/scss/style.css">

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Data table</li>
                        </ol>
                    </div>
                </div>
            </div>
</div>

<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                @if(session('status'))
                <div class="alert alert-success">{{session('status')}}</div>
                @endif
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table</strong>
                            <a href="{{url('/back/post/create')}}" class="btn btn-primary pull-right">Create Post</a>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Total Views</th>
                        <th>Status</th>
                        <th>Hot News</th>
                        <th>Options</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $i=>$row)
                      <tr>
                        <td>{{++$i}}</td>
                        <td>
                            @if(file_exists(public_path('/post/').$row->thumb_img))
                            <img src="/post/{{$row->thumb_img}}" class="img img-responsive" alt="">
                            @endif
                        </td>
                        <td style="width:130px;">{{$row->title}}</td>
                        <td>{{$row->creator->name}}</td>
                        <td style="width:10px;">{{$row->view_count}}</td>
                        <td style="width:10px;">
                            @if($row->status === 1)
                            <a href="{{url('back/post/status/'.$row->id)}}" class="btn btn-success pull-right mx-2">Published</a>
                            @else
                            <a href="{{url('back/post/status/'.$row->id)}}" class="btn btn-warning pull-right mx-2">Unpublished</a>
                            @endif
                        </td>
                        <td>
                            @if($row->hot_news === 1)
                            <a href="{{url('back/post/hot-news/'.$row->id)}}" class="btn btn-success pull-right mx-2">Yes</a>
                            @else
                            <a href="{{url('back/post/hot-news/'.$row->id)}}" class="btn btn-warning pull-right mx-2">No</a>
                            @endif
                        </td>
                        <td style="width:276px;">
                            <a href="{{url('back/post/delete/'.$row->id)}}" class="btn btn-danger pull-right mx-2">Delete</a>
                            <a href="{{url('back/post/edit/'.$row->id)}}" class="btn btn-primary pull-right">Edit</a>
                            <a href="{{url('back/comment/'.$row->id)}}" class="btn btn-info pull-right mx-2">Comments</a>
                        </td>
                      </tr>
                    @endforeach  
                    </tbody>
                  </table>
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
</div><!-- .content -->

<script src="/admin/assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="/admin/assets/js/plugins.js"></script>
    <script src="/admin/assets/js/main.js"></script>


    <script src="/admin/assets/js/lib/data-table/datatables.min.js"></script>
    <script src="/admin/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="/admin/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="/admin/assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="/admin/assets/js/lib/data-table/jszip.min.js"></script>
    <script src="/admin/assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="/admin/assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="/admin/assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="/admin/assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="/admin/assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="/admin/assets/js/lib/data-table/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>

@endsection