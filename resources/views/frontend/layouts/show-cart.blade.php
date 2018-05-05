@extends('frontend.layouts.master')

@section('content')
<div class="shopping-table">
    <h2>Your Shopping Products</h2><br/><hr/>
    <h3 style="color:green">
        {{Session::get('msg')}}
    </h3>
    
    
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Serial No</th>
                <th>Remove</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Quantity</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>
            <?php 
             $i = 0;
             $total = 0;
            ?>
            @foreach($cartProducts as $cartProduct)
            <tr>
                <td>{{ ++$i }}</td>
                <td><a onclick="return confirm('Are You Sure To Delete Product') " href="{{url('/remov-product/'.$cartProduct->rowId)}}">Remove</a></td>
                <td>{{$cartProduct->name}}</td>
                <td>${{$cartProduct->price}}</td>
                <td>
                    {!! Form::open(['url' => '/update-cart','method'=>'post']) !!}
                    <input type="number" value="{{$cartProduct->qty}}" name="product_quantity" min="1"/>
                    <input type="hidden" value="{{$cartProduct->rowId}}" name="rowId">
                    <input type="submit" value="update">
                    {!! Form::close() !!}
                </td>
                <?php 
                  $subtotal = $cartProduct->qty*$cartProduct->price
                ?>
                <td>{{ $subtotal }}</td>
            </tr>
             <?php 
               $total = $total+$subtotal; 
             ?>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Total Price:</td>
                <td>{{ $total }}</td>
            </tr>
            
        </tbody>
    </table>
</div>
@endsection

