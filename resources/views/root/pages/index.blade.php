@extends('root.layouts.user_main')

@section('content')
    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            @if (isset($discount))
                @foreach ($discount as $item)
                    <div class="single-hero-items set-bg" data-setbg="{{ url($item->image) }}">
                        <div class="container">
                            <div class="row">
                            <div class="col-lg-5">
                                <span>{{ $item->category }}</span>
                                <h1>{{ $item->name }}</h1>
                                <p>
                                <?php
                                    $description = $item->description;
                                    $description = (strlen($description) > 140) ? substr($description, 0, 140)."..." : $description;
                                ?>
                                {{ $description }} <a href="{{ route("product")."?product=".$item->id }}" style="color: black">see detail</a>
                                {{-- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                do eiusmod tempor incididunt ut labore et dolore --}}
                                </p>
                                {{-- <p>{{ $item->description }}</p> --}}
                                <a href="{{ route("product")."?product=".$item->id }}" class="primary-btn">Shop Now</a>
                            </div>
                            </div>
                            <div class="off-card">
                            <h2>Sale <span>{{ $item->discount }}%</span></h2>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif            
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
                                <img src="{{ url($item->image) }}" alt="" height="427" width="380"/>
                                <div class="sale">Sale</div>
                                {{-- <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div> --}}
                                <ul>
                                    <li class="w-icon active">
                                    <a onclick="shoppingCart('{{ $item->id }}', '', 'addOne')"><i class="icon_bag_alt"></i></a>
                                    </li>
                                    <li class="quick-view"><a href="{{ route("product")."?product=".$item->id }}">+ Quick View</a></li>
                                    {{-- <li class="w-icon">
                                    <a href="#"><i class="fa fa-random"></i></a>
                                    </li> --}}
                                </ul>
                                </div>
                                <div class="pi-text">
                                <div class="catagory-name">{{ $item->category }}</div>
                                <a href="#">
                                    <h5>{{ $item->name }}</h5>
                                </a>
                                <div class="product-price">
                                    <?php $item->discount != 0 ? $price = $item->price - ($item->price * ($item->discount / 100)) : null; ?>
                                    @if ($item->discount == 0)
                                        {{-- ${{ $item->price }}.00 --}}
                                        {{ 'Rp.' . number_format($item->price,2,',','.') }}
                                    @else
                                        {{ 'Rp.' . number_format($price,2,',','.') }}
                                        <span>{{ 'Rp.' . number_format($item->price,2,',','.') }}</span>
                                        {{-- ${{ $price }}.00
                                        <span>${{ $item->price }}.00</span> --}}
                                    @endif
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
        @if (isset($instagram))
            @foreach ($instagram as $item)
                <div class="insta-item set-bg" data-setbg="{{ url($item->uri) }}">
                    <div class="inside-text">
                    <i class="ti-instagram"></i>
                    <h5><a>colorlib_Collection</a></h5>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <!-- Instagram Section End -->
@endsection

@push('form')
    <form action="{{ route("shopping.cart.action") }}" method="POST" id="shoppingCart" hidden>
        @csrf
        <input type="text"  id="quantityOfProduct"  name="quantity"/>
        <input type="text"  id="productIdOfProduct" name="product_id"/>
    </form>

    <div id="modalMessage" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Message</h5>
                </div>
                <div class="modal-body">
                    <?php $msg = 0 ?>
                    @if (Session::has("session_success"))
                        <?php $msg = 1 ?>
                        <div class="alert alert-success" role="alert">
                            <li style="list-style-type: none">{{ Session::get("session_success") }}</li>
                        </div>
                        <br><br>
                    @endif
                    @if (Session::has("session_errors"))
                        <?php $msg = 1 ?>
                        <div class="alert alert-danger" role="alert">
                            <li style="list-style-type: none">{{ Session::get("session_errors") }}</li>
                        </div>
                        <br><br>
                    @endif
                    @if ($errors->any())
                        <?php $msg = 1 ?>
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                                <li style="list-style-type: none">{{ $error }}</li>
                            @endforeach
                        </div>
                        <br><br>
                    @endif
                    <input id="statusModal" value="{{ $msg }}" hidden>
                </div>
                <div class="modal-footer">
                    <p>click outside this area to close it!</p>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('footer')
    @include('root.includes.partner')
    @include('root.includes.footer')

    <script src="{{ url("Assets/js/bootstrap.min.js") }}"></script>
    <script>
        let msg   = document.getElementById("statusModal").value;

        if (msg == 1) {
            new bootstrap.Modal(document.getElementById('modalMessage')).show();
        }
    </script>
@endpush