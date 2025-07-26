    <!-- Vendor JS Files -->
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('jquery/jquery-3.7.1.min.js') }} "></script>
    <script src="{{ asset('backend/js/main.js') }}"></script>
    <script src="{{ asset('datatables/js/dataTables.js') }} "></script>
    <script src="{{ asset('sweetalert/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('toastr/js/toastr.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>

    {{-- TextColor CKEDITOR --}}
    <script>
        CKEDITOR.replace('editor', {
            skin: 'moono',
            enterMode: CKEDITOR.ENTER_BR,
            shiftEnterMode: CKEDITOR.ENTER_P,
            toolbar: [{
                    name: 'basicstyles',
                    groups: ['basicstyles'],
                    items: ['Bold', 'Italic', 'Underline', "-", 'TextColor', 'BGColor']
                },
                {
                    name: 'styles',
                    items: ['Format', 'Font', 'FontSize']
                },
                {
                    name: 'scripts',
                    items: ['Subscript', 'Superscript']
                },
                {
                    name: 'justify',
                    groups: ['blocks', 'align'],
                    items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
                },
                {
                    name: 'paragraph',
                    groups: ['list', 'indent'],
                    items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent']
                },
                {
                    name: 'links',
                    items: ['Link', 'Unlink']
                },
                {
                    name: 'insert',
                    items: ['Image']
                },
                {
                    name: 'spell',
                    items: ['jQuerySpellChecker']
                },
                {
                    name: 'table',
                    items: ['Table']
                }
            ],
        });
    </script>

    {{-- DataTable --}}
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    {{-- sweetalert --}}
    <script>
        document.querySelectorAll('.btnDelete').forEach(function(btn) {
            btn.addEventListener('click', function() {
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this!",
                    icon: "warning",
                    buttons: {
                        cancel: {
                            text: "Cancel",
                            value: null,
                            visible: true,
                            className: "btn btn-secondary"
                        },
                        confirm: {
                            text: "Delete",
                            value: true,
                            visible: true,
                            className: "btn btn-danger"
                        }
                    },
                    dangerMode: true
                }).then((willDelete) => {
                    if (willDelete) {
                        this.closest('.deleteForm').submit();
                    }
                });
            });
        });
    </script>

    {{-- toastr --}}
    <script>
        @if (Session::has('success'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('success') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>
