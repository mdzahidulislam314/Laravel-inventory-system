@extends('layouts.app')
@section('content')

<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Edit Category</h4>
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
                           <div class="col-md-7">
                            <form action="{{route('categories.update',$category->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <div>
                                    <input type="text" class="form-control" value="{{$category->name}}" name="name" required>
                                    </div>
                                </div>                            
                                <div class="form-group mb-0">
                                    <div>
                                        <a href="{{route('categories.index')}}" class="btn btn-primary waves-effect waves-light">
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