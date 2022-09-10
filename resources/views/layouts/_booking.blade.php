
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLSpacer Booking</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('booking/assets/css/style.css')}}">

    @livewireStyles
</head>

<body>
    <div class="login-dark-1">
        @livewire('home-page')
    </div>
    <footer class="footer-07">
        <div class="container">
                <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <h3 class="footer-heading text-info">
                        BLSpacer Booking
                    </h3>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-md-12 text-center">
                    <p class="copyright text-light">
                        Copyright ©<script>document.write(new Date().getFullYear());</script> All rights reserved <a class="text-info" href="https://blspacer.com" target="_blank">blspacer.com</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('booking/assets/js/calendar.js')}}"></script>
    <script src="{{asset('booking/assets/js/clock.js')}}"></script>
    @livewireScripts
</body>
</html>