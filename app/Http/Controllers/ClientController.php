<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ClientRequest;

class ClientController extends Controller
{
    public function index()
    {
        $Clients = Client::paginate(12);
        return view("clients.clients", compact("Clients"));
    }

    public function show(Client $Client)
    {

        return view("clients.show", compact("Client"));
    }

    public function create()
    {
        return view("clients.create");
    }

    public function store(ClientRequest $request)
    {
        $name = $request->name;
        $adress = $request->adress;
        $phone = $request->phone;
        $email = $request->email;
        $password = $request->password;
        $role = "Client";

        // verify
        $formfields = $request->validated();
        $formfields['password']= Hash::make($request->password);
        // dd($formfields);
        

        //insert
        Client::create($formfields);


        // create profile
        $formfields['role']=$role;  
        Profile::create($formfields);


        //Redirecting
        //redirect('/home)
        //redirect()->route(...)  =>  to_route(...)
        //redirect()->action(...)
        //back()

        return redirect()->route("clients.index")->with("success", "Votre profile Client est bien crée");
    }

    public function edit(Client $Client)
    {
        return view("clients.edit", compact("Client"));
    }

    public function update(ClientRequest $request, Client $client)
    {
        $formfields = $request->validated();    
        $client->fill($formfields)->save();

        $profile = Profile::where('email', $client->email)->first();
        $profile->fill($formfields)->save();
        // dd($profile);
        if ($profile) {
            $profile->fill($formfields)->save();
        }
        return to_route("clients.show", $client->id)->with("success", "Votre profile Client est bien modifié");
    }
    
    public function destroy(Client $Client)
    {
        Profile::where('email', $Client->email)->delete();
        $Client->delete();
        return to_route("clients.index")->with("success_delete", "Votre profile Client est bien supprimé");
    }

}
