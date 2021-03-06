<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Queue;
use App\Models\Representativehandledticket;
use App\Models\Employee;
use App\Models\Ticketingsla;
use Illuminate\Support\Facades\Date;

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
            $empid = auth()->user()->EmployeeID;
            $tickets = Ticket::whereMonth('RatingDatetime', now('Asia/Manila')->month)
                ->where('AssignedEmployee', $empid)
                ->get();
            $handled = Representativehandledticket::where('EmployeeID', $empid
                )->get();
            return view('nonadmin.rep_dashboard', [
                'tickets' => $tickets,
                'handled' => $handled
            ]);
        }
        
        else if(auth()->user()->employee->Position == 8){
            $team =  auth()->user()->employee->team;
            $tickets = Ticket::where('TicketStatus','Open')
                ->where('AssignedEmployee', null)
                ->where('AssignedTeam', $team->TeamID)
                ->where('EnqueuedDatetime', '<>', null)
                ->get();
            $reps = Queue::where('TeamID', $team->TeamID)
                ->get();
            $feedbacks = Ticket::where('RatingDatetime', '<>', null)
                ->where('AssignedTeam', $team->TeamID)
                ->get();
            $teammates = Employee::select('EmployeeID')
                ->where('TeamID', $team->TeamID)
                ->get()
                ->toArray();
            $handled = Representativehandledticket::whereIn('EmployeeID', $teammates)
                ->get(); 
            $sla = Ticketingsla::find(1);
            return view('nonadmin.lead_dashboard', [
                'tickets' => $tickets,
                'reps' => $reps,
                'feedbacks' => $feedbacks,
                'handled' => $handled,
                'sla' => $sla
            ]);
        }

        else if(auth()->user()->employee->Position == 9){
            $tickets = Ticket::where('TicketStatus','Open')
                ->where('AssignedEmployee', null)
                ->where('EnqueuedDatetime', '<>', null)
                ->get();
            $reps = Queue::all();
            $feedbacks = Ticket::where('TicketStatus','Closed')
                ->whereMonth('RatingDatetime', now('Asia/Manila')->month)
                ->get();
            return view('nonadmin.manager_dashboard', [
                'tickets' => $tickets,
                'reps' => $reps,
                'feedbacks' => $feedbacks
            ]);
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

    public function test(){
        $tickets = Ticket::where('AssignedEmployee', '0010')
            ->where('TicketStatus', 'Closed')
            ->orderBy('RatingDatetime')
            ->get()
            ->groupBy(function($data) {
                $ratedate = date_create($data->RatingDatetime);
                return $ratedate->format('Y-m-d');
            });

        return view('test', [
            'tickets' => $tickets
        ]);
    }
}
