<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketResource;
use App\Models\Customer;
use App\Models\Ticket;
use App\Models\Employee;
use App\Models\Queue;
use App\Models\Comment;
use App\Models\Representativehandledticket;
use App\Models\Ticketcategory;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'concern' => 'required|min:10|max:255',
            
        ]);
        $category = Ticketcategory::where('CategoryID',$request->input('category'))->first();
        // dd($this->generateNo());
        $ticket = Ticket::create([
            'TicketNo' => $this->generateNo(),
            'CreatedDatetime' => now('Asia/Manila'),
            'PriorityLevel' => $category->DefaultPriority,
            'CategoryID' => $request->input('category'),
            'AssignedTeam' => $category->AssignedTeam,
            'Content' => $request->input('concern'),
            'CreatedBy' => $request->session()->get('CustomerID'),
            'TicketStatus' => 'Open',
            'Unread' => 0
        ]);
        
        return redirect( route('myTicket'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        $ticket->update([
            'Unread' => 0
        ]);
        // $answered = Comment::where('TicketNo', $ticket->TicketNo)
        //     ->latest('CreatedDatetime')
        //     // ->firstOrNull()
        //     // ->FromRep;
        //     ;
        // dd($ticket->comments[count($ticket->comments)-1]);
        if(count($ticket->comments) > 0){
            $answered = $ticket->comments[count($ticket->comments)-1]->FromRep; 
        } else $answered = 0;
        return view('ticket.show', [
            'ticket' => $ticket,
            'answered' => $answered
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }

    private function generateNo()
    {
        $maxid = Ticket::max('TicketNo');
        $newid = intval($maxid) + 1;
        $newid = str_pad($newid,10,"0", STR_PAD_LEFT);
        // $newid = '00000000000' . $newid;
        // $newid = substr($newid, strlen($newid)-10);
        return $newid;
    }

    public function tickets(){
        return TicketResource::collection(Ticket::all());
    }

    public function ticketsOnQueue(){
        return TicketResource::collection(Ticket::where('EnqueuedDatetime', '<>', null)
            ->where('AssignedDatetime', null)
            ->where('TicketStatus', 'Open')
            ->get());
    }

    public function ticketsby(Customer $customer){
        return TicketResource::collection(Ticket::latest('CreatedDatetime')->where('CreatedBy', $customer->CustomerID)->get());
    }

    public function ticketsfor(Employee $employee){
        return TicketResource::collection(
            Ticket::oldest('AssignedDatetime')
                ->where('AssignedEmployee', $employee->EmployeeID)
                ->where('TicketStatus', 'Open')
                ->where('EnqueuedDatetime', '<>', null)
                ->with('customer')
                ->with('comments')
                ->get()
        );
    }

    public function countticketsfor(Employee $employee){
        return Ticket::oldest('AssignedDatetime')
            ->where('AssignedEmployee', $employee->EmployeeID)
            ->where('EnqueuedDatetime', '<>', null)
            ->where('TicketStatus', 'Open')
            ->count();
    }

    public function ticket(Ticket $ticket){
        return new TicketResource ($ticket); 
    }

    public function closeTicket(Request $request, Ticket $ticket){
        $request->validate([
            'csat1' => 'required',
            'csat2' => 'required',
            'nps' => 'required'
        ]);
        $ticket->update([
            'CSAT1' => $request->input('csat1'),
            'CSAT2' => $request->input('csat2'),
            'NPS' => $request->input('nps'),
            'Feedback' => $request->input('feedback'),
            'ClosedDatetime' => now('Asia/Manila'),
            'TicketStatus' => 'Closed',
            'RatingDatetime' => now('Asia/Manila')
        ]);

        return redirect( route('myTicket'));
    }

    public function transfer(Request $request){
        $ticket = Ticket::where('TicketNo', $request->input('TicketNo'))->first();
        //info for handling
        $assigneddatetime = $ticket->AssignedDatetime;
        $assignedemployee = $ticket->AssignedEmployee;
        $assigned = strtotime($assigneddatetime);
        $done = strtotime(now('Asia/Manila'));
        $handled = $done - $assigned;
        //end info
        $empid = $ticket->AssignedEmployee;
        $category = TicketCategory::where('CategoryID', $request->input('CategoryID'))->first();
        $newticket = $ticket->update([
            'CategoryID' => $request->input('CategoryID'),
            'AssignedTeam' => $category->AssignedTeam,
            'AssignedEmployee' => null,
            'AssignedDatetime' => null,
            'TransferringTeam' => $ticket->AssignedTeam,
            'PriorityLevel' => $category->DefaultPriority

        ]); 
        $queue = Queue::where('EmployeeID', $empid)->first();
        $newcount = $queue->ActiveTickets - 1;
        $queue->update([
            'ActiveTickets' => $newcount
        ]);
        Representativehandledticket::create([
            'TicketNo' => $request->input('TicketNo'), 
            'AssignedDatetime' => $assigneddatetime, 
            'EmployeeID' => $assignedemployee, 
            'ActionTaken' => 'Transferred', 
            'HandlingTime' => $handled
        ]);
        return $newticket;
    }

    public function escalate(Request $request){
        $ticket = Ticket::find($request->TicketNo);
        //info for handling
        $assigneddatetime = $ticket->AssignedDatetime;
        $assignedemployee = $ticket->AssignedEmployee;
        $assigned = strtotime($assigneddatetime);
        $done = strtotime(now('Asia/Manila'));
        $handled = $done - $assigned;
        //end info
        $update = $ticket->update([
            'AssignedEmployee' => $request->AssignedEmployee,
            'AssignedDatetime' => now('Asia/Manila')
        ]);
        $queue = Queue::where('EmployeeID', $request->EmployeeID)->first();
        $queue->update([
            'ActiveTickets' => $queue->ActiveTickets - 1
        ]);
        Representativehandledticket::create([
            'TicketNo' => $request->input('TicketNo'), 
            'AssignedDatetime' => $assigneddatetime, 
            'EmployeeID' => $assignedemployee, 
            'ActionTaken' => 'Escalated', 
            'HandlingTime' => $handled
        ]);
        return $update;
    }

    public function score(string $month, Employee $employee){

        $tickets = Ticket::select()
            ->whereMonth('RatingDatetime', $month)
            ->where('AssignedEmployee', $employee->EmployeeID)
            ->where('TicketStatus')
            ->get();
        return TicketResource::collection($tickets);
    }
    

    public function histograms(Request $request){
        // $scope = $hScope;
        $scope = $request->scope;
        if($scope == 'rep'){
            $tickets = Ticket::where('AssignedEmployee', $request->id)
                ->whereMonth('RatingDatetime', now('Asia/Manila')->month)
                ->get();
            $csat1 = $tickets->sum('CSAT1');    
            $csat2 = $tickets->sum('CSAT2');    
            $nps = $tickets->sum('NPS');    
        }else if($scope == 'team'){

        }else if($scope == 'department'){

        }
        return ['csat1'=>$csat1, 'csat2'=>$csat2, 'nps'=>$nps, 'tickets'=>$tickets];
    }
}
