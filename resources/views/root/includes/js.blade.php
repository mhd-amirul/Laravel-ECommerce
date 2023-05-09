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
    function submitForm(id) {
        let form = document.getElementById(id);
        form.submit();
    }

    function insertCart(id, quantityId) {
        if (quantityId == 'null') {
            quantityId = 1;
        } else if (quantityId != 'null') {
            quantityId = document.getElementById(quantityId).value
        }

        document.getElementById('quantityOfProduct' ).value = quantityId;
        document.getElementById('productIdOfProduct').value = id;

        document.getElementById('insertCartToDB').submit();
    }

    function getDataCart(id, name, quantity) {
        document.getElementById('productIdUpdate').value = id;
        document.getElementById('dataName').innerHTML    = name;
        document.getElementById('valueOfcart').value     = quantity;
    }

    function updateCart(id, quantityId, type = '') {

        id         = document.getElementById(id).value;
        quantityId = document.getElementById(quantityId).value;

        if (type == 'remove') {
            quantityId = 0;
        }

        document.getElementById('quantityOfProduct' ).value = quantityId;
        document.getElementById('productIdOfProduct').value = id;

        document.getElementById('updateCartToDB').submit();
    }

    // function submitButton() {
    //     let button = document.getElementById("button__submit");
    //     button.click();
    // }

    // $("log_out_user_link").click(function() {
    //     document.getElementById("log_out_user").submit();
    // })
</script>