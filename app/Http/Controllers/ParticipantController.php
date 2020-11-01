<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('participants')->simplePaginate(5);
        return view('index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'age' => 'required|integer|min:0|max:200',
            'dob' => 'required|date',
            'locality' => 'required',
            'no_of_guest' => 'required|integer|min:0|max:2',
            'profession' => 'required',
            'address' => 'required',
        ]);
        
        $data = $request->toArray();


        unset($data['_token']);
        //echo "<pre>";print_r($data);exit;

        Participant::create($data);

        return redirect('participants')->with('status', 'Participant added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function show(Participant $participant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function edit(Participant $participant , $id)
    {
        $user = DB::table('participants')->find($id);
        return view('edit', ['users' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participant $participant , $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'age' => 'required|integer|min:0|max:200',
            'dob' => 'required|date',
            'locality' => 'required',
            'no_of_guest' => 'required|integer|min:0|max:2',
            'profession' => 'required',
            'address' => 'required',
        ]);

        $data = $request->toArray();
        unset($data['_token'] , $data['_method']);
        
        DB::table('participants')
            ->where('id', $id)
            ->update($data);

        return redirect('participants')->with('status', 'Participant Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participant $participant)
    {
        //
    }
}
