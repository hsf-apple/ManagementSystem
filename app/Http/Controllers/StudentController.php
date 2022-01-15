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
    public function edit(studentprofileModel $studentprofileModel)
    {
        view('student');
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
