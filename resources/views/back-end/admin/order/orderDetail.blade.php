@extends('back-end.app')
@section('title')
    <title>
        Order Details
    </title>
@endsection

@section('back-end.contents')
    @php
    $dh = $data->idBanking ? $data->idBanking : ' ';
    @endphp
    @include('back-end.components.content-header',['name'=>'Chi tiết đơn hàng '.$dh.' khách '.$data->name,'key'=>''])
    <!-- component -->
    
        <div class="overflow-x-auto flex flex-col">
            <div class="flex flex-row-reverse">
                <div class="m-6"><a
                        href="{{ route('orderDetail.create', ['id' => $orderId]) }}"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="button">
                        Thêm
                    </a></div>
            </div>
            <div>
                <div class=" w-11/12  mx-auto mx-8 bg-green-700  table-auto">
                    @if (session()->has('success'))

                        <div class="bg-green-300 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                            role="alert">
                            <div class="flex">
                                <div class="py-1"><i
                                        class=" fas fa-check-circle fill-current h-6 w-6 text-green-700 mr-4"> </i></div>
                                <div>
                                    <p class="text-lg">{{ session()->get('success') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
                <table class=" w-11/12  mx-auto mx-8  table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Tên sản phẩm</th>
                            <th class="py-3 px-6 text-left">Thời gian đặt hàng</th>
                            <th class="py-3 px-6 text-center">Số lượng</th>
                            <th class="py-3 px-6 text-center">Đơn giá</th>
                            <th class="py-3 px-6 text-center">Thành tiền</th>
                            <th class="py-3 px-6 text-center">Hành động</th>
                        </tr>
                    </thead>
                    @if ($orderDetails->count() > 0)
                    <?php $total = 0; ?>
                    @foreach ($orderDetails as $orderDetail)
                        <tbody class="text-gray-600 text-sm font-light">
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{ $orderDetail->name }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <span class="font-medium">{{ $data->created_at }}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span class="font-medium">{{ $orderDetail->quantity }}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span class="font-medium">{{ number_format($orderDetail->price) }}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span
                                        class="font-medium">{{ number_format($orderDetail->price * $orderDetail->quantity) }}</span>
                                    <?php
                                    $total = $total + $orderDetail->quantity * $orderDetail->price;
                                    ?>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="{{ route('orderDetail.edit', ['id' => $orderDetail->productID, 'oID' => $orderDetail->orderID]) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa !')"
                                                class="first"
                                                href="{{ route('orderDetail.delete', ['id' => $orderDetail->productID, 'oID' => $orderDetail->orderID]) }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                    <tr class=" bg-gray-100 text-gray-600 leading-normal ">
                        <td></td><td></td><td></td>
                        <th class="py-3 px-6 text-center bg-gray-200 border-black border-r">Tổng tiền:</th>
                        <td class="py-3 px-6 text-center bg-gray-200 text-red-500">
                            <span class="font-medium ">{{ number_format($total) }}</span>
                        </td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>
    
    </div>
@endsection
@section('js')

    <script src="{{ asset('back-end/admin/slider/index/index.js') }}"></script>
@endsection
