<?php

namespace App\Http\Livewire;

use App\Jobs\SendNewsletter;
use App\Models\Customer;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ResendNewsletter extends Component
{
    public $batch_id = null;
    public $disabled = false;

    public function resendNewsletter()
    {
        $mailsPerJob = env('NUMBER_OF_MAILS_PER_JOB', 25);
        if ($this->batch_id) {

            DB::table('job_batches')->where('id', '=', $this->batch_id)->update(
                ['cancelled_at' => null, 'failed_jobs' => 0, 'failed_job_ids' => []]
            );

            $newsletter = Newsletter::where('batch_id', $this->batch_id)->first();

            $batch = $this->getBatch($this->batch_id);

            $customersCount = $newsletter->customers()->count();
            $customersCount = Customer::count() - $customersCount;

            $numberOfJobs = ceil($customersCount / $mailsPerJob);
            Log::debug($numberOfJobs);
            for ($index = 0; $index < $numberOfJobs; $index++) {
                $batch->add(new SendNewsletter($newsletter, $index));
            }
        }
    }

    public function render()
    {
        if ($this->batch_id) {
            $batch = $this->getBatch($this->batch_id);

            $this->disabled = $batch->cancelled();
        }

        return view('livewire.resend-newsletter');
    }

    private function getBatch($batch_id)
    {
        $pendingPatch = DB::table('job_batches')->where('id', '=', $batch_id)->first();
        $batch = Bus::findBatch($pendingPatch->id);

        return $batch;
    }
}
