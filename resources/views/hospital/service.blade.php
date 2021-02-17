@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">specialist</th>

        </tr>
        </thead>
        <tbody>
        <tr>
        @if(isset($services) && $services->count() >0)
            @foreach($services as $service)
            <th scope="row">{{$service->id}}</th>
            <td>{{$service->name}}</td>
            <td>{{$service->type}}</td>
            <td><a class="btn btn-primary" href="#">NA </a> </td>
        </tr>
        @endforeach
        @endif
        </tbody>
    </table>

    <h1>Assign Doctor to a service</h1>
    <form method="post" action="{{route('saveservicestodoctor')}}">
        @csrf
        <div class="form-group">
            <label for="doctor">Select a doctor</label>
            <select class="form-control" name="doctor_id">
                @if(isset($doctors) && $doctors->count() >0)
                @foreach($doctors as $doctor)
                <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="form-group">
            <label for="doctor">Select a service</label>
            <select class="form-control" name="service_ids[]" multiple>
                @if(isset($specialists) && $specialists->count() >0)
                    @foreach($specialists as $specialist)
                        <option value="{{$specialist->id}}">{{$specialist->type}}</option>
                    @endforeach
                @endif

            </select>
        </div>
        <input type="submit" class="btn btn-primary" value="Save">
    </form>

@endsection
