<?php

namespace App\Http\Controllers;

use App\Models\lectureprofileModel;
use Illuminate\Http\Request;

class LectureController extends Controller
{


    public function edit($id)
    {
        $result = new lectureprofileModel();

        $updateprofile = $result->changetitle1($id);

       // print($valuetitle);

        return view('lecture.edit',compact(['updateprofile']));
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
