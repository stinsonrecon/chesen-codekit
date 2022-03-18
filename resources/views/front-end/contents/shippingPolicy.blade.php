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
                <li class=" border border-gray-500 w-full p-3 hover:text-green-primary pl-5 text-green-primary" style="border-top: none; border-bottom: none">
                    <a href="{{ route('shippingPolicy') }}">Chính sách vận chuyển</a>
                </li>
                <li class=" border border-gray-500 w-full p-3 hover:text-green-primary pl-5">
                    <a href="{{ route('aboutus') }}">Về chúng tôi</a>
                </li>
            </ul>
        </div>
    </div>
    {{-- content --}}
    <div class="w-full justify-around items-center pt-8 lg:pl-7">
        <div class=" font-semibold text-xl pb-3">CHÍNH SÁCH VẬN CHUYỂN</div>
        <div class=" border-t-4 border border-gray-500 bg-white" style="border-top-color: #0c713d">
            <div class="flex justify-around items-center py-5"><img src="{{ asset('images/shippingPolicy.png') }}" alt=""></div>
            <p class="pl-5 text-gray-500">Chính sách giao nhận của chúng tôi được thiết kế với mong muốn tạo ra các giá trị gia tăng cho sản phẩm; giúp quý khách hàng có thể thoải mái mua sắm và sử dụng dịch vụ tại
                <span class="text-green-primary font-semibold">
                    <i>Bách Diệp Trà</i>
                </span>
            </p>
            <p class="pl-5 pt-3 text-gray-500">Tất cả các sản phẩm của chúng tôi đều cam kết hỗ trợ, đi kèm các dịch vụ tiện ích như: vận chuyển,
                giao nhận, hướng dẫn sử dụng theo đúng tiêu chuẩn của nhà sản xuất.
            </p>
            <div>
                <?php while(!feof($file)) {  echo fgets($file) ;  }  fclose($file); ?>
            </div>
        </div>
    </div>
</div>
@endsection