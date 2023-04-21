<!-- Js Plugins -->
<script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ url('js/bootstrap.min.js') }}"></script>
<script src="{{ url('js/jquery-ui.min.js') }}"></script>
<script src="{{ url('js/jquery.countdown.min.js') }}"></script>
<script src="{{ url('js/jquery.nice-select.min.js') }}"></script>
<script src="{{ url('js/jquery.zoom.min.js') }}"></script>
<script src="{{ url('js/jquery.dd.min.js') }}"></script>
<script src="{{ url('js/jquery.slicknav.js') }}"></script>
<script src="{{ url('js/owl.carousel.min.js') }}"></script>
<script src="{{ url('js/main.js') }}"></script>

<script>
    function submitForm() {
        let form = document.getElementById("form__submit");
        form.submit();
    }

    function submitButton() {
        let button = document.getElementById("button__submit");
        button.click();
    }

    $("log_out_user_link").click(function() {
        document.getElementById("log_out_user").submit();
    })
</script>