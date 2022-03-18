@extends('front-end.app')
@section('content')
<div class="w-full p-4 h-10 hidden lg:flex items-center justify-start hover:text-green-primary hover:font-bold"><a href="{{ route('news') }}">Tin tức khuyến mãi >></a> <span class="text-green-primary">{{$new->title}}</span></div>
<div class="w-full px-4 lg:px-6 pb-10 flex" style="background-color: #fafafa;">
    {{-- side menu & banner --}}
    <div class="hidden lg:block w-1/6 pt-8">
        <div><img src="{{ asset('images/front-end/common/chesen-ad.png') }}" alt="" class="h-full w-full object-contain"></div>
        <div>
            <div class=" font-bold text-lg py-5">Giới thiệu</div>
            <ul>
                <li class=" border border-gray-500 w-full p-3 hover:text-green-primary pl-5" style="border-bottom: none">
                    <a href="{{ route('productList') }}">Sản phẩm</a>
                </li>
                <li class=" border border-gray-500 w-full p-3 hover:text-green-primary pl-5 text-green-primary">
                    <a href="{{ route('news') }}">Tin tức khuyến mãi</a>
                </li>
                <li class=" border border-gray-500 w-full p-3 hover:text-green-primary pl-5" style="border-top: none">
                    <a href="{{ route('paymentMethod') }}">Phương thức thanh toán</a>
                </li>
                <li class=" border border-gray-500 w-full p-3 hover:text-green-primary pl-5" style="border-top: none; border-bottom: none">
                    <a href="{{ route('shippingPolicy') }}">Chính sách vận chuyển</a>
                </li>
                <li class=" border border-gray-500 w-full p-3 hover:text-green-primary pl-5">
                    <a href="{{ route('aboutus') }}">Về chúng tôi</a>
                </li>
            </ul>
        </div>
    </div>
    {{-- content --}}
    <div id="newsContent" class="w-full lg:w-5/6 lg:p-10">
        {!! $new->content !!}
    </div>
</div>
<script>
    loadNews();
    function loadNews(){
        var news = document.getElementById("newsContent");
        var myimgs = news.getElementsByTagName('img')[0];
        myimgs.style.margin = "auto";
    }
</script>
@endsection
