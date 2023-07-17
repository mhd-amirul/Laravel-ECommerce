@extends('root.layouts.user_main')

@section('content')
    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-6">
                <div class="product-pic-zoom">
                  <img class="product-big-img" src="{{ url($product->image) }}" alt="" />
                  <div class="zoom-icon">
                    <i class="fa fa-search-plus"></i>
                  </div>
                </div>
                <div class="product-thumbs">
                  <div class="product-thumbs-track ps-slider owl-carousel">
                    <div class="pt active" data-imgbigurl="{{ url($product->image) }}" >
                      <img src="{{ url($product->image) }}" alt="" />
                    </div>

                    {{-- @foreach ($collection as $item) --}}
                      <div class="pt" data-imgbigurl="{{ url($product->image) }}" >
                        <img src="{{ url($product->image) }}" alt="" />
                      </div>
                    {{-- @endforeach --}}
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="product-details">
                  <div class="pd-title">
                    <span>{{ $product->category }}</span>
                    <h3>{{ $product->name }}</h3>
                    {{-- <a onclick="likeItem('{{ $product->id }}')" class="heart-icon"
                      ><i class="icon_heart_alt"></i
                    ></a> --}}
                  </div>
                  <div class="pd-rating">
                    @if ($product->rating)
                      @if ($product->rating >= 1)
                          <i class="fa fa-star"></i>
                      @elseif ($product->rating >= 0.5)
                          <i class="fa fa-star-half-o"></i>
                      @else
                          <i class="fa fa-star-o"></i>
                      @endif

                      @if ($product->rating >= 2)
                          <i class="fa fa-star"></i>
                      @elseif ($product->rating >= 1.5)
                          <i class="fa fa-star-half-o"></i>
                      @else
                          <i class="fa fa-star-o"></i>
                      @endif

                      @if ($product->rating >= 3)
                          <i class="fa fa-star"></i>
                      @elseif ($product->rating >= 2.5)
                          <i class="fa fa-star-half-o"></i>
                      @else
                          <i class="fa fa-star-o"></i>
                      @endif

                      @if ($product->rating >= 4)
                          <i class="fa fa-star"></i>
                      @elseif ($product->rating >= 3.5)
                          <i class="fa fa-star-half-o"></i>
                      @else
                          <i class="fa fa-star-o"></i>
                      @endif

                      @if ($product->rating >= 5)
                          <i class="fa fa-star"></i>
                      @elseif ($product->rating >= 4.5)
                          <i class="fa fa-star-half-o"></i>
                      @else
                          <i class="fa fa-star-o"></i>
                      @endif
                      <span>{{ " (".$product->rating.")" }}</span>
                    @else
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <span>(5)</span>
                    @endif
                  </div>
                  <div class="pd-desc">
                    <p>
                      {{ $product->description }}
                    </p>
                    <?php $product->discount != 0 ? $price = $product->price - ($product->price * ($product->discount / 100)) : null; ?>
                    @if ($product->discount == 0)
                      {{-- <h4>${{ $product->price }}.00</h4> --}}
                      <h4>{{ 'Rp.' . number_format($product->price,2,',','.') }}</h4>
                    @else
                      {{-- <h4> ${{ $price }}.00 <span> ${{ $product->price }}.00 </span> </h4> --}}
                      <h4>{{ 'Rp.' . number_format($price,2,',','.') }}
                        <span>
                          {{ 'Rp.' . number_format($product->price,2,',','.') }}
                          {{-- ${{ $product->price }}.00 --}}
                        </span>
                      </h4>
                    @endif
                  </div>
                  <div class="quantity">
                    <div class="pro-qty">
                      <input type="text" value="1" id="valueOfcart"/>
                    </div>
                    <a class="primary-btn pd-cart" onclick="shoppingCart('{{ $product->id }}', 'valueOfcart', 'change2')">Add To Cart</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Related Products Section End -->
    <div class="related-products spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title">
              <h2>Related Products</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-5">
            <div class="product-slider owl-carousel">
              @if (isset($related))
                  @foreach ($related as $item)
                    <div class="product-item">
                        <div class="pi-pic">
                        <img src="{{ url($item->image) }}" alt="" height="427" width="380"/>
                        <div class="sale">Sale</div>
                        {{-- <div class="icon">
                            <a class="heart-icon"><i class="icon_heart_alt"></i></a>
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
                              {{-- ${{ $price }}.00 <span> ${{ $item->price }}.00 </span> --}}
                            @endif
                          </div>
                        </div>
                    </div>
                  @endforeach
              @endif
            </div>
          </div>
          {{-- <div class="col-lg-3 col-sm-6">
            <div class="product-item">
              <div class="pi-pic">
                <img src="{{ asset('storage/'.$item->image) }}" alt="" />
                <div class="sale">Sale</div>
                <div class="icon">
                  <i class="icon_heart_alt"></i>
                </div>
                <ul>
                  <li class="w-icon active">
                    <a href="#"><i class="icon_bag_alt"></i></a>
                  </li>
                  <li class="quick-view"><a href="{{ route("product")."?product=".$item->id }}">+ Quick View</a></li>
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
          </div> --}}
        </div>
      </div>
    </div>
    <!-- Related Products Section End -->

@endsection

@push('form')
  <form action="{{ route("shopping.cart.action") }}" method="POST" id="shoppingCart" hidden>
    @csrf
    <input type="text"  id="quantityOfProduct"  name="quantity"/>
    <input type="text"  id="productIdOfProduct" name="product_id"/>
  </form>
@endpush

@push('footer')
    @include('root.includes.partner')
    @include('root.includes.footer')
@endpush