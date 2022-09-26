@extends('layouts.back')
@section('content')
<div class="main_content_iner ">
   <div class="container-fluid p-0">
      <div class="row justify-content-center">
         <div class="white_card card_height_100 mb_30">
            <div class="white_card_header white_box_tittle pink_bg">
               <div class="box_header m-0">
                  <div class="main-title">
                     <h3 class="m-0 text_white">Website Settings</h3>
                  </div>
               </div>
            </div>
            <div class="white_card_body">
               <div class="white_box_tittle list_header">
                  <h4>Site Settings</h4>
               </div>
               <hr>
               <div class="card-body">
                  <form method="POST" action="{{route('admin.savesettings')}}" enctype='multipart/form-data'>
                     @csrf
                     <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="name">Website Name*</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name',isset($settings->name)?$settings->name:'')}}" placeholder="Website Name">
                                @error('name')  
                                    <p class="text-danger">{{ $message }} </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="url">Website URL*</label>
                                <input type="url" class="form-control @error('url') is-invalid @enderror" name="url" id="url" value="{{old('url',isset($settings->url)?$settings->url:"")}}" placeholder="Website URL">
                                @error('url')  
                                    <p class="text-danger">{{ $message }} </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="email">Website Email*</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email', isset($settings->email)?$settings->email:'')}}" placeholder="Website Email">
                                @error('email')  
                                    <p class="text-danger">{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="contact">Contact Number*</label>
                                <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" value="{{old('contact', isset($settings->contact)?$settings->contact:'')}}" placeholder="Contact Number">
                                @error('contact')  
                                    <p class="text-danger">{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="address">Site Address*</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{old('address', isset($settings->address)?$settings->address:'')}}" placeholder="Site Address">
                                @error('address')  
                                    <p class="text-danger">{{ $message }} </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="address">Website Index: </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="index" id="active" value="1" {{isset($settings->index) ==1?"checked":""}}>
                                    <label class="form-label form-check-label" for="active">Index</label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="index" id="deactive" value="0"{{isset($settings->index) ==0?"checked":""}}>
                                    <label class="form-label form-check-label" for="deactive">No-index</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="file">Logo*</label>
                                <img src="{{isset($settings->logo)?asset($settings->logo):''}}" width="160px" > 
                                <input type="hidden" name="oldlogo" value="{{isset($settings->logo)?$settings->logo:''}}">
                                <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" id="file" value="{{old('logo')}}" placeholder="logo">
                                @error('logo')  
                                    <p class="text-danger">{{ $message }} </p>
                                @enderror
                            </div>    
                            <div class="mb-3">
                                <label class="form-label" for="file">White logo*</label>
                                <img src="{{isset($settings->whitelogo)?asset($settings->whitelogo):''}}" width="160px" style="background:#0f5298"> 
                                <input type="hidden" name="oldwhitelogo" value="{{isset($settings->whitelogo)?$settings->whitelogo:''}}">
                                <input type="file" name="whitelogo" class="form-control @error('whitelogo') is-invalid @enderror" id="file" value="{{old('whitelogo')}}" placeholder="whitelogo">
                                @error('whitelogo')  
                                    <p class="text-danger">{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="file">Fevicon*</label>
                                <img src="{{isset($settings->fevicon)?asset($settings->fevicon):''}}" > 
                                <input type="hidden" name="oldfevicon" value="{{isset($settings->fevicon)?$settings->fevicon:''}}">
                                <input type="file" name="fevicon" class="form-control @error('fevicon') is-invalid @enderror" id="file" value="{{old('fevicon')}}" placeholder="fevicon">
                                @error('fevicon')  
                                    <p class="text-danger">{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="alt">Logo Alt*</label>
                                <input type="text" name="alt" class="form-control @error('alt') is-invalid @enderror" id="alt" value="{{old('alt', isset($settings->alt)?$settings->alt:'')}}" placeholder="Image Alt" >
                                @error('alt')  
                                    <p class="text-danger">{{ $message }} </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                     
                     <div class="row mb-3">
                        <div class="col-md-12">
                            <label class="form-label" for="fcontent">Footer Content* </label>
                            <textarea class="form-control @error('fcontent') is-invalid @enderror"  rows="3" name="fcontent" id="maxlength-textarea">{{old('fcontent',isset($settings->fcontent)?$settings->fcontent:'' )}}</textarea>
                            @error('fcontent')  
                            <p class="text-danger">{{ $message }} </p>
                            @enderror
                        </div>
                       
                     </div>
                     <button type="submit" class="btn btn-success">Submit</button> <a href="{{ url()->previous() }}" type="button" class="btn btn-warning">Back</a>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <div class="col-12"></div>
   </div>
</div>
</div>
@stop
