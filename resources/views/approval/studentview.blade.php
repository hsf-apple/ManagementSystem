@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
 <main class="py-4">  {{--create spacing --}}
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">View Status</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- {{Auth::user()->userID}} --}}
                        <button type="button" onclick="window.location='{{route('mySupervisor')}}'" class="btn btn-primary">Back</button>

                        <br><br>
                        {{-- <h5>Field:{{$studentstatus->proposalID}}</h5> --}}

                        {{-- {{$studentstatus->status}} --}}

                        {{-- {{Auth::user()->}} --}}



                        {{-- <h5>Title:{{$studentstatus->project_title}}</h5>
                        <h5>Project Decription:{{$studentstatus->project_description}}</h5> <br> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
<link rel="stylesheet" href="/css/sidebar.css">
