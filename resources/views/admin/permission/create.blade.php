@extends('admin.layout.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
        
            <div class="card-header">
                <strong class="card-title">Create</strong>
                <a href="{{url('/back/permission')}}" class="btn btn-primary pull-right">Permissions</a>
            </div>
            <div class="card-body">
                <!-- Credit Card -->
                <div id="pay-invoice">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center">Create Permission</h3>
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
                        <form action="{{url('/back/permission/store')}}" method="post" novalidate="novalidate">
                        @csrf  
                            <div class="form-group">
                                <label for="name" class="control-label mb-1">Name</label>
                                <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                            </div>

                            <div class="form-group">
                                <label for="guard_name" class="control-label mb-1">Guard Name</label>
                                <input id="guard_name" name="guard_name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
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
@endsection