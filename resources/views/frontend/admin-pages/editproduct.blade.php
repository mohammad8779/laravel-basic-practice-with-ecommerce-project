@extends('frontend.admin.dashboard')
@section('admin-content')
<div class="box round first grid">
    <h2>Update Product</h2>
     
   
    <div class="block">    
        {!! Form::open(['url' => '/update_product','method' =>'POST', 'name'=>'editForm','enctype' => 'multipart/form-data', 'class' => 'form-horizontal',]) !!}
        
            <table class="form">

                <tr>
                    <td>
                        <label>Product Name:</label>
                    </td>
                    <td>
                        <input value="{{$product_info->product_name}}" name="product_name" type="text" placeholder="Enter Post Title..." class="medium" />
                        <input type="hidden" name='id' value="{{$product_info->id}}"/>
                    </td>
                </tr>
                <!--------
                <tr>
                    <td>
                        <label>Product Category:</label>
                    </td>
                    <td>
                        <select name="cat_id">
                            <option>Select Cat </option>
                            
                             
                               <option value="1"></option>
                            
                        </selet>
                    </td>
                </tr>

               ------>

                <tr>
                    <td>
                        <label>Product Price:</label>
                    </td>
                    <td>
                        <input value="{{$product_info->product_price}}" name="product_price" type="number"  />
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label>Product Quantity:</label>
                    </td>
                    <td>
                        <input value="{{$product_info->product_quantity}}" name="product_quantity" type="number"  />
                    </td>
                </tr>
                
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Product Description:</label>
                    </td>
                    <td>
                        <textarea name="product_description" class="tinymce">{{$product_info->product_description}}</textarea>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label>Upload Image:</label>
                    </td>
                    <td>
                        <input name="product_picture"  type="file" />
                        <img src="{{asset($product_info->product_picture)}}" width="100px">
                    </td>
                </tr> 
                
                
                <tr>
                    <td>
                        <label>Product Status:</label>
                    </td>
                    <td>
                        <select id="product_status" name="product_status">
                            <option>Select Status </option>
                            <option value="1">published</option>
                            <option value="0">unpublished</option>
                            
                        </selet>
                    </td>
                </tr> 
                
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="update Product" />
                    </td>
                </tr>
            </table>
        
        {!! Form::close() !!}
        <script>
            document.forms['editForm''].elements['product_status'].value="{{$product_info->product_status}}"
        </script>
    </div>
</div>
@endsection


