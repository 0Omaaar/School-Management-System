@if ($currentStep != 2)
    <div style="display: none" class="row setup-content" id="step-1">
@endif
<div class="col-xs-12">
    <div class="col-md-12">
        <div class="form-row">
            <div class="col">
                <label for="title">Name Mother</label>
                <input type="text" wire:model="name_mother" class="form-control">
                @error('name_mother')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-3">
                <label for="title">Job mother</label>
                <input type="text" wire:model="job_mother" class="form-control">
                @error('job_mother')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="title">National Id mother</label>
                <input type="text" wire:model="national_id_mother" class="form-control">
                @error('national_id_mother')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="title">Passport_ID_mother</label>
                <input type="text" wire:model="passport_id_mother" class="form-control">
                @error('passport_id_mother')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col">
                <label for="title">Phone_mother</label>
                <input type="text" wire:model="phone_mother" class="form-control">
                @error('phone_mother')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">Nationality_mother_id</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="nationality_mother_id">
                    <option selected>Choose...</option>
                    @foreach ($nationalities as $national)
                        <option value="{{ $national->id }}">{{ $national->name }}</option>
                    @endforeach
                </select>
                @error('nationality_mother_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="inputState">Blood Type mother</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="blood_type_mother_id">
                    <option selected>Choose...</option>
                    @foreach ($type_bloods as $type_blood)
                        <option value="{{ $type_blood->id }}">{{ $type_blood->name }}</option>
                    @endforeach
                </select>
                @error('blood_type_mother_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="inputZip">Religion mother</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="religion_mother_id">
                    <option selected>Choose...</option>
                    @foreach ($religions as $religion)
                        <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                    @endforeach
                </select>
                @error('religion_mother_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Adress mother</label>
            <textarea class="form-control" wire:model="address_mother" id="exampleFormControlTextarea1" rows="4"></textarea>
            @error('address_mother')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        @if ($updateMode)
            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="secondStepSubmit_edit"
                type="button">Next
            </button>
            <button class="btn btn-danger btn-sm nextBtn btn-lg " wire:click="firstStepBack" type="button">Back
            </button>
        @else
            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="secondStepSubmit"
                type="button">Next
            </button>
            <button class="btn btn-danger btn-sm nextBtn btn-lg " wire:click="firstStepBack" type="button">Back
            </button>
        @endif
    </div>
</div>
</div>
