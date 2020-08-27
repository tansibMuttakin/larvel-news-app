@extends('admin.layout.master')

@section('content')
<link rel="stylesheet" href="/admin/assets/css/lib/chosen/chosen.css">

<script src="/admin/assets/js/lib/chosen/chosen.jquery.js"></script>

<div class="row">
    <div class="col-md-12">
        <div class="card">
        
            <div class="card-header">
                <strong class="card-title">Edit</strong>
                <a href="{{url('/back/role')}}" class="btn btn-primary pull-right">Role</a>
            </div>
            <div class="card-body">
                <!-- Credit Card -->
                <div id="pay-invoice">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center">Edit Roles</h3>
                        </div>
                        <hr>
                        <form action="{{url('/back/role/update',$target->id)}}" method="post" novalidate="novalidate">
                        @csrf  
                            <div class="form-group">
                                <label for="name" class="control-label mb-1">Name</label>
                                <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$target->name}}">
                            </div>

                            <div class="form-group">
                                <label for="guard_name" class="control-label mb-1">Guard Name</label>
                                <input id="guard_name" name="guard_name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$target->guard_name}}">
                            </div>

                            <div class="form-group">
                                <label for="permission" class="control-label mb-1">Permissions</label>
                                <select  multiple name="permission[]" id="permission" class=" form-control myselect" data-placeholder="select permission" value="">
                                    @foreach($permission as $row)
                                        
                                        <option selected value="{{$row->id}}">{{$row->name}}</option>
                                        
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