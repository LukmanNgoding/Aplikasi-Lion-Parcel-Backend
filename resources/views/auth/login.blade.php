<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lion Parcel</title>
    <link rel="shortcut icon" href="{{ asset('photo/logo2.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('photo/logo2.png') }}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #ff0000 !important;
            border-color: #ff0000 !important;
        }
        .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
            background-color: #ff0000 !important ;
            color: #fff ;
        }

        [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:focus, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:hover {
            background-color: #ff0000 !important ;
            color: #fff ;
        }

        .btn-primary {
            color: #fff;
            background-color: #ff0000 !important;
            border-color: #ff0000 !important;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #ff0000 !important;
            border-color: #ff0000 !important;
        }

        .btn-primary:focus, .btn-primary.focus {
            box-shadow: none, 0 0 0 0 #ff0000 !important;
        }

        .btn-primary.disabled, .btn-primary:disabled {
            color: #fff;
            background-color: #ff0000 !important;
            border-color: #ff0000 !important;
        }

        .btn-primary:not(:disabled):not(.disabled):active, .btn-primary:not(:disabled):not(.disabled).active,
        .show > .btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #ff0000 !important;
            border-color: #ff0000 !important;
        }

        .btn-primary:not(:disabled):not(.disabled):active:focus, .btn-primary:not(:disabled):not(.disabled).active:focus,
        .show > .btn-primary.dropdown-toggle:focus {
            box-shadow: 0 0 0 0 #ff0000 !important;
        }
    </style>
</head>
<body class="hold-transition" style="background-color: white;">
    <div class="row p-0 m-0">
        <div class="col-lg-4 p-5" style="margin-top: 15%;">
            <center>
                <img src="{{ asset('photo/logo.png') }}" style="width: 100%; max-width: 300px;" class="mb-3">
            </center>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="input-group mb-3 shadow">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('email')
                    <span>
                        {{ $message }}
                    </span>
                @enderror
                
                <div class="input-group mb-3 shadow">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password')
                    <span>
                        {{ $message }}
                    </span>
                @enderror
                
                <div class="row">                        
                    <div class="col-12" style="height: 100%;">
                        <button type="submit" class="btn btn-primary btn-block shadow">Login</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-8" style="height: 100%; min-height: 969px; background-image: url('{{ asset('photo/login.svg') }}'); background-size: 100%;">

        </div>
    </div>

<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    @if(session('success'))
        <script>
            swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonColor: '#ff0000',
            })
        </script>
    @endif

    @if(session('failed'))
        <script>
            swal.fire({
                title: 'Failed!',
                text: "{{ session('failed') }}",
                icon: 'error',
                confirmButtonColor: '#ff0000',
            })
        </script>
    @endif
</body>
</html>
