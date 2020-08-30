@extends('layouts.app')

@section('content')


  <div class="container">

  <div class="alert alert-success text-center" id="success_msg"  style="display:none;">
                           تم الحفظ بنحاج
                            </div>
            <div class="flex-center position-ref full-height">


                    <div class="content">
                        <div class="text-center">
                    {{__('messages.Add Your Offer')}}
                        </div>
                            @if(Session::has('success'))
                            <div class="alert alert-success text-center" role="alert">
                            {{Session::get('success')}}
                            </div>
                            @endif
                        <form method="POST" id="offerForm" action="{{route('ajax.offers.store')}}" enctype="multipart/form-data">
                            @csrf
                            {{--<input  name="_token" value="{{csrf_token()}}">--}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{__('messages.offer Name ar')}}</label>
                                <input type="text" class="form-control" name="name_ar"  placeholder="{{__('messages.offer Name ar')}} ">
                                @error('name_ar')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{__('messages.offer Name en')}}</label>
                                <input type="text" class="form-control" name="name_en"  placeholder="{{__('messages.offer Name en')}} ">
                                @error('name_en')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>

                        <div class="form-group">
                                <label for="exampleInputPassword1">{{__('messages.offer Price')}}</label>
                                <input type="text" class="form-control" name="price" placeholder="{{__('messages.offer Price')}}" >
                            @error('price')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror

                        </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">{{__('messages.offer dataitls ar')}}</label>
                                <input type="text" class="form-control" name="details_ar" placeholder="{{__('messages.offer dataitls ar')}}" >
                                @error('details_ar')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">{{__('messages.offer dataitls en')}}</label>
                                <input type="text" class="form-control" name="details_en" placeholder="{{__('messages.offer dataitls en')}}" >
                                @error('details_en')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror

                                    </div>
                    <div class="form-group">
                                <label for="exampleInputPassword1">{{__('messages.offer photo')}}</label>
                                <input type="file" class="form-control" name="photo" >
                                @error('photo')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror

                                </div>




                            <button id="save_offer" class="btn btn-primary">{{__('messages.Save Offer')}}</button>
                        </form>

                        </div>
                    </div>
                </div>
            

  </div>

@stop

@section('scripts')
<script>
$(document).on('click','#save_offer',function(e){
e.preventDefault();
var formData = new FormData($('#offerForm')[0]);


    $.ajax({
    type:'post',
    enctype:'multipart/form-data',

    url:"{{route('ajax.offers.store')}}",
    data:formData,
    processData: false,
    contentType: false,
    cache: false,
    success: function(data){
    if(data.status == true)
    {
    $('#success_msg').show();
    }
    },error: function(reject){

    }

    });
    });
    </script>

@stop