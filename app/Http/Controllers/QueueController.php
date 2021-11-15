<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Queue;
use App\Models\Team;
use App\Models\Ticket;
use App\Models\Ticketingsla;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
        
    public function index()
    {
        $reps = Employee::where('Position', 7)
            ->where('isActive', 1)
            ->get()
            ;
        $tickets = Ticket::where('TicketStatus', 'Open');
        return view('queue.index',[
            'reps' => $reps->load('queue')
                ->load('tickets')
                ->load('team'),
            'tickets' => Ticket::where('EnqueuedDatetime', '<>', null)
                ->where('AssignedDatetime', null)
                ->where('TicketStatus', 'Open')
                ->get(),
                // ->count()
            'teams' => Team::where('isActive', 1)
                ->get()
            // 'salesCount' => Ticket::where('AssignedEmployee', null)
            //     ->where('AssignedTeam', 1)
            //     ->get()
                // ->count(),
            // 'techCount' => Ticket::where('AssignedEmployee', null)
            //     ->where('AssignedTeam', 2)
            //     ->get()
            //     ->count()
            //CREATE SEPARATE QUEUE FOR EACH TEAM
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function enqueue(Request $request)
    {
        $employee = Employee::where('EmployeeID', $request->input('EmployeeID'))
            ->first();
            // dd($employee);
        DB::table('Queue')
            ->updateOrInsert(

                ['EmployeeID' => $employee->EmployeeID],
                ['TeamID' => $employee->TeamID,
                'EnqueueTime' => now('Asia/Manila'),
                // 'ActiveTickets' => $employee->tickets->count(),
                'ActiveTickets' => Ticket::where('AssignedEmployee', $employee->EmployeeID)
                    ->where('AssignedDatetime', '<>', null )
                    ->count(),
                'OnlineStatus' => $request->input('status')
                ]
            );
        return redirect('queue');
    }

    public function assign(Request $request)
    {

        $ticketConcurrency = Ticketingsla::first()->TicketConcurrency;
        
        $employeeOnQueue = Queue::where('ActiveTickets', '<', $ticketConcurrency)
            ->where('OnlineStatus', 'active')
            ->where('TeamID',  $request->input('team'))
            ->count();
            // dd($request);
        $ticketOnQueue = Ticket::where('TicketStatus','Open')
            ->where('AssignedEmployee', null)
            ->where('AssignedTeam', $request->input('team'))
            ->where('EnqueuedDatetime', '<>', null)
            ->count();
        if($employeeOnQueue > 0 && $ticketOnQueue > 0)
        {
            $currentTicket = Ticket::oldest('EnqueuedDatetime')
                ->where('TicketStatus', 'Open')
                ->where('AssignedEmployee', null)
                ->where('AssignedTeam', $request->input('team'))
                ->where('EnqueuedDatetime', '<>', null)
                ->first();
            $currentRep = Queue::where('ActiveTickets', '<', $ticketConcurrency)
                ->where('OnlineStatus', 'active')
                ->where('TeamID', $currentTicket->ticketcategory->AssignedTeam)
                ->oldest('EnqueueTime')
                ->orderBy('ActiveTickets')
                ->first();
            $currentTicket->update([
                'AssignedEmployee' => $currentRep->EmployeeID,
                'AssignedDatetime' => now('Asia/Manila')
            ]);
            $currentRep->update([
                'ActiveTickets' => $currentRep->ActiveTickets + 1,
                'EnqueueTime' => now('Asia/Manila')
            ]);
        }

        return redirect(route('queue'));


    }
    public function reset(Request $request)
    {
        // update ticket set `AssignedEmployee` = null;
        // update ticket set `AssignedDateTime`= null;
        // update queue set `activetickets` = 0;
        // $queues = Queue::all();
        Ticket::where('TicketStatus', 'Open')
            ->update([
                'ClosedDatetime'=> null, 
                'TicketStatus'=>'Open',
                'TransferringTeam' => null,
                'CSAT1'=> null,
                'CSAT2'=> null,
                'NPS'=> null,
                'Feedback'=> null,
                'RatingDatetime'=> null,
                'Unread'=> 0, 
                'AssignedEmployee' => null,
                'AssignedDateTime' => null
                
            ]);
        Queue::where('ActiveTickets', '>', 0)
            ->update([
                'ActiveTickets' => 0
            ]);
            
        return redirect('queue');    
    }

    public function dequeue(Request $request)
    {
        Queue::where('EmployeeID', $request->input('EmployeeID'))
            ->delete();
        return redirect(route('queue'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Queue  $queue
     * @return \Illuminate\Http\Response
     */
    public function show(Queue $queue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Queue  $queue
     * @return \Illuminate\Http\Response
     */
    public function edit(Queue $queue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Queue  $queue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Queue $queue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Queue  $queue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Queue $queue)
    {
        //
    }
}
