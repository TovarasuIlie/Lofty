<?php

namespace App\Http\Livewire\SitePages;

use App\Models\MadeToMeasure;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;

#[Title('Made To Measure - Lofty by Flory Cucu')]
#[Layout('livewire.site-pages.main_layout.app')]
class MadeToMeasureComponent extends Component
{
    use WithFileUploads;

    #[Rule('required', message: "<b>Numele</b> si <b>Prenumele</b> trebuie completate!")]
    #[Rule('max:255', message: "<b>Numele</b> si <b>Prenumele</b> nu trebuie sa fie mai lung de :max!")]
    #[Rule('regex: /[A-Za-z] [A-Za-z]/', message: "<b>Numele</b> si <b>Prenumele</b> este invalid.")]
    public $fullname;

    #[Rule('required', message: "<b>Adresa de email</b> trebuie completat!")]
    #[Rule('max:255', message: "<b>Email-ul</b> nu trebuie sa fie mai lung de :max!")]
    public $email;

    #[Rule('required', message: "<b>Numarul de telefon</b> trebuie completat!")]
    #[Rule('digits:10', message: "<b>Numarul de telefon</b> trebuie sa aibe 10 cifre!")]
    #[Rule('regex: /07[0-9]/', message: "<b>Numarul de telefon</b> nu este unul valid!")]
    public $phoneNumber;

    #[Rule('required', message: "<b>Inaltimea</b> trebuie completat!")]
    #[Rule('numeric', message: "<b>Inaltimea</b> trebuie sa aiba o valoare numerica!")]
    public $height;

    #[Rule('required', message: "<b>Circumferinta Bustului</b> trebuie completat!")]
    #[Rule('numeric', message: "<b>Circumferinta Bustului</b> trebuie sa aiba o valoare numerica!")]
    public $bustCircumference;

    #[Rule('required', message: "<b>Circumferinta sub bust</b> trebuie completat!")]
    #[Rule('numeric', message: "<b>Circumferinta sub bust</b> trebuie sa aiba o valoare numerica!")]
    public $circuferenceUnderTheBust;
    
    #[Rule('required', message: "<b>Circumferinta talie</b> trebuie completat!")]
    #[Rule('numeric', message: "<b>Circumferinta talie</b> trebuie sa aiba o valoare numerica!")]
    public $waistCircumference;

    #[Rule('required', message: "<b>Circumferinta solduri</b> trebuie completat!")]
    #[Rule('numeric', message: "<b>Circumferinta solduri</b> trebuie sa aiba o valoare numerica!")]
    public $hipsCircumference;

    #[Rule('required', message: "<b>Lungime brat</b> trebuie completat!")]
    #[Rule('numeric', message: "<b>Lungime brat</b> trebuie sa aiba o valoare numerica!")]
    public $armLength;

    #[Rule('required', message: "<b>Lungime pe interiorul piciorului</b> trebuie completat!")]
    #[Rule('numeric', message: "<b>Lungime pe interiorul piciorului</b> trebuie sa aiba o valoare numerica!")]
    public $insideLengthLeg;

    #[Rule('required', message: "<b>Latime umeri</b> trebuie completat!")]
    #[Rule('numeric', message: "<b>Latime umeri</b> trebuie sa aiba o valoare numerica!")]
    public $shoulderWidth;

    #[Rule('required', message: 'Trebuie sa bifezi casuta de mai sus!')]
    public $verifyCheckbox;

    #[Rule('required', message: "Trebuie sa adaugi <b>minim 2 poze</b> orientative!")]
    #[Rule('between:2,3', message: "Trebuie sa incarci intre <b>minim 2</b> si <b>maxim 3</b> poze!")]
    public $photos = [];

    public function placeOrder() {
        $this->validate();

        $order = [
            'fullname'                      => $this->fullname,
            'email'                         => $this->email,
            'phone_number'                  => $this->phoneNumber,
            'height'                        => $this->height,
            'bust_circumference'            => $this->bustCircumference,
            'circumference_under_the_bust'  => $this->circuferenceUnderTheBust,
            'waist_circumference'           => $this->waistCircumference,
            'hips_circumference'            => $this->hipsCircumference,
            'arm_length'                    => $this->armLength,
            'inside_length_leg'             => $this->insideLengthLeg,
            'shoulder_width'                => $this->shoulderWidth
        ];

        $madeToMeasure = MadeToMeasure::create($order);
        if($madeToMeasure) {
            foreach ($this->photos as $photo) {
                $madeToMeasure->addMedia($photo->getRealPath())->toMediaCollection('made-to-measure');
            }
            $this->reset(['fullname', 'email', 'phoneNumber', 'height', 'bustCircumference', 'circuferenceUnderTheBust', 'waistCircumference', 
                          'hipsCircumference', 'armLength', 'insideLengthLeg', 'shoulderWidth', 'photos']);
            $this->dispatch('alert', type: 'success', position: 'center', title: 'Cererea a fost plasata cu succes! Te vom contacta in cel mai scurt timp.', timer: 3500);
        } else {
            $this->dispatch('alert', type: 'error', position: 'center', title: 'A aparut o eroare, te rugam sa reincerci mai tarziu.', timer: 3500);
        }
    }

    public function render()
    {
        return view('livewire.site-pages.made-to-measure-component');
    }
}