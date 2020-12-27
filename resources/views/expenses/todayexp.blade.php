@extends('layouts.app')

@section('content')

<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <div class="head-text">
                        <h4 class="page-title mb-0 font-size-18">Today's Expenses</h4>
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
                    <a href="{{route('expenses.create')}}" class="btn btn-sm btn-primary" style="margin-bottom: 10px">Add New</a>
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
                                    <th>Amount</th>
                                    <th>Note</th>    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($todayExp as $row)                                   
                                <tr>                              
                                    <td>{{$row->amount}}</td>                                                 
                                    <td>{{$row->note}}</td>                                                                                                                                               
                                    <td>
                                        <a href="{{route('expenses.edit',$row->id)}}" class="text-success"><i class="dripicons-document-edit"></i></a>
                                    </td>                                
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function deleteSup(id) {
        swal({
            title: "Are you sure?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();

                    swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                    });
                } else {
                    
                }
            });
    }
</script>
@endpush