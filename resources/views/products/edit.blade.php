@extends('layouts.app')
@section('content')

<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Add Product</h4>
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
                                <form action="{{route('products.update',$products->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                <div class="form-group">
                                    <label>Product Name</label>
                                <input class="form-control" type="text" value="{{$products->name}}" id="name" name="name"  required>
                                </div>
                                <div class="form-group">
                                    <label>Product Code</label>
                                    <div>
                                        <input class="form-control" value="{{$products->code}}"  type="code" id="code" name="code" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Supplier</label>
                                    <div>
                                        <select class="form-control" name="sup_id">
                                            <option>Select</option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{$supplier->id}}"
                                                @if ($supplier->id === $products->sup_id)
                                                    selected
                                                @endif    
                                                >{{$supplier->name}}</option> 
                                            @endforeach                                   
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <div>
                                        <select class="form-control" name="cat_id">
                                            <option>Select</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}"
                                                @if ($category->id === $products->cat_id)
                                                    selected
                                                @endif
                                                >{{$category->name}}</option> 
                                            @endforeach                                   
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label>Product Route</label>
                                    <div>
                                        <input class="form-control" value="{{$products->store_route}}" type="text" name="store_route" id="store_route" required>
                                    </div>
                                </div>
                               <div class="footer-btn">
                                    <a href="{{route('products.index')}}" class="btn btn-primary waves-effect waves-light">
                                        <i class="bx bx-smile font-size-16 align-middle mr-2"></i>Back
                                    </a>
                                    <button type="submit" class="btn btn-success waves-effect waves-light">
                                    <i class="bx bx-check-double font-size-16 align-middle mr-2"></i>Data Save
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Store Room</label>
                                    <div>
                                        <input class="form-control" value="{{$products->store_room}}" type="text" name="store_room" id="store_room" required>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label>Buying Date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{$products->buy_date}}" name="buy_date" placeholder="mm/dd/yyyy" data-provide="datepicker" data-date-autoclose="true">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label>Expire Date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{$products->expire_date}}" name="expire_date" placeholder="mm/dd/yyyy" data-provide="datepicker" data-date-autoclose="true">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                   <input class="form-control" accept="image/*" onchange="loadFile(event)" type="file" name="image" id="image">
                                   <img height="100" width="100" id="output"/>
                                <img type="hidden" src="{{url($products->image)}}" height="100" width="100" style="margin-top: 10px; border: 1px solid #585858; border-radius: 12px;"/>
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