@extends('root.layouts.user_main')

@section('content')
    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="cart-table">
              <table>
                <thead>
                  <tr>
                    <th>Image</th>
                    <th class="p-name">Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th><i class="ti-close"></i></th>
                  </tr>
                </thead>
                <tbody>
                  @if ( isset($shoppingCart) )
                      @foreach ($shoppingCart as $item)
                        <tr>
                          <td class="cart-pic {{ $loop->iteration == 1 ? 'first-row' : ''; }}">
                            <img src="{{ asset('storage/'.$item->products->image) }}" alt="" width="170" height="170"/>
                          </td>
                          <td class="cart-title {{ $loop->iteration == 1 ? 'first-row' : ''; }}">
                            <h5>{{ $item->products->name }}</h5>
                          </td>
                          <td class="p-price {{ $loop->iteration == 1 ? 'first-row' : ''; }}">${{ $item->products->price }}.00</td>
                          <td class="qua-col {{ $loop->iteration == 1 ? 'first-row' : ''; }}">
                            <div class="quantity">
                              <div class="pro-qty">
                                <input type="text" value="{{ $item->quantity }}" />
                              </div>
                            </div>
                          </td>
                          <td class="total-price {{ $loop->iteration == 1 ? 'first-row' : ''; }}">${{ $item->products->price * $item->quantity }}.00</td>
                          <td class="close-td {{ $loop->iteration == 1 ? 'first-row' : ''; }}"><i class="ti-close"></i></td>
                        </tr>
                      @endforeach
                  @endif
                </tbody>
              </table>
            </div>
            <div class="row">
              <div class="col-lg-4 offset-lg-4">
                <div class="proceed-checkout">
                  <ul>
                    <li class="subtotal">Subtotal <span>$240.00</span></li>
                    <li class="cart-total">Total <span>$240.00</span></li>
                  </ul>
                  <a href="#" class="proceed-btn">PROCEED TO CHECK OUT</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Shopping Cart Section End -->

@endsection