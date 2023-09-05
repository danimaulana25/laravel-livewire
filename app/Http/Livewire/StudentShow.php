<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;

class StudentShow extends Component
{
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
        return view('livewire.student-show');
    }
}
