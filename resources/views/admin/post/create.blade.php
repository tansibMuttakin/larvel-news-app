@extends('admin.layout.master')

@section('content')

<link rel="stylesheet" href="/admin/assets/css/lib/chosen/chosen.css">

<script src="/admin/assets/js/lib/chosen/chosen.jquery.js"></script>

<div class="row">
    <div class="col-md-12">
        <div class="card">
        
            <div class="card-header">
                <strong class="card-title">Create</strong>
                <a href="{{url('/back/permission')}}" class="btn btn-primary pull-right">Post</a>
            </div>
            <div class="card-body">
                <!-- Credit Card -->
                <div id="pay-invoice">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center">Create Post</h3>
                        </div>
                        <hr>
                        @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach($errors->all() as $message)
                                <li>{{$message}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{url('/back/post/store')}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
                        @csrf  
                            <div class="form-group">
                                <label for="title" class="control-label mb-1">Title</label>
                                <input id="title" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                            </div>

                            <div class="form-group">
                                <label for="category" class="control-label mb-1">Category</label>
                                <select name="category_id" id="category" class=" form-control" data-placeholder="select category">
                                    <option selected class="form-control">Choose..</option>
                                    @foreach($category as $row)
                                    <option class="form-control" value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="short_description" class="control-label mb-1">Short Description</label>
                                <textarea name="short_description" class="form-control" id="short_description" cols="30" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="description" class="control-label mb-1">Description</label>
                                <textarea name="description" class="form-control" id="description" cols="30" rows="6"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="image" class="control-label mb-1">Image</label>
                                <input type="file" name="image" class="form-control" id="image">
                            </div>

                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                    <span id="payment-button-amount">Submit</span>
                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div> <!-- .card -->
    </div>
</div>

<script>
    $(document).ready(function(){
        $(".myselect").chosen();
    });
</script>
@endsection