<!-- The sidebar -->
<div class="sidebar">
    <a class="active" href="{{url('/lecturedashboard')}}">Home</a>
    <a href="{{route('StudentProfile.edit',Auth::user()->id  )}}">profile</a>
    <a href="{{route('title.index')}}">title index</a>
    <a href="{{route('listRequestLecture')}}">inventory usage</a>
    <a href="{{route('expertise.index')}}">expertise view</a>
    <a href="{{route('expertise.create')}}">expertise add</a>
    <a href="{{route('Approval.index')}}">approval list</a>
    <a href="{{route('indexlogbooklecture')}}">Logbook</a>

</div>
