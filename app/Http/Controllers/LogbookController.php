<?php

namespace App\Http\Controllers;

use App\Models\ApprovalModel;
use Illuminate\Http\Request;
use App\Models\LogbookModel;
class LogbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = new LogbookModel();

        $listlogbookstudent = $result->listlogbook();

        print($listlogbookstudent);
      return view('logbook.index',compact(['listlogbookstudent']));
    }


    public function create()
    {
        $result = new LogbookModel();

        $checksv = $result->checksv();

       
        return view('logbook.generatelogbook',compact(['checksv']));
    }


    public function store(Request $request)
    {
        $result = new LogbookModel();

        $data = $request;

        $result->store($data);

        return redirect('logbook');
    }


    public function show($id)
    {
        $result = new LogbookModel();

       $datauser = $result->showspecificlogbook($id);

       return view('logbook.viewlogbookspecific',compact(['datauser']));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
