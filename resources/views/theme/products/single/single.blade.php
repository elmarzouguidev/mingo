@extends('layouts.app')

@section('content')

      @include('theme.products.single.default.index')
      
@endsection

@section('productsJs')



<script>
  
  $(document).ready(function() {$('.singleProductsColors').select2();});
     
</script>

@endsection

@section('productsCss')


@endsection