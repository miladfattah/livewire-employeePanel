<?php

namespace App\Http\Livewire\Jobs;

use Livewire\Component;
use App\Models\Job; 
use Livewire\WithPagination;
class JobIndex extends Component
{
    use WithPagination ;
    public function render()
    {
        return view('livewire.jobs.job-index');
    }
}
