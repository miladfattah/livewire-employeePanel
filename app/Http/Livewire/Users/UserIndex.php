<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User; 

class UserIndex extends Component
{
    public $showFormModal = false ;
    public $search ; 
    public $username ;
    public $firstName ; 
    public $lastName ; 
    public $email ; 
    public $password ; 
    public $rules = [
        'username' => ['required'] , 
        'firstName' => ['required'] , 
        'lastName' => ['required'] , 
        'email' => ['required' , 'unique:users'], 
        'password' => ['required'] , 
    ];

    public function storeUser(){
        $this->validate();
        User::create([
            'username' => $this->username , 
            'first_name' => $this->firstName , 
            'last_name' => $this->lastName , 
            'email' => $this->email , 
            'password' => Hash::make($this->password)
        ]);
        $this->toggleModal();
        $this->reset();
        session()->flash('flash.bannerStyle', 'success');
    }

    public function toggleModal (){
        $this->showFormModal = !$this->showFormModal ;
    }
    public function render()
    {
        return view('livewire.users.user-index')
                ->layout('layouts.app');
    }
}
