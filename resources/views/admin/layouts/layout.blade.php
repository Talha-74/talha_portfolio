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

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            @include('admin.layouts.sidebar')
            <!-- Main Content -->
            <div class="main-content">
                @yield('content')

            </div>
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
                        <span class="footer-right text-muted">
                            Version 2.3.0
                        </span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css"
        integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{ asset('assets/js/plugins/jquery.selectric.min.js')}}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.uploadPreview.min.js')}}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap-timepicker.min.js')}}"></script>
    <script src="{{ asset('assets/js/plugins/daterangepicker.js')}}"></script>
    <script src="{{ asset('assets/js/plugins/select2.full.min.js')}}"></script>


    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/features-post-create.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="https://cdn.jsdelivr.net/npm/cleave.js"></script>
    <script src="{{ asset('assets/js/page/forms-advanced-forms.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if(!empty($errors->all()))
            @foreach ($errors->all() as $error)
                // Display an error toast, with a title
                toastr.error("{{ $error }}")
            @endforeach
        @endif
    </script>

    <script>
        $('body').on('click', '.delete-item', function (e) {
            e.preventDefault();
            let deleteUrl = $(this).attr('href');
            let csrfToken = $('meta[name="csrf-token"]').attr('content');

            console.log('Delete URL:', deleteUrl);
            console.log('CSRF Token:', csrfToken);

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
                            'X-CSRF-TOKEN': csrfToken // Ensure CSRF token is sent
                        },
                        success: function (data) {
                            Swal.fire(
                                "Deleted!",
                                "Your file has been deleted.",
                                "success"
                            ).then(() => {
                                location.reload(); // Reload page after deletion if needed
                            });
                        },
                        error: function (xhr, status, error) {
                            console.log('Error:', xhr.responseText); // Log the response for more insights
                        }
                    });
                }
            });
        });
    </script>

</body>

</html>
