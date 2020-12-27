@extends('layouts.app')

@section('content')

<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <div class="head-text">
                        <h4 class="page-title mb-0 font-size-18">Yearly Expenses</h4>
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
                <div class="add-buttn">
                   <span>Year :</span> <span class="text-danger" style="font-weight: bold">{{date("Y")}}</span>
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
                                @foreach ($yearlyExp as $data)                                   
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