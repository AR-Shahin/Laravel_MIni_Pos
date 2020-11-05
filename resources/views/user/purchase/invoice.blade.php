@extends('user.invoice_layout')
@section('title', 'Single User Invoice')
@section('user_content')
    <div class="card">
        <div class="card-body">
            <h3>Sales Invoice Details </h3>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <p class="m-0 p-0"><b style="font-size: 16px">Customer</b> : {{ $user->name }} </p>
                    <p class="m-0 p-0"><b style="font-size: 16px">Email</b> : {{ $user->email }}</p>
                    <p class="m-0 p-0"><b style="font-size: 16px">Phone</b> : {{ $user->phone }}</p>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <p class="m-0 p-0"><b style="font-size: 16px">Date</b> : {{ $invoice->date }} </p>
                    <p class="m-0 p-0"><b style="font-size: 16px">Challan No</b> : {{ $invoice->challan_no }} </p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <table class="table table-light table-bordered">
                        <tbody>
                        <tr>
                            <th>SL</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                        @foreach($invoice->items as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->product->title }}</td>
                                <td>${{ $item->price }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>${{ $item->total }}</td>
                                <td>
                                    <form method="POST" action=" {{ route('user.purchase.invoices.delete_item', ['id' => $user->id, 'invoice_id' => $invoice->id ,'item_id'=>$item->id]) }} " style="display:inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tr>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addProduct">
                                    <i class="fa fa-plus"></i> Add Product
                                </button>
                            </td>
                            <td></td>
                            <th colspan="1">Total : </th>
                            <td colspan="2">${{ $payble = $invoice->items->sum('total') }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newPayment">
                                    <i class="fa fa-plus"></i> Add Payments
                                </button>
                            </td>
                            <td></td>
                            <th colspan="1">Paid : </th>
                            <td colspan="2">${{ $paid = $invoice->payments->sum('amount') }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                            </td>
                            <td></td>
                            <th colspan="1">Due : </th>
                            <td colspan="2">${{ $payble - $paid }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- New sale Modal  -->
<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="addProduct" aria-hidden="true">
    <form action="{{ route('user.purchase.invoices.add_item',['id' => $user->id, 'invoice_id' => $invoice->id] )  }}" method="POST">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Add New Product </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="date">Date <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-9">
                                <select name="product_id" id="grp" class="form-control  @error('product_id') is-invalid @enderror" value="">
                                    <option value="">Select Product</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" >{{ ucwords($product->title) }}--[{{$product->price}}]</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="price">Price" <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id = "price" value="{{ old('price')}}" placeholder="Price">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="price">Quantity" <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" id = "quantity" value="{{ old('quantity')}}" placeholder="Quantity">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="price">Total" <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control @error('total') is-invalid @enderror" name="total" id = "total" value="{{ old('total')}}" placeholder="Total">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>


<!-- New Payment Modal  -->
<div class="modal fade" id="newPayment" tabindex="-1" role="dialog" aria-labelledby="newReceipt" aria-hidden="true">
    <form action="{{ route('user.payment.store',[$user->id,$invoice->id])  }}" method="POST">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">New Payment For This Invoice</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="date">Date <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-9">
                                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id = "date" value="{{ old('date')}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="amount">Amount <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" id = "amount" value="{{ old('amount')}}" placeholder="Amount">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="amount">Note <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-9">
                                <textarea name="note" id="" cols="30" rows="3" class="form-control @error('note') is-invalid @enderror"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>