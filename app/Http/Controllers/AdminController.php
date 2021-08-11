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

        $progress = null;
        $pendingPatch = DB::table('job_batches')->where('finished_at', '=', null)->first();
        if ($pendingPatch) {
            $batch = Bus::findBatch($pendingPatch->id);
            $progress = $batch->progress();
        }

        return view('admin.index', compact(
            'numberOfProjects',
            'numberOfSubscribers',
            'numberOfNewsletters',
            'progress'
        ));
    }

    public function getPendingBatch ()
    {
        $batch = DB::table('job_batches')->where('pending_jobs', '>', 0)->first();
        if ($batch) {
            $progress = $batch->progress();
        }
    }
}
