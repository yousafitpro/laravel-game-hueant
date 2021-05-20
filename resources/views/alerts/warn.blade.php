@if(session('warn-msg'))
    <script>
        $(document).ready(function() {
            setTimeout(function () {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.warn('{{session('warn-msg')}}', 'Success');

            }, 1300);
        });
    </script>
    <?php Session::forget('warn-msg');?>
@endif
