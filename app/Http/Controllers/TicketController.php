<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketResource;
use App\Models\Customer;
use App\Models\Ticket;
use App\Models\Employee;
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
            'PriorityLevel' => $category->DefaultPriority,
            'CategoryID' => $request->input('category'),
            'AssignedTeam' => $category->AssignedTeam,
            'Content' => $request->input('concern'),
            'CreatedBy' => $request->session()->get('CustomerID'),
            'TicketStatus' => 'Open'
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
        //
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
        $currCount = Ticket::count();
        $newid = $currCount + 1;
        $newid = '00000000000' . $newid;
        $newid = substr($newid, strlen($newid)-10);
        return $newid;
    }

    public function tickets(){
        return TicketResource::collection(Ticket::all());
    }

    public function ticketsby(Customer $customer){
        return TicketResource::collection(Ticket::latest('CreatedDatetime')->where('CreatedBy', $customer->CustomerID)->get());
    }

    public function ticketsfor(Employee $employee){
        return TicketResource::collection(
            Ticket::oldest('AssignedDatetime')
                ->where('AssignedEmployee', $employee->EmployeeID)
                ->where('TicketStatus', 'Open')
                ->with('customer')
                ->with('comments')
                ->get()
        );
    }

    public function countticketsfor(Employee $employee){
        return Ticket::oldest('AssignedDatetime')
            ->where('AssignedEmployee', $employee->EmployeeID)
            ->where('TicketStatus', 'Open')
            ->count();
    }

    public function ticket(Ticket $ticket){
        return new TicketResource ($ticket); 
    }
}
