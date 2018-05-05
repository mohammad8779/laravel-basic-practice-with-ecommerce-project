@extends('frontend.admin.dashboard')
@section('admin-content')
<div class="box round first grid">
    <h2>Category List</h2>
    <div class="block">        
        <table class="data display datatable" id="example">
            <thead>
                <tr>
                    <th width="10%">Serial No.</th>
                    <th width="30%">Manufacturer Name</th>
                    <th width="30%">Manufacturer Status</th>
                    <th width="30%">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($allmanufacturer as $manufacturerValue) { ?>
                    <tr class="odd gradeX">
                        <td>{{$manufacturerValue->manufacturer_id}}</td>
                        <td>{{$manufacturerValue->manufacturer_name}}</td>

                        <td>
                            <?php
                            if ($manufacturerValue->manufacturer_status  == 1) {
                                ?>
                                <span class="btn-success">published</span>
                                <?php
                            } elseif ($manufacturerValue->manufacturer_status  == 0) {
                                ?>
                                <span class="btn-danger">unpublished</span>
                            <?php } ?>  
                        </td>
                        <td>
                            <?php
                            if ($manufacturerValue->manufacturer_status == 1) {
                                ?>    
                                <a href="{{URL::to('/unpublished_manufacturer/'.$manufacturerValue->manufacturer_id)}}" style="text-decoration:none" class="btn-danger">
                                    <span class="glyphicon glyphicon-thumbs-down"></span>
                                </a>

                                <?php
                            } elseif ($manufacturerValue->manufacturer_status == 0) {
                                ?>
                                <a href="{{URL::to('/published_manufacturer/'.$manufacturerValue->manufacturer_id)}}" style="text-decoration:none" class="btn-success">
                                    <span class="glyphicon glyphicon-thumbs-up"></span>
                                </a>

                                <?php
                            }
                            ?>
                            <a href="{{URL::to('/edit_manufacturer/'.$manufacturerValue->manufacturer_id)}}" style="text-decoration:none" class="btn-info">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>

                            <a href="{{URL::to('/delete_manufacturer/'.$manufacturerValue->manufacturer_id)}}" onclick = "return confirm('Are you sure to delete manufacturer!')" style="text-decoration:none" class="btn-danger">
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