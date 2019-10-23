<?php

namespace App\Http\Controllers;

use App\Session;
use App\Stundet;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = Session::all();
        return view('sessions.index',compact('sessions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('sessions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $session = new Session;

        $session->admission_year = $request->get('admission_year');
        $session->passing_year = $request->get('passing_year');
        $session->save();
    
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function edit(Session $session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function updateSession(Request $request)
    {

       
        $session = Session::find($request->get('id'));

        $session->admission_year = $request->get('admission_year');
        $session->passing_year = $request->get('passing_year');
        $session->save();
        return redirect('/sessions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session)
    {
        //
    }

    
    public function editSession($id)
    {
        $session = Session::find($id);

        return response()
        ->json(['session' => $session]);

    }

    public function deleteSession($id)
    {

        $status = false;
        if(Session::find($id)->destroy($id)){
            $status = true;
        } 

        return response()
        ->json(['status' => $status]);

        
         
    }

}
