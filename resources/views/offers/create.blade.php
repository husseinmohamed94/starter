<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="/starter/public/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                <li class="nav-item active">
                    <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">  {{ $properties['native'] }} <span class="sr-only">(current)</span></a>

                </li>
                @endforeach





            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="flex-center position-ref full-height">


            <div class="content">
                <div class="text-center">
                   Add Your Offer
                </div>
                    @if(Session::has('success'))
                    <div class="alert alert-success text-center" role="alert">
                      {{Session::get('success')}}
                    </div>
                    @endif
                <form method="POST" action="{{route('offers.store')}}">
                    @csrf
                    {{-- <input  name="_token" value="{{csrf_token()}}"> --}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">offer Name</label>
                        <input type="text" class="form-control" name="name"  placeholder="offer name ">
                        @error('name')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>

                   <div class="form-group">
                        <label for="exampleInputPassword1">offer Price</label>
                        <input type="text" class="form-control" name="price" placeholder="price" >
                       @error('price')
                       <small class="form-text text-danger">{{$message}}</small>
                       @enderror

                   </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">offer dataitls</label>
                        <input type="text" class="form-control" name="details" placeholder="offer dataitls" >
                        @error('details')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror

                    </div>




                    <button type="submit" class="btn btn-primary">Save Offer</button>
                </form>

                </div>
            </div>
        </div>
    </body>
</html>
