<?php

declare(strict_types=1);

namespace Interfaces\Front\Landing\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    public function __invoke(): View
    {
        return view('pages.front.welcome');
    }
}
