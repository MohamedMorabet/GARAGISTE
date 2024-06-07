<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use App\Models\SparePart;
use App\Models\Invoice;
use App\Models\Client;
use Carbon\Language;
use Illuminate\Http\Request;
use Carbon\Carbon;

class homeController extends Controller
{
    public function index(Request $request)
    {
        // this week
            //get the number of repairs for this week
            $number_of_repairs = Repair::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();

            //get the number of repairs in progress
            $number_of_repairs_in_progress = Repair::where('status', 'in progress')->count();

            //get the number of repairs completed
            $number_of_repairs_completed = Repair::where('status', 'completed')->count();

            //get the number of repairs pending
            $number_of_repairs_pending = Repair::where('status', 'pending')->count();

            // repairs witout mechanical
            $repairs_without_mechanical = Repair::where('mechanical_id', null)->count();
            // dd($repairs_without_mechanical);
        
        //spare parts that's need restocking soon (quantity < 10)
        $spare_parts = SparePart::where('quantity', '<', 10)->count();

        // sum invoice total
        $total = Invoice::sum('total_price');

        //clients this day
        $clients = Client::whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])->count();

        //the name of the last clients sign in 
        $last_clients = Client::orderBy('created_at', 'desc')->limit(5)->get();
        
        


        if (auth()->user()->role == "admin") {
            return view("home.admin", compact('number_of_repairs', 'number_of_repairs_in_progress', 'number_of_repairs_completed', 
                                            'number_of_repairs_pending', 'repairs_without_mechanical', 'spare_parts', 'total', 'clients',
                                            'last_clients'));
        } elseif (auth()->user()->role == "mechanical") {
            return view("home.mechanical");
        } elseif (auth()->user()->role == "client") {
            return view("home.client");
        }

    }
    public function landing() {
        return view("home.landing");    
    }
}   
