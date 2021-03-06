@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Update offer</h2>
        <form id="offerForm" action="" method="post" enctype="multipart/form-data">
            @csrf

            <div class="alert alert-success" role="alert" style="display: none" id="sucess">
                Record updated successfully
            </div>
            <div class="alert alert-danger" role="alert" style="display: none" id="fail">
                Something went wrong
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">offer photo</label>
                <input type="file" name="photo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="offer name">
                @error('photo')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
                <input type="hidden" name="id" value="{{$offer->id}}">
                <label for="exampleInputEmail1">offer name</label>
                <input type="text" value="{{$offer->name}}" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="offer name">
                @error('name')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">price</label>
                <input type="text" value="{{$offer->price}}" name="price" class="form-control" id="exampleInputPassword1" placeholder="Price">
                @error('price')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">offer details</label>
                <input type="text" value="{{$offer->details}}" name="details" class="form-control" id="exampleInputPassword1" placeholder="offer details">
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
        $(document).on('submit','#offerForm',function (e) {
            e.preventDefault();
            var formdata = new FormData(this);
            $.ajax({
                type:'post',
                enctype:'multipart/form-data',
                url:'{{Route('ajaxupdate')}}',
                data:formdata,
                processData: false,
                contentType:false,
                cache:false,
                success:function (data) {
                    if(data.status==true){
                        $('#sucess').show();
                    }
                },
                error:function (data) {
                    if(data.status==false){
                        $('fail').show();
                    }
                }
            });
        });
    </script>
@stop
