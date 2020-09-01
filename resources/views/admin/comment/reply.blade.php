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
                            <h3 class="text-center">Comment Reply</h3>
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
                        <form action="{{url('/back/comment/reply')}}" method="post" novalidate="novalidate">
                        @csrf  

                            <div class="form-group">
                                <label for="reply" class="control-label mb-1">Reply to the comment</label>
                                <textarea name="reply" class="form-control" id="short_description" cols="30" rows="3"></textarea>
                            </div>
                            <input type="hidden" name="post_id" value="{{$id}}">
                            
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