@extends('layouts.app')

@section('content')


  <div class="container">

            <div class="flex-center position-ref full-height">
                    <div class="content">
                            <div class="text-center">
                                            الاطباء
                            </div>
    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">name</th>
                        <th scope="col">title</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(isset($doctors) && $doctors->count() > 0 )
                        @foreach($doctors as $doctors)
                            <tr>
                            <th scope="row">{{$doctors->id}}</th>
                            <td>{{$doctors->name}}</td>
                            <td>{{$doctors->title}}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
    </table>  




                    </div>

             <div>

    </div>
@stop