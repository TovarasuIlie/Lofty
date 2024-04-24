<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ManagementUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard/account-management/account-management", ['users' => User::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("dashboard/account-management/account-details", ['user' => User::getUser($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(User::destroy($id)) {
            return redirect()->to('/dashboard/conturi/gestionare-conturi')->with('success', 'Utilizatorul a fost sters cu succes!');
        }
        return redirect()->back()->with('error', 'A aparut o eroare, te rugam sa reincerci!');
    }

    public function makeClient($id) {
        if(User::makeClient($id)) {
            return redirect()->to('/dashboard/conturi/gestionare-cont/'.$id)->with('success', 'Rolul utilizatorului a fost actualizat cu succes!');
        }
        return redirect()->back()->with('error', 'A aparut o eroare, te rugam sa reincerci!');
    }

    public function makeAdmin($id)
    {
        if(User::makeAdmin($id)) {
            return redirect()->to('/dashboard/conturi/gestionare-cont/'.$id)->with('success', 'Rolul utilizatorului a fost actualizat cu succes!');
        }
        return redirect()->back()->with('error', 'A aparut o eroare, te rugam sa reincerci!');
    }

    public function makeManager($id)
    {
        if(User::makeManager($id)) {
            return redirect()->to('/dashboard/conturi/gestionare-cont/'.$id)->with('success', 'Rolul utilizatorului a fost actualizat cu succes!');
        }
        return redirect()->back()->with('error', 'A aparut o eroare, te rugam sa reincerci!');
    }
}
