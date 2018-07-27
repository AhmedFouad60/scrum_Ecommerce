<div class="trending owl-carousel owl-theme" id="trending-slider">

    @foreach($products as $product)

    <div class="item">

        <div class="product-item">

            <div class="item-image">
                <img class="thumbnail" src="{{$product->image}}" alt="test">
            </div>

            <div class="item-links">
                <a  href="" class="links-item">
                    <i class="fa fa-eye"></i>
                </a>
                <a id="{{$product->id}}"  class="links-item links-item-main add-cart">
                    Add to cart
                </a>
                <a href="#">
                    <i class="glyphicon glyphicon-heart-empty links-item" aria-hidden="true"></i>
                </a>
            </div>

            <div class="item-sub">
                <a href="#"><h5>Bag Baggit</h5></a>
                <p>{{$product->price}}$</p>
            </div>

         </div>

    </div>
@endforeach















</div>


