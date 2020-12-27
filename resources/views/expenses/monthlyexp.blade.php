@extends('layouts.app')

@section('content')

<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <div class="head-text">
                        <h4 class="page-title mb-0 font-size-18">Monthly Expenses</h4>
                    </div>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Form Elements</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="exp-link">
                    <a href="{{route('jan.expenses')}}" class="{{ Request::is('jan-expenses') ? 'mm-active' : ''}}">January</a>
                    <a href="{{route('feb.expenses')}}" class="{{ Request::is('feb-expenses') ? 'mm-active' : ''}}">February</a>
                    <a href="">March</a>
                    <a href="">April</a>
                    <a href="">May</a>
                    <a href="">June</a>
                    <a href="">July</a>
                    <a href="{{route('aug.expenses')}}" class="{{ Request::is('aug-expenses') ? 'mm-active' : ''}}">August</a>
                    <a href="">September</a>
                    <a href="">October</a>
                    <a href="">November</a>
                    <a href="">December</a>
                   {{-- <span>Month :</span> <span class="text-danger" style="font-weight: bold">{{date("F")}}</span> --}}
                </div>
                <div class="total-sum" style="float-right">
                    <h5>Total Expnese: <span class="badge badge-danger">{{$expSum}} TK</span></h5>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Note</th>
                                    <th>Amount</th>    
                                    <th>Date</th>    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($monthlyExp as $data)                                   
                                <tr>
                                    <td>{{$data->note}}</td>               
                                    <td>{{$data->amount}}</td>
                                    <td>{{$data->date}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')

@endpush