<?php


namespace App\Http\Livewire;

use DateTime;
use App\Models\Hall;
use Livewire\Request;
use App\Models\Doctor;
use App\Models\Booking;
use App\Models\Student;
use Livewire\Component;
use TCG\Voyager\Models\Page;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class BookingSection extends Component
{
    public $title;
    public $name;
    public $phone;
    public $age;
    public $sex;
    public $date;
    public $time;
    public $doctors;
    public $doctors_name;
    public $hall_id;
    public $hall_name;
    public $students;
    public $doctor_id;
    public $student_id;
    public $bookingData;
    public $description;
    public $state = [];
    public $page;
    public $user;

    public $dateBooked;

    public function mount()
    {
        $this->user = Auth::user();
        if ($this->user->role->name == 'user') {
            $this->name = $this->user['name'];
            $this->age = $this->getAge($this->user['dateofbirth']);
            $this->sex = $this->user['gender'];
            $this->phone = $this->user['phone'];
        }
        // dd($this->user);
        $this->page = Page::where('slug', 'appointment-page')->first();
        $this->students = Student::get();
        $this->halls = Hall::get();
        $this->doctors = Doctor::get();
    }

    public function checkData()
    {
        if ($this->user->role->name == 'registrar') {
            $this->validate([
                'student_id' => 'required',
                'doctor_id' => 'required',
                'hall_id' => 'required',
                'date' => 'required',
                'time' => 'required',
            ]);
            $this->state = [
                'name' => $this->name,
                'phone' => $this->phone,
                'student_id' => $this->student_id,
                'age' => $this->age,
                'sex' => $this->sex,
                'doctors_name' => $this->doctors_name,
                'doctor_id' => $this->doctor_id,
                'hall_id' => $this->hall_id,
                'hall_name' => $this->hall_name,
                'date' => date('d-m-Y', strtotime($this->date)),
                'time' => date('h:i A', strtotime($this->time)),
            ];
        } elseif ($this->user->role->name == 'user') {
            $this->validate([
                // 'student_id' => 'required',
                'doctor_id' => 'required',
                'hall_id' => 'required',
                'date' => 'required',
                'time' => 'required',
            ]);
            $this->state = [
                'name' => $this->name,
                'phone' => $this->phone,
                // 'student_id' => $this->student_id,
                'age' => $this->age,
                'sex' => $this->sex,
                'doctors_name' => $this->doctors_name,
                'doctor_id' => $this->doctor_id,
                'hall_id' => $this->hall_id,
                'hall_name' => $this->hall_name,
                'date' => date('d-m-Y', strtotime($this->date)),
                'time' => date('h:i A', strtotime($this->time)),
            ];
        }

        return Redirect::route('checkappointment')->with(['data' => $this->state]);
    }

    public function selectStudent($value)
    {

        if (!empty($value)) {
            $student = Student::where('id', $value)->first();

            $this->sex = $student['sex'];
            $this->name = $student['name'];
            $this->phone = $student['phone'];
            $this->age = $this->getAge($student['dateofbirth']);

            $this->state['name'] = $student['name'];
        } else {
            $this->sex = '';
            $this->name = '';
            $this->phone = '';
            $this->age = '';
            $this->state['name'] = '';
        }
    }

    public function selectDoctor($value)
    {

        if (!empty($value)) {
            $doctor = Doctor::where('id', $value)->first();

            $this->dateBooked = Booking::where('doctor_id', $value)->pluck('date')->toArray();

            $this->emit('getDates', $this->dateBooked);

            $this->doctors_name = $doctor['name'];
        } else {
            $this->doctors_name = '';
        }
    }

    public function selectHall($value)
    {

        if (!empty($value)) {
            $hall = Hall::where('id', $value)->first();
            $this->hall_name = $hall['name'];
        } else {
            $this->hall_name = '';
        }
    }

    public function getAge($date)
    {
        $dob = new DateTime($date);
        $now = new DateTime();
        $difference = $now->diff($dob);
        $age = $difference->y;
        return  $age;
    }

    public function render()
    {
        return view('livewire.booking-section', [
            'title' => $this->title,
            'doctorList' => $this->doctors,
            'studentList' => $this->students,
            'description' => $this->description,
            'data' => $this->bookingData
        ])->layout('layouts.booking');
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
