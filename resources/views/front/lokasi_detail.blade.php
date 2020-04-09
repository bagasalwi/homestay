@extends('front.layouts.frontpage.new-master')
@section('content')
@foreach ($location as $location)
<!-- slider Area Start-->
      <div class="slider-area">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="{{ URL::asset('front2/img/hero/contact_hero.jpg') }}" >
            <div class="container">
                <div class="row ">
                    <div class="col-md-11 offset-xl-1 offset-lg-1 offset-md-1">
                        <div class="hero-caption">
                            <span>{{ $location->name }}</span>
                            <h2>{{ $location->description }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    
    <!--================Blog Area =================-->
    <section class="room-area r-padding1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <!--font-back-tittle  -->
                    <div class="font-back-tittle mb-45">
                        <div class="archivment-front">
                            <h3>{{ $location->name }}</h3>
                        </div>
                        <h3 class="archivment-back">Gallery</h3>
                    </div>
                </div>
            </div>
            <div class="row gallery-item">
                @foreach ($location_detail as $detail)
                
                <div class="col-md-4">
                    <a href="{{ URL::asset('custom-images/location/' . $detail->image) }}" class="img-pop-up">
                        <div class="single-gallery-image" style="background: url({{ URL::asset('custom-images/location/' . $detail->image) }});"></div>
                    </a>
                </div>           
                @endforeach
                
            </div>
            <div class="row justify-content-center">
                <div class="room-btn pt-70">
                    <a href="#" class="btn view-btn1">View more  <i class="ti-angle-right"></i> </a>
                </div>
            </div>
        </div>

    </section>
    @endforeach

    @endsection