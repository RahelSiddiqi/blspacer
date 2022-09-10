<?php

namespace App\Http\Livewire;

// use App\Models\User;
use Livewire\Component;
// use TCG\Voyager\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as user;


class HomePage extends Component
{
    public $title;
    public $description;

    public function mount(){
        $this->title = "Home page";
        $this->description = "Description";
    }
    
    public function logout()
    {
        auth()->logout();
        return redirect(route('Voyager.login'));
    }

    
    public function render()
    {
        return view('livewire.home-page', [

        ])->layout('layouts.booking');
    }
}
