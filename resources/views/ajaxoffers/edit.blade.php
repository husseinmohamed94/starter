@extends('layouts.app')

@section('content')


  <div class="container">

  <div class="alert alert-success text-center" id="success_msg"  style="display:none;">
                           تم التعديل بنحاج
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
                        <form method="POST" id="offerFormUpdata" action="" enctype="multipart/form-data">
                            @csrf
                            <input type="text" style="display:none;" class="form-control" name="offer_id" value="{{$offer->id}}"  placeholder="{{__('messages.offer Name ar')}} ">

                            {{--<input  name="_token" value="{{csrf_token()}}">--}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{__('messages.offer Name ar')}}</label>
                                <input type="text" class="form-control" name="name_ar" value="{{$offer->name_ar}}"  placeholder="{{__('messages.offer Name ar')}} ">
                                @error('name_ar')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{__('messages.offer Name en')}}</label>
                                <input type="text" class="form-control" name="name_en"  value="{{$offer->name_en}}" placeholder="{{__('messages.offer Name en')}} ">
                                @error('name_en')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>

                        <div class="form-group">
                                <label for="exampleInputPassword1">{{__('messages.offer Price')}}</label>
                                <input type="text" class="form-control" name="price" value="{{$offer->price}}" placeholder="{{__('messages.offer Price')}}" >
                            @error('price')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror

                        </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">{{__('messages.offer dataitls ar')}}</label>
                                <input type="text" class="form-control" name="details_ar" value="{{$offer->details_ar}}" placeholder="{{__('messages.offer dataitls ar')}}" >
                                @error('details_ar')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">{{__('messages.offer dataitls en')}}</label>
                                <input type="text" class="form-control" name="details_en" value="{{$offer->details_en}}" placeholder="{{__('messages.offer dataitls en')}}" >
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




                            <button id="updata_offer" class="btn btn-primary">{{__('messages.Save Offer')}}</button>
                        </form>

                        </div>
                    </div>
                </div>
            

  </div>

@stop

@section('scripts')
<script>
$(document).on('click','#updata_offer',function(e){
e.preventDefault();
var formData = new FormData($('#offerFormUpdata')[0]);


    $.ajax({
    type:'post',
    enctype:'multipart/form-data',

    url:"{{route('ajax.offers.updata')}}",
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