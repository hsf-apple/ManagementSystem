@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
 <main class="py-4">  {{--create spacing --}}
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Request Inventory</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- {{Auth::user()->userID}} --}}


                        <div class="d-flex justify-content-between">
                            <button type="button" onclick="window.location='{{route('inventory.create')}}'" class="btn btn-primary">Add request</button>
                            <button type="button" onclick="window.location='{{route('studentApprovelist')}}'" class="btn btn-info">Approve List</button>
                        </div>

                        <br><br>
                        <table class="table">
                            <tr>
                                <th>inventory name</th>
                                <th>start date</th>
                                <th>end date</th>
                                <th>reason</th>
                                <th>status</th>
                                <th>Cancel request</th>
                            </tr>
                            @foreach ($inventorylist as $inventoryindex)
                            <tr>
                                <td>{{$inventoryindex->inventoryitem->inventoryname}}</td>
                                <td>{{$inventoryindex->Startdate}}</td>
                                <td>{{$inventoryindex->Enddate}}</td>
                                <td>{{$inventoryindex->reason}}</td>
                                <td >{{$inventoryindex->status}}</td>
                                <td>
                                    <form action="{{ route('inventory.destroy',$inventoryindex->id) }}" onsubmit="return confirm('Are you sure you want to cancel this request?');" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">

                                    <input type="submit" value="Cancel Request" class="btn btn-danger">
                                    </form>
                                </td>
                            </tr>

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
