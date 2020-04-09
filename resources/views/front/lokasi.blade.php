@extends('front.layouts.frontpage.new-master')
@section('content')
<!-- slider Area Start-->
      <div class="slider-area">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="{{ URL::asset('front2/img/hero/contact_hero.jpg') }}" >
            <div class="container">
                <div class="row ">
                    <div class="col-md-11 offset-xl-1 offset-lg-1 offset-md-1">
                        <div class="hero-caption">
                            <span>{{ $title }}</span>
                            <h2>{{ $sub_title }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    
    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                @foreach ($location as $location)  
                <div class="col-lg-4">
                    <div class="blog_left_sidebar">
                        <article class="blog_item">
                            <div class="blog_details">
                                <a class="d-inline-block" href="{{ url('lokasi/' . $location->name) }}">
                                    <h2>{{ $location->name }}</h2>
                                </a>
                                <p>{{ $location->description }}</p>
                            </div>
                        </article>
                    </div>
                </div>
                @endforeach
                </div>
            </div>
        </div>
    </section>

    @endsection