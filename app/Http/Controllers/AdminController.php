<?php

namespace App\Http\Controllers;

use App\Models\NewsLetter;
use App\Models\Customer;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index ()
    {
        $numberOfProjects = Project::count();
        $numberOfSubscribers = Customer::count();
        $numberOfNewsletters = NewsLetter::count();

        $newsletter = NewsLetter::latest()->first();

        return view('admin.index', compact(
            'numberOfProjects',
            'numberOfSubscribers',
            'numberOfNewsletters',
        ));
    }

}
