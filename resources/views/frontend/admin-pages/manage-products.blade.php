@extends('frontend.admin.dashboard')
@section('admin-content')
<div class="box round first grid">
    <h2>Product List</h2>
     <h3 style="color:green">{{Session::get('msg')}}</h3>
      
    <div class="block">        
        <table class="data display datatable" id="example">
            <thead>
                <tr>
                    <th width="10%">Serial No.</th>
                    <th width="15%">Product Name</th>
                    <th width="10%">Product Price</th>
                    <th width="15%">Product Quantity</th>
                    <th width="20%">Product Picture</th>
                    <th width="10%">Product Status</th>
                    <th width="20%">Action</th>

                </tr>
            </thead>
            <tbody>

                <?php foreach ($allproducts as $productValue) { ?>
                    <tr class="odd gradeX">
                        <td>{{$productValue->id}}</td>
                        <td>{{$productValue->product_name}}</td>
                        <td>{{$productValue->product_price}}</td>
                        <td>{{$productValue->product_quantity}}</td>
                        <td> <img src="{{asset($productValue->product_picture)}}" witdth="40px" height="20px"></td>
                        <td>
                            <?php
                            if ($productValue->product_status == 1) {
                                ?>
                                <span class="btn-success">published</span>
                                <?php
                            } elseif ($productValue->product_status == 0) {
                                ?>
                                <span class="btn-danger">unpublished</span>
                            <?php } ?>  
                        </td>
                        
                        <td>
                            <?php
                            if ($productValue->product_status == 1) {
                                ?>    
                                <a href="{{URL::to('/unpublished_product/'.$productValue->id)}}" style="text-decoration:none" class="btn-danger">
                                    <span class="glyphicon glyphicon-thumbs-down"></span>
                                </a>

                                <?php
                            } elseif ($productValue->product_status == 0) {
                                ?>
                                <a href="{{URL::to('/published_product/'.$productValue->id)}}" style="text-decoration:none" class="btn-success">
                                    <span class="glyphicon glyphicon-thumbs-up"></span>
                                </a>

                                <?php
                            }
                            ?>
                            <a href="{{URL::to('/edit_product/'.$productValue->id)}}" style="text-decoration:none" class="btn-info">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>

                            <a href="{{URL::to('/delete_product/'.$productValue->id)}}" onclick = "return confirm('Are you sure to delete product!')" style="text-decoration:none" class="btn-danger">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>   
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
</div>
@endsection