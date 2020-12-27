@extends('layouts.app')
@section('content')

<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Add Employee</h4>
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
                                <form action="{{route('employees.update',$employee->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input class="form-control" type="text" value="{{$employee->name}}" id="name" name="name"  required>
                                </div>
                                <div class="form-group">
                                    <label>E-Mail</label>
                                    <div>
                                        <input class="form-control" value="{{$employee->email}}" type="email" id="email" name="email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <div>
                                        <input class="form-control" value="{{$employee->phone}}" type="number" name="phone" id="phone" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>NID No.</label>
                                    <div> 
                                         <input class="form-control" value="{{$employee->nid_no}}" type="number" name="nid_no" id="nid_no" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Selary</label>
                                    <div>
                                        <input class="form-control" value="{{$employee->salary}}" type="number" name="salary" id="salary" required>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label>Photo</label>
                                    <div>
                                        <input accept="image/*" onchange="loadFile(event)" class="form-control" type="file" name="photo" id="photo">
                                        <img height="100" width="100" id="output"/>
                                    </div>
                                </div>

                               <div class="footer-btn">
                                    <a href="{{route('employees.index')}}" class="btn btn-primary waves-effect waves-light">
                                        <i class="bx bx-smile font-size-16 align-middle mr-2"></i>Back
                                    </a>
                                    <button type="submit" class="btn btn-success waves-effect waves-light">
                                    <i class="bx bx-check-double font-size-16 align-middle mr-2"></i>Data Update
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Experience</label>
                                   <input class="form-control" value="{{$employee->experience}}" type="text" name="experience" id="experience">
                                </div>
                             
                                <div class="form-group">
                                    <label>City</label>
                                    <div>
                                         <input class="form-control" value="{{$employee->city}}" type="text" name="city" id="city" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Vacation</label>
                                    <div>
                                        <input class="form-control" value="{{$employee->vacation}}" type="text" name="vacation" id="vacation" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <div>
                                        <textarea name="address" id="address" class="form-control" rows="5" required>{{$employee->address}}"</textarea>
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
    <script>
        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function(){
            var output = document.getElementById('output');
            output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>

@endpush