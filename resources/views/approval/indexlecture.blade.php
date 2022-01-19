@extends('layouts.app')

@section('content')

@include('layouts.adminsidebar')
 <main class="py-4">  {{--create spacing --}}
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Approval status</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- {{Auth::user()->userID}} --}}

                        <br><br>
                        <table class="table" id="tableId">
                            <tr>
                                <th>No</th>
                                <th>Student Name</th>
                                <th>Student Proposal</th>

                            </tr>
                            @foreach ($listproposal as $dataproposal)
                                @foreach ($getforeignkey as $data)
                                    @if ($data == null)
                                        <tr>
                                            <td>letak no</td>
                                            <td>{{$dataproposal->studentprofile->studentName}}</td>
                                            <td>  <button type="button" onclick="window.location='{{route('viewApproval',$dataproposal->proposalID)}}'" class="btn btn-primary">Add</button></td>
                                        </tr>
                                    @elseif ($data->proposalID ==$dataproposal->proposalID)
                                    <tr>
                                        <td>letak no</td>
                                        <td>{{$dataproposal->studentprofile->studentName}}</td>
                                        <td>  <button type="button" onclick="window.location='{{route('Approval.edit',$data->approvalID)}}'" class="btn btn-primary">Edit</button></td>
                                    </tr>
                                    @endif
                                @endforeach


                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
<link rel="stylesheet" href="/css/sidebar.css">
