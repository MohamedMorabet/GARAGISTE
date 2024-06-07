<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Client;
use App\Models\Mechanical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::paginate(12);
        return view("profile.profiles", compact("profiles"));
    }

    public function show(Profile $profile)
    {
        return view("profile.show", compact("profile"));
    }

    public function create()
    {
        return view("profile.create");
    }

    public function store(ProfileRequest $request)
    {
        $name = $request->name;
        $adress = $request->adress;
        $phone = $request->phone;
        $email = $request->email;
        $password = $request->password;
        $role = $request->role;


        //verification
        $formfields = $request->validated();
        $formfields['password'] = Hash::make($request->password);

        //inserstion
        Profile::create($formfields);

        if ($role == "client") {
            Client::create($formfields);
        } elseif ($role == "mechanical") {
            Mechanical::create($formfields);
        }

        return redirect()->route("profiles.index")->with("success", "Votre profile est bien crée");
    }

    public function edit(Profile $profile)
    {
        return view("profile.show", compact("profile"));
    }

    public function update(ProfileRequest $request, Profile $profile)
    {
        $formfields = $request->validated();
        // dd($formfields);
        if (!empty($formfields['password'])) {
            $formfields['password'] = Hash::make($request->password);
        } else {
            unset($formfields['password']);
        }

        $profile->fill($formfields)->save();

        return redirect()->route('profiles.show', $profile->id)->with('success', 'Votre profile est bien modifié');
    }


    public function update2(ProfileRequest $request)
    {

        $formfields = $request->validated();
        //hash password
        $formfields['password'] = Hash::make($request->password);

        $profile = Profile::find(auth()->user()->id);
        
        $profile->fill($formfields)->save();

        if ($request->role == "client") {
            $client = Client::where('email', $profile->email)->first();
            $client->fill($formfields)->save();
        } elseif ($request->role == "mechanical") {
            $mechanical = Mechanical::where('email', $profile->email)->first();
            $mechanical->fill($formfields)->save();
        }

        return redirect()->route('settings.index')->with('success', 'Profile updated successfully');
    }

    public function destroy(Profile $profile)
    {
        if ($profile->role == "client") {
            Client::where('email', $profile->email)->delete();
        } elseif ($profile->role == "mechanical") {
            Mechanical::where('email', $profile->email)->delete();
        }

        $profile->delete();
        return to_route("profiles.index")->with("success_delete", "Votre profile est bien supprimé");
    }

}
