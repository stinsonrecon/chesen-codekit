@extends('front-end.app')
@section('content')
    <div class="w-full px-6 pb-10 flex" style="background-color: #fafafa;">
        {{-- side menu & banner --}}
        <div class="hidden lg:block w-1/6 pt-8">
            <div><img src="{{ asset('images/front-end/common/chesen-ad.png') }}" alt="" class="h-full w-full object-contain"></div>
            <div>
                <div class=" font-bold text-lg py-5">Giới thiệu</div>
                <ul>
                    <li class=" border border-gray-500 w-full p-3 hover:text-green-primary pl-5" style="border-bottom: none">
                        <a href="{{ route('productList') }}">Sản phẩm</a>
                    </li>
                    <li class=" border border-gray-500 w-full p-3 hover:text-green-primary pl-5">
                        <a href="{{ route('news') }}">Tin tức khuyến mãi</a>
                    </li>
                    <li class=" border border-gray-500 w-full p-3 hover:text-green-primary pl-5" style="border-top: none">
                        <a href="{{ route('paymentMethod') }}">Phương thức thanh toán</a>
                    </li>
                    <li class=" border border-gray-500 w-full p-3 hover:text-green-primary pl-5" style="border-top: none; border-bottom: none">
                        <a href="{{ route('shippingPolicy') }}">Chính sách vận chuyển</a>
                    </li>
                    <li class=" border border-gray-500 w-full p-3 hover:text-green-primary pl-5 text-green-primary">
                        <a href="{{ route('aboutus') }}">Về chúng tôi</a>
                    </li>
                </ul>
            </div>
        </div>
        {{-- content --}}
        <div class="w-full justify-around items-center pt-8 lg:pl-7">
            <div class=" font-semibold text-xl pb-3">VỀ CHÚNG TÔI</div>
            <div class=" border-t-4 border border-gray-500 bg-white" style="border-top-color: #0c713d">
                <div class="text-center font-semibold text-lg">
                    Xin kính chào và cảm ơn quý khách hành đã quan tâm và truy cập vào website:
                    <span class=" text-green-primary hover:text-green-primary_1">
                        <a href="/home">
                            https://bachdieptra.com/
                        </a>
                    </span>
                </div>
                <a class="flex justify-around items-center" href="/home"><img src="{{ asset('images/logo.png') }}" alt=""></a>
                <div>
                    <?php while(!feof($file)) {  echo fgets($file) ;  }  fclose($file); ?>
                </div>
            </div>
        </div>
    </div>
@endsection