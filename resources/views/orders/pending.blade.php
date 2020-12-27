@extends('layouts.app')

@section('content')

<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">All Pending Orders</h4>
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
                        <table id="datatable" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>QTY</th>
                                    <th>Total</th>
                                    <th>Payment</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pending as $row)                                   
                                <tr>
                                    <td>{{$loop->index+1}}</td>                                
                                    <td>{{$row->name}}</td>                                
                                    <td>{{$row->order_date}}</td>                                
                                    <td>{{$row->total_products}}</td>                                
                                    <td>{{$row->grand_total}}</td>                   
                                    <td>{{$row->payment_status}}</td>                   
                                    <td>
                                        <span class="badge badge-soft-warning font-size-12">{{$row->order_status}}</span>
                                    </td>                   
                                    <td>
                                        {{-- <a href="{{route('customers.edit',$row->id)}}" class="text-success"><i class="dripicons-document-edit"></i></a> --}}
                                        <a href="{{route('show.orders',$row->id)}}" class="btn btn-sm btn-info"><i class="dripicons-preview"></i></a>

                                        {{-- <a class="text-danger" style="cursor: pointer" onclick="deleteCus
                                        ({{$row->id}})"><i class="dripicons-trash"></i></a>

                                        <form id="delete-form-{{$row->id}}"
                                            action="{{route('customers.destroy',$row->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form> --}}
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
    function deleteCus(id) {
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
                    // swal("Your imaginary file is safe!");
                }
            });
    }
</script>
@endpush