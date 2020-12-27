@extends('layouts.app')
@section('content')

<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Add Expense</h4>
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
                    <a href="{{route('today.expenses')}}" class="btn btn-sm btn-primary" style="margin-bottom: 10px">Today's Expense</a>
                    <a href="{{route('expenses.create')}}" class="btn btn-sm btn-info" style="margin-bottom: 10px">This Month</a>
                </div>
            </div>
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
                           <div class="col-md-7">
                            <form action="{{route('expenses.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Amount</label>
                                    <div>
                                        <input class="form-control" type="number" name="amount" id="amount" required>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label>Expense Note</label>
                                    <textarea id="textarea" class="form-control" name="note" maxlength="225" rows="3" placeholder="Type here something.."></textarea>
                                </div> 
                                <div class="form-group mb-4">
                                    <label>Month</label>
                                    <input type="text" class="form-control" name="month" data-provide="datepicker" data-date-format="MM" data-date-min-view-mode="1" required>
                                </div>
                                <div class="form-group">
                                    <label>Year View</label>
                                    <input type="text" class="form-control" name="year" data-date-format="yyyy" data-provide="datepicker" data-date-min-view-mode="2" required>
                                </div>
                             
                                <div class="form-group mb-4">
                                    <label>Date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="date" placeholder="mm/dd/yyyy" data-provide="datepicker" data-date-autoclose="true">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                        </div>
                                    </div>
                                    <!-- input-group -->
                                </div>                          
                                <div class="form-group mb-0">
                                    <div>
                                        <a href="{{route('expenses.index')}}" class="btn btn-primary waves-effect waves-light">
                                            <i class="bx bx-smile font-size-16 align-middle mr-2"></i>Back
                                        </a>
                                        <button type="submit" class="btn btn-success waves-effect waves-light">
                                        <i class="bx bx-check-double font-size-16 align-middle mr-2"></i>Data Save
                                        </button>
                                    </div>
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

@endsection

@push('js')

@endpush