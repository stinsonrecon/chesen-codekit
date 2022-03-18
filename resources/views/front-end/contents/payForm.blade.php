@extends('front-end.app')
@section('content')
    @if (session('message') == 'tienmat')
        <script>
            $( function() {
                $( "#dialog" ).dialog({
                    width: 'auto',
                    maxWidth: 500,
                    height: 'auto',
                    modal: true,
                    resizable: false,
                }).prev(".ui-dialog-titlebar").css("background","#91cc00");
            } );
        </script>
        <div id="dialog" title="Đặt hàng thành công">
            <p>Bạn vui lòng đợi. Nhân viên của Bách Diệp Trà sẽ liên lạc lại theo số điện thoại sớm nhất có thể</p>
        </div>
    @elseif(session('message') == 'fail')
        <script>
            $( function() {
                $( "#dialog" ).dialog({
                    width: 'auto',
                    maxWidth: 500,
                    height: 'auto',
                    modal: true,
                    resizable: false,
                }).prev(".ui-dialog-titlebar").css("background","#91cc00");
            } );
        </script>
        <div id="dialog" title="Đặt hàng thất bại">
            <p>Mời bạn thêm sản phẩm vào giỏ hàng và thử lại. Hoặc gọi lên hotline 093.637.2609 để được hỗ trợ sớm nhất</p>
        </div>
    @elseif(session('message'))
        <script>
            $( function() {
                $( "#dialog" ).dialog({
                    width: 'auto',
                    maxWidth: 500,
                    height: 'auto',
                    modal: true,
                    resizable: false,
                }).prev(".ui-dialog-titlebar").css("background","#91cc00");
            } );
        </script>
        <div id="dialog" title="Đặt hàng thành công">
            <p>Nhân viên của Bách Diệp Trà sẽ liên lạc lại theo số điện thoại sớm nhất có thể. Tiến hành thanh toán chuyển khoản theo nội dung là "thanh toan {{session('message')}}"</p>
        </div>
    @endif
    <form id="customerForm" action="{{ route('payCart') }}" method="POST">
        @csrf
        @method('POST')
        <div class="w-full lg:px-6 pb-10 flex flex-col lg:flex-row lg:justify-around" style="background-color: white;">
            <div class="w-full lg:w-2/3 flex pt-4 lg:pt-10 lg:mx-10">
                <div class="w-full px-4">
                    <div class="font-semibold text-xl pb-10">THANH TOÁN</div>
                    <div class="py-3 pl-2 lg:pl-10 bg-gray-100 text-2xl text-black border-l-4 border-green-primary">
                        THÔNG TIN THANH TOÁN
                    </div>

                    <div class="flex-col  pt-5">
                        <label class=" text-black" for="name">Họ tên <span class="text-red-500">*</span></label>
                        <input type="text" id="customerName" name="customerName" class="w-full border border-gray-300 rounded outline-none" required>
                    </div>
                    <div class="flex-col  pt-5">
                        <label class=" text-black" for="address">Địa chỉ <span class="text-red-500">*</span></label>
                        <input type="text" id="address" name="address" class="w-full border border-gray-300 rounded outline-none" required>
                    </div>
                    <div class="flex-col  pt-5">
                        <label class=" text-black" for="city">Tỉnh / Thành phố <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="city" name="city" class="w-full border border-gray-300 rounded outline-none" required>
                    </div>
                    <div class="flex-col pb-10 pt-5">
                        <label class=" text-black" for="phoneNum">Số điện thoại <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="phoneNum" name="phoneNum" class="w-full border border-gray-300 rounded outline-none"
                            required>
                    </div>

                    <div class="py-3 pl-2 lg:pl-10 bg-gray-100 text-2xl text-black border-l-4 border-green-primary">
                        THÔNG TIN BỔ SUNG
                    </div>
                    <div class="border-b-2 border-green-primary pt-5 text-2xl pb-2 text-green-primary">
                        Ghi chú đơn hàng <span class=" text-base">(tuỳ chọn)</span>
                    </div>
                    <div>
                        <textarea name="note" id="note"
                            class="w-full border border-gray-300 rounded mt-3 resize-none outline-none p-2" rows="2"
                            placeholder="Ví dụ: thời gian, chỉ dẫn địa điểm giao hàng, thông tin xuất hóa đơn,..."></textarea>
                    </div>
    
    <div class="font-bold text-lg pt-5 pb-3">Thông tin chuyển khoản</div>
    <div class="grid grid-cols-2 lg:justify-around items-center w-full pb-10 lg:px-10">
        @foreach ($banks as $bank)
            <div class="flex-col justify-center h-64 px-2 lg:px-10 pb-10 pt-3 border border-gray-100">
                <div class="pb-4 lg:pb-10 text-gray-500 font-semibold"><i>{{ $loop->index + 1 }}.
                        {{ $bank->bankName }}</i></div>
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
    <div class="w-full lg:w-1/3 bg-white px-4 lg:px-10 h-1/2 lg:mt-24 lg:mx-10 shadow-2xl">
        <div class="py-3 pl-2 lg:pl-10 mt-2 bg-gray-100 text-2xl text-black border-l-4 border-green-primary">
            THÔNG TIN THANH TOÁN
        </div>

        <div class="cart_wrapper">
            @include('front-end.components.cart_component')
        </div>

        <div class="py-3 pl-4 lg:pl-10 mt-2 bg-gray-100 text-2xl text-black border-l-4 border-green-primary">
            THÔNG TIN ĐẶT HÀNG
        </div>
        <div class="pl-6 lg:pl-10 pt-5 flex-col pb-4 lg:pb-10">
            <div class="flex w-full">
                <div class="text-left pr-5">
                    <input id="typePay0" checked type="radio" name="typePay" value="0" onclick="displayDetailTypePay()">
                </div>
                <div class="">Chuyển khoản ngân hàng</div>
            </div>
            <div id="radioDetail0" class="text full">
                Thực hiện thanh toán vào một trong các tài khoản ngân hàng bên cạnh của chúng tôi. Vui lòng sử dụng
                mã
                đơn hàng để thanh toán (VD: thanh toan don hang so 1234)
            </div>
            <div class="flex w-full">
                <div class="text-left pr-5">
                    <input id="typePay1" type="radio" name="typePay" value="1" onclick="displayDetailTypePay()">
                </div>
                <div class="">Trả tiền khi nhận mặt hàng</div>
            </div>
            <div id="radioDetail1" class="text">
                Trả tiền mặt khi giao hàng
            </div>
        </div>

        <button
            class="py-2 px-5 mb-2 items-center justify-center rounded-md bg-green-primary border-2 border-green-primary text-white hover:bg-white hover:text-green-primary"
            type="submit">
            <p>Đặt hàng</p>
        </button>
    </form>
        <div class="text-red-500 pt-3 pb-20">(Tư vấn viên sẽ gọi điện xác nhận, không mua không sao)</div>
    </div>

    <script>
        function displayDetailTypePay() {
            var r0 = document.getElementById("typePay0");
            var r1 = document.getElementById("typePay1");
            var text0 = document.getElementById('radioDetail0');
            var text1 = document.getElementById('radioDetail1');
            if (r0.checked == true) {
                text0.classList.add('full');
                text1.classList.remove('full');
            }
            if (r1.checked == true) {
                text0.classList.remove('full');
                text1.classList.add('full');
            }
        }
    </script>
    <script>
        function cartUpdate(event) {
            event.preventDefault();
            let id = $(this).parents('tr').attr('id');
            let quantity = $(this).parents('tr').find('input.quantity').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('updateCart') }}",
                data: {
                    id: id,
                    quantity: quantity
                },
                success: function(data) {
                    if (data.code === 200) {
                        document.getElementById(data.id).getElementsByTagName("p")[0].innerHTML = data.total
                            .toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                        $('#cartQuantity').html("(" + data.quantityTotal + ")");
                        $('#totalBill').html(data.totalBill.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                    }
                },
                error: function() {
                    alert("Cập nhật giỏ hàng thất bại");
                }
            });
        };

        function cartDelete(event) {
            event.preventDefault();
            let urlDelete = $('.cart').data('url');
            let id = $(this).data('id');

            $.ajax({
                type: "GET",
                url: urlDelete,
                data: {
                    id: id,
                },
                success: function(data) {
                    if (data.code === 200) {
                        $('.cart_wrapper').html(data.cart_component);
                        $('#cartQuantity').html("(" + data.quantityTotal + ")");
                        $('#totalBill').html(data.totalBill.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                    }
                },
                error: function() {
                    alert("Cập nhật giỏ hàng thất bại");
                }
            });
        }

        $(function() {
            $(document).on('click', '.cart_update', cartUpdate);
            $(document).on('click', '.cart_delete', cartDelete);
        });
    </script>
    </div>

@endsection
