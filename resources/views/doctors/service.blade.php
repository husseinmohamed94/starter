@extends('layouts.app')

@section('content')


  <div class="container">

            <div class="flex-center position-ref full-height">
                    <div class="content">
                            <div class="text-center">
                                            الخدمات
                            </div>
    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">name</th>
                       

                        </tr>
                    </thead>

                    <tbody>
                        @if(isset($services) && $services->count() > 0 )
                        @foreach($services as $service)
                            <tr>
                            <th scope="row">{{$service->id}}</th>
                            <td>{{$service->name}}</td>

                            </tr>
                            @endforeach
                            @endif
                        </tbody>
    </table>  


<br><br><br>


<div class="flex-center position-ref full-height">


<div class="content">
    <div class="text-center">
   
    <form method="POST" action="{{route('save.doctor.services')}}">
        @csrf
        {{-- <input  name="_token" value="{{csrf_token()}}"> --}}
        
        <div class="form-group">
                        <label for="exampleInputEmail1">اختر طيب</label>
                        
                     <select name="doctor_id" id="" class="form-control" >
                    @if(isset($doctors) && $doctors->count() > 0)
                     @foreach($doctors as $doctor)
                     <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                    @endforeach
                     @endif
                     </select>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">اختيار خدمه</label>
                      
                     <select name="allservices[]" id=""  class="form-control" multiple>
                     @if(isset($allservices) && $allservices->count() > 0)
                     @foreach($allservices as $service)
                     <option value="{{$service->id}}">{{$service->name}}</option>
                    @endforeach
                     @endif
                     </select>
                    </div>

        <button type="submit" class="btn btn-primary">{{__('messages.Save Offer')}}</button>
    </form>

                    </div>

             <div>

    </div>
@stop