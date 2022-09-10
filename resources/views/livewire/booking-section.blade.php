<div>
    <div id="booking" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5 my-auto">
                    <div class="booking-cta d-flex align-items-center mt-5">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="text-light">{{ $page['excerpt'] }}</h1>
                            </div>

                            <div class="col-md-12">
                                <p class="text-danger">{!! $page['body'] !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-md-offset-1">
                    @if (Auth::user()->role->name == 'registrar')

                        <div class="booking-form">
                            <form wire:submit.prevent="checkData">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="form-label">Student</span>
                                            <select class="form-control" wire:model="student_id"
                                                wire:click="selectStudent($event.target.value)" required>
                                                <option value="">Select</option>
                                                @foreach ($students as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="select-arrow"></span>
                                            <input type="hidden" wire:model="name">
                                            <input type="hidden" wire:model="phone">
                                        </div>
                                        @error('name')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Age"
                                                wire:model="age">
                                            <span class="form-label">Age</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Sex"
                                                wire:model="sex">
                                            <span class="form-label">Sex</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="form-label">Doctor</span>
                                            <select class="form-control" wire:model="doctor_id"
                                                wire:click="selectDoctor($event.target.value)" required>
                                                <option value="">Select</option>
                                                @foreach ($doctorList as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="select-arrow"></span>
                                            <input type="hidden" wire:model="doctors_name">

                                        </div>
                                        @error('doctor')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="form-label">Hall</span>
                                            <select class="form-control" wire:model="hall_id"
                                                wire:click="selectHall($event.target.value)" required>
                                                <option value="">Select</option>
                                                @foreach ($halls as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="select-arrow"></span>
                                            <input type="hidden" wire:model="hall_name">
                                        </div>
                                        @error('hall')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control dateselector"
                                                placeholder="Select date" id="date" wire:model="date" required
                                                readonly>
                                            <span class="form-label">Date</span>
                                        </div>
                                        @error('date')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                    <div class="col-md-6" wire:ignore>
                                        <div class="form-group">
                                            <input type="text" placeholder="12:00" class="form-control timeselector"
                                                id="timeselector" wire:model="time" autocomplete="off">
                                            <span class="form-label">Time</span>
                                        </div>
                                        @error('time')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-btn">
                                    <button class="submit-btn">Book Now</button>
                                </div>
                            </form>
                        </div>
                    @endif

                    @if (Auth::user()->role->name == 'user')
                    <div class="booking-form">
                        <form wire:submit.prevent="checkData">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">Name</span>
                                        <input type="text" class="form-control" wire:model="name">
                                        <span class="select-arrow"></span>
                                        <input type="hidden" wire:model="phone">
                                    </div>
                                    @error('name')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Age"
                                            wire:model="age">
                                        <span class="form-label">Age</span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Sex"
                                            wire:model="sex">
                                        <span class="form-label">Sex</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">Doctor</span>
                                        <select class="form-control" wire:model="doctor_id"
                                            wire:click="selectDoctor($event.target.value)" required>
                                            <option value="">Select</option>
                                            @foreach ($doctorList as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="select-arrow"></span>
                                        <input type="hidden" wire:model="doctors_name">

                                    </div>
                                    @error('doctor')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">Hall</span>
                                        <select class="form-control" wire:model="hall_id"
                                            wire:click="selectHall($event.target.value)" required>
                                            <option value="">Select</option>
                                            @foreach ($halls as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="select-arrow"></span>
                                        <input type="hidden" wire:model="hall_name">
                                    </div>
                                    @error('hall')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control dateselector"
                                            placeholder="Select date" id="date" wire:model="date" required
                                            readonly>
                                        <span class="form-label">Date</span>
                                    </div>
                                    @error('date')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="col-md-6" wire:ignore>
                                    <div class="form-group">
                                        <input type="text" placeholder="12:00" class="form-control timeselector"
                                            id="timeselector" wire:model="time" autocomplete="off">
                                        <span class="form-label">Time</span>
                                    </div>
                                    @error('time')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-btn">
                                <button class="submit-btn">Book Now</button>
                            </div>
                        </form>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@push('styles')
    {{-- <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css"> --}}

    <style>
        #booking {
            position: relative;
        }

        .clockpicker-button {
            background-color: #cb3535;
            color: #fff;
        }
    </style>
@endpush
@push('scripts')
    <script>
        let dates_allready_booked;
        let today = new Date().toLocaleDateString()

        window.onload = function() {
            Livewire.on('getDates', (items) => {
                dates_allready_booked = items;

                function DisableDates(date) {
                    var string = jQuery.datepicker.formatDate('dd-mm-yy', date);
                    return [items.indexOf(string) == -1];
                }

                $("#date").datepicker({
                    minDate: today,
                    maxDate: "+3m",
                    beforeShowDay: DisableDates,
                    beforeShow: function(textbox, instance) {
                        var txtBoxOffset = $(this).offset();
                        var top = txtBoxOffset.top;
                        var left = txtBoxOffset.left;
                        var right = txtBoxOffset.right;
                        var textBoxWidth = $(this).outerWidth();
                        setTimeout(function() {
                            instance.dpDiv.css({
                                top: top - 220,
                                left: left
                            });
                        }, 0);
                    },
                    onSelect: function() {
                        var dateValue = $('.dateselector').val();
                        @this.set('date', dateValue);
                        console.log(dateValue);
                    },
                });
            });
        }
    </script>



    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            $('#timeselector').timepicker({
                minTime: '10:00am',
                maxTime: '6:00pm',
            });

            $('#timeselector').on('change', function() {
                let timevalue = $('#timeselector').val();
                @this.set('time', timevalue);
            })
        });
    </script>
@endpush
