<head>
    <title>All Offer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<div class="container">
    <h2>All offers</h2>
    @if(Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{Session::get('error')}}
        </div>
        @endif

    @if(Session::has('sucess'))
        <div class="alert alert-success" role="alert">
            {{Session::get('sucess')}}
        </div>
        @endif
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
        <tr>
            <th scope="row">{{$offer->id}}</th>
            <td>{{$offer->name}}</td>
            <td>{{$offer->price}}</td>
            <td>{{$offer->details}}</td>
            <td><a class="btn btn-primary" href="{{route('edit',$offer->id)}}">Edit</a>
            <a class="btn btn-danger" href="{{route('delete',$offer->id)}}">Delete</a> </td>
        </tr>
        @endforeach

        </tbody>
    </table>
    <div class="d-flex justify-content-center">
    {{ $offers->links() }}
    </div>

</div>
