<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;
use\App\Student;

class BranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('here');
        $branches = Branch::all();
        return view('branches.index',compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('here');
        return view('branches.create');
            
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $branch = new Branch;

        $branch->branch_name = $request->get('branch_name');
        $branch->save();
          
        return redirect('branches');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $branch = Branch::find($id);
        // //   dd($book);
        //   return view('branches.edit',compact('branches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function updateBranch(Request $request)
    {
         // dd($request->all());
         $branch = Branch::find($request->get('id'));
         $branch->branch_name = $request->get('branch_name');
         $branch->save();
    
         return redirect('/branches');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        //
    }

    public function editBranch($id)
    {

        $branch = Branch::find($id);
        return response()
            ->json(['branch' => $branch]);
         
    }
    public function deleteBranch($id)
    {

        $status = false;
        if(Branch::find($id)->destroy($id)){
            $status = true;
        } 

        return response()
        ->json(['status' => $status]);

        
         
    }
}
