@extends('layouts.app')

@section('content')

<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">All Employees</h4>
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
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Name</th>
                                    <th>Photo</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>NID</th>
                                    <th>Salary</th>
                                    <th>Experience</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)                                   
                                <tr>
                                    <td>{{$loop->index+1}}</td>                                
                                    <td>{{$employee->name}}</td>                                
                                    <td>
                                        <img src="{{url($employee->photo)}}" width="70" height="70">
                                    </td>                                
                                    <td>{{$employee->email}}</td>                                
                                    <td>{{$employee->phone}}</td>                                
                                    <td>{{$employee->nid_no}}</td>                                
                                    <td>{{$employee->salary}}</td>                                
                                    <td>{{$employee->experience}}</td>                                
                                    <td>
                                        <a href="{{route('employees.edit',$employee->id)}}" class="text-success"><i class="dripicons-document-edit"></i></a>

                                        <a href="{{route('employees.show',$employee->id)}}"><i class="dripicons-preview"></i></a>

                                        <a class="text-danger" style="cursor: pointer" onclick="deleteEmp
                                        ({{$employee->id}})"><i class="dripicons-trash"></i></a>
                                        <form id="delete-form-{{$employee->id}}"
                                            action="{{route('employees.destroy',$employee->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
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
    function deleteEmp(id) {
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