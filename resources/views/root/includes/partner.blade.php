<!-- Partner Logo Section Begin -->
<div class="partner-logo">
    <div class="container">
      <div class="logo-carousel owl-carousel">
        @if (isset($basic["partner"]))
            @foreach ($basic["partner"] as $partner)
              <div class="logo-item">
                <div class="tablecell-inner">
                  <img src="{{ url($partner['uri']) }}" alt="{{ $partner['name'] }}" />
                </div>
              </div>
            @endforeach
        @endif
      </div>
    </div>
  </div>
  <!-- Partner Logo Section End -->