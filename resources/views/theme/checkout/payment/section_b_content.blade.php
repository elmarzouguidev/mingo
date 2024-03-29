<section class="ps-section--account ps-checkout">
    <div class="container">
        <div class="ps-section__header">
            <h3>{{__('paymentPage.payment_title')}}</h3>
        </div>
        <div class="ps-section__content">
            <form class="ps-form--checkout" action="{{route('checkout.paymentPost')}}" method="post">
                @csrf
                @honeypot
                <div class="ps-form__content">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-block--shipping">
                                <div class="ps-block__panel">
                                    <figure><small>{{__('paymentPage.payment_email')}}</small>
                                        <p>
                                            <a href="#"><span class="__cf_email__">{{$order->billing_email}}</span></a>
                                        </p>
                                        {{--<a href="#">Change</a>--}}
                                    </figure>
                                    <figure><small>{{__('paymentPage.payment_addresse')}}</small>
                                        <p>{{$order->billing_address}}</p>
                                        {{--<a href="#">Change</a>--}}
                                    </figure>
                                </div>
                                {{--<h4>Shipping method</h4>
                                <div class="ps-block__panel">
                                    <figure><small>International Shipping</small><strong> $20.00</strong></figure>
                                </div>--}}
                                <h4>{{__('paymentPage.payment_method')}}</h4>
                                <div class="ps-block--payment-method">
                                    <ul class="ps-tab-list">
                                        <li  class="active">
                                            <a class="ps-btn ps-btn--sm" href="#cod_payment">{{__('paymentPage.payment_cod')}}</a>
                                        </li>
                                        {{--<li>
                                            <a class="ps-btn ps-btn--sm" href="#paypal">Paypal</a>
                                        </li>--}}
                                        <li>
                                            <a class="ps-btn ps-btn--sm" href="#visa">Visa / Master Card</a>
                                        </li>
                                     
                                    </ul>
                                    <div class="ps-tabs">
                                        <div class="ps-tab" id="visa">
                                            {{--@include('theme.checkout.payment.__form_card_payment')--}}
                                            <p>{{__('paymentPage.payment_visa')}}</p>
                                        </div>
                                        <div class="ps-tab" id="paypal">
                                            <a class="ps-btn" href="#">Proceed with Paypal</a>
                                        </div>
                                        <div class="ps-tab active" id="cod_payment">
                                          <p>
                                         {{__('paymentPage.payment_cod_desc')}}
                                          </p>
                                          <input  id="cod_payment_method" type="hidden" name="payment_method" value="">
                                          {{--<button type="submit" data-payment="cod" onclick="setPaymentMethod(this); return false;" class="ps-btn">Proceed with cash on delivery</a>--}}
                                            <button type="submit" data-payment="cod" class="ps-btn">{{__('paymentPage.payment_ok')}}</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-block--checkout-order">
                                <div class="ps-block__content">
                                    <figure>
                                        <figcaption><strong>{{__('paymentPage.payment_table_product')}}</strong><strong>{{__('paymentPage.payment_table_total')}}</strong></figcaption>
                                    </figure>
                                    <figure class="ps-block__items">
                                        @foreach($itemes as $item)
                                         <a href="{{$item->options->url}}">
                                            <strong>{{$item->name}}</strong>
                                            <span><small>{{$item->price}}{{__('symbole.mad')}} × {{$item->qty}}</small></span>
                                        </a>
                                        @endforeach
                                    </figure>
                                    <figure>
                                        <figcaption><strong>Subtotal</strong><strong>{{$subTotal}} {{__('symbole.mad')}}</strong></figcaption>
                                    </figure>
                                    {{--<figure>
                                        <figcaption><strong>Shipping</strong><strong>$20.00</strong></figcaption>
                                    </figure>--}}
                                    <figure class="ps-block__total">
                                        <h3>
                                            {{__('paymentPage.payment_table_total')}}
                                            <strong>{{$totalPrice}} {{__('symbole.mad')}}</strong>
                                        </h3>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>