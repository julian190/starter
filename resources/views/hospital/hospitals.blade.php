@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">Address</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        @if(isset($hospitals) && $hospitals->count() >0)
            @foreach($hospitals as $hopital)
            <th scope="row">{{$hopital->id}}</th>
            <td>{{$hopital->name}}</td>
            <td>{{$hopital->address}}</td>
            <td>
                <a class="btn btn-primary" href="{{route('getDoctors',$hopital->id)}}">Get doctors</a>
                <a class="btn btn-danger" href="{{route('hospital.delete',$hopital->id)}}">Delete hospital</a>
            </td>
        </tr>
        @endforeach
        @endif
        </tbody>
    </table>@endsection
