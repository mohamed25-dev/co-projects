<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class BatchProgress extends Component
{
    public $progress = null;
    public $finished = false;
    public $failed = false;
    
    public function getProgress () 
    {
        $pendingPatch = DB::table('job_batches')->where('finished_at', '=', null)->first();
        if ($pendingPatch) {
            $batch = Bus::findBatch($pendingPatch->id);
            $this->progress = $batch->progress();
        } else {
            $this->progress = null;
        }
    }

    public function render()
    {
        return view('livewire.batch-progress');
    }
}
