<?php

namespace App\Widgets;

use App\Models\Booking;
use App\Models\Hall;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class HallWidget extends AbstractWidget
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
        $count  = Hall::count();
        $string = 'Halls';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-shop',
            'title' => "{$count} {$string}",
            'text' => "You have {$count} {$string} in your database. Click on button below to view all {$string}.",
            'button' => [
                'text' => "View all {$string}",
                'link' => route('voyager.rooms.index'),
            ],
            'image' => asset('booking/img/bg.jpg'),
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
