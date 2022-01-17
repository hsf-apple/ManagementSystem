@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
 <main class="py-4">  {{--create spacing --}}
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Request Inventory</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- {{Auth::user()->userID}} --}}

                        <div class="d-flex justify-content-between">
                            <button type="button" onclick="window.location='{{route('logbook.create')}}'" class="btn btn-primary">Generate logbook</button>
                        </div>


                        <br><br>
                        <table class="table" id="tableId">
                            <tr>
                                <th>No</th>
                                <th>Matric ID</th>
                                <th>Supervisor Name</th>
                                <th>Meeting Date</th>
                                <th colspan="2" style="text-align: center; ">Status</th>

                            </tr>
                            @foreach ($listlogbookstudent as $logbooklist)
                            <tr>
                                <td>letak no</td>
                                <td>{{Auth::user()->studentprofileFK->studentName}}</td>

                                <td>{{$aa11->fkLecture->lectureName}}</td>

                                <td>{{$logbooklist->meetingDate}}</td>

                                <td>
                                    <button type="button" onclick="window.location='{{route('logbook.show',$logbooklist->id)}}'" class="btn btn-primary">view</button>

                                    <br><br>

                                    <button type="button" onclick="window.location='{{route('logbook.edit',$logbooklist->id)}}'" class="btn btn-info">edit</button>

                            </td>

                            </tr>

                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
<link rel="stylesheet" href="/css/sidebar.css">
