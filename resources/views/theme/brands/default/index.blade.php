
@include('theme.brands.default.section_a_top')

<div class="ps-page--shop">

    <div class="ps-container">

        @include('theme.brands.default.section_b_banner')
        @include('theme.brands.default.section_c_brand')
        {{--@include('theme.products.default.section_d_categories')--}}

        <div class="ps-layout--shop">

            <div class="ps-layout__left">
                @include('theme.brands.default.section_left_a_categories')
                @include('theme.brands.default.section_left_b_others')
            </div>

            <div class="ps-layout__right">
                {{--@include('theme.brands.default.section_right_a_best')
                @include('theme.brands.default.section_right_b_recomanded')--}}
                {{--@include('theme.brands.default.section_right_c_products')--}}

                @livewire('product.products',['products' => $products])

            </div>

        </div>
        @include('theme.brands.default.section_z_modal')
    </div>
</div>