<?php

namespace App\Http\Livewire;

use App\Models\MyParent;
use App\Models\Nationalitiev2;
use App\Models\Religion;
use App\Models\TypeBlood;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AddParent extends Component
{
    public $successMessage = '';
    public $catchError;
    public $currentStep = 1;
    public $address_father, $religion_father_id, $blood_type_father_id, $nationality_father_id, $phone_father, $passport_id_father, $national_id_father, $job_father, $name_father, $password, $email;
    public $address_mother, $religion_mother_id, $blood_type_mother_id, $nationality_mother_id, $phone_mother, $passport_id_mother, $national_id_mother, $job_mother, $name_mother;


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'email' => 'required|email',
            'national_id_father' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'passport_id_father' => 'min:10|max:10',
            'phone_father' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'national_id_mother' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'passport_id_mother' => 'min:10|max:10',
            'phone_mother' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);
    }

    public function render()
    {
        return view('livewire.add-parent', [
            'nationalities' => Nationalitiev2::all(),
            'type_bloods' => TypeBlood::all(),
            'religions' => Religion::all()
        ]);
    }

    public function firstStepSubmit()
    {
        $this->validate([
            'email' => 'required|unique:my_parents,email,' . $this->id,
            'password' => 'required',
            'name_father' => 'required',
            'job_father' => 'required',
            'national_id_father' => 'required|unique:my_parents,national_id_father,' . $this->id,
            'passport_id_father' => 'required|unique:my_parents,passport_id_father,' . $this->id,
            'phone_father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'nationality_father_id' => 'required',
            'blood_type_father_id' => 'required',
            'religion_father_id' => 'required',
            'address_father' => 'required',
        ]);

        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {
        $this->validate([
            'name_mother' => 'required',
            'job_mother' => 'required',
            'national_id_mother' => 'required|unique:my_parents,national_id_mother,' . $this->id,
            'passport_id_mother' => 'required|unique:my_parents,passport_id_mother,' . $this->id,
            'phone_mother' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'nationality_mother_id' => 'required',
            'blood_type_mother_id' => 'required',
            'religion_mother_id' => 'required',
            'address_mother' => 'required',
        ]);

        $this->currentStep = 3;
    }



    public function submitForm()
    {

        try {
            $my_parent = new MyParent();
            // Father_INPUTS
            $my_parent->email = $this->email;
            $my_parent->password = Hash::make($this->password);
            $my_parent->name_father = $this->name_father;
            $my_parent->national_id_father = $this->national_id_father;
            $my_parent->passport_id_father = $this->passport_id_father;
            $my_parent->phone_father = $this->phone_father;
            $my_parent->job_father = $this->job_father;
            $my_parent->passport_id_father = $this->passport_id_father;
            $my_parent->nationality_father_id = $this->nationality_father_id;
            $my_parent->blood_type_father_id = $this->blood_type_father_id;
            $my_parent->religion_father_id = $this->religion_father_id;
            $my_parent->address_father = $this->address_father;

            // Mother_INPUTS
            $my_parent->name_mother = $this->name_mother;
            $my_parent->national_id_mother = $this->national_id_mother;
            $my_parent->passport_id_mother = $this->passport_id_mother;
            $my_parent->phone_mother = $this->phone_mother;
            $my_parent->job_mother = $this->job_mother;
            $my_parent->passport_id_mother = $this->passport_id_mother;
            $my_parent->nationality_mother_id = $this->nationality_mother_id;
            $my_parent->blood_type_mother_id = $this->blood_type_mother_id;
            $my_parent->religion_mother_id = $this->religion_mother_id;
            $my_parent->address_mother = $this->address_mother;


            $my_parent->save();

            // if (!empty($this->photos)) {
            //     foreach ($this->photos as $photo) {
            //         $photo->storeAs($this->National_ID_Father, $photo->getClientOriginalName(), $disk = 'parent_attachments');
            //         ParentAttachment::create([
            //             'file_name' => $photo->getClientOriginalName(),
            //             'parent_id' => My_Parent::latest()->first()->id,
            //         ]);
            //     }
            // }
            $this->successMessage = 'success';
            $this->clearForm();
            $this->currentStep = 1;
        } catch (\Exception $e) {
            $this->catchError = $e->getMessage();
        }
        ;
    }

    public function clearForm()
    {
        $this->email = '';
        $this->password = '';
        $this->name_father = '';
        $this->job_father = '';
        $this->national_id_father = '';
        $this->passport_id_father = '';
        $this->phone_father = '';
        $this->nationality_father_id = '';
        $this->blood_type_father_id = '';
        $this->address_father = '';
        $this->religion_father_id = '';

        $this->name_mother = '';
        $this->job_mother = '';
        $this->national_id_mother = '';
        $this->passport_id_mother = '';
        $this->phone_mother = '';
        $this->nationality_mother_id = '';
        $this->blood_type_mother_id = '';
        $this->address_mother = '';
        $this->religion_mother_id = '';

    }


    public function firstStepBack()
    {
        $this->currentStep = 1;
    }

    public function backSecond()
    {
        $this->currentStep = 2;
    }
}