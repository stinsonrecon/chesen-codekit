<div class="w-full flex-col justify-between h-24 lg:h-40 min-h-full">
    <div class="h-full lg:h-4/6 flex items-center justify-between px-4">
        <div class="lg:hidden">
            <span id="mobile-menu-button"
                class="p-3 px-4 rounded border-2 text-white border-green-primary bg-green-primary w-10 h-10 hover:bg-white hover:text-green-primary">
                <i class="fas fa-list"></i>
            </span>
        </div>
        <div class="hidden lg:flex"><img class="h-20" src="{{ asset('images/logo.png') }}" /></div>
        <div>
            <form id="mySearch" method="POST" action="{{ route('productSearch') }}">
                @csrf
                @method('POST')
                <input class="search-mobile h-12 outline-none w-40 lg:w-80 px-2 border-2 border-green-primary rounded-l"
                    type="text" name="search" placeholder="Tìm kiếm theo sản phẩm hoặc nhãn hàng..." />
                <a onclick="document.getElementById('mySearch').submit();"
                    class="-ml-1.5 p-3 px-4 rounded-r border-2 text-white border-green-primary bg-green-primary w-10 h-10 hover:bg-white hover:text-green-primary">
                    <i class="fas fa-search"></i>
                </a>
            </form>
        </div>
        <div class="hidden lg:flex"><img class="h-12" src="{{ asset('images/hotline1.jpg') }}" /></div>
        <div class="hidden lg:block text-black">
            <i class="text-3xl fas fa-shopping-cart text-green-primary"></i>
            <a href="{{ route('payment') }}" class="hover:text-green-primary_1">&nbsp;Giỏ hàng
                <span id="cartQuantity"><?php
                    $cart = session()->get('cart');
                    if ($cart != null) {
                        $count = 0;
                        foreach ($cart as $c) {
                            $count += $c['quantity'];
                        }
                        echo '(' . $count . ')';
                    } else {
                        echo '(0)';
                    }
                    ?></span>
            </a>
        </div>
        <div class="hidden lg:block text-black {{ request()->is('contact') ? 'cateActive' : '' }}">
            <i class="text-3xl fas fa-map-marked-alt text-green-primary"></i>
            <a href="{{ route('contact') }}" class="hover:text-green-primary_1">Liên hệ</a>
        </div>
    </div>
    <div id="menu" class="sm:hidden hidden flex-col z-10 absolute bg-white w-full px-4 text-xl">
        <div id="home"
            class="p-3 border-b-2 border-green-secondary_1 {{ request()->is('/') || request()->is('home') ? 'cateActive' : '' }} hover:text-green-primary_1 font-medium">
            <i class="mr-2 fas fa-home"></i><a href="/home">
                Trang chủ
            </a>
        </div>
        <div
            class="p-3 border-b-2 border-green-secondary_1 {{ request()->is('payment') ? 'cateActive' : '' }} hover:text-green-primary_1 font-medium">
            <i class="mr-2 fas fa-cart-plus"></i><a href="/payment">
                Giỏ hàng
            </a>
        </div>
        <div
            class="p-3 mb-2 border-b-2 border-green-secondary_1 {{ request()->is('product_list') ? 'cateActive' : '' }} hover:text-green-primary_1 font-medium">
            <i class="mr-2 fas fa-leaf"></i><a href="{{ route('productList') }}">
                Sản phẩm
            </a>
        </div>
        <div
            class="p-3 border-b-2 border-green-secondary_1 {{ request()->is('news') ? 'cateActive' : '' }} hover:text-green-primary_1 font-medium">
            <i class="mr-2 fas fa-wallet"></i><a href="{{ route('news') }}">
                Tin tức khuyến mãi
            </a>
        </div>
        <div
            class="p-3 border-b-2 border-green-secondary_1 {{ request()->is('payment_method') ? 'cateActive' : '' }} hover:text-green-primary_1 font-medium">
            <i class="mr-2 far fa-credit-card"></i><a href="{{ route('paymentMethod') }}">
                Phương thức thanh toán
            </a>
        </div>
        <div
            class="p-3 border-b-2 border-green-secondary_1 {{ request()->is('shipping_policy') ? 'cateActive' : '' }} hover:text-green-primary_1 font-medium">
            <i class="mr-2 fas fa-truck"></i><a href="{{ route('shippingPolicy') }}">
                Chính sách vận chuyển
            </a>
        </div>
        <div
            class="p-3 mb-2 border-b-2 border-green-secondary_1 {{ request()->is('aboutus') ? 'cateActive' : '' }} hover:text-green-primary_1 font-medium">
            <i class="mr-3 far fa-smile-beam"></i><a href="{{ route('aboutus') }}">
                Về chúng tôi
            </a>
        </div>
    </div>
    <div class="hidden px-20 h-1/3 text-gray-50 lg:flex items-center justify-between"
        style="background-color: #91cc00;">
        <div id="home"
            class="{{ request()->is('/') || request()->is('home') ? 'cateActive' : '' }} hover:text-green-primary_1 font-medium">
            <a href="/home">
                Trang chủ
            </a>
        </div>
        <div class=""> / </div>
        <div class="{{ request()->is('product_list') ? 'cateActive' : '' }} hover:text-green-primary_1 font-medium">
            <a href="{{ route('productList') }}">
                Sản phẩm
            </a>
        </div>
        <div class=""> / </div>
        <div class="{{ request()->is('news') ? 'cateActive' : '' }} hover:text-green-primary_1 font-medium">
            <a href="{{ route('news') }}">
                Tin tức khuyến mãi
            </a>
        </div>
        <div class=""> / </div>
        <div
            class="{{ request()->is('payment_method') ? 'cateActive' : '' }} hover:text-green-primary_1 font-medium">
            <a href="{{ route('paymentMethod') }}">
                Phương thức thanh toán
            </a>
        </div>
        <div class=""> / </div>
        <div
            class="{{ request()->is('shipping_policy') ? 'cateActive' : '' }} hover:text-green-primary_1 font-medium">
            <a href="{{ route('shippingPolicy') }}">
                Chính sách vận chuyển
            </a>
        </div>
        <div class=""> / </div>
        <div class="{{ request()->is('aboutus') ? 'cateActive' : '' }} hover:text-green-primary_1 font-medium">
            <a href="{{ route('aboutus') }}">
                Về chúng tôi
            </a>
        </div>
    </div>
</div>
<script>
    var btn = document.getElementById("mobile-menu-button");
    var menu = document.getElementById("menu");
    btn.onclick = function() {
        menu.classList.toggle("hidden");
    };
</script>
