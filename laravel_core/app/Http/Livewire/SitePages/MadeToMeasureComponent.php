<?php

namespace App\Http\Livewire\SitePages;

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
    }

    public function render()
    {
        return view('livewire.site-pages.made-to-measure-component');
    }
}