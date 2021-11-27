<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Ticket;
use App\Models\Ticketcategory;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.index');
    }

    public function myticket(Request $request)
    {
        $tickets = Ticket::latest('CreatedDatetime')
            ->where('CreatedBy', session('CustomerID'))
            ->where('TicketStatus', 'like', $request->get('status') ?? '%%')
            ->with('ticketcategory')
            ->get();
        return view('customer.myticket', [
            'tickets' => $tickets
        ]);
    }

    public function load(Request $request)
    {
        $customer = Customer::where('CustomerID', $request->input('customerId'))
            ->first();
            $customers = Customer::all();
        // dd($customers);
        session([
            'CustomerID' => $customer->CustomerID,
            'FirstName' => $customer->FirstName, 
            'MiddleName' => $customer->MiddleName, 
            'LastName' => $customer->LastName, 
            'Suffix' => $customer->Suffix, 
            'Birthdate' => $customer->Birthdate, 
            'Address' => $customer->Address, 
            'Barangay' => $customer->Barangay, 
            'City' => $customer->City, 
            'Zip' => $customer->Zip, 
            'Mobile' => $customer->Mobile
        ]);
        return redirect( route('myTicket'));
    }

    public function unload()
    {
        session()->forget(['CustomerID','FirstName', 'MiddleName', 'LastName', 'Suffix', 'Birthdate', 'Address', 'Barangay', 'City', 'Zip', 'Mobile']);
        return redirect(route('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function newticket()
    {
        $categories = Ticketcategory::where('isActive', 1)->get();
        return view('customer.newticket', [
            'categories'=> $categories
        ]);
    }
}
