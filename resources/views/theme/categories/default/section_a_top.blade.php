<div class="ps-breadcrumb" dir="{{Mingo::currentLocale()==='ar'?'rtl':''}}">
    <div class="ps-container">
        <ul class="breadcrumb">
            <li><a href="{{route('home')}}">{{__('navbar.home')}}</a></li>
            <li>{{$categorie->field('name')}}</li>
        </ul>
    </div>
</div>