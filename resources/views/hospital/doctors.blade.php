@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">title</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        @if(isset($doctors) && $doctors->count() >0)
            @foreach($doctors as $doctor)
            <th scope="row">{{$doctor->id}}</th>
            <td>{{$doctor->name}}</td>
            <td>{{$doctor->title}}</td>
            <td><a class="btn btn-primary" href="{{route('doctor.service',$doctor->id)}}">Specialists </a> </td>
        </tr>
        @endforeach
        @endif
        </tbody>
    </table>@endsection
