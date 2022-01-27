<?php

namespace App\Http\Controllers;

use App\Models\inventoryusageModel;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class inventoryusageController extends Controller
{
    public function index()
    {
        $result = new inventoryusageModel();

        $inventorylist = $result->indexmodel();

       return view('inventoryusage.index',compact(['inventorylist']));
    }


    public function create()
    {

        $result = new inventoryusageModel();

        $inventoryItem = $result->create();

        return view('inventoryusage.request',compact(['inventoryItem']));
    }


    public function store(Request $request)
    {
        $result = new inventoryusageModel();

        $data = $request;

        $result->store($data);

        return redirect('inventory');
    }


    //cancel request
    public function destroy($id)
    {
        $result = new inventoryusageModel();

        $data = $id;

        $result->deleteinventory($data);


        return redirect('inventory');
    }


    //display index admin dashboard
    public function listRequestLecture()
    {
        $result = new inventoryusageModel();

        $listAll = $result->listRequestLecture();

        return view('inventoryusage.listrequest',compact('listAll'));
    }

    //display approve list  for lecture
    public function listApprovetLecture()
    {
        $result = new inventoryusageModel();

        $listAllApprove = $result->listApprovetLecture();

        return view('inventoryusage.lectureapprovelist',compact('listAllApprove'));

    }

    //approve / reject
    public function update(Request $request, $id)
    {
        $result = new inventoryusageModel();

        $data = $request;
        $dataid = $id;

        $result->updateinventory($data,$dataid);


        return redirect('listRequestLecture');
    }

    //student
    public function show($id)
    {
        $result = new inventoryusageModel();

        $detailinventory = $result->infoRequest($id);

        return view('inventoryusage.detailsrequest',compact('detailinventory'));
    }

}
