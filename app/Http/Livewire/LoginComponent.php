<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class LoginComponent extends Component
{

    public $username;
    public $password;
    public $user;


    public function render()
    {
        return view('livewire.login-component');
    }


    public function loginUser()
    {

        $user['password'] = $this->password;

        // $this->validate($user, [
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);


        if (is_numeric($this->username)) {

            $user['phone'] = $this->username;
            $user['logintype'] = 'phone';

            $this->tryLogin($user);

        } elseif (filter_var($this->username, FILTER_VALIDATE_EMAIL)) {
            $user['email'] = $this->username;
            $user['logintype'] = 'email';

            $this->tryLogin($user);
        } else {
            $user['username'] = $this->username;
            $user['logintype'] = 'username';

            $this->tryLogin($user);
        }
    }

    public function tryLogin($user)
    {
        $usernameValidation = 'required';
        $emailValidation = 'required|email';
        $phoneValidation = 'required|phone';

        $type = $user['logintype'];

        if (auth()->attempt([
            $type => $user["${type}"],
            'password' => $user['password'],
        ])) {
            return redirect()->route('bookingform');
        }
        
        session()->flash('errormessage', 'Your credentials are wrong. Please try again.');

        return redirect()->route('registrationroute');
    }

    public function sendAlert($type)
    {
        $this->dispatchBrowserEvent(
            'alert',
            [
                'type' => $type,
                'title' => 'Success!',
                'message' => "hello",
                'icon' => 'fa fa-check-double fa-lg',
            ]
        );
    }
}
