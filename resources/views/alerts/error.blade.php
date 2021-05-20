@if(session('error-msg'))
    <script>
        $(document).ready(function() {
            setTimeout(function () {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.error('{{session('error-msg')}}', 'Error');

            }, 1300);
        });
    </script>
    <?php Session::forget('error-msg');?>
@endif
