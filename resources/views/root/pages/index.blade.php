@extends('root.layouts.user_main')

@section('content')
    

    <!-- Hero Section Begin -->
    <section class="hero-section">
    <div class="hero-items owl-carousel">
        @if (isset($discount))
            @foreach ($discount as $item)
                <div class="single-hero-items set-bg" data-setbg="{{ asset('storage/'.$item->image) }}">
                    <div class="container">
                        <div class="row">
                        <div class="col-lg-5">
                            <span>{{ $item->category }}</span>
                            <h1>{{ $item->name }}</h1>
                            <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                            do eiusmod tempor incididunt ut labore et dolore
                            </p>
                            {{-- <p>{{ $item->description }}</p> --}}
                            <a href="{{ route("product") }}" class="primary-btn">Shop Now</a>
                        </div>
                        </div>
                        <div class="off-card">
                        <h2>Sale <span>{{ $item->discount }}%</span></h2>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif            
        {{-- <div class="single-hero-items set-bg" data-setbg="{{ url('images/hero-1.jpg') }}">
            <div class="container">
                <div class="row">
                <div class="col-lg-5">
                    <span>Bag,kids</span>
                    <h1>Black friday</h1>
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                    do eiusmod tempor incididunt ut labore et dolore
                    </p>
                    <a href="{{ route("product") }}" class="primary-btn">Shop Now</a>
                </div>
                </div>
                <div class="off-card">
                <h2>Sale <span>50%</span></h2>
                </div>
            </div>
        </div>
        <div class="single-hero-items set-bg" data-setbg="{{ url('images/hero-2.jpg') }}">
            <div class="container">
                <div class="row">
                <div class="col-lg-5">
                    <span>Bag,kids</span>
                    <h1>Black friday</h1>
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                    do eiusmod tempor incididunt ut labore et dolore
                    </p>
                    <a href="{{ route("product") }}" class="primary-btn">Shop Now</a>
                </div>
                </div>
                <div class="off-card">
                <h2>Sale <span>50%</span></h2>
                </div>
            </div>
        </div> --}}
    </div>
    </section>
    <!-- Hero Section End -->

    <!-- Women Banner Section Begin -->
    <section class="women-banner spad">
    <div class="container-fluid">
        <div class="row">
        <div class="col-lg-12 mt-5">
            <div class="product-slider owl-carousel">
                @if (isset($products))
                    @foreach ($products as $item)
                        <div class="product-item">
                            <div class="pi-pic">
                            <img src="{{ asset('storage/'.$item->image) }}" alt="" height="427" width="380"/>
                            <div class="sale">Sale</div>
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active">
                                <a href="#"><i class="icon_bag_alt"></i></a>
                                </li>
                                <li class="quick-view"><a href="{{ route("product") }}">+ Quick View</a></li>
                                <li class="w-icon">
                                <a href="#"><i class="fa fa-random"></i></a>
                                </li>
                            </ul>
                            </div>
                            <div class="pi-text">
                            <div class="catagory-name">{{ $item->category }}</div>
                            <a href="#">
                                <h5>{{ $item->name }}</h5>
                            </a>
                            <div class="product-price">
                                ${{ $item->price - 5 }}.00
                                <span>${{ $item->price }}.00</span>
                            </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        </div>
    </div>
    </section>
    <!-- Women Banner Section End -->

    <!-- Instagram Section Begin -->
    <div class="instagram-photo">
        <div class="insta-item set-bg" data-setbg="{{ url('images/insta-1.jpg') }}">
            <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="{{ url('images/insta-2.jpg') }}">
            <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="{{ url('images/insta-3.jpg') }}">
            <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="{{ url('images/insta-4.jpg') }}">
            <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="{{ url('images/insta-5.jpg') }}">
            <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="{{ url('images/insta-6.jpg') }}">
            <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
    </div>
    <!-- Instagram Section End -->
@endsection

@push('footer')
    @include('root.includes.partner')
    @include('root.includes.footer')
@endpush