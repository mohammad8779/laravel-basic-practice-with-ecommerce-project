@extends('frontend.admin.dashboard')

@section('admin-content')
<div class="box round first grid">
    <h2>Add New Category</h2>
    <div class="block copyblock"> 
        <h3 style='color:green'>
            <?php
            echo Session::get('message');
            Session::put('message', '');
            ?>
        </h3>
        {!! Form::open(['url' => '/savecategory', 'method' => 'post']) !!}
        <table class="form">					
            <tr>
                <td>Category Name:</td>
                <td>
                    <input type="text" name='cat_name' placeholder="Enter Category Name..." class="medium" />

                    
                </td>


            </tr>

            <tr>
                <td>Category Description:</td>
                <td>
                    <textarea name="cat_description"id="editor" class="editor"> </textarea>
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
                    <select name='cat_status'> 
                        <option>Category Status </option>
                        <option value='1'>Published</option>
                        <option value='0'>Unpublished</option>
                    </select>
                </td>
            </tr>

            <tr> 
                <td></td>
                <td>
                    <input type="submit" name="submit" Value="Add Category" />
                </td>
            </tr>
        </table>
        {!! Form::close() !!}
        @include('frontend.admin.error.errors')


    </div>
</div>
@endsection
