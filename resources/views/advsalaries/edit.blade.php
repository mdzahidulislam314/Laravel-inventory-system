@extends('layouts.app')
@section('content')

<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Add Advsalary</h4>
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
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{route('adv-salaries.store')}}" method="POST">
                                    @csrf
                                    <div class="form-group select2">
                                        <label>Employee Name</label>
                                        <div>
                                            <select class="form-control" name="emp_id">
                                                <option>Select</option>
                                                @foreach ($employees as $employee)
                                                    <option value="{{$employee->id}}">{{$employee->name}}</option> 
                                                @endforeach                                   
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>Month View</label>
                                        <input type="text" class="form-control" name="month" value="{{$advances->month}}" data-provide="datepicker" data-date-format="MM" data-date-min-view-mode="1" required>
                                    </div>                    
                                    <div class="footer-btn">
                                        <a href="{{route('adv-salaries.index')}}" class="btn btn-primary waves-effect waves-light">
                                            <i class="bx bx-smile font-size-16 align-middle mr-2"></i>Back
                                        </a>
                                        <button type="submit" class="btn btn-success waves-effect waves-light">
                                        <i class="bx bx-check-double font-size-16 align-middle mr-2"></i>Data Save
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Amount</label>
                                        <div>
                                            <input class="form-control" type="number" value="{{$advances->amount}}" name="amount" id="amount" required>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label>Year View</label>
                                        <input type="text" class="form-control" value="{{$advances->year}}" name="year" data-date-format="yyyy" data-provide="datepicker" data-date-min-view-mode="2" required>
                                    </div>                                                
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')

@endpush