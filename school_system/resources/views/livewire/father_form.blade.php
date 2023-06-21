@if ($currentStep != 1)
    <div style="display: none" class="row setup-content" id="step-1">
@endif
<div class="col-xs-12">
    <div class="col-md-12">
        <br>
        <div class="form-row">
            <div class="col">
                <label for="title">Email</label>
                <input type="email" wire:model="email" class="form-control">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="title">Password</label>
                <input type="password" wire:model="password" class="form-control">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <label for="title">Name Father</label>
                <input type="text" wire:model="name_father" class="form-control">
                @error('name_father')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-3">
                <label for="title">Job Father</label>
                <input type="text" wire:model="job_father" class="form-control">
                @error('job_father')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="title">National Id Father</label>
                <input type="text" wire:model="national_id_father" class="form-control">
                @error('national_id_father')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="title">Passport_ID_Father</label>
                <input type="text" wire:model="passport_id_father" class="form-control">
                @error('passport_id_father')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col">
                <label for="title">Phone_Father</label>
                <input type="text" wire:model="phone_father" class="form-control">
                @error('phone_father')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">Nationality_Father_id</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="nationality_father_id">
                    <option selected>Choose...</option>
                    @foreach ($nationalities as $national)
                        <option value="{{ $national->id }}">{{ $national->name }}</option>
                    @endforeach
                </select>
                @error('nationality_father_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="inputState">Blood Type Father</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="blood_type_father_id">
                    <option selected>Choose...</option>
                    @foreach ($type_bloods as $type_blood)
                        <option value="{{ $type_blood->id }}">{{ $type_blood->name }}</option>
                    @endforeach
                </select>
                @error('blood_type_father_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="inputZip">Religion Father</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="religion_father_id">
                    <option selected>Choose...</option>
                    @foreach ($religions as $religion)
                        <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                    @endforeach
                </select>
                @error('religion_father_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Adress Father</label>
            <textarea class="form-control" wire:model="address_father" id="exampleFormControlTextarea1" rows="4"></textarea>
            @error('address_father')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        @if ($updateMode)
            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmit_edit"
                type="button">Next
            </button>
        @else
            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmit"
                type="button">Next
            </button>
        @endif
    </div>
</div>
</div>
