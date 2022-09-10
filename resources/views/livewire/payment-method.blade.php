<div>
    <div id="booking" class="section">
        <div class="section-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 my-auto">
                        <div class="booking-cta d-flex align-items-center mt-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="text-light">{{ $page['excerpt'] }}</h1>
                                    <div class="text-danger">
                                        {!! $page['body'] !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-md-offset-1">
                        <div class="booking-form">
                            <form>
                                <div class="row">
                                    <div class="container">
                                        <h4 class="text-danger">Payment method:<span class="text-light">
                                                {{ $paymethod }}</span></h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col text-center'>
                                        <input type="radio" name="pay-method" wire:model="paymethod" id="rdoimg_bdt"
                                            class="d-none imgbgchk" value="cash">
                                        <label for="rdoimg_bdt">
                                            <img src="{{ asset('booking/img/bd_taka.jpg') }}" alt="Image 1">
                                            <div class="tick_container">
                                                <div class="tick"><i class="fa fa-check fa-2x"></i></div>
                                            </div>
                                        </label>
                                    </div>
                                    <div class='col text-center'>
                                        <input type="radio" name="pay-method" wire:model="paymethod" id="rdoimg_mb"
                                            class="d-none imgbgchk" value="mobilebanking">
                                        <label for="rdoimg_mb">
                                            <img src="{{ asset('booking/img/mb.jpg') }}" alt="Image 2">
                                            <div class="tick_container">
                                                <div class="tick"><i class="fa fa-check fa-2x"></i></div>
                                            </div>
                                        </label>
                                    </div>
                                    <div class='col text-center'>
                                        <input type="radio" name="pay-method" wire:model="paymethod" id="rdoimg_card"
                                            class="d-none imgbgchk" value="card">
                                        <label for="rdoimg_card">
                                            <img src="{{ asset('booking/img/cards.jpg') }}" alt="Image 3">
                                            <div class="tick_container">
                                                <div class="tick"><i class="fa fa-check fa-2x"></i></div>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="container">

                                        <button class="submit-btn" wire:click.prevent="saveData">
                                            Book Now
                                        </button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
