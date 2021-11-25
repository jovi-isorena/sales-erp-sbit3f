<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->employee->Position == 1)
            return view('home');
        else if(auth()->user()->employee->Position == 7){
            $tickets = Ticket::whereMonth('RatingDatetime', now('Asia/Manila')->month)
                ->where('AssignedEmployee', auth()->user()->EmployeeID)
                ->get();
            return view('nonadmin.rep_dashboard', [
                'tickets' => $tickets
            ]);
        }
        
        else if(auth()->user()->employee->Position == 8){
            return view('nonadmin.lead_dashboard');
        }

        else if(auth()->user()->employee->Position == 9){
            return view('nonadmin.manager_dashboard');
        }

    }
    public function tickets()
    {
        
        $tickets = Ticket::where('TicketStatus', 'Open')
            ->where('AssignedEmployee', auth()->user()->EmployeeID)
            ->get()
            ->load('customer');
        
        return view('nonadmin.tickets', [
            'tickets' => $tickets
        ]);
    }
}
