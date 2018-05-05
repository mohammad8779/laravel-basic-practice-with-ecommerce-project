@extends('frontend.admin.dashboard')

@section('admin-content')
<div class="box round first grid">
    <h2>Update Category</h2>
    <div class="block copyblock"> 
       
        {!! Form::open(['url' => '/updatecategory', 'method' => 'post']) !!}
            <table class="form">					
                <tr>
                    <td>Category Name:</td>
                    <td>
                        <input type="text" name='cat_name' value="{{$cat_info->cat_name}}" placeholder="Enter Category Name..." class="medium" />
                        <input type="hidden" name='id' value="{{$cat_info->id}}"/>
                    </td>
                </tr>

                <tr>
                    <td>Category Description:</td>
                    <td>
                        <textarea name="cat_description"id="editor" class="editor">{{$cat_info->cat_description}}</textarea>
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
                        <input type="submit" name="submit" Value="Update Category" />
                    </td>
                </tr>
            </table>
        {!! Form::close() !!}
    </div>
</div>
@endsection
