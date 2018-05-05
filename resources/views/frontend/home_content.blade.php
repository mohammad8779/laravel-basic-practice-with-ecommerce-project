@extends('frontend.layouts.master')

@section('title')
Home
@endsection

@section('cat-slider')
<div class="header_slide">
    <div class="header_bottom_left">				
        <div class="categories">
            <ul>
                <h3>Categories</h3>
                <?php
                $list_of_published_cat = DB::table('categories')
                        ->select('*')
                        ->where('cat_status', 1)
                        ->get();
                foreach ($list_of_published_cat as $catValue) {
                    ?>
                    <li><a href="#">{{$catValue->cat_name}}</a></li>
                <?php } ?>
            </ul>
        </div>					
    </div>
    <div class="header_bottom_right">					 
        <div class="slider">					     
            <div id="slider">
                <div id="mover">
                    <div id="slide-1" class="slide">			                    
                        <div class="slider-img">
                            <a href="{{URL('/preview')}}"><img src="{{asset('public/frontend/')}}/images/slide-1-image.png" alt="learn more" /></a>									    
                        </div>
                        <div class="slider-text">
                            <h1>Clearance<br><span>SALE</span></h1>
                            <h2>UPTo 20% OFF</h2>
                            <div class="features_list">
                                <h4>Get to Know More About Our Memorable Services Lorem Ipsum is simply dummy text</h4>							               
                            </div>
                            <a href="{{URL('/preview')}}" class="button">Shop Now</a>
                        </div>			               
                        <div class="clear"></div>				
                    </div>	
                    <div class="slide">
                        <div class="slider-text">
                            <h1>Clearance<br><span>SALE</span></h1>
                            <h2>UPTo 40% OFF</h2>
                            <div class="features_list">
                                <h4>Get to Know More About Our Memorable Services</h4>							               
                            </div>
                            <a href="{{URL('/preview')}}" class="button">Shop Now</a>
                        </div>		
                        <div class="slider-img">
                            <a href="{{URL('/preview')}}"><img src="{{asset('public/frontend/')}}/images/slide-3-image.jpg" alt="learn more" /></a>
                        </div>						             					                 
                        <div class="clear"></div>				
                    </div>
                    <div class="slide">						             	
                        <div class="slider-img">
                            <a href="{{URL('/preview')}}"><img src="{{asset('public/frontend/')}}/images/slide-2-image.jpg" alt="learn more" /></a>
                        </div>
                        <div class="slider-text">
                            <h1>Clearance<br><span>SALE</span></h1>
                            <h2>UPTo 10% OFF</h2>
                            <div class="features_list">
                                <h4>Get to Know More About Our Memorable Services Lorem Ipsum is simply dummy text</h4>							               
                            </div>
                            <a href="{{URL('/preview')}}" class="button">Shop Now</a>
                        </div>	
                        <div class="clear"></div>				
                    </div>												
                </div>		
            </div>
            <div class="clear"></div>					       
        </div>
    </div>
    <div class="clear"></div>
</div>
@endsection

@section('content')
<div class="main">
    <div class="content">
        <div class="content_top">
            <div class="heading">
                <h3>New Products</h3>
            </div>
            <div class="see">
                <p><a href="#">See all Products</a></p>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php
            $product_info = DB::table('tbl_products')
                    ->select('*')
                    ->get();
            foreach ($product_info as $productValue) {
                ?>
                <div class="grid_1_of_4 images_1_of_4">
                    <a href="{{URL('/preview')}}"><img src="{{$productValue->product_picture}}" alt="" /></a>
                    <h2>{{$productValue->product_name}}</h2>
                    <div class="price-details">
                        <div class="price-number">
                            <p><span class="rupees">${{$productValue->product_price}}</span></p>
                        </div>
                        <div class="add-cart">	
                            {!! Form::open(['url' => '/add-to-cart','method'=>'post']) !!}
                            <input type="hidden" name="id" value="{{$productValue->id}}">
                             <input type="hidden" name="product_quantity" value="1">
                              <h4><button type="submit" class="btn btn-success btn-block">Add to Cart</button></h4>
                            {!! Form::close() !!}
                        </div>
                        <div class="clear"></div>
                    </div>

                </div>
            <?php } ?>        



        </div>
        <div class="content_bottom">
            <div class="heading">
                <h3>Feature Products</h3>
            </div>
            <div class="see">
                <p><a href="#">See all Products</a></p>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">

                <?php
            $product_info = DB::table('tbl_products')
                    ->select('*')
                    ->get();
            foreach ($product_info as $productValue) {
                ?>
                <div class="grid_1_of_4 images_1_of_4">
                    <a href="{{URL('/preview')}}"><img src="{{$productValue->product_picture}}" alt="" /></a>
                    <h2>{{$productValue->product_name}}</h2>
                    <div class="price-details">
                        <div class="price-number">
                            <p><span class="rupees">${{$productValue->product_price}}</span></p>
                        </div>
                        <div class="add-cart">								
                            <h4><a href="{{URL('/preview')}}">Add to Cart</a></h4>
                        </div>
                        <div class="clear"></div>
                    </div>

                </div>
            <?php } ?> 
             

        </div>
    </div>
</div>
@endsection