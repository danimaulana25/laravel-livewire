<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class StudentShow extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $email, $course;

    protected function rules()
    {
        return [
            'name' => 'required|string|min:6',
            'email' => ['required', 'email'],
            'course' => 'required|string',
        ];
    }
    public function updated($field)
    {
        $this->validateOnly($field);
    }
    public function saveStudent()
    {
        $validatedData = $this->validate();
        Student::create($validatedData);
        session()->flash('message', 'Student Created Successfully.');
        $this->resetInputFields();
        $this->dispatchBrowserEvent('close-modal');
    }
    public function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->course = '';
    }
    public function render()
    {
        $students = Student::orderBy('id', 'DESC')->paginate(5);
        return view('livewire.student-show', ['students' => $students]);
    }
}
