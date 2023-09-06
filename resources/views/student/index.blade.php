@extends('layouts.app')

@section('content')
    <div>
        <livewire:student-show>
    </div>
@endsection

@section('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#studentModal').modal('hide');
            $('#UpdateStudentModal').modal('hide');
            $('#DeleteStudentModal').modal('hide');
        })
    </script>
@endsection
