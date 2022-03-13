<?php

namespace Interfaces\Admin\Clients\Controllers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class CreateClient extends Controller
{

  public function __invoke(): Response
  {
    return Inertia::render('Admin/Clients/Create', []);
  }

}