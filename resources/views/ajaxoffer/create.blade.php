@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Add a new offer</h2>
    <form id="offerForm" action="" method="post" enctype="multipart/form-data">
        @csrf
        @if(Session::has('sucess'))
        <div class="alert alert-success" role="alert">
            {{Session::get('sucess')}}
        </div>
        @endif
        <div class="form-group">
            <label for="exampleInputEmail1">offer photo</label>
            <input type="file" name="photo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="offer name">
            @error('photo')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
            <label for="exampleInputEmail1">offer name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="offer name">
            @error('name')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">price</label>
            <input type="text" name="price" class="form-control" id="exampleInputPassword1" placeholder="Price">
            @error('price')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">offer details</label>
            <input type="text" name="details" class="form-control" id="exampleInputPassword1" placeholder="offer details">
            @error('details')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>

        <button id="saveoffer" class="btn btn-primary">Submit</button>
    </form>
</div>
@stop
@section('scripts')
    <script>
        $(document).on('click','#saveoffer',function (e) {
             //e.preventDefault();
            // formx = $("#offerForm")[0];
            // var formdata = new FormData(formx);
            // req =
            $.ajax({
                url:'{{route('ajaxsave')}}',
                type:'post',
                enctype:'multipart/form-data',
                data: new FormData(document.getElementById('offerForm')),
                processData:false,
                cache:false,
        {{--            {--}}
        {{--            '_token':'{{csrf_token()}}',--}}
        {{--            'name':$("input[name=name]").val(),--}}
        {{--            'price':$("input[name=price]").val(),--}}
        {{--            'details':$("input[name=details]").val(),--}}
        {{--            'Photo':$("input [name=photo]").val()--}}

        {{--},--}}
                success:'success',
                error:'error'
            });
        });
    </script>
@stop
