<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class StudentShow extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $email, $course, $studentId;

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

    public function editStudent(int $studentId)
    {
        $student = Student::findOrFail($studentId);
        if ($student) {
            $this->studentId = $student->id;
            $this->name = $student->name;
            $this->email = $student->email;
            $this->course = $student->course;
        } else {
            return redirect()->route('students');
        }
    }

    public function updateStudent()
    {
        $validatedData = $this->validate();
        $student = Student::where('id', $this->studentId)->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'course' => $validatedData['course'],
        ]);
        session()->flash('message', 'Student Updated Successfully.');
        $this->resetInputFields();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function closeModal()
    {
        $this->resetInputFields();
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
