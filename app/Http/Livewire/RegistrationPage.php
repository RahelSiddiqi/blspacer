<?php

namespace App\Http\Livewire;

use App\Models\Hall;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Booking;
use App\Models\Student;
use Livewire\Component;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrationPage extends Component
{
    public $title;
    public $description;

    public $name;
    public $father;
    public $mother;
    public $username;
    public $phone;
    public $email;
    public $class;
    public $dateofbirth;
    public $gender;
    public $password;
    public $password_confirmation;

    public $bookings;


    public $page;

    public function mount()
    {   
        if(Auth::user()){
            $phone = Auth::user()->phone;
            $this->bookings = Booking::where('phone', $phone)->take(10)->get();

            // dd($this->bookings->doctors[0]->name);
        }
        $this->tile = "hello";
        $this->description = "description";
        $this->page = Page::where('slug', 'registration-page')->first();
    }

    public function registerUser()
    {

        $this->validate([
            'name' => 'required|min:3|max:20',
            'gender' => 'required',
            'father' => 'required|min:3|max:20',
            'mother' => 'required|min:3|max:20',
            'phone' => 'required|regex:/(01)[0-9]{9}$/|unique:users',
            'dateofbirth' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|alpha_num|min:6|confirmed',
        ]);

        $user = new User();

        $user['name'] = $this->name;
        $user['gender'] = $this->gender;
        $user['father'] = $this->father;
        $user['mother'] = $this->mother;
        $user['phone'] = $this->phone;
        $user['dateofbirth'] = $this->dateofbirth;
        $user['email'] = $this->email;
        $user['password'] = Hash::make($this->password);

        $login = [
            'phone' => $this->phone,
            'password' => $this->password
        ];
      
        $user = $user->save();

        // if($user){
        //     if(auth()->attempt($login)){
        //         session()->flash('message', 'Registration successfull. Please login with your credentials.');
        //         return redirect()->route('registrationroute');
        //     }
        // }
        session()->flash('message', 'Registration successfull. Please login with your credentials.');
        return redirect()->route('registrationroute');

    }

    public function render()
    {
        return view('livewire.registration-page', [
            '' => '',
        ])->layout('layouts.booking');
    }
}
