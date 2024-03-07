<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MadeToMeasure;
// use App\Models\SiteSettings;
use App\Rules\PhoneNumberValidation;
use App\Rules\EmailOrPhoneValidation;

class MadeToMeasureController extends Controller
{
    public function placeOrder(Request $request) {

        $rules = [
            'full-name'                    => 'required|max:50',
            'email'                        => ['required', 'max:255', new EmailOrPhoneValidation],
            'phone-number'                 => ['required', new PhoneNumberValidation, 'digits:10', new EmailOrPhoneValidation],
            'height'                       => 'required|numeric|lte:250|gte:80',
            'bust-circumference'           => 'required|numeric|lte:150|gte:50',
            'circumference-under-the-bust' => 'required|numeric|lte:150|gte:50',
            'waist-circumference'          => 'required|numeric|lte:150|gte:40',
            'hips-circumference'           => 'required|numeric|lte:200|gte:40',
            'arm-length'                   => 'required|numeric|lte:150|gte:20',
            'inside-length-leg'            => 'required|numeric|lte:150|gte:30',
            'shoulder-width'               => 'required|numeric|lte:150|gte:10',
        ]; 

        $customMessage = [
            'required' => '<i class="fas fa-exclamation-triangle"></i> Este necesar sa completati campul <b>:attribute</b>.',
            'alpha'    => '<i class="fas fa-exclamation-triangle"></i> Campul <b>:attribute</b> trebuie sa contina numai litere.',
            'max'      => '<i class="fas fa-exclamation-triangle"></i> Campul <b>:attribute</b> trebuie sa fie de maxim <b>:max</b> caractere.',
            'digits'   => '<i class="fas fa-exclamation-triangle"></i> Campul <b>:attribute</b> trebuie sa contina 10 cifre',
            'numeric'  => '<i class="fas fa-exclamation-triangle"></i> In campul <b>:attribute</b> trebuie sa introduci o valoare numerica.',
            'lte'      => '<i class="fas fa-exclamation-triangle"></i> Valoarea din campul <b>:attribute</b> trebuie sa fie mai mica decat <b>:value cm</b>.',
            'gte'      => '<i class="fas fa-exclamation-triangle"></i> Valoarea din campul <b>:attribute</b> trebuie sa fie mai mare decat <b>:value cm</b>.',
        ];

        $attributes = [
            'full-name' => 'Nume si prenume',
            'email' => 'Adresa de email',
            'phone-number' => 'Numar de telefon',
            'height' => 'Inaltime',
            'bust-circumference' => 'Circumferinta Bustului',
            'circumference-under-the-bust' => 'Circumferinta sub bust',
            'waist-circumference' => 'Circumferinta talie',
            'hips-circumference' => 'Circumferinta solduri',
            'arm-length' => 'Lungime brat',
            'inside-length-leg' => 'Lungime pe interiorul piciorului',
            'shoulder-width' => 'Latime umeri',
        ];

        $request->validate($rules, $customMessage, $attributes);

        $fullName = $request->input("full-name");
        $email = $request->input("email");
        $phoneNumber = $request->input("phone-number");
        $height = $request->input("height");
        $bustCircumference = $request->input("bust-circumference");
        $circumferenceUnderTheBust = $request->input("circumference-under-the-bust");
        $waistCircumference = $request->input("waist-circumference");
        $hipsCircumference = $request->input("hips-circumference");
        $armLength = $request->input("arm-length");
        $insideLengthLeg = $request->input("inside-length-leg");
        $shoulderWidth = $request->input("shoulder-width");
        $photoArray = [$request->input("reference-img-1"), $request->input("reference-img-2"), $request->input("reference-img-3")];

        // Setarile servelului;
        // $siteSettings = new SiteSetting();
        // $siteSettings = $siteSettings->all();

        if(true) {
            if(count(array_filter($photoArray)) >= 2) {
                $madeToMeasure = new MadeToMeasure();
                $insertRow = [
                    'fullname' => $fullName,
                    'email' => $email,
                    'phoneNumber' => $phoneNumber,
                    'height' => $height,
                    'bustCircumference' => $bustCircumference,
                    'circumferenceUnderTheBust' => $circumferenceUnderTheBust,
                    'waistCircumference' => $waistCircumference,
                    'hipsCircumference' => $hipsCircumference,
                    'armLength' => $armLength,
                    'insideLengthLeg' => $insideLengthLeg,
                    'shoulderWidth' => $shoulderWidth,
                    'photo1' => $photoArray[0],
                    'photo2' => $photoArray[1],
                    'photo3' => $photoArray[2],
                ];
                if($madeToMeasure->insert($insertRow)) {
                    return redirect()->to('/made-to-measure')->with('success', '<i class="fas fa-check-square"></i> Comanda a fost plasata cu succes! Te vom contacta noi pentru mai multe informatii!');
                } else {
                    return redirect()->back()->with('success', '<i class="fas fa-exclamation-triangle"></i> A aparut o eroare, te rugam sa reincerci mai tarziu');
                }
            } else {
                return redirect()->back()->with('error-photo', '<i class="fas fa-exclamation-triangle"></i> Trebuie sa incarci minim 2 poze!');
            }
        } else {
            return redirect()->back()->with('error', '<i class="fas fa-exclamation-triangle"></i> Momentan nu mai luam comenzi, deoarece suntem foarte aglomerati!');
        }
    }
}
