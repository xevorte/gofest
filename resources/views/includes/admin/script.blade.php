<!-- Bootstrap core JavaScript-->
<script src="{{ url('backend/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ url('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ url('backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ url('backend/js/sb-admin-2.min.js') }}"></script>

<!-- Input Radio Checked and Uncheck-->
<script>
    $(function () {
        $('input[type="radio"]').click(function () {
            var $radio = $(this);

            // if this was previously checked
            if ($radio.data('waschecked') == true) {
                $radio.prop('checked', false);
                $radio.data('waschecked', false);
            } else
                $radio.data('waschecked', true);

            // remove was checked from other radios
            $radio.siblings('input[name="rad"]').data('waschecked', false);
        });
    });

</script>
