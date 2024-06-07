<?php

namespace App\Http\Controllers;

use App\Models\Mechanical;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\MechanicalRequest;

class MechanicalController extends Controller
{
    public function index()
    {
        $mechanicals = Mechanical::paginate(12);
        return view("mechanical.mechanicals", compact("mechanicals"));
    }

    public function show(Mechanical $mechanical)
    {

        return view("mechanical.show", compact("mechanical"));
    }

    public function create()
    {
        return view("mechanical.create");
    }

    public function store(MechanicalRequest $request)
    {
        $name = $request->name;
        $adress = $request->adress;
        $phone = $request->phone;
        $email = $request->email;
        $password = $request->password;
        $role = "mechanical";

        //verification
        $formfields = $request->validated();
        $formfields['password']= Hash::make($request->password);
        // dd($formfields);


        //inserstion
        Mechanical::create($formfields);

        $formfields['role']=$role;
        // dd($formfields);
        Profile::create($formfields);

        return redirect()->route("mechanicals.index")->with("success", "Votre profile mechanical est bien crée");
    }

    public function edit(Mechanical $mechanical)
    {
        return view("mechanical.edit", compact("mechanical"));
    }

    public function update(MechanicalRequest $request, Mechanical $mechanical)
    {
        $formfields = $request->validated();    
        $mechanical->fill($formfields)->save();
        // dd($formfields['email']);

        $profile = Profile::where('email', $mechanical->email)->first();
        // dd($profile);
        if ($profile) {
            $profile->fill($formfields)->save();
        }
        return to_route("mechanicals.show", $mechanical->id)->with("success", "Votre profile mechanical est bien modifié");
    }

    public function destroy(Mechanical $mechanical)
    {
        Profile::where('email', $mechanical->email)->delete();
        // dd($mechanical->id);
        $mechanical->delete();
        return to_route("mechanicals.index")->with("success_delete", "Votre profile mechanical est bien supprimé");
    }
   
}
