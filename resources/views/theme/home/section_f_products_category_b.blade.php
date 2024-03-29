<div class="ps-product-list ps-clothings">
    <div class="ps-container"  dir="{{Mingo::currentLocale()==='ar'?'rtl':''}}">
        <div class="ps-section__header">
            <h3>{{$category->field('name')}}</h3>
            <ul class="ps-section__links">
                {{--@foreach($category->products as $product)

                  @foreach ($product->productCollections->unique('productCollections') as $collection )

                    <li><a href="{{$collection->url}}">{{$collection->field('name')}}</a></li>

                  @endforeach

                @endforeach--}}
                <li><a href="{{$category->url}}">{{__('buttons.show_all')}}</a></li>
            </ul>
        </div>
        <div class="ps-section__content">
            <div 
                class="ps-carousel--responsive owl-slider" 
                data-owl-auto="true" 
                data-owl-loop="false" 
                data-owl-speed="10000" 
                data-owl-gap="0" 
                data-owl-nav="false" 
                data-owl-dots="true" 
                data-owl-item="6" 
                data-owl-item-xs="2" 
                data-owl-item-sm="2" 
                data-owl-item-md="2" 
                data-owl-item-lg="4" 
                data-owl-item-xl="6" 
                data-owl-duration="1000" 
               
               >
<!----------------- Haymacproduction ------------------------->

                @foreach ($category->products as $product )
        
                    <div class="ps-product">
                        <div class="ps-product__thumbnail">
                            <a href="{{$product->url}}">
                              <img src="{{$product->photo}}" alt="{{$product->field('name')}}">
                            </a>
                            <div class="ps-product__badge">-16%</div>
                            <ul class="ps-product__actions">
                                <div>
                                    @livewire('cart.add-to-cart',['prod'=>$product->id])
                                </div> 

                                <li>
                                    <a 
                                        href="#" 
                                        data-placement="top"
                                        title="Quick View"
                                        data-toggle="modal" 
                                        data-target="#product-quickview-{{$product->slug}}"
                                    >
                                        <i class="icon-eye"></i>
                                    </a>
                                </li>

                                @auth('customer')
                                    <li>
                                        <a
                                        wire:click="addToWishList({{$product->id}})"
                                        href="#" 
                                        data-toggle="tooltip" 
                                        data-placement="top" 
                                        title="{{__('buttons.add_to_wish')}}"
                                        >
                                            <i class="icon-heart"></i>
                                        </a>
                                    </li>
                                @endauth
                                @guest('customer')
                            
                                    <li>
                                        <a 
                                            href="#"
                                            data-placement="top"
                                            data-toggle="modal"
                                            data-target="#product-wishlistGuest"
                                            title="{{__('buttons.add_to_wish')}}"
                                        >
                                            <i class="icon-heart"></i>
                                        </a>
                                    </li>

                                @endguest
                            </ul>
                        </div>
                        <div class="ps-product__container">
                            {{--<a class="ps-product__vendor" href="{{$product->getBrand('url')}}">
                                {{$product->getBrand('name')}}
                            </a>--}}
                            <div class="ps-product__content">

                                <a class="ps-product__title" href="{{$product->url}}">
                                    {{$product->field('name')}}
                                </a>
                                
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                    </select><span>01</span>
                                </div>
                                <p class="ps-product__price sale">{{$product->price}} {{__('symbole.mad')}} <del>{{$product->price}} {{__('symbole.mad')}}</del></p>
                            </div>
                            <div class="ps-product__content hover">
                                <a class="ps-product__title" href="{{$product->url}}">{{$product->field('name')}}</a>
                                <p class="ps-product__price sale">{{$product->price}} {{__('symbole.mad')}} <del>{{$product->price}} {{__('symbole.mad')}}</del></p>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
</div>


 <!---------------------------- Products that has Variants -------------------------------------->              
                
@each('theme.home.section_modals_products',$category->products,'product')