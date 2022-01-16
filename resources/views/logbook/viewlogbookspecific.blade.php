@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
 <main class="py-4">  {{--create spacing --}}
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">View Logbook</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- {{Auth::user()->userID}} --}}
                        <button type="button" onclick="window.location='{{route('listtitle')}}'" class="btn btn-primary">Back</button>
                            <br><br>
                      
                        <label>Name:</label>
                        <label >{{$datauser->fkStudent->studentName}}</label> <br>

                        <label>Matric Id:</label>
                        <label >{{Auth::user()->userID}}</label> <br>

                        <label>Supervisor Name:</label>
                        <label >{{$datauser->fkLecture->lectureName}}</label> <br>

                        <label>Meeting date:</label>
                        <label >{{$datauser->meetingDate}}</label> <br>

                        <label>Meeting date:</label>
                        <label >{{$datauser->meetingDate}}</label> <br>

                        <label>start time:</label>
                        <label >{{$datauser->startTime}}</label> <br>

                        <label>end time:</label>
                        <label >{{$datauser->endTime}}</label> <br>

                        <label>Current Progress:</label>
                        <label >{{$datauser->currentProgress}}</label> <br>
                        
                        <label>Discription Detail:</label>
                        <label >{{$datauser->discDetail}}</label> <br>

                        <label>actual plan:</label>
                        <label >{{$datauser->actPlan}}</label> <br>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
<link rel="stylesheet" href="/css/sidebar.css">
