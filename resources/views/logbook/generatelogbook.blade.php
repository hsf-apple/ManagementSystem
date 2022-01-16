@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
 <main class="py-4">  {{--create spacing --}}
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add request</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- {{Auth::user()->userID}} --}}
                       <button type="button" onclick="window.location='{{route('logbook.index')}}'" class="btn btn-primary">Back</button>
                            <br><br>
                        <form method="post" action="{{ route('logbook.store') }}">
                            @csrf
                            <label for="project_title" class="form-label">Name:</label>
                            <label style="margin-left:2.5em">{{Auth::user()->studentprofileFK->studentName}}</label><br>

                            <label for="project_description" class="form-label">Matric ID:</label>
                            <label style="margin-left:2.5em">{{Auth::user()->userID}}</label><br>

                            @foreach ($checksv as $findsvname)
                            <label for="project_description" class="form-label">Supervisor Name:</label>
                            <label >{{$findsvname->fkLecture->lectureName}}</label><br>
                            @endforeach

                            <label for="meetingDate" class="form-label">Meeting date:</label>
                            <input type="date" name="meetingDate" id="meetingDate" class="form-control"><br/>

                            <label for="startTime" class="form-label">Start Time:</label>
                            <input type="time" name="timestamp" id="startTime" class="form-control"><br/>

                            <label for="endTime" class="form-label">End Time:</label>
                            <input type="time" name="timestamp" id="endTime" class="form-control"><br/>

                            <label for="currentProgress" class="form-label">Current progress:</label>
                            <input type="text" name="currentProgress" id="currentProgress" class="form-control"><br/>

                            <label for="discDetail" class="form-label">discussion details:</label>
                            <input type="text" name="discDetail" id="discDetail" class="form-control"><br/>

                            <label for="actPlan" class="form-label">Action plan:</label>
                            <input type="text" name="actPlan" id="actPlan" class="form-control"><br/>

                            <input type="submit" name="submit" value="Submit Request" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
<link rel="stylesheet" href="/css/sidebar.css">
