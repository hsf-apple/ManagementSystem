@extends('layouts.app')

@section('content')

@include('layouts.adminsidebar')
<main class="py-4">  {{--create spacing --}}
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">View Expertise</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- {{Auth::user()->userID}} --}}
                        
                        @csrf

                        @foreach ($lectureExpertise as $expertise)
                        <label for='expertiseName'>{{$expertise->expertiseName}}</label>
                        <br>
                        <div>
                        @switch($expertise->expertiseLevel)
                            @case('Very High')
                                <progress id="expertiseLevel" value="100" max="100"> Very High </progress>
                                @break
                            @case('High')
                                <progress id="expertiseLevel" value="75" max="100"> High </progress>
                                @break
                            @case('Medium')
                                <progress id="expertiseLevel" value="50" max="100"> Medium </progress>
                                @break
                            @case('Low')
                                <progress id="expertiseLevel" value="25" max="100"> Low </progress>
                                @break
                            @default
                        @endswitch
                        </div>
                        <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
<link rel="stylesheet" href="/css/sidebar.css">
