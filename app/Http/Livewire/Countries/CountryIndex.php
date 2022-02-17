<?php

namespace App\Http\Livewire\Countries;

use Livewire\Component;
use App\Models\Country; 
use Livewire\WithPagination;

class CountryIndex extends Component
{
    use WithPagination;

    public $showFormModal = false ;
    public $editModeModal = false ; 
    public $search ; 
    public $name ;
    public $country_code ; 
    public $countryId ; 

    public $rules = [
        'country_code' => ['required' , 'max:3'] , 
        'name' => ['required' , 'string'] 
    ];

    public function toggleModal(){
        $this->showFormModal = true ; 
    }

    
    public function storeCountry(){
        $this->validate();
        Country::create([
            'name' => $this->name , 
            'country_code'  => $this->country_code 
        ]);

        $this->reset();
        session()->flash('flash.banner' , 'success');
    }
    
    public function showEditForm($id){
        $this->reset();
        $this->showFormModal = true ; 
        $this->editModeModal = true ;
        $this->countryId = $id ;
        $this->loadEditForm();
    }

    public function loadEditForm(){
        $country = Country::findOrfail($this->countryId);
        $this->name = $country->name ; 
        $this->country_code = $country->country_code ; 
    }
    
    public function updateCountry(){
        $this->validate();
        $country = Country::findOrfail($this->countryId);
        $country->update([
            'name' => $this->name , 
            'country_code' => $this->country_code 
        ]);

        $this->reset();
        session()->flash('flash.banner', 'success');
    }

    public function deleteUser($id){
        $country = Country::findOrfail($id);
        $country->delete();
    }   

    public function render()
    {
        $countries = Country::paginate(5);
        return view('livewire.countries.country-index' , [
            'countries' => $countries 
        ])->layout('layouts.app');
    }
}
