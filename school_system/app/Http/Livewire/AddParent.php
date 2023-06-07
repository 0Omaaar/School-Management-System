<?php

namespace App\Http\Livewire;

use App\Models\Nationalitiev2;
use App\Models\Religion;
use App\Models\TypeBlood;
use Livewire\Component;

class AddParent extends Component
{

    public $currentStep = 1;
    public $address_father, $religion_father_id, $blood_type_father_id, $nationality_father_id, $phone_father, $passport_id_father, $national_id_father, $job_father, $name_father, $password, $email;
    public $address_mother, $religion_mother_id, $blood_type_mother_id, $nationality_mother_id, $phone_mother, $passport_id_mother, $national_id_mother, $job_mother, $name_mother;

    public function render()
    {
        return view('livewire.add-parent', [
            'nationalities' => Nationalitiev2::all(),
            'type_bloods' => TypeBlood::all(),
            'religions' => Religion::all()
        ]);
    }

    public function firstStepSubmit(){
        $this->currentStep = 2;
    }

    public function secondStepSubmit(){
        $this->currentStep = 3;
    }

    public function firstStepBack(){
        $this->currentStep = 1;
    }

    public function backSecond(){
        $this->currentStep = 2;
    }
}