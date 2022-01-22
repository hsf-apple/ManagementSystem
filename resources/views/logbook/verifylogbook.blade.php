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
                        <button type="button" onclick="window.location='{{route('indexlogbooklecture')}}'" class="btn btn-primary">Back</button>
                        <br><br>
                        <form method="post" action="{{ route('comfimationverifylogbook',$editlogbookdata->id) }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">

                            <label>Name:</label>
                            <label >{{$editlogbookdata->fkStudent->studentName}}</label> <br>

                            @foreach ($checksv as $getID)
                            <label>Matric Id:</label>
                            <label >{{$getID->userID}}</label> <br>
                            @endforeach


                            <label>Supervisor Name:</label>
                            <label >{{Auth::user()->profileFK->lectureName}}</label> <br>



                            <label>Meeting date:</label>
                            <label >{{$editlogbookdata->meetingDate}}</label> <br>

                            <label>Meeting date:</label>
                            <label >{{$editlogbookdata->meetingDate}}</label> <br>

                            <label>start time:</label>
                            <label >{{$editlogbookdata->startTime}}</label> <br>

                            <label>end time:</label>
                            <label >{{$editlogbookdata->endTime}}</label> <br>

                            <label>Current Progress:</label>
                            <label >{{$editlogbookdata->currentProgress}}</label> <br>

                            <label>Discription Detail:</label>
                            <label >{{$editlogbookdata->discDetail}}</label> <br>

                            <label>actual plan:</label>
                            <label >{{$editlogbookdata->actPlan}}</label> <br>

                            <input type="submit" value="Verify" class="btn btn-success" name="submitbutton">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
<link rel="stylesheet" href="/css/sidebar.css">
