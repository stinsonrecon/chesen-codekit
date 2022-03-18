@extends('front-end.app')
@section('content')
    <div id="banner" class="relative w-full border-t-2 border-green-primary">
        <div class="splide__arrows hidden lg:block">
            <button class="splide__arrow splide__arrow--prev text-2xl hover:bg-green-primary text-black hover:text-white">
                <i class="fas fa-caret-left"></i>
            </button>
            <button class="splide__arrow splide__arrow--next text-2xl hover:bg-green-primary text-black hover:text-white">
                <i class="fas fa-caret-right"></i>
            </button>
        </div>
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide">
                    <div class="absolute left-0 right-0 my-0 top-1/4 lg:top-1/3">
                        <div class="text-center text-white drop-shadow-2xl text-8xl font-petemoss"><i>Năng lượng từ thiên
                                nhiên</i></div>
                        <div class="text-center text-white text-2xl font-bold drop-shadow-2xl pt-5">Trà sen đặc sản Tây Hồ
                        </div>
                        <div class="flex items-center justify-center pt-5">
                            <button
                                class="text-center border rounded-3xl border-green-secondary bg-green-secondary hover:bg-green-secondary_1 hover:border-green-secondary_1 px-5 py-2">
                                <a href="{{ route('productList') }}" class="font-bold text-xl text-white">Chi tiết sản phẩm</a>
                            </button>
                        </div>
                    </div>
                    <img src="{{ asset('images/front-end/home/slider/chesen-banner3.jpg') }}" alt="">
                </li>
                <li class="splide__slide">
                    <div class="absolute left-0 right-0 my-0 top-1/4 lg:top-1/3">
                        <div class="text-center text-white drop-shadow-2xl text-8xl font-petemoss"><i>Năng lượng từ thiên
                                nhiên</i></div>
                        <div class="text-center text-white text-2xl font-bold drop-shadow-2xl pt-5">Trà sen đặc sản Tây Hồ
                        </div>
                        <div class="flex items-center justify-center pt-5">
                            <button
                                class="text-center border rounded-3xl border-green-secondary bg-green-secondary hover:bg-green-secondary_1 hover:border-green-secondary_1 px-5 py-2">
                                <a href="" class="font-bold text-xl text-white">Chi tiết sản phẩm</a>
                            </button>
                        </div>
                    </div>
                    <img src="{{ asset('images/front-end/home/slider/chesen-banner-2.png') }}" alt="">
                </li>
                <li class="splide__slide">
                    <div class="absolute left-0 right-0 my-0 top-1/4 lg:top-1/3">
                        <div class="text-center text-black drop-shadow-2xl text-8xl font-petemoss"><i>Năng lượng từ thiên
                                nhiên</i></div>
                        <div class="text-center text-black text-2xl font-bold drop-shadow-2xl pt-5">Trà sen đặc sản Tây Hồ
                        </div>
                        <div class="flex items-center justify-center pt-5">
                            <button
                                class="text-center border rounded-3xl border-green-secondary bg-green-secondary hover:bg-green-secondary_1 hover:border-green-secondary_1 px-5 py-2">
                                <a href="" class="font-bold text-xl text-white">Chi tiết sản phẩm</a>
                            </button>
                        </div>
                    </div>
                    <img src="{{ asset('images/front-end/home/slider/chesen-banner-1.jpg') }}" alt="">
                </li>
                <li class="splide__slide">
                    <div class="absolute left-0 right-0 my-0 top-1/4 lg:top-1/3">
                        <div class="text-center text-white drop-shadow-2xl text-8xl font-petemoss"><i>Năng lượng từ thiên
                                nhiên</i></div>
                        <div class="text-center text-white text-2xl font-bold drop-shadow-2xl pt-5">Trà sen đặc sản Tây Hồ
                        </div>
                        <div class="flex items-center justify-center pt-5">
                            <button
                                class="text-center border rounded-3xl border-green-secondary bg-green-secondary hover:bg-green-secondary_1 hover:border-green-secondary_1 px-5 py-2">
                                <a href="" class="font-bold text-xl text-white">Chi tiết sản phẩm</a>
                            </button>
                        </div>
                    </div>
                    <img src="{{ asset('images/front-end/home/slider/chesen-banner-4.png') }}" alt="">
                </li>
            </ul>
        </div>
    </div>
    <div class="w-full px-6 pt-3" style="background-color: #fafafa;">
        {{-- advertisement --}}
        <div class="hidden lg:flex w-full bg-white h-32 flex justify-around items-center">
            <div class="flex justify-between items-center">
                <div class="mr-4">
                    <i class="text-3xl fas fa-truck-moving text-red-500"></i>
                </div>
                <div>Giao hàng nhanh chóng<br>Freeship nội thành</div>
            </div>
            <div class="flex justify-between items-center">
                <div class="mr-4">
                    <i class="text-3xl fas fa-shopping-cart text-green-primary"></i>
                </div>
                <div>Thanh toán dễ dàng<br>Hỗ trợ chuyển khoản</div>
            </div>
            <div class="flex justify-between items-center">
                <div class="mr-4">
                    <i class="text-3xl fas fa-thumbs-up text-yellow-500"></i>
                </div>
                <div>Hàng chính hãng<br>Cam kết chính hãng 100%</div>
            </div>
        </div>
        <div class="product-slider relative flex flex-wrap justify-around bg-white mt-4 lg:mt-10 pt-5 pb-10 px-2 lg:px-10"
            id="productList">
            <div class="splide__arrows hidden lg:block">
                <button
                    class="splide__arrow splide__arrow--prev text-2xl hover:bg-green-primary text-black hover:text-white">
                    <i class="fas fa-caret-left"></i>
                </button>
                <button
                    class="splide__arrow splide__arrow--next text-2xl hover:bg-green-primary text-black hover:text-white">
                    <i class="fas fa-caret-right"></i>
                </button>
            </div>
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach ($products as $product)
                        <li class="text-center w-full lg:w-1/3 lg:px-10 splide__slide" style="min-height: 350px;">
                            @if ($product->promoID != null)
                                <div>
                                    <div class="flex justify-center">
                                        <div class="absolute float-left mr-56 lg:mr-64 2xl:-mt-6">
                                            <img class="w-20 h-20 lg:w-32 lg:h-32" src="{{ asset('images/sale.png') }}"
                                                alt="">
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
                                                    class="fas fa-eye"></i> Xem
                                                thêm</a>
                                        </button>
                                        <button
                                            class="btn border-2 rounded-lg border-green-primary bg-white text-green-primary hover:bg-green-primary hover:text-white px-3 py-1 mt-4">
                                            <a href="#" data-url="{{ route('addToCart', ['id' => $product->id]) }}"
                                                class="add_to_cart"><i class="fas fa-shopping-cart text-lg"></i></a>
                                        </button>
                                    </div>
                                </div>
                            @else
                                <div class="flex justify-center">
                                    <div><img class="h-80 w-80 object-contain"
                                            src="{{ asset('storage/product') . '/' . $product->linkImg }}"></div>
                                </div>
                                <div class="mt-2 font-bold text-lg lg:text-xl text-green-primary font-lora">
                                    {{ $product->name }}</div>
                                <div class="font-semibold"><br>{{ number_format($product->priceRoot) }} VND</div>
                                <div class="mt-2">
                                    <a href="/product_detail/{{ $product->id }}" class="font-bold text-base"><button
                                        class="text-center border-2 rounded-lg border-green-primary bg-white text-green-primary hover:bg-green-primary hover:text-white px-5 py-1 mt-4">
                                        <i class="fas fa-eye"></i> Xem thêm
                                    </button></a>
                                    <a href="#" data-url="{{ route('addToCart', ['id' => $product->id]) }}"
                                        class="add_to_cart"><button
                                        class="btn border-2 rounded-lg border-green-primary bg-white text-green-primary hover:bg-green-primary hover:text-white px-3 py-1 mt-4">
                                        <i class="fas fa-shopping-cart text-lg"></i>
                                    </button></a>
                                </div>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="hidden lg:flex justify-around items-center mt-8 bg-white py-5 px-10 mb-10">
            <img src="{{ asset('images/front-end/home/aboutus-banner.jpg') }}" alt="" class="w-1/3 h-1/3 object-contain">
            <div class="w-2/5">
                <div class="text-2xl font-semibold text-green-primary pb-12 font-lora">TỪ NHỮNG MẦM TRÀ, CHÚNG TÔI TẠO RA
                    NIỀM ĐAM MÊ</div>
                <p class="text-justify">Với mong muốn được chia sẻ những câu chuyện buồn vui giản dị bên ấm trà nóng thơm nồng vị Sen Tây Hồ, chúng tôi tạo ra một món quà đậm sắc vị Hà Thành với Sen Tây Hồ kết hợp với Trà Thái Nguyên hảo hạng, để tạo thành một đặc phẩm Bách Diệp Trà Sen.
                </p><br>
                <p class="text-justify">Chúng tôi tin rằng Bách Diệp Trà Sen sẽ luôn gắn liên với những câu chuyện vui buồn của quý vị, và cũng là một hương phẩm mang đậm bản sắc Hà Nội, để cho những con người đã từng đến hoặc đi ở mảnh đất này sẽ luôn luôn mang theo bên mình.
                </p>
                <button
                    class="text-center border-2 rounded-lg border-green-primary bg-white text-green-primary hover:bg-green-primary hover:text-white px-5 py-1 mt-5">
                    <a href="{{ route('news') }}" class="font-bold text-xl">Xem thêm</a>
                </button>
            </div>
        </div>
    </div>
    <script>
        setUpProductList();

        function setUpProductList() {
            if ($(window).width() < 1024) {
                $('#productList').removeClass('product-slider');
                $('#productList').addClass('product-slider-mobile');
            } else {
                $('#productList').removeClass('product-slider-mobile');
                $('#productList').addClass('product-slider');
            }
        }
        $(window).on("load resize", function() {
            setUpProductList();
        });

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

                }
            });
        }
        $(function() {
            $('.add_to_cart').on('click', addToCart);
        })
    </script>
@endsection
