@extends('layouts.app')
@section('pos')
d-none
@endsection

@section('content')
<div class="main-content">

    <div class="page-content">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">POS (Point of Sell)</h4>
                    <div class="add-buttn">
                        <a href="{{route('home')}}" class="btn btn-sm btn-primary" style="margin-bottom: 10px">Back Dashboard</a>
                    </div>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">BitPixelBd</a></li>
                            <li class="breadcrumb-item text-danger">{{{date("d/m/yy")}}}</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">           
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Product Cart</h4>
                        <ul class="inbox-wid list-unstyled">
                            <li class="inbox-list-item">
                                <table class="table table-centered">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">QTY</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Sub</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $cartProduts = Cart::content();
                                    @endphp
                                    <tbody>
                                        @foreach ( $cartProduts as $catpro)
                                            
                                        <tr>
                                            <td>{{ $catpro->name}}</td>
                                            <td>
                                            <form action="{{route('cart.update',$catpro->rowId)}}" method="POST">
                                                @csrf
                                                <input type="number" name="qty" value="{{ $catpro->qty}}" style="width:40px">
                                                <button type="submit" class="btn btn-sm btn-success"><i class="mdi mdi-check-bold"></i></button>
                                            </form>
                                            </td>
                                            <td>{{ $catpro->price}}</td>
                                            <td>{{ $catpro->price*$catpro->qty}}</td>
                                            <td>
                                                <a href="{{route('cart.delete',$catpro->rowId)}}">
                                                    <span class="badge badge-soft-danger font-size-12"><i class="mdi mdi-trash-can-outline"></i></span>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                            </li>
                            <li class="inbox-list-item">
                                <a href="#">
                                    <div class="media">
                                        <div class="media-body overflow-hidden">
                                            <h6 class="font-size-16 mb-1">Quantity</h6>
                                        </div>
                                        <div class="font-size-12 ml-2">
                                            <h6>{{Cart::count()}}</h6>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="inbox-list-item">
                                <a href="#">
                                    <div class="media">
                                        <div class="media-body overflow-hidden">
                                            <h6 class="font-size-16 mb-1">Sub Total</h6>
                                        </div>
                                        <div class="font-size-12 ml-2">
                                            <h6>{{Cart::subtotal()}}</h6>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li class="inbox-list-item">
                                <a href="#">
                                    <div class="media">
                                        <div class="media-body overflow-hidden">
                                            <h6 class="font-size-16 mb-1">VAT</h6>
                                        </div>
                                        <div class="font-size-12 ml-2">
                                            <h6>{{Cart::tax()}}</h6>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="inbox-list-item">
                                <a href="#">
                                    <div class="media"  style="background: yellow;" >
                                        <div class="media-body overflow-hidden">
                                            <h5 class="font-size-16 mb-1"><b>Grand Total</b></h5>
                                        </div>
                                        <div class="font-size-12 ml-2">
                                            <h5>{{Cart::total()}} Taka</h5>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <form action="{{route('create.invoice')}}" method="POST">
                            @csrf
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title" style="display:inline-block">All Customer</h4>
                                <button type="button" class="btn btn-sm btn-warning"  data-toggle="modal" data-target=".bs-example-modal-lg" style="float: right;margin-bottom: 10px;">Add New</button>
                                <div class="form-group">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <select class="form-control select2" name="cus_id" required>
                                        <option value="" disabled selected>Select</option>
                                        @foreach ($customers as $customer)                                    
                                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                             {{-- <input type="hidden" name="cus_id" value="{{$customer->id}}"> --}}
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-sm">Create Invoie</button>
                        </div>
                        </form>
                    </div>
                       
                    </div>
                </div>
            </div>
    
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">All products</h4>
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($products as $product)               
                                    <tr>
                                        <form action="{{route('add.cart')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$product->id}}">
                                            <input type="hidden" name="name" value="{{$product->name}}">
                                            <input type="hidden" name="qty" value="1">
                                            <input type="hidden" name="price" value="{{$product->selling_price}}">
                                        <td>
                                            <button type="submit" class="btn btn-sm btn-success"><i class="mdi mdi-plus-thick"></i></button>
                                            <img src="{{url($product->image)}}" height="40" width="60">
                                        </td>
                                            <td>{{$product->name}}({{$product->code}})</td>
                                            <td>{{$product->selling_price}}</td>
                                            <td>{{$product->cat_id}}</td>
                                        </form>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        


        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myExtraLargeModalLabel">Extra large modal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Name</label>
                                    <input type="text" class="form-control" id="field-1" placeholder="John" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Surname</label>
                                    <input type="text" class="form-control" id="field-2" placeholder="Doe" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-3" class="control-label">Address</label>
                                    <input type="text" class="form-control" id="field-3" placeholder="Address" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-4" class="control-label">City</label>
                                    <input type="text" class="form-control" id="field-4" placeholder="Boston" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-5" class="control-label">Country</label>
                                    <input type="text" class="form-control" id="field-5" placeholder="United States" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-6" class="control-label">Zip</label>
                                    <input type="text" class="form-control" id="field-6" placeholder="123456" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group no-margin">
                                    <label for="field-7" class="control-label">Personal Info</label>
                                    <textarea class="form-control autogrow" id="field-7" placeholder="Write something about yourself" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"> </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script> © Qovex.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-right d-none d-sm-block">
                        Design & Develop by Themesbrand
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

@endsection

@push('js')
    
<script src="/admin/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="/admin/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="/admin/assets/libs/jszip/jszip.min.js"></script>
<script src="/admin/assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="/admin/assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="/admin/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="/admin/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="/admin/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

@endpush