@extends('frontend.admin.dashboard')

@section('admin-content')
<div class="box round first grid">
    <h2>Add New Manufacturer</h2>
    <div class="block copyblock"> 
        <h3 style='color:green'>
            <?php
            echo Session::get('message');
            Session::put('message', '');
            ?>
        </h3>
        {!! Form::open(['url' => '/savemanufacturer', 'method' => 'post']) !!}
        <table class="form">					
            <tr>
                <td>Manufacturer Name:</td>
                <td>
                    <input type="text" name='manufacturer_name' placeholder="Enter Manufacturer Name..." class="medium" />
                </td>
            </tr>

            <tr>
                <td>Manufacturer Description:</td>
                <td>
                    <textarea name="manufacturer_description"id="editor" class="editor"> </textarea>
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
                    <select name='manufacturer_status'> 
                        <option>Manufacturer Status </option>
                        <option value='1'>Published</option>
                        <option value='0'>Unpublished</option>
                    </select>
                </td>
            </tr>

            <tr> 
                <td></td>
                <td>
                    <input type="submit" name="submit" Value="Add Manufacturer" />
                </td>
            </tr>
        </table>
        {!! Form::close() !!}
    </div>
</div>
@endsection
