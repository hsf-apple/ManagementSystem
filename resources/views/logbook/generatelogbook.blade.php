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
                       {{-- // <button type="button" onclick="window.location='{{route('title.index')}}'" class="btn btn-primary">Back</button> --}}
                        <br><br>
                        <form method="post" action="{{ route('logbook.store') }}">
                            @csrf


                            <label for="project_title" class="form-label">Name:</label>
                            <label style="margin-left:2.5em">{{Auth::user()->studentprofileFK->studentName}}</label><br><br>

                            <label for="project_description" class="form-label">Matric ID:</label>
                            <label style="margin-left:2.5em">{{Auth::user()->userID}}</label><br><br>

                            @foreach ($checksv as $findsvname)
                            <label for="project_description" class="form-label">Supervisor Name:</label>
                            <label >{{$findsvname->fkLecture->lectureName}}</label>
                            @endforeach

                            <br><br>
                            <label for="project_description" class="form-label">Matric ID:</label>
                            <input type="text" name="project_description" id="project_description" class="form-control"><br/>

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
