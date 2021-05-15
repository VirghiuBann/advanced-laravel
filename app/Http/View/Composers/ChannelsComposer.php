<?php

namespace App\Http\View\Composers;

use App\Models\Channel;
use Illuminate\View\View;

class ChannelsComposer
{

    public function compose(View $view)
    {
        $view->with('channels', Channel::OrderBy('name')->get());
    }
}
