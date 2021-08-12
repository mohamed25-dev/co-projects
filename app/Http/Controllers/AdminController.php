<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use App\Models\Customer;
use App\Models\Project;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index ()
    {
        $numberOfProjects = Project::count();
        $numberOfSubscribers = Customer::count();
        $numberOfNewsletters = Newsletter::count();

        return view('admin.index', compact(
            'numberOfProjects',
            'numberOfSubscribers',
            'numberOfNewsletters',
        ));
    }

}
