<!-- Modal -->
<div wire:ignore.self class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="saveStudent">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Student Name</label>
                        <input wire:model="name" type="text" class="form-control">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Student Email</label>
                        <input wire:model="email" type="text" class="form-control">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Student Course</label>
                        <input wire:model="course" type="text" class="form-control">
                        @error('course')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" wire:click="closeModal"
                            data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary" id="saveChangesBtn">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Update Student Modal --}}
<div wire:ignore.self class="modal fade" id="UpdateStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="updateStudent">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Student Name</label>
                        <input wire:model="name" type="text" class="form-control">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Student Email</label>
                        <input wire:model="email" type="text" class="form-control">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Student Course</label>
                        <input wire:model="course" type="text" class="form-control">
                        @error('course')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" wire:click="closeModal"
                            data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary" id="saveChangesBtn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Delete Student Modal --}}
<div wire:ignore.self class="modal fade" id="DeleteStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Student</h5>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="destroyStudent">
                    <h4>Are you sure want to delete this data?</h4>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" wire:click="closeModal"
                            data-bs-dismiss="modal">
                            No
                        </button>
                        <button type="submit" class="btn btn-primary" id="delete">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
