@extends('layouts.app')

@section('content')

@include('layouts.adminsidebar')
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
                       <button type="button" onclick="window.location='{{route('Approval.index')}}'" class="btn btn-primary">Back</button>
                            <br><br>
                        <form method="post" action="{{ route('Approval.store') }}">
                            @csrf
                            <input name="studentId" type="hidden" value="{{$specificproposaldata->studentId}}">
                            <input name="lectureId" type="hidden" value="{{$specificproposaldata->lectureId}}">
                            <input name="proposalID" type="hidden" value=" {{$specificproposaldata->id}}">

                            <label for="project_description" class="form-label">Name:</label>
                            <label >{{$specificproposaldata->studentprofile->studentName}}</label><br>

                            <label for="project_description" class="form-label">Matric ID:</label>
                            <label >{{$findMatricId->userID}}</label><br>

                            <label for="project_description" class="form-label">Lecture Name:</label>
                            <label >{{$specificproposaldata->lectureprofile->lectureName}}</label><br>

                            <label for="status">Proposal Status:</label>
                            <select class="form-control" name="status">
                                <option value="Accepted">Accepted</option>
                                <option value="Rejected">Rejected</option>
                            </select><br/>

                            <label for="reasons" class="form-label">Reason:</label>
                            <input type="text" name="reasons" id="reasons" class="form-control"><br/>

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
