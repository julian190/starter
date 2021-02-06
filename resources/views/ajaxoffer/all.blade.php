@extends('layouts.app')
@section('content')
<div class="container">
    <div class="alert alert-success" role="alert" style="display: none" id="sucess">
        Record added successfully
    </div>
    <div class="alert alert-danger" role="alert" style="display: none" id="fail">
        Something went wrong
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Details</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($offers as $offer)
        <tr class="offerrow{{$offer->id}}">
            <th scope="row">{{$offer->id}}</th>
            <td>{{$offer->name}}</td>
            <td>{{$offer->price}}</td>
            <td>{{$offer->details}}</td>
            <td><a class="btn btn-primary" href="{{route('ajaxedit',$offer->id)}}">Edit</a>
            <a class="btn btn-danger delete" offer_id="{{$offer->id}}" href="">Delete</a> </td>
        </tr>
        @endforeach

        </tbody>
    </table>
</div>
@stop
@section('scripts')
    <script>
        $(document).on('click','.delete',function(e){
            e.preventDefault();
           let id = $(this).attr('offer_id');
           $.ajax({
               type: 'post',
               url:"{{Route('ajaxdelete')}}",
               data:{
                   '_token':"{{csrf_token()}}",
                   'id':id
               },
               success:function (data){
                if(data.status == true){
                    $('#sucess').show();
                    $(".offerrow"+data.id).remove();
                }
               },
               error:function (data) {
                if(data.status == false){
                    $('#fail').show();
                }
               }
               });
        });
    </script>
    @stop

