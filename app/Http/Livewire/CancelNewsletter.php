<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CancelNewsletter extends Component
{
    public $batch_id = null;
    public $disabled = false;

    public function cancelNewsletter()
    {
        if ($this->batch_id) {
            $batch = $this->getBatch($this->batch_id);
            $batch->cancel();
        }
    }

    public function render()
    {
        if ($this->batch_id) {
            $batch = $this->getBatch($this->batch_id);

            $this->disabled = $batch->finished();
        }

        return view('livewire.cancel-newsletter');
    }

    private function getBatch($batch_id)
    {
        $pendingPatch = DB::table('job_batches')->where('id', '=', $batch_id)->first();
        $batch = Bus::findBatch($pendingPatch->id);

        return $batch;
    }
}
