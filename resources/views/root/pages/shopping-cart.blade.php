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
                  <?php $total = 0; $subTotal = 0; ?>
                  @if ( isset($shoppingCart) )
                      @foreach ($shoppingCart as $item)
                        <tr>
                          <td class="cart-pic {{ $loop->iteration == 1 ? 'first-row' : ''; }}">
                            <img src="{{ url($item->products->image) }}" alt="" width="170" height="170"/>
                          </td>
                          <td class="cart-title {{ $loop->iteration == 1 ? 'first-row' : ''; }}">
                            <a href="{{ route('product')."?product=".$item->products->id }}" class="text-dark"><h5>{{ $item->products->name }}</h5></a>
                          </td>
                          <td class="p-price {{ $loop->iteration == 1 ? 'first-row' : ''; }}">
                            {{-- ${{ $item->products->price }}.00 --}}
                            {{ 'Rp.' . number_format($item->products->price,2,',','.') }}
                          </td>
                          <td class="p-price text-dark {{ $loop->iteration == 1 ? 'first-row' : ''; }}">{{ $item->quantity }}</td>
                          {{-- <td class="qua-col {{ $loop->iteration == 1 ? 'first-row' : ''; }}">
                            <div class="quantity">
                              <div class="pro-qty">
                                <input type="text" value="{{ $item->quantity }}" />
                              </div>
                            </div>
                          </td> --}}
                          <td class="total-price {{ $loop->iteration == 1 ? 'first-row' : ''; }}">
                            {{-- ${{ $item->products->price * $item->quantity }}.00 --}}
                            {{ 'Rp.' . number_format($item->products->price * $item->quantity,2,',','.') }}
                          </td>
                          <td class="close-td {{ $loop->iteration == 1 ? 'first-row' : ''; }}">
                            <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="text-decoration-none text-dark" onclick="getDataCart('{{ $item->products->id }}', '{{ $item->products->name }}', '{{ $item->quantity }}')"><i class="ti-close"></i></a>
                          </td>
                        </tr>
                        <?php $total += $item->products->price * $item->quantity; $subTotal += $item->products->price * $item->quantity; ?>
                      @endforeach
                  @endif
                </tbody>
              </table>
            </div>
              <div class="row">
                {{-- <div class="row" @if ($total == 0) hidden @endif> --}}
                <div class="col-lg-4 offset-lg-4">
                  <div class="proceed-checkout">
                    <ul>
                      <li class="subtotal">Subtotal 
                        <span>
                          {{-- ${{ $subTotal }}.00 --}}
                          {{ 'Rp.' . number_format($subTotal,2,',','.') }}
                        </span>
                      </li>
                      <li class="cart-total">Total 
                        <span>
                          {{-- ${{ $total }}.00 --}}
                          {{ 'Rp.' . number_format($total,2,',','.') }}
                        </span>
                      </li>
                    </ul>
                    <a class="proceed-btn">PROCEED TO CHECK OUT</a>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Shopping Cart Section End -->
@endsection

@push('form')
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">change quantity or remove</h5>
          </div>
          <div class="modal-body">
            
            <div class="row">
              <div class="col">
                <div class="product-details">
                  <div class="pd-title">
                    <h3 id="dataName">#dataName</h3>
                    <input type="text" value="null" id="productIdUpdate" hidden/>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="product-details">
                  <div class="quantity mb-0 ms-3">
                    <div class="pro-qty">
                      <input type="text" value="1" id="valueOfcart"/>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancel</button>
            <button type="button" class="btn btn-primary" onclick="shoppingCart('productIdUpdate', 'valueOfcart', 'change')">change</button>
            <button type="button" class="btn btn-danger" onclick="shoppingCart('productIdUpdate', 'valueOfcart', 'remove')">remove</button>
          </div>
        </div>
      </div>
    </div>

    <form action="{{ route("shopping.cart.action") }}" method="POST" id="shoppingCart" hidden>
      @csrf
      <input type="text"  id="quantityOfProduct"  name="quantity"/>
      <input type="text"  id="productIdOfProduct" name="product_id"/>
    </form>
@endpush