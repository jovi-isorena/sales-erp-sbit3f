<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Ticket;
use App\Models\Queue;
use Illuminate\Http\Request;

class CommentController extends Controller
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
        $createdRow = Comment::create([
            'TicketNo' => $request->input('TicketNo'),
            'CreatedDatetime' => now('Asia/Manila'),
            'FromRep' => $request->input('FromRep'),
            'ReplyingRepId' => $request->input('ReplyingRepId'),
            'Content' => $request->input('Content')
        ]);

        $ticket = Ticket::where('TicketNo', $request->input('TicketNo'))
            ->first();
        $ticket->update([
            'EnqueuedDatetime' => null,
            'AssignedDatetime' => null,
            'Unread' => 1
        ]);

        $queue = Queue::where('EmployeeID', $request->input('ReplyingRepId'))
            ->first();
        $queue->update([
            'ActiveTickets' => $queue->employee->tickets->where('EnqueuedDatetime', '<>', null)->count() - 1
        ]);
        return $createdRow;
        
    }

    public function storeCustomerComment(Request $request){
        $request->validate([
            'Content' => 'required'
        ]);
        Comment::create([
            'TicketNo' => $request->input('TicketNo'),
            'CreatedDatetime' => now('Asia/Manila'),
            'FromRep' => 0,
            'ReplyingRepId' => null,
            'Content' => $request->input('Content')
        ]);

        $ticket = Ticket::where('TicketNo', $request->input('TicketNo'))
            ->first();
        $ticket->update([
            'EnqueuedDatetime' => now('Asia/Manila'),
            'AssignedEmployee' => null,
            'Unread' => 0
        ]);

        return back();
    }

    public function countcommentsforticket(Ticket $ticket){
        return Comment::oldest('CreatedDatetime')
            ->where('TicketNo', $ticket->TicketNo)
            ->count();
    }
    public function getcommentsforticket(Ticket $ticket){
        return CommentResource::collection(
            Comment::oldest('CreatedDatetime')
                ->where('TicketNo', $ticket->TicketNo)
                ->with('employee')
                ->get()
                
        
        );

        
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
