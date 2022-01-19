@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
 <main class="py-4">  {{--create spacing --}}
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Student Profile</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- {{Auth::user()->userID}} --}}
                        @foreach ($updateprofile as $data)
                        <form method="post" action="{{ route('StudentProfile.update',$data->studentId) }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">

                            <label for="studentName" class="form-label">Student Name:</label>
                            <input type="text" name="studentName" id="studentName" class="form-control" value="{{$data->studentName}}"><br/>

                            <label for="student_Skill" class="form-label">Student Skill:</label>
                            <input type="text" name="student_Skill" id="student_Skill" class="form-control" value="{{$data->student_Skill}}"><br/>


                            @if ($data->skill_Level == 'Advance')

                            <input type="radio" id="skill_Level" name="skill_Level" value="Advance"checked >
                            <label for="age1">Advance</label><br>
                            <input type="radio" id="skill_Level" name="skill_Level" value="Intermediate">
                            <label for="age2">Intermediate</label><br>
                            <input type="radio" id="skill_Level" name="skill_Level" value="Beginer">
                            <label for="age3">Beginer</label><br><br>



                            @elseif ($data->skill_Level == 'Intermediate')

                                <input type="radio" id="skill_Level" name="skill_Level" value="Advance" >
                                <label for="age1">Advance</label><br>
                                <input type="radio" id="skill_Level" name="skill_Level" value="Intermediate" checked>
                                <label for="age2">Intermediate</label><br>
                                <input type="radio" id="skill_Level" name="skill_Level" value="Beginer">
                                <label for="age3">Beginer</label><br><br>

                            @elseif ($data->skill_Level == 'Beginer')

                                <input type="radio" id="age1" name="skill_Level" value="Advance" >
                                <label for="age1">Advance</label><br>
                                <input type="radio" id="age2" name="skill_Level" value="Intermediate">
                                <label for="age2">Intermediate</label><br>
                                <input type="radio" id="age3" name="skill_Level" value="Beginer"checked>
                                <label for="age3">Beginer</label><br><br>

                            @endif


                            <input type="submit" name="submit" value="Update Title" class="btn btn-success">
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
<link rel="stylesheet" href="/css/sidebar.css">
