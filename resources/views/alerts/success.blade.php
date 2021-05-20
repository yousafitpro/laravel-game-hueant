@if(session('success-msg'))

<script>

    $(document).ready(function() {
        setTimeout(function () {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 4000
            };
            toastr.success('{{session('success-msg')}}', 'Success');

        }, 1300);
    });

</script>
    <?php Session::forget('success-msg');?>
@endif
