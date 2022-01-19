<?php

namespace App\Http\Controllers;

use App\Models\studentprofileModel;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\studentprofileModel  $studentprofileModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = new studentprofileModel();

        $updateprofile = $result->editstudentprofile($id);

        return view('lecture.edit',compact(['updateprofile']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\studentprofileModel  $studentprofileModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, studentprofileModel $studentprofileModel)
    {
        //
    }

}
