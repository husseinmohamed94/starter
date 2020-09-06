@extends('layouts.app')

@section('content')


  <div class="container">

            <div class="flex-center position-ref full-height">
                    <div class="content">

                    @if(Session::has('success'))
                   
                          <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                                <strong>
                                {{Session::get('success')}}
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                      </div>
            @endif
                            <div class="text-center">
                                            المستشفيات
                            </div>
    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">name</th>
                        <th scope="col">adders</th>
                        <th scope="col">controll</th>
                        </tr>
                    </thead>
                        <tbody>
                        @if(isset($hosptials) && $hosptials->count() > 0 )
                        @foreach($hosptials as $hosptial)
                            <tr>
                            <th scope="row">{{$hosptial->id}}</th>
                            <td>{{$hosptial->name}}</td>
                            <td>{{$hosptial->adderss}}</td>
                            <td><a href="{{route('hospital.doctors',$hosptial->id)}}" class="btn btn-success">عرض الاطباء</a>
                            <a href="{{route('hospital.delete',$hosptial->id)}}" class="btn btn-danger"> حذف</a>
                            </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
    </table>  




                    </div>

             <div>

    </div>
@stop