<!-- Js Plugins -->
<script src="{{ url('Assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ url('Assets/js/bootstrap.min.js') }}"></script>
<script src="{{ url('Assets/js/jquery-ui.min.js') }}"></script>
<script src="{{ url('Assets/js/jquery.countdown.min.js') }}"></script>
<script src="{{ url('Assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ url('Assets/js/jquery.zoom.min.js') }}"></script>
<script src="{{ url('Assets/js/jquery.dd.min.js') }}"></script>
<script src="{{ url('Assets/js/jquery.slicknav.js') }}"></script>
<script src="{{ url('Assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ url('Assets/js/main.js') }}"></script>

<script>
    function submitForm(id) {
        let form = document.getElementById(id);
        form.submit();
    }

    function shoppingCart(id, quantityId, type) {

        if (type == 'addOne') {
            quantityId = 1;
        }

        if (type == 'remove') {
            quantityId = 0;
            id         = document.getElementById(id).value;
        }

        if (type == 'change2') {
            quantityId = document.getElementById(quantityId).value;
        }

        if (type == 'change') {
            id         = document.getElementById(id).value;
            quantityId = document.getElementById(quantityId).value;
        }

        document.getElementById('quantityOfProduct' ).value = quantityId;
        document.getElementById('productIdOfProduct').value = id;

        document.getElementById('shoppingCart').submit();
    }

    function getDataCart(id, name, quantity) {
        document.getElementById('productIdUpdate').value    = id;
        document.getElementById('dataName').innerHTML       = name;
        document.getElementById('valueOfcart').value        = quantity;
    }

    function changePass(action) {
        $form           = document.getElementById("profileForm");
        $form.action    = action;

        $form.submit();
    }
    // function submitButton() {
    //     let button = document.getElementById("button__submit");
    //     button.click();
    // }

    // $("log_out_user_link").click(function() {
    //     document.getElementById("log_out_user").submit();
    // })
</script>