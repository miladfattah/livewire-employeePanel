<?php

namespace App\Http\Livewire\Jobs;

use Livewire\Component;
use App\Models\Job; 
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class JobIndex extends Component
{
    use WithPagination ;
    use WithFileUploads ;
    public $showFormModal = false ;
    public $editModeModal = false ; 
    public $search ; 
    public $company ; 
    public $title ; 
    public $address ; 
    public $description ; 
    public $country_id ; 
    public $state_id ; 
    public $city_id ; 
    public $department_id ; 
    public $earn ; 
    public $education ; 
    public $soldiership ; 
    public $job_id ; 
    public $image ; 

    public $rules = [
        'company' => ['required' , 'string'] ,
        'title' => ['required' , 'string'] ,
        'address' => ['required' , 'string'] ,
        'description' => ['required' , 'string'] ,
        'country_id' => ['required'] ,
        'state_id' => ['required'] ,
        'city_id' => ['required'] ,
        'department_id' => ['required'] ,
        'earn' => ['required'] ,
        'education' => ['required' ] ,
        'soldiership' => ['required' ] ,
        'image' => 'image|max:4024'
    ];

    public function toggleModal(){
        $this->reset();
        $this->showFormModal = true ; 
    }

    public function storeJob(){
        $this->validate();
        $image = $this->image->store('jobs');
        Job::create([
            'user_id' => auth()->user()->id ,
            'company' => $this->company , 
            'title' => $this->title , 
            'address' => $this->address , 
            'description' => $this->description , 
            'country_id' => $this->country_id , 
            'state_id' => $this->state_id , 
            'city_id' => $this->city_id , 
            'department_id' => $this->department_id , 
            'earn' => $this->earn , 
            'education' => $this->education , 
            'soldiership' => $this->soldiership , 
            'image' => $image 
        ]);

        $this->reset();
        session()->flash('flash.banner' , 'اضافه شد');
    }

    public function showEditForm($id){
        $this->reset();
        $this->showFormModal = true ; 
        $this->editModeModal = true ; 
        $this->job_id = $id ; 
        $this->loadEditForm();
    }

    public function loadEditForm(){
        $job = Job::findOrfail($this->job_id);
        $this->company = $job->company ; 
        $this->title = $job->title ; 
        $this->address = $job->address ; 
        $this->description = $job->description ; 
        $this->country_id = $job->country_id ; 
        $this->state_id = $job->state_id ; 
        $this->city_id = $job->city_id ; 
        $this->department_id = $job->department_id ; 
        $this->earn = $job->earn ; 
        $this->education = $job->education ; 
        $this->soldiership = $job->soldiership ; 
    }

    public function updateJob(){
        $job = Job::findOrfail($this->job_id);
        $this->validate([
            'company' => ['required' , 'string'] ,
            'title' => ['required' , 'string'] ,
            'address' => ['required' , 'string'] ,
            'description' => ['required' , 'string'] ,
            'country_id' => ['required'] ,
            'state_id' => ['required'] ,
            'city_id' => ['required'] ,
            'department_id' => ['required'] ,
            'earn' => ['required'] ,
            'education' => ['required' ] ,
            'soldiership' => ['required' ] ,
        ]);
        $job->update([
            'company' => $this->company , 
            'title' => $this->title , 
            'address' => $this->address , 
            'description' => $this->description , 
            'country_id' => $this->country_id , 
            'state_id' => $this->state_id , 
            'city_id' => $this->city_id , 
            'department_id' => $this->department_id , 
            'earn' => $this->earn , 
            'education' => $this->education , 
            'soldiership' => $this->soldiership , 
        ]);

        $this->reset();
        session()->flash('flash.banner' , 'ویرایش شد');
    }

    public function deleteJob($id){
        $job = Job::findOrfail($id);
        $job->delete();
        session()->flash('flash.banner' , 'حذف شد');
    }
    public function render()
    {
        $jobs = Job::paginate(5);
        return view('livewire.jobs.job-index' , [
            'jobs' => $jobs 
        ])
        ->layout('layouts.app');
    }
}
