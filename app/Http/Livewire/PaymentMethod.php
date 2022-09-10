<?php

namespace App\Http\Livewire;

use App\Models\Booking;
use Livewire\Component;
use TCG\Voyager\Models\Page;
use Illuminate\Support\Facades\Session;

class PaymentMethod extends Component
{
    public $data;
    public $paymethod;
    public $page;

    public function mount()
    {
        $this->page = Page::where('slug', 'appointment-page')->first();
        $this->data = Session::get('data');
        if (empty($this->data)) {
            abort(403);
        }
    }

    public function saveData()
    {
        $booking = new Booking();
        $booking->patient_name = $this->data['name'];
        $booking->phone = $this->data['phone'];
        $booking->doctor_id = $this->data['doctor_id'];
        $booking->hall_id = $this->data['hall_id'];
        $booking->date = $this->data['date'];   
        $booking->time = $this->data['time'];
        $booking->paymethod = $this->paymethod;


        $booking->save();
        session()->flash('message', 'Your seat has been reserved.');
        unset($booking);
        $this->redirect(route('bookingform'));

    }

    public function render()
    {
        return view('livewire.payment-method')->layout('layouts.booking');
    }
}
