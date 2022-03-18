@extends('front-end.app')
@section('content')
    <div class="w-full px-6 pb-10 flex" style="background-color: #fafafa;">
        {{-- side menu & banner --}}
        <div class="hidden lg:block w-1/6 pt-8">
            <div><img src="{{ asset('images/front-end/common/chesen-ad.png') }}" alt=""
                    class="h-full w-full object-contain"></div>
            <div>
                <div class=" font-bold text-lg py-5">Giới thiệu</div>
                <ul>
                    <li class=" border border-gray-500 w-full p-3 hover:text-green-primary pl-5 text-green-primary" style="border-bottom: none">
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
                    <li class=" border border-gray-500 w-full p-3 hover:text-green-primary pl-5">
                        <a href="{{ route('aboutus') }}">Về chúng tôi</a>
                    </li>
                </ul>
            </div>
        </div>
        {{-- content --}}
        <div class="w-full justify-around items-center pt-8 lg:pl-7">
            <div class="flex-col lg:flex-row flex flex-wrap w-full">
                @foreach ($products as $product)
                    <div class="text-center w-full lg:w-1/2 lg:px-20 pb-10">
                        @if ($product->promotion != null)
                            <div class="flex justify-center">
                                <div class="absolute float-left mr-56 lg:mr-64 lg:-mt-6">
                                    <img class="w-20 h-20 lg:w-32 lg:h-32" src="{{ asset('images/sale.png') }}" alt="">
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <div><img class="h-80 w-80 object-contain"
                                        src="{{ asset('storage/product') . '/' . $product->linkImg }}">
                                </div>
                            </div>
                            <div class="mt-2 font-bold text-lg lg:text-xl text-green-primary font-lora">
                                {{ $product->name }}</div>
                            <div class="font-semibold">
                                <del class="text-xs">
                                    {{ number_format($product->priceRoot) }} VND
                                </del>
                                <br>{{ number_format($product->pricePromo) }} VND
                            </div>
                            <div class="mt-2">
                                <button
                                    class="text-center border-2 rounded-lg border-green-primary bg-white text-green-primary hover:bg-green-primary hover:text-white px-5 py-1 mt-4">
                                    <a href="/product_detail/{{ $product->id }}" class="font-bold text-base"><i
                                            class="fas fa-eye"></i> Xem thêm</a>
                                </button>
                                <button
                                    class="btn border-2 rounded-lg border-green-primary bg-white text-green-primary hover:bg-green-primary hover:text-white px-3 py-1 mt-4">
                                    <a href="#" data-url="{{ route('addToCart', ['id' => $product->id]) }}"
                                        class="add_to_cart"><i class="fas fa-shopping-cart text-lg"></i></a>
                                </button>
                            </div>
                        @else
                            <div class="flex justify-center">
                                <div><img class="h-80 w-80 object-contain"
                                        src="{{ asset('storage/product') . '/' . $product->linkImg }}">
                                </div>
                            </div>
                            <div class="mt-2 font-bold text-lg lg:text-xl text-green-primary font-lora">
                                {{ $product->name }}</div>
                            <div class="font-semibold"><br>{{ number_format($product->priceRoot) }} VND</div>
                            <div class="mt-2">
                                <button
                                    class="text-center border-2 rounded-lg border-green-primary bg-white text-green-primary hover:bg-green-primary hover:text-white px-5 py-1 mt-4">
                                    <a href="/product_detail/{{ $product->id }}" class="font-bold text-base"><i
                                            class="fas fa-eye"></i> Xem thêm</a>
                                </button>
                                <button
                                    class="btn border-2 rounded-lg border-green-primary bg-white text-green-primary hover:bg-green-primary hover:text-white px-3 py-1 mt-4">
                                    <a href="#" data-url="{{ route('addToCart', ['id' => $product->id]) }}"
                                        class="add_to_cart"><i class="fas fa-shopping-cart text-lg"></i></a>
                                </button>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="pt-20">
                {{ $products->links() }}
            </div>
        </div>
    </div>
    <script>
        function addToCart(event) {
            event.preventDefault();
            let urlCart = $(this).data('url');
            $.ajax({
                type: "GET",
                url: urlCart,
                dataType: 'json',
                success: function(data) {
                    if (data.code === 200) {
                        alert("Thêm sản phẩm thành công");
                        $('#cartQuantity').html("(" + data.quantity + ")");
                    }
                },
                error: function() {
                    alert("Thêm sản phẩm thất bại");
                }
            });
        }

        $(function() {
            $('.add_to_cart').on('click', addToCart);
        })
    </script>
@endsection
