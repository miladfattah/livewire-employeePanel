<?php

namespace App\Http\Livewire\Departments;

use Livewire\Component;
use App\Models\Department; 
use Livewire\WithPagination;

class DepartmentIndex extends Component
{
    use WithPagination ;
    public $showFormModal = false ;
    public $editModeModal = false ; 
    public $search ; 
    public $name ; 
    public $department_id ; 

    public $rules = [
        'name' => ['required' , 'string']
    ];

    public function toggleModal(){
        $this->reset();
        $this->showFormModal = true ; 
    }

    public function storeDepartment(){
        $this->validate();
        Department::create([
            'name' => $this->name 
        ]);

        $this->reset();
        session()->flash('flash.banner' , 'اضافه شد');
    }

    public function showEditForm($id){
        $this->reset();
        $this->showFormModal = true ; 
        $this->editModeModal = true ; 
        $this->department_id = $id ; 
        $this->loadEditForm();
    }

    public function loadEditForm(){
        $department = Department::findOrfail($this->department_id);
        $this->name = $department->name ;
    }

    public function updateDepartment(){
        $this->validate();
        $department = Department::findOrfail($this->department_id);
        $department->update([
            'name' => $this->name 
        ]);

        $this->reset();

        session()->flash('flash.banner' , 'ویرایش شد');
    }

    public function deleteDepartment($id){
        $department = Department::findOrfail($id);
        $department->delete();
        session()->flash('flash.banner' , 'حذف شد');
    }

    public function render()
    {
        $departments = Department::paginate(5);
        return view('livewire.departments.department-index' , [
            'departments' => $departments 
        ]);
    }
}
