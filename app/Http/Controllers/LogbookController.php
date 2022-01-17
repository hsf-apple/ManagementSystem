<?php

namespace App\Http\Controllers;

use App\Models\ApprovalModel;
use Illuminate\Http\Request;
use App\Models\LogbookModel;
class LogbookController extends Controller
{

    public function index()
    {
        $result = new LogbookModel();

        $listlogbookstudent = $result->listlogbook();
        $aa11 = $result->listlogbooktest();

        // print($aa11);

        // print($listlogbookstudent);
      return view('logbook.index',compact(['listlogbookstudent','aa11']));
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
       $aa11 = $result->listlogbooktest();

       return view('logbook.viewlogbookspecific',compact(['datauser','aa11']));
    }

    public function edit($id)
    {
        $result = new LogbookModel();

        $data = $id;

        $editlogbookdata = $result->editlogbook($data);
        $checksv = $result->checksv();

        return view('logbook.editlogbook',compact(['editlogbookdata','checksv']));
    }

    public function update(Request $request, $id)
    {
        $result = new LogbookModel();
        $data = $request;
        $dataid = $id;

        $result->PUTmethod($data,$dataid);

        return redirect('logbook');
    }

    public function indexlecture()
    {
        $result = new LogbookModel();

        $listlogbooklecture = $result->logbookstudent();

      return view('logbook.logbookstudent',compact(['listlogbooklecture']));
    }


}
