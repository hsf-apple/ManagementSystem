<?php

namespace App\Http\Controllers;
use App\Models\ApprovalModel;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{

    //display approval status
    public function index()
    {
        $result = new  ApprovalModel();
        $listproposal = $result->indexapprovalstatus();
        print($listproposal);

        return view('approval.indexlecture',compact(['listproposal']));
    }

    public function viewApproval($id)
    {
        $result = new ApprovalModel();
        $specificproposaldata = $result->showspecificproposaldata($id);
        $matricID = $specificproposaldata->studentprofile->user_id;
        $findMatricId = $result->findmatricId($matricID);

        return view('approval.addstatusapproval',compact(['specificproposaldata','findMatricId']));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $result = new ApprovalModel();

        $data = $request;

        $result->store($data);


        return redirect('Approval');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
