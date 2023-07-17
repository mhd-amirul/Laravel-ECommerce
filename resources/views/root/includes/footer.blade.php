  <!-- Footer Section Begin -->
  <footer class="footer-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="footer-left">
            <div class="footer-logo">
              <a href="#"><img src="{{ url('Assets/images/logo/footer-logo.png') }}" alt=""/></a>
            </div>
            <ul>
              <li>Address: {{ $basic["shop_address"] }}</li>
              <li>Phone: {{ $basic["shop_number"] }}</li>
              <li>Email: {{ $basic["shop_email"] }}</li>
            </ul>
            <div class="footer-social">
              <a href="https://facebook.com/profile.php?id=100008272813247"><i class="fa fa-facebook"></i></a>
              <a href="https://instagram.com/amirul_m236/"><i class="fa fa-instagram"></i></a>
              <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
              <a href="https://linkedin.com/in/mhd-amirul"><i class="fa fa-linkedin"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 offset-lg-1">
          <div class="footer-widget">
            <h5>Information</h5>
            <ul>
              <li><a href="https://muhammad-amirul.vercel.app">About Us</a></li>
              <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Contact</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="footer-widget">
            <h5>My Account</h5>
            <ul>
              <li><a href="{{ route("profile") }}">My Account</a></li>
              <li><a href="{{ route('shopping.cart') }}">Shopping Cart</a></li>
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
              All rights reserved | Muhammad Amirul
            </div>
            <div class="payment-pic">
              <img src="{{ url('Assets/images/logo/payment-method.png') }}" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer Section End -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Contact Us</h5>
      </div>
      <div class="modal-body">
        <form action="{{ route("contact") }}" method="POST" id="contactForm">
          @csrf
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">email:</label>
            <input id="emailuser" type="email" class="form-control" id="recipient-name" name="email">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">name:</label>
            <input id="nameuser" type="text" class="form-control" id="recipient-name" name="name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text" name="message"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="submitForm('contactForm')">Send message</button>
      </div>
    </div>
  </div>
</div>