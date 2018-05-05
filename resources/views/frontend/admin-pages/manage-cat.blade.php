@extends('frontend.admin.dashboard')
@section('admin-content')
<div class="box round first grid">
    <h2>Category List</h2>
    <div class="block">        
        <table class="data display datatable" id="example">
            <thead>
                <tr>
                    <th width="10%">Serial No.</th>
                    <th width="30%">Category Name</th>
                    <th width="30%">Category Status</th>
                    <th width="30%">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($allcategory as $catValue) { ?>
                    <tr class="odd gradeX">
                        <td>{{$catValue->id}}</td>
                        <td>{{$catValue->cat_name}}</td>

                        <td>
                            <?php
                            if ($catValue->cat_status == 1) {
                                ?>
                                <span class="btn-success">published</span>
                                <?php
                            } elseif ($catValue->cat_status == 0) {
                                ?>
                                <span class="btn-danger">unpublished</span>
                            <?php } ?>  
                        </td>
                        <td>
                            <?php
                            if ($catValue->cat_status == 1) {
                                ?>    
                            <a href="{{URL::to('/unpublished_cat/'.$catValue->id)}}" style="text-decoration:none" class="btn-danger">
                                    <span class="glyphicon glyphicon-thumbs-down"></span>
                                </a>

                                <?php
                            } elseif ($catValue->cat_status == 0) {
                                ?>
                                <a href="{{URL::to('/published_cat/'.$catValue->id)}}" style="text-decoration:none" class="btn-success">
                                    <span class="glyphicon glyphicon-thumbs-up"></span>
                                </a>

                                <?php
                            }
                            ?>
                            <a href="{{URL::to('/edit_cat/'.$catValue->id)}}" style="text-decoration:none" class="btn-info">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>

                            <a href="{{URL::to('/delete_cat/'.$catValue->id)}}" onclick = "return confirm('Are you sure to delete!')" style="text-decoration:none" class="btn-danger">
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