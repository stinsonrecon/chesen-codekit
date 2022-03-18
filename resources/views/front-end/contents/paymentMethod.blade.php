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
                    <li class=" border border-gray-500 w-full p-3 hover:text-green-primary pl-5 text-green-primary" style="border-top: none">
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
        <div class="w-full justify-around items-center pt-8 lg:pl-7">
            <div class=" font-semibold text-xl pb-3">PHƯƠNG THỨC THANH TOÁN</div>
            <div class=" border-t-4 border border-gray-500 bg-white" style="border-top-color: #0c713d">
                <div class="px-3 text-justify lg:text-center text-lg text-gray-500">
                    Nhằm mang đến cho quý khách hàng những trải nghiệm mua sắm trực tuyến tuyệt vời và yên tâm tại 
                    <span class="text-green-primary font-semibold">
                        <i>Bách Diệp Trà</i>
                    </span>
                    , chúng tôi đưa ra nhiều phương thức thanh toán đa dạng để quý khách dễ dàng lựa chọn như sau:
                </div>
                <div class="flex justify-around items-center"><img src="{{ asset('images/Payments.png') }}" alt=""></div>
                <div>
                    <?php while(!feof($file)) {  echo fgets($file) ;  }  fclose($file); ?>
                </div>
                <div class=" font-bold text-lg pt-5 pb-3 pl-5 text-gray-500">3) Thông tin chuyển khoản</div>
                <div class="grid grid-cols-2 justify-around items-center w-full pb-10 px-2 lg:px-10" >
                    @foreach ($banks as $bank)
                    <div class="flex-col justify-center h-64 px-2 lg:px-10 pb-10 pt-3 border border-gray-100">
                        <div class="pb-4 lg:pb-10 text-gray-500 font-semibold"><i>{{ ($loop->index) + 1 }}.    {{ $bank->bankName }}</i></div>
                        <div class="text-gray-500 pb-4">Tên chủ TK: {{ $bank->userName }}</div>
                        <div class="text-gray-500 pb-4">Số TK: 
                            <span class="text-red-500 font-semibold">
                                <i>{{ $bank->bankNumber }}</i>
                            </span>
                        </div>
                        <div class="text-gray-500">Chi nhánh: {{ $bank->department }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection