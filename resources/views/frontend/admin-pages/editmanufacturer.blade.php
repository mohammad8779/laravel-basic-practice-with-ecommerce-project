@extends('frontend.admin.dashboard')

@section('admin-content')
<div class="box round first grid">
    <h2>update Manufacturer</h2>
    <div class="block copyblock"> 
        <h3 style='color:green'>
            <?php
            echo Session::get('message');
            Session::put('message', '');
            ?>
        </h3>
        {!! Form::open(['url' => '/updatemanufacturer', 'method' => 'post']) !!}
        <table class="form">					
            <tr>
                <td>Manufacturer Name:</td>
                <td>
                    <input type="text" value="{{$manufacturer_info->manufacturer_name}}" name='manufacturer_name' placeholder="Enter Manufacturer Name..." class="medium" />
                    <input type="hidden" name='manufacturer_id' value="{{$manufacturer_info->manufacturer_id}}"/>
                </td>
            </tr>

            <tr>
                <td>Manufacturer Description:</td>
                <td>
                    <textarea name="manufacturer_description"id="editor" class="editor">{{$manufacturer_info->manufacturer_description}}</textarea>
                </td>
            <script>
                ClassicEditor
                        .create(document.querySelector('#editor'))
                        .then(editor => {
                            console.log(editor);
                        })
                        .catch(error => {
                            console.error(error);
                        });
            </script>
            </tr>



            <tr> 
                <td></td>
                <td>
                    <input type="submit" name="submit" Value="Update Manufacturer" />
                </td>
            </tr>
        </table>
        {!! Form::close() !!}
    </div>
</div>
@endsection


