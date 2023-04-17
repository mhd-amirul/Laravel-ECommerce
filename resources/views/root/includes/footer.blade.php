  <!-- Footer Section Begin -->
  <footer class="footer-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="footer-left">
            <div class="footer-logo">
              <a href="#"><img src="{{ url('images/footer-logo.png') }}" alt=""/></a>
            </div>
            <ul>
              <li>Address: {{ $basic["shop_address"] }}</li>
              <li>Phone: {{ $basic["shop_number"] }}</li>
              <li>Email: {{ $basic["shop_email"] }}</li>
            </ul>
            <div class="footer-social">
              <a href="#"><i class="fa fa-facebook"></i></a>
              <a href="#"><i class="fa fa-instagram"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-pinterest"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 offset-lg-1">
          <div class="footer-widget">
            <h5>Information</h5>
            <ul>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Checkout</a></li>
              <li><a href="#">Contact</a></li>
              <li><a href="#">Service</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="footer-widget">
            <h5>My Account</h5>
            <ul>
              <li><a href="#">My Account</a></li>
              <li><a href="#">Contact</a></li>
              <li><a href="#">Shopping Cart</a></li>
              <li><a href="#">Shop</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="copyright-reserved">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="copyright-text">
              Copyright &copy;
              <script>
                document.write(new Date().getFullYear());
              </script>
              All rights reserved | Fashi
            </div>
            <div class="payment-pic">
              <img src="{{ url('images/payment-method.png') }}" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer Section End -->