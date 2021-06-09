@extends('layouts.app')

@section('content')

    <div id="homepage-1">

         @include('theme.home.section_a_slider')
         @include('theme.home.section_b_features')
         @include('theme.home.section_c_deals')
         @include('theme.home.section_d_collections')
         @include('theme.home.section_e_top_categories')
         @include('theme.home.section_f_products_category_a')
         @include('theme.home.section_f_products_category_b')
         @include('theme.home.section_g_ads')
         @include('theme.home.section_h_app_mobile')
         @include('theme.home.section_i_products_collections')
         @include('theme.home.section_j_news_letter')
         
    </div>

@endsection