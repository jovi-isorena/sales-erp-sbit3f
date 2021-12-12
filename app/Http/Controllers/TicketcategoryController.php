<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketCategoryResource;
use App\Models\Ticketcategory;
use App\Models\Team;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Ticketcategory::where('isActive', 1)
            ->get()->load('team');
        return view('ticketcategory.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::where("isActive", 1)->get();
        return view('ticketcategory.create', [
            'teams' => $teams
        ]);
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
        // ddd($request);
        $request->validate([
            'name' => 'required|max:255|unique:ticketcategory,name',
            'assignedTeam' => 'required',
            'priorityLevel' => 'required'
        ]);

        $category = Ticketcategory::make([
            'Name' => $request->input('name'),
            'AssignedTeam' => $request->input('assignedTeam'),
            'DefaultPriority' => $request->input('priorityLevel'),
            'isActive' => true
        ]);
        $category->save();

        return redirect( route('categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticketcategory  $ticketcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Ticketcategory $ticketcategory)
    {

        return view('ticketcategory.show',[
            'category' => $ticketcategory
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticketcategory  $ticketcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticketcategory $ticketcategory)
    {
        $teams = Team::where('isActive', 1)->get();
        return view('ticketcategory.edit', [
            'category' => $ticketcategory,
            'teams' => $teams
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticketcategory  $ticketcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticketcategory $ticketcategory)
    {
        //
        // ddd($request);
        $request->validate([
            'name' => 'required|max:255|unique:ticketcategory,name',
            'assignedTeam' => 'required',
            'priorityLevel' => 'required'
        ]);
        $ticketcategory->update([
            'Name' => $request->input('name'),
            'AssignedTeam' => $request->input('assignedTeam'),
            'DefaultPriority' => $request->input('priorityLevel')
        ]);
        // $category = Ticketcategory::make([
        //     'Name' => $request->input('name'),
        //     'AssignedTeam' => $request->input('assignedTeam'),
        //     'DefaultPriority' => $request->input('priorityLevel'),
        //     'isActive' => true
        // ]);
        // $category->save();

        return redirect( route('categories'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticketcategory  $ticketcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticketcategory $ticketcategory)
    {
        $ticketcategory->update([
            'isActive' => 0
        ]);
        return redirect( route('categories'));
    }

    public function getall(Ticketcategory $ticketcategory){

        return TicketCategoryResource::collection(TicketCategory::all());
    }
    public function getone(Ticketcategory $ticketcategory){
        return new TicketCategoryResource ($ticketcategory);
    }

}
