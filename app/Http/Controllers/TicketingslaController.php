<?php

namespace App\Http\Controllers;

use App\Models\Ticketingsla;
use Illuminate\Http\Request;

class TicketingslaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sla = Ticketingsla::first();
        return view('ticketingsla.index', [
            'sla' => $sla
        ]);
        //
    }

    public function update(Request $request, Ticketingsla $ticketingsla)
    {
        // dd($request);
        $valid = $request->validate([
            'TicketConcurrency' => 'required|integer|min:1', 
            'L1MaxWaitingTime' => 'required|integer|min:1', 
            'L2MaxWaitingTime' => 'required|integer|min:1', 
            'L3MaxWaitingTime' => 'required|integer|min:1', 
            'L1MaxHandlingTime' => 'required|integer|min:1', 
            'L2MaxHandlingTime' => 'required|integer|min:1', 
            'L3MaxHandlingTime' => 'required|integer|min:1', 
            'MaxRepAwayTime' => 'required|integer|min:1', 
            'MaxTotalRepAwayTime' => 'required|integer|min:1', 
            'MaxRepBreakTime' => 'required|integer|min:1', 
            'MaxRepLunchTime' => 'required|integer|min:1', 
            'MaxTicketIdleTime' => 'required|integer|min:1'
        ]);
        $ticketingsla->update([
            'TicketConcurrency' => $valid['TicketConcurrency'], 
            'L1MaxWaitingTime' => $valid['L1MaxWaitingTime'], 
            'L2MaxWaitingTime' => $valid['L2MaxWaitingTime'], 
            'L3MaxWaitingTime' => $valid['L3MaxWaitingTime'], 
            'L1MaxHandlingTime' => $valid['L1MaxHandlingTime'], 
            'L2MaxHandlingTime' => $valid['L2MaxHandlingTime'], 
            'L3MaxHandlingTime' => $valid['L3MaxHandlingTime'], 
            'MaxRepAwayTime' => $valid['MaxRepAwayTime'], 
            'MaxTotalRepAwayTime' => $valid['MaxTotalRepAwayTime'], 
            'MaxRepBreakTime' => $valid['MaxRepBreakTime'], 
            'MaxRepLunchTime' => $valid['MaxRepLunchTime'], 
            'MaxTicketIdleTime' => $valid['MaxTicketIdleTime']
            // 'TicketConcurrency' => $request->input('TicketConcurrency'), 
            // 'L1MaxWaitingTime' => $request->input('L1MaxWaitingTime'), 
            // 'L2MaxWaitingTime' => $request->input('L2MaxWaitingTime'), 
            // 'L3MaxWaitingTime' => $request->input('L3MaxWaitingTime'), 
            // 'L1MaxHandlingTime' => $request->input('L1MaxHandlingTime'), 
            // 'L2MaxHandlingTime' => $request->input('L2MaxHandlingTime'), 
            // 'L3MaxHandlingTime' => $request->input('L3MaxHandlingTime'), 
            // 'MaxRepAwayTime' => $request->input('MaxRepAwayTime'), 
            // 'MaxTotalRepAwayTime' => $request->input('MaxTotalRepAwayTime'), 
            // 'MaxRepBreakTime' => $request->input('MaxRepBreakTime'), 
            // 'MaxRepLunchTime' => $request->input('MaxRepLunchTime'), 
            // 'MaxTicketIdleTime' => $request->input('MaxTicketIdleTime')
        ]);

        return redirect(route('sla'));
    }

}
 