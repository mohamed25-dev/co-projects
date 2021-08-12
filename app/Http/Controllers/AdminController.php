<?php

namespace App\Http\Controllers;

use App\Models\NewsLetter;
use App\Models\Customer;
use App\Models\Project;
class AdminController extends Controller
{
    public function index ()
    {
        $numberOfProjects = Project::count();
        $numberOfSubscribers = Customer::count();
        $numberOfNewsletters = NewsLetter::count();

        return view('admin.index', compact(
            'numberOfProjects',
            'numberOfSubscribers',
            'numberOfNewsletters',
        ));
    }

}
