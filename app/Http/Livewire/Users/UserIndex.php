<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User; 
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;

    public $showFormModal = false ;
    public $editModeModal = false ; 
    public $search ; 
    public $username ;
    public $firstName ; 
    public $lastName ; 
    public $email ; 
    public $password ; 
    public $userId ; 

    public $rules = [
        'username' => ['required'] , 
        'firstName' => ['required'] , 
        'lastName' => ['required'] , 
        'email' => ['required' , 'unique:users'], 
        'password' => ['required'] , 
    ];

    public function toggleModal (){
        $this->reset();
        $this->showFormModal = true ;
    }
    
    public function storeUser(){
        $this->validate();
        User::create([
            'username' => $this->username , 
            'first_name' => $this->firstName , 
            'last_name' => $this->lastName , 
            'email' => $this->email , 
            'password' => Hash::make($this->password)
        ]);
        $this->reset();
        session()->flash('flash.banner', 'success');
    }

    public function showEditForm($id){
        $this->reset();
        $this->showFormModal = true ; 
        $this->editModeModal = true ;
        $this->userId = $id ;
        $this->loadEditForm();
    }

    public function loadEditForm(){
        $user = User::findOrFail($this->userId);
        $this->username = $user->username ;
        $this->firstName = $user->first_name ; 
        $this->lastName = $user->last_name ; 
        $this->email = $user->email; 
    }

    public function updateUser(){
        $this->validate([
            'username' => ['required'] , 
            'firstName' => ['required'] , 
            'lastName' => ['required'] , 
            'email' => ['required' ], 
        ]);
        User::findOrfail($this->userId)->update([
            'username' => $this->username , 
            'first_name' => $this->firstName , 
            'last_name' => $this->lastName , 
            'email' => $this->email 
        ]);
        $this->reset();
        session()->flash('flash.banner', 'success');

    }

    public function deleteUser($id){
        $user= User::find($id);
        if(auth()->user()->email == $user->email){
            session()->flash('flash.banner', 'success');
            $this->reset();
            return ;
        }

        $user->delete();
        session()->flash('flash.banner', 'deleted successfully');
        
    }

    public function render()
    {
        $users = User::paginate(5);
        return view('livewire.users.user-index'  , [
            'users' => $users
        ])->layout('layouts.app');
    }
}
