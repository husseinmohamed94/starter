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

 @if(Session::has('success'))
<div class="alert atert-success">
{{Session::get('success')}}
</div>
 @endif

 
 @if(Session::has('error'))
 <div class="alert atert-danger">
 {{Session::get('error')}}
 </div>

 @endif
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">{{__('messages.offer Name')}}</th>
            <th scope="col">{{__('messages.offer Price')}}</th>
            <th scope="col">{{__('messages.offer dataitls')}}</th>
            <th scope="col">{{__('messages.offershowphoto')}}</th>

            <th scope="col">{{__('messages.operation')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($offers as $offer)
        <tr>
            <th scope="row">{{$offer->id}}</th>
            <td>{{$offer->name}}</td>
            <td>{{$offer->price}}</td>
            <td>{{$offer->details}}</td>
            <td><img src="{{asset('/images/offers/'.$offer->photo)}}" alt="" style="width: 85px;height: 60px;"></td>
            <td><a href="{{url('offers/edit/'.$offer->id)}}" class="btn btn-success" >{{__('messages.update')}}</a> 
            <a href="{{route('offers.delete',$offer->id)}}" class="btn btn-danger" >{{__('messages.delete')}}</a>  </td>
        </tr>
@endforeach
        </tbody>
    </table>
    </body>
</html>
