@extends('layouts.app')
@section('bredcrump')
<li>
    <div class="page-title-box">
        <h4 class="page-title">Home </h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="">Coupon</a></li>
        </ol>
    </div>
</li>
@endsection
@section('content')
<div class="container">
    <div class="row ">
 
       <div class="col-lg-12 m-auto">
        <div class="card">
            <div class="card-header">My Order</div>
            <div class="card-body">
                {{-- @foreach ($order_summaries as $order_summary ) --}}
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>User Name</td>
                                <td>{{$order_summaries->relation_users->name}}
                                
                                </td>
                            </tr>
                            <tr>
                                <td>Cart Total</td>
                                <td>{{$order_summaries->cart_total}}</td>
                            </tr>
                            <tr>
                                <td>Coupon name</td>
                                <td>{{($order_summaries->coupon_name)? $order_summaries->coupon_name: 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td>Discount Total</td>
                                <td>{{$order_summaries->discount_total}}</td>
                            </tr>
                            <tr>
                                <td>Sub Total</td>
                                <td>{{$order_summaries->sub_total}}</td>
                            </tr>
                            <tr>
                                <td>Grand Total</td>
                                <td>{{$order_summaries->grand_total}}</td>
                            </tr>
                            <tr>
                                <td>Shipping</td>
                                <td>{{$order_summaries->shipping}}</td>
                            </tr>
                            <tr>
                                <td>Payment Option</td>
                                <td>
                                    @if ($order_summaries->payment_option == 1)
                                        COD
                                    @else
                                        Online Payment
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Payment Status</td>
                                <td>
                                    @if ($order_summaries->payment_status == 1)
                                      <span class="badge badge-primary">  Paid  </span>
                                    @else
                                      <span class="badge badge-danger">    Not paid yet  </span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Created at</td>
                                <td>{{$order_summaries->created_at}}</td>
                            </tr>
                        </tbody>
                        
                    </table>
                    
                            @foreach ($order_details as $order_detail) 
                               <div class="card">
                                   <div class="card-body ">
                                       <table class="table table-bordered">
                                        <tbody>
                                            {{-- <tr>
                                                <td>Order Summary Id</td>
                                                <td>{{$order_detail->order_summary_id}}</td>
                                            </tr> --}}
                                            <tr>
                                                <td>Vendor Name</td>
                                                <td>{{$order_detail->relation_user->name}}<br>
                                                <a href="callto:{{$order_detail->relation_user->phone}}">Call the vendor</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Product Name</td>
                                                <td>{{$order_detail->relation_product->name}}</td>
                                            </tr>
                                            <tr>
                                                <td>Product Photo</td>
                                                <td>
                                                    <img class="w-25" src="{{asset('uploads/product/')}}\{{$order_detail->relation_product->product_img}}" alt="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Amount</td>
                                                <td>{{$order_detail->amount}}</td>
                                            </tr>
                                        </tbody>
                                       </table>
                                       <div class="row">
                                         <div class="col-12">
                                            @if ($order_summaries->delivered_status == 1)
                                            {{-- @if (!$rating) --}}
                                              <form action="{{route('rating',$order_detail->id)}}" method="POST">
                                                @csrf
                                                <div class="mt-3">
                                                    <label for="" class="form-label">Review</label>
                                                    <textarea name="review" id=""  rows="5" class="form-control"></textarea>
                                                </div>
                                               </div>
                                               <div>
{{--                                             
                                                <div id="half-stars-example">
                                                    <div class="rating-group">
                                                        <input class="rating__input rating__input--none" checked name="rating2" id="rating2-0" value="0" type="radio">
                                                        <label aria-label="0 stars" class="rating__label" for="rating2-0">&nbsp;</label>
                                                        <label aria-label="0.5 stars" class="rating__label rating__label--half" for="rating2-05"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                                        <input class="rating__input" name="rating2" id="rating2-05" value="0.5" type="radio">
                                                        <label aria-label="1 star" class="rating__label" for="rating2-10"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                        <input class="rating__input" name="rating2" id="rating2-10" value="1" type="radio">
                                                        <label aria-label="1.5 stars" class="rating__label rating__label--half" for="rating2-15"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                                        <input class="rating__input" name="rating2" id="rating2-15" value="1.5" type="radio">
                                                        <label aria-label="2 stars" class="rating__label" for="rating2-20"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                        <input class="rating__input" name="rating2" id="rating2-20" value="2" type="radio">
                                                        <label aria-label="2.5 stars" class="rating__label rating__label--half" for="rating2-25"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                                        <input class="rating__input" name="rating2" id="rating2-25" value="2.5" type="radio" checked>
                                                        <label aria-label="3 stars" class="rating__label" for="rating2-30"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                        <input class="rating__input" name="rating2" id="rating2-30" value="3" type="radio">
                                                        <label aria-label="3.5 stars" class="rating__label rating__label--half" for="rating2-35"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                                        <input class="rating__input" name="rating2" id="rating2-35" value="3.5" type="radio">
                                                        <label aria-label="4 stars" class="rating__label" for="rating2-40"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                        <input class="rating__input" name="rating2" id="rating2-40" value="4" type="radio">
                                                        <label aria-label="4.5 stars" class="rating__label rating__label--half" for="rating2-45"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                                        <input class="rating__input" name="rating2" id="rating2-45" value="4.5" type="radio">
                                                        <label aria-label="5 stars" class="rating__label" for="rating2-50"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                        <input class="rating__input" name="rating2" id="rating2-50" value="5" type="radio">
                                                    </div>
                                                  <p class="desc" style="margin-bottom: 2rem; font-family: sans-serif; font-size:0.9rem">Half stars<br/>
                                                    Space on left side to select 0 stars</p>
                                                </div> --}}
                                                <div id="full-stars-example-two">
                                                    <div class="rating-group">
                                                        <input disabled checked class="rating__input rating__input--none" name="rating3" id="rating3-none" value="0" type="radio">
                                                        <label aria-label="1 star" class="rating__label" for="rating3-1{{$order_detail->id}}"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                        <input class="rating__input" name="rating3" id="rating3-1{{$order_detail->id}}" value="1" type="radio">
                                                        <label aria-label="2 stars" class="rating__label" for="rating3-2{{$order_detail->id}}"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                        <input class="rating__input" name="rating3" id="rating3-2{{$order_detail->id}}" value="2" type="radio">
                                                        <label aria-label="3 stars" class="rating__label" for="rating3-3{{$order_detail->id}}"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                        <input class="rating__input" name="rating3" id="rating3-3{{$order_detail->id}}" value="3" type="radio">
                                                        <label aria-label="4 stars" class="rating__label" for="rating3-4{{$order_detail->id}}"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                        <input class="rating__input" name="rating3" id="rating3-4{{$order_detail->id}}" value="4" type="radio">
                                                        <label aria-label="5 stars" class="rating__label" for="rating3-5{{$order_detail->id}}"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                        <input class="rating__input" name="rating3" id="rating3-5{{$order_detail->id}}" value="5" type="radio">
                                                    </div>
                                                  <p class="desc" style="font-family: sans-serif; font-size:0.9rem">Full stars<br/>
                                                    Must select a star value</p>
                                                </div>
                                              
                                                 <div class="mt-2">
                                                    <button class="btn btn-primary">Submint</button>
                                                 </div>
                                              </form>
                                                                                                
                                              {{-- @endif --}}
                                            @endif
                                         </div>
                                       </div>
                                   </div>
                               </div>
                            @endforeach
                {{-- @endforeach --}}
            </div>
        </div>
       </div>
    </div>
</div>
<style>
    /*  
 *  Pure CSS star rating that works without reversing order
 *  of inputs
 *  -------------------------------------------------------
 *  NOTE: For the styling to work, there needs to be a radio
 *        input selected by default. There also needs to be a
 *        radio input before the first star, regardless of
 *        whether you offer a 'no rating' or 0 stars option
 *  
 *  This codepen uses FontAwesome icons
 */

#full-stars-example {

/* use display:inline-flex to prevent whitespace issues. alternatively, you can put all the children of .rating-group on a single line */
.rating-group {
  display: inline-flex;
}

/* make hover effect work properly in IE */
.rating__icon {
  pointer-events: none;
}

/* hide radio inputs */
.rating__input {
 position: absolute !important;
 left: -9999px !important;
}

/* set icon padding and size */
.rating__label {
  cursor: pointer;
  padding: 0 0.1em;
  font-size: 2rem;
}

/* set default star color */
.rating__icon--star {
  color: orange;
}

/* set color of none icon when unchecked */
.rating__icon--none {
  color: #eee;
}

/* if none icon is checked, make it red */
.rating__input--none:checked + .rating__label .rating__icon--none {
  color: red;
}

/* if any input is checked, make its following siblings grey */
.rating__input:checked ~ .rating__label .rating__icon--star {
  color: #ddd;
}

/* make all stars orange on rating group hover */
.rating-group:hover .rating__label .rating__icon--star {
  color: orange;
}

/* make hovered input's following siblings grey on hover */
.rating__input:hover ~ .rating__label .rating__icon--star {
  color: #ddd;
}

/* make none icon grey on rating group hover */
.rating-group:hover .rating__input--none:not(:hover) + .rating__label .rating__icon--none {
   color: #eee;
}

/* make none icon red on hover */
.rating__input--none:hover + .rating__label .rating__icon--none {
  color: red;
}
}

#half-stars-example {

/* use display:inline-flex to prevent whitespace issues. alternatively, you can put all the children of .rating-group on a single line */
.rating-group {
  display: inline-flex;
}

/* make hover effect work properly in IE */
.rating__icon {
  pointer-events: none;
}

/* hide radio inputs */
.rating__input {
 position: absolute !important;
 left: -9999px !important;
}

/* set icon padding and size */
.rating__label {
  cursor: pointer;
  /* if you change the left/right padding, update the margin-right property of .rating__label--half as well. */
  padding: 0 0.1em;
  font-size: 2rem;
}

/* add padding and positioning to half star labels */
.rating__label--half {
  padding-right: 0;
  margin-right: -0.6em;
  z-index: 2;
}

/* set default star color */
.rating__icon--star {
  color: orange;
}

/* set color of none icon when unchecked */
.rating__icon--none {
  color: #eee;
}

/* if none icon is checked, make it red */
.rating__input--none:checked + .rating__label .rating__icon--none {
  color: red;
}

/* if any input is checked, make its following siblings grey */
.rating__input:checked ~ .rating__label .rating__icon--star {
  color: #ddd;
}

/* make all stars orange on rating group hover */
.rating-group:hover .rating__label .rating__icon--star,
.rating-group:hover .rating__label--half .rating__icon--star {
  color: orange;
}

/* make hovered input's following siblings grey on hover */
.rating__input:hover ~ .rating__label .rating__icon--star,
.rating__input:hover ~ .rating__label--half .rating__icon--star {
  color: #ddd;
}

/* make none icon grey on rating group hover */
.rating-group:hover .rating__input--none:not(:hover) + .rating__label .rating__icon--none {
   color: #eee;
}

/* make none icon red on hover */
.rating__input--none:hover + .rating__label .rating__icon--none {
  color: red;
}
}

#full-stars-example-two {

/* use display:inline-flex to prevent whitespace issues. alternatively, you can put all the children of .rating-group on a single line */
.rating-group {
  display: inline-flex;
}

/* make hover effect work properly in IE */
.rating__icon {
  pointer-events: none;
}

/* hide radio inputs */
.rating__input {
 position: absolute !important;
 left: -9999px !important;
}

/* hide 'none' input from screenreaders */
.rating__input--none {
  display: none
}

/* set icon padding and size */
.rating__label {
  cursor: pointer;
  padding: 0 0.1em;
  font-size: 2rem;
}

/* set default star color */
.rating__icon--star {
  color: orange;
}

/* if any input is checked, make its following siblings grey */
.rating__input:checked ~ .rating__label .rating__icon--star {
  color: #ddd;
}

/* make all stars orange on rating group hover */
.rating-group:hover .rating__label .rating__icon--star {
  color: orange;
}

/* make hovered input's following siblings grey on hover */
.rating__input:hover ~ .rating__label .rating__icon--star {
  color: #ddd;
}
}


body {
padding: 1rem;
text-align: center;
}

</style>
@endsection
@section('footer_script')
<script>

</script>


@endsection


