@php
    $siteinfos = DB::table('site_infos')->where('id', 1)->first();
@endphp

@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<header class="blue accent-3 relative nav-sticky">
    <div class="container-fluid text-white">
        <div class="row p-t-b-10 ">
           
        </div>
       
    </div>
</header>
<div class="container-fluid relative animatedParent animateOnce">
    <div class="tab-content pb-3 mt-5 text-center" id="v-pills-tabContent">
        <div class="animated fadeInUpShort">
            <form action="{{ route('siteinfo.update', $siteinfos->id) }}" method="POST">
                @csrf
  
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Phone Number1</label>
                                <input type="text" name="phone_f" class="form-control" id="validationCustom01"
                                    placeholder="phone number" value="{{ $siteinfos->phone_f }}" required>
                                @error('phone_f')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Phone Number2</label>
                                <input type="text" name="phone_s" class="form-control"
                                    placeholder="phone number" value="{{ $siteinfos->phone_s }}" required>
                                @error('phone_s')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Email</label>
                                <input type="email" name="email" class="form-control" id="validationCustom02"
                                    value="{{ $siteinfos->email }}" required>
                                @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                       
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Address</label>
                            <input type="text" name="address" class="form-control"
                                placeholder="Address" value="{{ $siteinfos->address }}" required>
                            @error('address')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                   
                        <div class="card-footer bg-transparent mt-3">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                 
                
            </form>
        </div>
    </div>
</div>
    
@endsection