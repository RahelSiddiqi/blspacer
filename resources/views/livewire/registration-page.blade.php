<div>
  <div id="booking" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-5 my-auto">
          <div class="booking-cta d-flex align-items-center mt-5">
            <div class="row">
              <div class="col-md-12">
                <h1 class="text-light">{{ $page['title'] }}</h1>
              </div>
              <div class="col-md-12">
                <p class="text-danger">{!! $page['body'] !!}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-7 col-md-offset-1">
          <div class="booking-form my-5" py-5>
            @guest
              <form wire:submit.prevent="registerUser">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <span class="form-label">Student name</span>
                      <input type="text" class="form-control" placeholder="Your name" wire:model="name">
                      <span class="select-arrow"></span>
                    </div>
                    @error('name')
                      <span class="error text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <select class="form-control" wire:model="gender" required>
                        <option>Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Others</option>
                      </select>
                      <span class="form-label">Gender</span>
                    </div>
                    @error('class')
                      <span class="error text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="date" class="form-control" wire:model="dateofbirth" min="{{ date('d-m-Y') }}"
                        required>
                      <span class="form-label">Date of Birth</span>
                    </div>
                    @error('dateofbirth')
                      <span class="error text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <span class="form-label">Father's Name</span>
                      <input type="text" class="form-control" placeholder="parent's name" wire:model="father">
                      <span class="select-arrow"></span>
                    </div>
                    @error('parent')
                      <span class="error text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <span class="form-label">Mother's Name</span>
                      <input type="text" class="form-control" placeholder="parent's name" wire:model="mother">
                      <span class="select-arrow"></span>
                    </div>
                    @error('parent')
                      <span class="error text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <span class="form-label">Phone number</span>
                      <input type="text" class="form-control" placeholder="Phone number" wire:model="phone">
                      <span class="select-arrow"></span>
                    </div>
                    @error('phone')
                      <span class="error text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <span class="form-label">Email</span>
                      <input type="email" class="form-control" placeholder="Email" wire:model="email">
                    </div>
                    @error('email')
                      <span class="error text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input class="form-control" name="password" type="password" placeholder="Password"
                        wire:model="password">
                      <span class="form-label">Password</span>
                    </div>
                    @error('password')
                      <span class="error text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <input class="form-control" name="password_confirmation" type="password"
                        placeholder="Confirm password" wire:model="password_confirmation">
                      <span class="form-label">Retype password</span>
                    </div>
                  </div>

                  <div class="col-md-12 recaptcha">
                    <div class="g-recaptcha" data-sitekey="your_site_key"></div>
                  </div>

                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-btn">
                      <button class="submit-btn">Register</button>
                    </div>
                  </div>
                </div>
              </form>
            @endguest

            @auth
              <h1 class="text-warning">You are logged in. Please book an <a
                  href="{{ route('bookingform') }}">Appointment.</a>
              </h1>
            @endauth
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
    }

    .clockpicker-button {
      background-color: #cb3535;
      color: #fff;
    }
  </style>
@endpush
@push('scripts')
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script type="text/javascript">
    $('.time').clockpicker({
      placement: 'top',
      align: 'left',
      donetext: 'Done',
      autoclose: false,
      afterDone: function() {
        var timeValue = $('.time').val();
        @this.set('time', timeValue);
        console.log(timeValue);
      },
    });
  </script>
@endpush
