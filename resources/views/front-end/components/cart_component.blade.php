<div class="cart" data-url="{{ route('deleteCart') }}">
    @if ($carts)
        <table class="mt-3 mb-5 update_cart_url" data-url="{{ route('updateCart') }}">
            <thead>
                <tr class="border-b border-gray-400">
                    <td class="w-1/4 px-1 text-center">Sản phẩm</td>
                    <td class="w-1/4 px-1 text-center">Số lượng</td>
                    <td class="w-1/4 px-1 text-center">Tổng tiền</td>
                    <td class="w-1/4 px-1 text-center">Chỉnh sửa</td>
                </tr>
            </thead>
            @php
                $total = 0;
            @endphp
            <tbody>
                @foreach ($carts as $id => $cart)
                    @php
                        if ($cart['promoID'] != null) {
                            $total += $cart['pricePromo'] * $cart['quantity'];
                        } else {
                            $total += $cart['priceRoot'] * $cart['quantity'];
                        }
                    @endphp
                    <tr id="{{ $id }}">
                        <td class="w-1/4 px-1 text-center"><img
                                src="{{ asset('storage/product') . '/' . $cart['linkImg'] }}" alt=""
                                class="w-10 h-10 lg:w-2/3 lg:h-auto"></td>
                        <td class="w-1/4 px-1 text-center">
                            <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1 ">
                                <button data-action="decrement" type="button"
                                    class="cart_update bg-green-primary text-white hover:bg-green-primary_1 h-full w-20 rounded-l cursor-pointer outline-none">
                                    <span class="m-auto text-2xl font-thin">−</span>
                                </button>
                                <input type="number"
                                    class="focus:outline-none text-center w-full bg-gray-50 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-black outline-none quantity"
                                    min="1" value="{{ $cart['quantity'] }}">
                                <button data-action="increment" type="button"
                                    class="cart_update bg-green-primary text-white hover:bg-green-primary_1 h-full w-20 rounded-r cursor-pointer">
                                    <span class="m-auto text-2xl font-thin">+</span>
                                </button>
                            </div>
                        </td>
                        <td class="w-1/4 px-1 text-center">
                            @if ($cart['promoID'] != null)
                                <p>{{ number_format($cart['pricePromo'] * $cart['quantity']) }}</p>
                                <u class="text-green-primary text-center">VND</u>
                            @else
                                <p>{{ number_format($cart['priceRoot'] * $cart['quantity']) }}</p>
                                <u class="text-green-primary text-center">VND</u>
                            @endif

                        </td>
                        <td class="w-1/4 px-1 text-center">
                            <a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này?')" href=""
                                data-id="{{ $id }}" class="active text-red-500 cart_delete"
                                ui-toggle-class="">
                                <i class="fa fa-times text-danger text-red-500"></i>
                            </a>
                        </td>
                    </tr>
                    <tr class="text-xl text-gray-500 border-b border-gray-400 mb-10">
                        <td class="pt-5" colspan="4">{{ $cart['name'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex border-b border-gray-400 mb-5">
            <div class="w-1/2 text-2xl text-gray-500">Tổng tiền</div>
            <div id="totalBill" class="w-1/2 text-right">
                <p>{{ number_format($total) }} </p>
            </div>
            &nbsp;<u class="text-green-primary">VND</u>
        </div>
    @else
        <div class="bg-gray-200 text-green-primary_1 text-xl text-center font-semibold p-7 my-5 items-center">
            <i class="fas fa-exclamation-circle"></i> Chưa có sản phẩm nào trong giỏ
        </div>
    @endif
    
</div>
<script>
    function decrement(e) {
        const btn = e.target.parentNode.parentElement.querySelector(
            'button[data-action="decrement"]'
        );
        const target = btn.nextElementSibling;
        let value = Number(target.value);
        value--;
        if (value <= 0) {
            target.value = 1;
        } else {
            target.value = value;
        }
    }

    function increment(e) {
        const btn = e.target.parentNode.parentElement.querySelector(
            'button[data-action="decrement"]'
        );
        const target = btn.nextElementSibling;
        let value = Number(target.value);
        value++;
        target.value = value;
    }
    onLoad();

    function onLoad() {
        const decrementButtons = document.querySelectorAll(
            `button[data-action="decrement"]`
        );

        const incrementButtons = document.querySelectorAll(
            `button[data-action="increment"]`
        );

        decrementButtons.forEach(btn => {
            btn.addEventListener("click", decrement);
        });

        incrementButtons.forEach(btn => {
            btn.addEventListener("click", increment);
        });
    }
</script>
