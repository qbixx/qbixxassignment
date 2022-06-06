<?php

declare(strict_types=1);

namespace Interfaces\Front\Landing;

use Illuminate\View\View;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function __invoke($locale): View
    {
        return view('pages.front.welcome', ['locale' => $locale]);
    }
}
