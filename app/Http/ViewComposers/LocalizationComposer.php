<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use LaravelLocalization;

class LocalizationComposer {

    public function compose(View $view)
    {
        $view->with('currentLocale', LaravelLocalization::getCurrentLocale());
    }

}