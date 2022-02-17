<?php

namespace App\Http\Livewire\Employees;

use Livewire\Component;
use App\Models\Employee; 
use Livewire\WithPagination;

class EmployeeIndex extends Component
{
    use WithPagination ;
    public $showFormModal = false ;
    public $editModeModal = false ; 
    public $search ; 
    public $name ; 
    public $employee_id ; 

    public $rules = [
        'name' => ['required' , 'string']
    ];

    public function toggleModal(){
        $this->showFormModal = true ; 
    }

    public function storeEmployee(){
        $this->validate();
        Employee::create([
            'name' => $this->name 
        ]);

        $this->reset();
        session()->flash('flash.banner' , 'اضافه شد');
    }

    public function updateEmployee($id){
        $this->reset();
        
    }

    public function render()
    {
        $employees = Employee::paginate(5);
        return view('livewire.employees.employee-index' , [
            'employees' => $employees 
        ]);
    }
}
