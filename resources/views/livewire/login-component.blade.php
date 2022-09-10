<div>
    <form class="form-inline form-outline my-2 my-md-0" autocomplete="off" wire:submit.prevent="loginUser">
        <input autocomplete="off" class="form-control btn-outline-warning m-1 bg-dark custom-input " type="text"
            placeholder="Phone or Email" wire:model="username" required autocomplete="false">
        @error('email')
            <span class="error text-danger">{{ $message }}</span>
        @enderror

        <input class="form-control btn-outline-warning m-1 bg-dark custom-input " type="password" placeholder="Password"
            wire:model="password" required autocomplete="false">
        @error('password')
            <span class="error text-danger">{{ $message }}</span>
        @enderror

        <button class="custom-input btn btn-outline-warning" type="submit">
            Login
            <i class="fa fa-sign-in" aria-hidden="true"></i>
        </button>
    </form>
</div>


@push('scripts')
    <script>
        @if (Session::has('errormessage'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-center",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "100",
                "hideDuration": "1000",
                "timeOut": "50000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.error("{{ session('errormessage') }}");
        @endif
    </script>
@endpush
