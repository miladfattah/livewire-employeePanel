<?php

namespace App\Http\Livewire\Cities;

use Livewire\Component;
use App\Models\City; 
use App\Models\State; 
use Livewire\WithPagination;

class CityIndex extends Component
{
    use WithPagination;

    public $showFormModal = false ;
    public $editModeModal = false ; 
    public $search ; 
    public $name ; 
    public $state_id ; 
    public $city_id ; 

    public $rules = [
        'name' => ['required' , 'string'] , 
        'state_id' => ['required']
    ];

    public function toggleModal(){
        $this->reset();
        $this->showFormModal = true ; 
    }

    public function storeCity(){
        $this->validate();
        City::create([
            'name' => $this->name , 
            'state_id' => $this->state_id 
        ]);

        $this->reset();

        session()->flash('flash.banner' , 'اضافه شد');
    }

    public function showEditForm($id){
        $this->reset();
        $this->showFormModal = true ;
        $this->editModeModal = true ; 
        $this->city_id = $id ; 
        $this->loadEditForm();
    }

    public function loadEditForm(){
        $city = City::findOrfail($this->city_id);
        $this->name = $city->name ; 
        $this->state_id = $city->state->id ; 
    }

    public function updateCity(){
        $this->validate();
        $city = City::findOrfail($this->city_id);
        $city->update([
            'name' => $this->name , 
            'state_id' => $this->state_id
        ]);
        $this->reset();
        session()->flash('flash.banner' , 'ویرایش شد');
    }

    public function deleteCity($id){
        $city = City::findOrfail($id);
        $city->delete();
        session()->flash('flash.banner' , 'حذف شد');
    }

    public function render()
    {
        $cities = City::paginate(5);
        $states = State::all();
        return view('livewire.cities.city-index' , [
            'cities' => $cities , 
            'states' => $states
        ])
        ->layout('layouts.app');
    }
}
