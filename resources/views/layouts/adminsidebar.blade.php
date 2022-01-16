<!-- The sidebar -->
<div class="sidebar">
    <a class="active" href="{{url('/lecturedashboard')}}">Home</a>
    <a href="#news">News</a>
    <a href="{{route('title.index')}}">title index</a>
    <a href="{{route('LectureProfile.edit',Auth::user()->id  )}}">profile</a>
    <a href="{{route('listRequestLecture')}}">inventory usage</a>
    <a href="{{route('expertise.index')}}">expertise view</a>
    <a href="{{route('expertise.create')}}">expertise add</a>
</div>
