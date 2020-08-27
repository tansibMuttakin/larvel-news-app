@extends('admin.layout.master')

@section('content')
<link rel="stylesheet" href="/admin/assets/css/lib/chosen/chosen.css">

<script src="/admin/assets/js/lib/chosen/chosen.jquery.js"></script>

<div class="row">
    <div class="col-md-12">
        <div class="card">
        
            <div class="card-header">
                <strong class="card-title">Edit</strong>
                <a href="{{url('/back/author')}}" class="btn btn-primary pull-right">Author</a>
            </div>
            <div class="card-body">
                <!-- Credit Card -->
                <div id="pay-invoice">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center">Edit Author</h3>
                        </div>
                        <hr>
                        <form action="{{url('/back/author/update',$target->id)}}" method="post" novalidate="novalidate">
                        @csrf  
                            <div class="form-group">
                                <label for="name" class="control-label mb-1">Name</label>
                                <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$target->name}}">
                            </div>

                            <div class="form-group">
                                <label for="email" class="control-label mb-1">Email</label>
                                <input id="email" name="email" type="email" class="form-control" aria-required="true" aria-invalid="false" value="{{$target->email}}">
                            </div>

                            <div class="form-group">
                                <label for="password" class="control-label mb-1">Password</label>
                                <input id="password" name="password" type="password" class="form-control" aria-required="true" aria-invalid="false" value="">
                            </div>

                            <div class="form-group">
                                <label for="role" class="control-label mb-1">Roles</label>
                                <select  multiple name="role[]" id="role" class=" form-control myselect" data-placeholder="select permission" value="">
                                    @foreach($role as $row)
                                        
                                        <option selected value="{{$row}}">{{$row->name}}</option>
                                        
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                    <span id="payment-button-amount">Update</span>
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