<?php

namespace App\Widgets;

use App\Models\Doctor;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Auth;

class DoctorsWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Doctor::count();
        $string = 'Doctors';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-group',
            'title'  => "{$count} {$string}",
            'text'   =>"You have {$count} {$string} in your database. Click on button below to view all {$string}.",
            'button' => [
                'text' => "View all {$string}",
                'link' => route('voyager.doctors.index'),
            ],
            // 'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
            'image' => asset('booking/img/doctors.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {

        return auth()->user()->hasRole('registrar');

    }
}
