<?php

namespace App\Http\Livewire;

use Livewire\Request;
use App\Models\Booking;
use Livewire\Component;
use TCG\Voyager\Models\Page;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class RecheckBooking extends Component
{
    public $data;
    public $name;
    public $doctor_id;
    public $hall_id;
    public $hall_name;
    public $age;
    public $sex;
    public $phone;
    public $date;
    public $time;
    public $page;

    public function mount()
    {
        $this->page = Page::where('slug', 'rechek-page')->first();
        $this->data = Session::get('data');

        if (empty($this->data)) {
            abort(403);
        }

        $this->name = $this->data['name'];
        $this->doctors_name = $this->data['doctors_name'];
        $this->doctor_id = $this->data['doctor_id'];
        $this->hall_id = $this->data['hall_id'];
        $this->hall_name = $this->data['hall_name'];
        $this->age = $this->data['age'].' Years';
        $this->phone = $this->data['phone'];
        $this->sex = $this->data['sex'];
        $this->date = $this->data['date'];
        $this->time = $this->data['time'];
    }

    public function paymentMethod()
    {
        return Redirect::route('paymethod')->with(['data' => $this->data]);
    }

    public function goBack()
    {
        return Redirect::route('bookingform')->with(['data' => $this->data]);
    }

    public function render()
    {
        return view('livewire.recheck-booking', [
            'data' => $this->data
        ])->layout('layouts.booking');
    }
}
