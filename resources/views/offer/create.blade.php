<head>
    <title>Add Offer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<div class="container">
    <h2>Add a new offer</h2>
    <form method="post" action="{{route('save')}}">
        @csrf
        @if(Session::has('sucess'))
        <div class="alert alert-success" role="alert">
            {{Session::get('sucess')}}
        </div>
        @endif
        <div class="form-group">
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

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
