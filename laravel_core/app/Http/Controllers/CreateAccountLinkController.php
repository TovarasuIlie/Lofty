<?php

namespace App\Http\Controllers;

use App\Jobs\SendLinkOnEmailJob;
use App\Models\CreateAccountLink;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CreateAccountLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard/account-management/create-link-account', ['createdLinks' => CreateAccountLink::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'email'     => 'required|email|unique:create_account_links',
        ];

        $customMessage = [
            'required'  => '<i class="fas fa-exclamation-triangle"></i> Este necesar sa completati campul <b>:attribute</b>.',
            'email'  => '<i class="fas fa-exclamation-triangle"></i> Campul <b>:attribute</b> trebuie ca contina un email valid.',
            'unique'  => '<i class="fas fa-exclamation-triangle"></i> Deja a fost trimis un link pe acest email.',
        ];

        $attributes = [
            'email'     => '<b>Adresa de email</b>',
        ];
        $request->validate($rules, $customMessage, $attributes);
        if(!User::where('email', $request->email)->first()) {
            $token = Str::random(60);
            $generatedLink = [
                'email'         => $request->email,
                'token'         => $token,
                'generated_by'  => auth()->user()->name.'('.auth()->user()->email.')',
                'expiration_at' => Carbon::now()->addMinutes(10)->format("Y-m-d H:i:s")
            ];
            if(CreateAccountLink::create($generatedLink)) {
                $details = [
                    'email'     => $request->email,
                    'content'   => [
                        'link'      => asset('dashboard/conturi/link-creare-cont/verifyLink?email='.$request->email.'&token='.$token),
                        'subject'   => 'Link-ul pentru inregistrare contului.'
                    ]
                ];
                SendLinkOnEmailJob::dispatch($details);
                return redirect()->to('/dashboard/conturi/link-creare-cont')->with('success', 'Link-ul a fost creat cu succes!');
            }
        } else {
            return redirect()->back()->with('error', 'Acest email este deja asignat unui administrator!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(CreateAccountLink::destroy($id)) {
            return redirect()->to('/dashboard/conturi/link-creare-cont')->with('success', "Token sters cu succes!");
        } else {
            return redirect()->to('/dashboard/conturi/link-creare-cont')->with('error', "Token-ul nu mai exista sau a fost sters deja!");
        }
    }

    public function verifyLink() {
        $email = $_GET['email'];
        $token = $_GET['token'];

        if(isset($email) && isset($token)) {
            if(CreateAccountLink::verifyEmail($email, $token)) {
                session()->put('email', $email);
                session()->put('token', $token);
                return redirect()->to('/dashboard/inregistrare');
            }
        }
        return redirect()->to('/');
    }
}
