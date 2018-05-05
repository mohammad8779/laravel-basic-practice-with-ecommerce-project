@extends('frontend.admin.dashboard')
@section('admin-content')
<div class="box round first grid">
    <h2>Add New Product</h2>
    <h2 style="color:green">
        {{Session::get('msg')}}
    </h2>
    <div class="block">    
        {!! Form::open(['url' => '/save_product','method' =>'POST',  'enctype' => 'multipart/form-data', 'class' => 'form-horizontal',]) !!}
        
            <table class="form">

                <tr>
                    <td>
                        <label>Product Name:</label>
                    </td>
                    <td>
                        <input name="product_name" type="text" placeholder="Enter Post Title..." class="medium" />
                    </td>
                </tr>
                <!---
                <tr>
                    <td>
                        <label>Product Category:</label>
                    </td>
                    <td>
                        <select name="cat_id">
                            <option>Select Cat </option>
                            
                            
                             <option></option>
                            
                        </selet>
                    </td>
                </tr>

               --->

                <tr>
                    <td>
                        <label>Product Price:</label>
                    </td>
                    <td>
                        <input name="product_price" type="number"  />
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label>Product Quantity:</label>
                    </td>
                    <td>
                        <input name="product_quantity" type="number"  />
                    </td>
                </tr>
                
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Product Description:</label>
                    </td>
                    <td>
                        <textarea name="product_description" class="tinymce"></textarea>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label>Upload Image:</label>
                    </td>
                    <td>
                        <input name="product_picture"  type="file" />
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label>Product Category:</label>
                    </td>
                    <td>
                        <select name="product_status">
                            <option>Select Status </option>
                            <option value="1">published</option>
                            <option value="0">unpublished</option>
                            
                        </selet>
                    </td>
                </tr>
                
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Add Product" />
                    </td>
                </tr>
            </table>
        
        {!! Form::close() !!}
    </div>
</div>
@endsection

