<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <title>{{ setting('site.title') }}</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900" rel="stylesheet">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <!-- Custom stlylesheet -->
  <link type="text/css" rel="stylesheet" href="{{ asset('booking/css/style.css') }}" />

  <link type="text/css" rel="stylesheet" href="{{ asset('vendor/clockpicker/bootstrap-clockpicker.min.css') }}" />
  <link rel="icon" type="image/png" href="{{ Voyager::image(setting('admin.icon_image')) }}" />

  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <style>
    .custom-input {
      color: yellow;
    }
  </style>
  @livewireStyles
  @stack('styles')
</head>

<body class="bg-dark">

  <div id="navbar">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="{{ Voyager::image(setting('site.logo')) }}" alt="BlankSpacerLogo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

            @if (Auth::check())
              @if (Auth::user()->role->name != 'user')
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('voyager.dashboard') }}">Dashboard <span
                      class="sr-only">(current)</span></a>
                </li>
              @endif

              <li class="nav-item active">
                <a class="nav-link" href="{{ route('bookingform') }}">Appointment <span
                    class="sr-only">(current)</span></a>
              </li>
            @endif
          </ul>

          @if (Auth::check())
            <form action="{{ route('logout') }}" method="post">
              @csrf
              <button type="submit" class="btn btn-sm btn-danger">
                <i class="fa fa-power-off" aria-hidden="true"></i>
                Logout
              </button>
            </form>
          @else
            @livewire('login-component')
          @endif
        </div>
      </div>
    </nav>
  </div>
  <div class="main-container">
    {{ $slot }}
  </div>

  <div id="footer">
    <footer class="py-3 my-3 bg-dark">
      <p class="text-center text-light">{!! setting('site.copyright_text') !!}</p>
    </footer>
  </div>

  {{-- <script src="{{ asset('booking/js/jquery.min.js') }}"></script> --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer="defer"></script> --}}

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  {{-- <script src="{{ asset('vendor/clockpicker/bootstrap-clockpicker.js') }}"></script> --}}
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js"
    integrity="sha512-igl8WEUuas9k5dtnhKqyyld6TzzRjvMqLC79jkgT3z02FvJyHAuUtyemm/P/jYSne1xwFI06ezQxEwweaiV7VA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" defer="defer"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.4/dayjs.min.js"
    integrity="sha512-Ot7ArUEhJDU0cwoBNNnWe487kjL5wAOsIYig8llY/l0P2TUFwgsAHVmrZMHsT8NGo+HwkjTJsNErS6QqIkBxDw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" defer="defer"></script>
  <script src="{{ asset('vendor/easytimepicker/timepicker-bs4.js') }}"></script>

  <script>
    @if (Session::has('message'))
      toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "100",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
      toastr.success("{{ session('message') }}");
    @endif
  </script>
  @livewireScripts
  @stack('scripts')
</body>

</html>
