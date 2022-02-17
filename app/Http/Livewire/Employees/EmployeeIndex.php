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
    public $last_name ; 
    public $first_name ; 
    public $middle_name ; 
    public $address ; 
    public $country_id ; 
    public $state_id ; 
    public $city_id ; 
    public $department_id ; 
    public $zip_code ; 
    public $birthdate ; 
    public $date_hired ; 
    public $employee_id ; 

    public $rules = [
        'last_name' => ['required' , 'string'] ,
        'first_name' => ['required' , 'string'] ,
        'middle_name' => ['required' , 'string'] ,
        'address' => ['required' , 'string'] ,
        'country_id' => ['required'] ,
        'state_id' => ['required'] ,
        'city_id' => ['required'] ,
        'department_id' => ['required'] ,
        'zip_code' => ['required'] ,
        'birthdate' => ['required' ] ,
        'date_hired' => ['required' ] ,

    ];

    public function toggleModal(){
        $this->reset();
        $this->showFormModal = true ; 
    }

    public function storeEmployee(){
        $this->validate();
        Employee::create([
            'last_name' => $this->last_name , 
            'first_name' => $this->first_name , 
            'middle_name' => $this->middle_name , 
            'address' => $this->address , 
            'country_id' => $this->country_id , 
            'state_id' => $this->state_id , 
            'city_id' => $this->city_id , 
            'department_id' => $this->department_id , 
            'zip_code' => $this->zip_code , 
            'birthdate' => $this->birthdate , 
            'date_hired' => $this->date_hired , 
        ]);

        $this->reset();
        session()->flash('flash.banner' , 'اضافه شد');
    }

    public function showEditForm($id){
        $this->reset();
        $this->showFormModal = true ; 
        $this->editModeModal = true ; 
        $this->employee_id = $id ; 
        $this->loadEditForm();
    }

    public function loadEditForm(){
        $employee = Employee::findOrfail($this->employee_id);
        $this->last_name = $employee->last_name ; 
        $this->first_name = $employee->first_name ; 
        $this->middle_name = $employee->middle_name ; 
        $this->address = $employee->address ; 
        $this->country_id = $employee->country_id ; 
        $this->state_id = $employee->state_id ; 
        $this->city_id = $employee->city_id ; 
        $this->department_id = $employee->department_id ; 
        $this->zip_code = $employee->zip_code ; 
        $this->birthdate = $employee->birthdate ; 
        $this->date_hired = $employee->date_hired ; 
    }

    public function updateEmployee(){
        $employee = Employee::findOrfail($this->employee_id);
        $this->validate();
        $employee->update([
            'last_name' => $this->last_name , 
            'first_name' => $this->first_name , 
            'middle_name' => $this->middle_name , 
            'address' => $this->address , 
            'country_id' => $this->country_id , 
            'state_id' => $this->state_id , 
            'city_id' => $this->city_id , 
            'department_id' => $this->department_id , 
            'zip_code' => $this->zip_code , 
            'birthdate' => $this->birthdate , 
            'date_hired' => $this->date_hired , 
        ]);

        $this->reset();
        session()->flash('flash.banner' , 'ویرایش شد');
    }

    public function deleteEmployee($id){
        $employee = Employee::findOrfail($id);
        $employee->delete();
        session()->flash('flash.banner' , 'حذف شد');
    }

    public function render()
    {
        $employees = Employee::paginate(5);
        return view('livewire.employees.employee-index' , [
            'employees' => $employees 
        ]);
    }
}
