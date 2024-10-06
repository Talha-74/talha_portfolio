<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/select2.min.css') }}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Ensure this is only loaded once -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            @include('admin.layouts.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>

            <!-- Footer -->
            <footer class="main-footer bg-light py-3">
                <div class="container text-center">
                    <div class="footer-content">
                        <span class="text-center">
                            &copy; 2024 <span class="bullet"></span> Designed with <span
                                class="text-danger">&hearts;</span> by
                            <a href="https://github.com/Talha-74" target="_blank" class="text-decoration-none">Talha
                                Khan</a>
                        </span>
                        <br>
                        <span class="text-muted">
                            Version 2.3.0
                        </span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <!-- JS Libraies -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css"
        integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <script src="{{ asset('assets/js/plugins/summernote-bs4.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/select2.full.min.js') }}"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker.bundle.min.js">
    </script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>
    <!-- Datatables and Button scripts -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <!-- Toastr and SweetAlert -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if(!empty($errors->all()))
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}")
            @endforeach
        @endif
    </script>

    <!-- Delete button handler -->
    <script>
        $('body').on('click', '.delete-item', function (e) {
            e.preventDefault();
            let deleteUrl = $(this).attr('href');
            let csrfToken = $('meta[name="csrf-token"]').attr('content');

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: deleteUrl,
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        success: function (data) {
                            Swal.fire(
                                "Deleted!",
                                "Your file has been deleted.",
                                "success"
                            ).then(() => {
                                location.reload();
                            });
                        },
                        error: function (xhr, status, error) {
                            console.log('Error:', xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
    @stack('scripts')
</body>

</html>