<!-- Header Section Begin -->
<header class="header-section">
    <div class="header-top">
      <div class="container">
        <div class="ht-left">
          <div class="mail-service">
            <i class=" fa fa-envelope"></i>
            <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $basic["shop_email"] }}" style="color: black;"> {{ $basic["shop_email"] }} </a>
          </div>
          <div class="phone-service">
            <i class=" fa fa-phone"></i>
            <a href="tel:{{ $basic["shop_number"] }}" style="color: black;"> {{ $basic["shop_number"] }} </a>
          </div>
        </div>
        <div class="ht-right">
          @auth
            <form action="{{ route('signout') }}" method="POST" id="form__submit">
              @csrf
              <a class="login-panel" onclick="submitForm('form__submit')"><i class="fa fa-user"></i>Sign Out</a>
            </form>
          @endauth
          @guest
            <a href="{{ route("signin") }}" class="login-panel"><i class="fa fa-user"></i>Sign In</a>
          @endguest
        </div>
      </div>
    </div>
    <div class="container">
      <div class="inner-header">
        <div class="row">
          <div class="col-lg-2 col-md-2">
            <div class="logo">
              <a href="{{ route("index") }}">
                <img src="{{ url('Assets/images/logo/logo.png') }}" alt="" />
              </a>
            </div>
          </div>
          <div class="col-lg-7 col-md-7"></div>
          <div class="col-lg-3 text-right col-md-3">
            <ul class="nav-right">
              <li class="cart-icon">
                @auth  <a href="{{ route("shopping.cart") }}"> @endauth
                @guest <a href="{{ route("signin")        }}"> @endguest
                Keranjang Belanja &nbsp;
                  <i class="icon_bag_alt"></i>
                  {{-- @auth <span></span> @endauth --}}
                </a>
                {{-- <div class="cart-hover">
                  @auth
                    <div class="select-items">
                      <table>
                        <tbody>
                          <tr>
                            <td class="si-pic">
                              <img src="{{ url('images/select-product-1.jpg') }}" alt="" />
                            </td>
                            <td class="si-text">
                              <div class="product-selected">
                                <p>$60.00 x 1</p>
                                <h6>Kabino Bedside Table</h6>
                              </div>
                            </td>
                            <td class="si-close">
                              <i class="ti-close"></i>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="select-total">
                      <span>total:</span>
                      <h5>$120.00</h5>
                    </div>
                    <div class="select-button">
                      <a href="{{ route("shopping-card") }}" class="primary-btn view-card">VIEW CARD</a>
                      <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                    </div>
                  @endauth
                  @guest
                    <div class="select-button">
                      <a href="{{ route("signin") }}" class="primary-btn view-card">SIGN IN</a>
                    </div>
                  @endguest
                </div> --}}
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</header>
<!-- Header End -->

<!-- Breadcrumb Section Begin -->
@if (isset($breadcrumb))
  <div class="breacrumb-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="breadcrumb-text">
            <a href="{{ route("index") }}"><i class="fa fa-home"></i> Home</a>
              <?php $count = count($breadcrumb); ?>
              @foreach ($breadcrumb as $item)
                @if ($loop->iteration == $count)
                  <span>{{ $item["name"] }}</span>
                @else
                  <a href="{{ route($item["route"]) }}">{{ $item["name"] }}</a>
                @endif
              @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@endif

<!-- Breadcrumb Form Section Begin -->