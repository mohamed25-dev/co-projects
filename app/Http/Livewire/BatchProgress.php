<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class BatchProgress extends Component
{
    public $progress = null;
    public $batch_id = null;
    public $finished = false;
    public $failed = false;
    public $cancelled = false;

    public function getProgress()
    {
       $this->checkBatch();
    }

    public function render()
    {
        $this->checkBatch();
        return view('livewire.batch-progress');
    }

    private function checkBatch () {
        if ($this->batch_id) {
            $pendingPatch = DB::table('job_batches')->where('id', '=', $this->batch_id)->first();
            $batch = Bus::findBatch($pendingPatch->id);
            $this->cancelled = $batch->cancelled();
            $this->failed = $batch->failedJobs > 0 ? true : false;
            $this->progress = $batch->progress();
            $this->finished = $batch->finished();
        }
    }
}
