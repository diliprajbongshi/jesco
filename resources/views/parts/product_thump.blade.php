<div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up"
data-aos-delay="200">
<!-- Single Prodect -->
<div class="product">
    <div class="thumb">
        <a href="single-product.html" class="image">
            <img src="{{asset('uploads/product/')}}\{{$product->product_img}}" alt="Product" />
        </a>
        <span class="badges">
            <span class="new">New</span>
        </span>
        <div class="actions">
           
            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                @if (wishlishcheck($product->id))
                <i class="fa fa-heart text-danger"></i>
                @else 
                <i class="fa fa-heart-o "></i>
                @endif
            </a>

                  

            {{-- <a href="#" class="action quickview" data-link-action="quickview"
                title="Quick view" data-bs-toggle="modal"
                data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a> --}}
        </div>
        <button title="Add To Cart" class=" add-to-cart">Add
            To Cart</button>
    </div>
    <div class="content">
        <span class="ratings">
            <span class="rating-wrap">
                <span class="star" style="width:   {{how_many_percentage($product->id)}}%"></span>
              
            </span>
            <span class="rating-num">{{how_many_reviews($product->id)}}</span>
        </span>
        <h5 class="title"><a href="{{route('productdetails',$product->slug)}}">Prodcut : {{$product->name}}
            </a>
        </h5>
        <span class="price">
            <span class="new">Price : {{$product->price}}</span>
        </span>
        <span class="price">
            <span class="new">
                Vendor: {{App\Models\User::find($product->vendor_id)->name}}
            </span>
        </span>
    </div>
</div>
</div>