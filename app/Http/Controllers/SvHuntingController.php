<?php

namespace App\Http\Controllers;

use App\Models\SVHuntingModel;
use Illuminate\Http\Request;


class SvHuntingController extends Controller
{
    public function listSupervisor()
    {
        $result = new SvHuntingController();

        $listlecture = $result->lectureList();

       return view('SvHunting.searchSupervisor',compact(['listlecture']));
    }

    public function expertise($id)
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
        return view('SvHunting.addProposal');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = new SVHuntingModel();

        $data = $request;

        $result->store($data);

        return redirect('SvHunting');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = new SVHuntingModel();

        $data = $id;

        $showProposal = $result->viewProposal($data);

        return view('SvHunting.view',compact(['showProposal']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = new SVHuntingModel();

        $data = $id;

        $valueProposal = $result->changeProposal($data);

        return view('SvHunting.edit',compact(['valuetitle']));
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
        $result = new SVHuntingModel();
        $data = $request;
        $dataid = $id;

        $result->updateProposal($data,$dataid);

        return redirect('SvHunting');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = new SVHuntingModel();

        $data = $id;

        $result->deleteTitle($data);


        return redirect('SvHunting');
    }
}
