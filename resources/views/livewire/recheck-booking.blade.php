<div>
    <div id="booking">
        <div class="container">
            <div class="row">
                <div class="col-md-5 my-auto">
                    <div class="booking-cta">
                        <h1 class="text-light">{{ $page['excerpt'] }}</h1>
                        <div class="text-danger">
                            {!! $page['body'] !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-1">
                    <div class="booking-form">
                        <form class="check-data-form" action="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-user" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            <input type="text" wire:model="name" class="form-control check-input"
                                                readonly>
                                            <input type="hidden" wire:model="student_id">
                                            <input type="hidden" wire:model="doctor_id">
                                            <input type="hidden" wire:model="hall_id">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-mobile-alt" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control check-input" wire:model="phone"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-child" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control check-input" wire:model="age"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-venus-mars" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control check-input" wire:model="sex"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-user-md" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            <input type="text" wire:model="doctors_name"
                                                class="form-control check-input" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-map-marker-alt" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            <input type="text" wire:model="hall_name"
                                                class="form-control check-input" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            <input type="text" wire:model="date"
                                                class="form-control check-input text-center" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-clock"></i>
                                                </span>
                                            </div>
                                            <input type="text" wire:model="time" class="form-control check-input"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-btn">
                                        <button class="btn btn-lg btn-secondary btn-block text-danger"
                                            wire:click.prevent="goBack">
                                            <i class="fa fa-external-link rotateContent" aria-hidden="true"></i>
                                            Go back
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-btn">
                                        <button class="btn btn-lg btn-danger btn-block"
                                            wire:click.prevent="paymentMethod">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@push('styles')
    <style>
        #booking {
            position: relative;
            background-image: url("{{ asset('booking/img/background.jpg') }}");
        }
    </style>
@endpush
