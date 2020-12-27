@extends('layouts.app')

@section('content')
<div class="main-content">

    <div class="page-content">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">INVOICE</h4>
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-title">
                            <h4 class="float-right font-size-16">Order # 01</h4>
                            <div class="mb-4">
                                <img src="assets/images/logo-dark.png" alt="logo" height="20" />
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-6">
                                <address>
                                    <strong>Billed To:</strong><br />
                                    <span>Name:</span>{{$customer->name}}<br />
                                    <span>Address:</span>{{$customer->address}}<br />
                                    <span>City:</span>{{$customer->city}}<br />
                                    <span>Phone:</span>{{$customer->number}}<br />
                                </address>
                            </div>
                            <div class="col-6 text-right">
                                <address>
                                    <strong>Shipped To:</strong><br />
                                    Kenny Rigdon<br />
                                    1234 Main<br />
                                    Apt. 4B<br />
                                    Springfield, ST 54321
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mt-3">
                                <address>
                                    <strong>Payment Method:</strong><br />
                                    Visa ending **** 4242<br />
                                    jsmith@email.com
                                </address>
                            </div>
                            <div class="col-6 mt-3 text-right">
                                <address>
                                    <strong>Order Date:</strong><br />
                                    {{date('d/m/y')}}<br />
                                    <br />
                                </address>
                            </div>
                        </div>
                        <div class="py-2 mt-3">
                            <h3 class="font-size-15 font-weight-bold">Order summary</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-nowrap">
                                <thead>
                                    <tr>
                                        <th style="width: 70px;">No.</th>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        <th class="text-right">Unit Price</th>
                                        <th class="text-right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contents as $content)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$content->name}}</td>
                                        <td>{{$content->qty}}</td>
                                        <td class="text-right">{{$content->price}}</td>
                                        <td class="text-right">{{$content->price*$content->qty}}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="4" class="text-right">Sub Total</td>
                                        <td class="text-right">{{Cart::subtotal()}}</td>
                                    </tr>
                                   
                                    <tr>
                                        <td colspan="4" class="border-0 text-right">
                                            <strong>VAT%</strong>
                                        </td>
                                        <td class="border-0 text-right">{{Cart::tax()}}</td>
                                    </tr>
                                  
                                    <tr>
                                        <td colspan="4" class="border-0 text-right">
                                            <strong>Grand Total</strong>
                                        </td>
                                        <td class="border-0 text-right">
                                            <h4 class="m-0">{{Cart::total()}}</h4>
                                        </td>
                                    </tr>
                                  
                                </tbody>
                            </table>
                        </div>
                        <div class="d-print-none">
                            <div class="float-right">
                                <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                <button type="button" class="btn btn-primary w-md waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <form action="{{route('final.invoice')}}" method="POST">
            @csrf
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="myExtraLargeModalLabel">{{Cart::total()}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="field-1" class="control-label">Payment</label>
                                        <select name="payment_status" id="" class="form-control">
                                            <option value="" selected disabled>Select</option>
                                            <option value="HandCash">HandCash</option>
                                            <option value="Online Pay">Online Pay</option>
                                            <option value="Due">Due</option>
                                        </select>                                  
                                    </div>
                                
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="field-2" class="control-label">Pay</label>
                                        <input type="number" class="form-control" name="pay" id="field-2" placeholder="Pay Amount" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="field-1" class="control-label">Due</label>
                                        <input type="number" class="form-control" name="due" id="field-1" placeholder="Due Amount" />
                                    </div>
                                </div>                          
                            </div>
                            <input type="hidden" name="cus_id" value="{{$customer->id}}">
                            <input type="hidden" name="order_date" value="{{date('d/m/y')}}">
                            <input type="hidden" name="order_status" value="pending">
                            <input type="hidden" name="total_products" value="{{Cart::count()}}">
                            <input type="hidden" name="sub_total" value="{{Cart::subtotal()}}">
                            <input type="hidden" name="vat" value="{{Cart::tax()}}">
                            <input type="hidden" name="grand_total" value="{{Cart::total()}}">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

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