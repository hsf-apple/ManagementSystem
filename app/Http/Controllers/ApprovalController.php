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
        $getforeignkey =$result->checkforeignkey($listproposal);

       // print($getforeignkey[1]);
        print($listproposal);

        return view('approval.indexlecture',compact(['listproposal','getforeignkey']));
    }

    public function viewApproval($id)
    {
        $result = new ApprovalModel();
        $specificproposaldata = $result->showspecificproposaldata($id);
        $matricID = $specificproposaldata->studentprofile->user_id;
        $findMatricId = $result->findmatricId($matricID);

        return view('approval.addstatusapproval',compact(['specificproposaldata','findMatricId']));
    }

    public function store(Request $request)
    {

        $result = new ApprovalModel();

        $data = $request;

        $result->store($data);


        return redirect('Approval');
    }

    public function show($id)
    {
        //
    }


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
