<?php

namespace App\Http\Livewire\States;

use Livewire\Component;
use App\Models\Country; 
use App\Models\State; 
use Livewire\WithPagination;
class StateIndex extends Component
{
    
    use WithPagination;

    public $showFormModal = false ;
    public $editModeModal = false ; 
    public $search ; 
    public $name ;
    public $country_id; 
    public $state_id ; 

    public $rules = [
        'country_id' => ['required'] , 
        'name' => ['required' , 'string'] 
    ];
    public function toggleModal(){
        $this->reset();
        $this->showFormModal = true ; 
    }

    
    public function storeState(){
        $this->validate();
        State::create([
            'name' => $this->name , 
            'country_id'  => $this->country_id 
        ]);

        $this->reset();
        session()->flash('flash.banner' , 'success');
    }
    
    public function showEditForm($id){
        $this->reset();
        $this->showFormModal = true ; 
        $this->editModeModal = true; 
        $this->state_id = $id ; 
        $this->loadEditForm();
    }

    public function loadEditForm(){
        $state = State::findOrfail($this->state_id);
        $this->name = $state->name ;
        $this->country_id = $state->country->id ;
    }
    
    public function updateState(){
        $this->validate();
        $state = State::findOrfail($this->state_id);
        $state->update([
            'name' => $this->name , 
            'country_id' => $this->country_id
        ]);
        $this->reset();
        session()->flash('flash.banner' , 'ویرایش شد');
    }

    public function deleteState($id){
        $state = State::findOrfail($id);
        $state->delete();
        session()->flash('flash.banner' , 'حذف شد');
    }   

    public function render()
    {
        $states = State::paginate(5);
        $countries = Country::all();
        return view('livewire.states.state-index' ,   [
            'states' => $states ,
            'countries' => $countries 
        ])->layout('layouts.app');
    }
}
