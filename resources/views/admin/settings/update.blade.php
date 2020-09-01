@extends('admin.layout.master')

@section('content')

<link rel="stylesheet" href="/admin/assets/css/lib/chosen/chosen.css">

<script src="/admin/assets/js/lib/chosen/chosen.jquery.js"></script>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <!-- Credit Card -->
                <div id="pay-invoice">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center">System Settings</h3>
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
                        @if(session('status'))
                            <div class="alert alert-success">{{session('status')}}</div>
                        @endif
                        <form action="{{url('back/setting/update')}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
                        @csrf  
                            <div class="form-group">
                                <label for="name" class="control-label mb-1">Name</label>
                                <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$system_name}}">
                            </div>

                            <div class="form-group">
                                <label for="favicon" class="control-label mb-1">Favicon</label>
                                <input type="file" name="favicon" class="form-control" id="favicon">
                            </div>

                            <div class="form-group">
                                <label for="front_logo" class="control-label mb-1">Front Logo</label>
                                <input type="file" name="front_logo" class="form-control" id="front_logo">
                            </div>

                            <div class="form-group">
                                <label for="admin_logo" class="control-label mb-1">Admin Logo</label>
                                <input type="file" name="admin_logo" class="form-control" id="admin_logo">
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