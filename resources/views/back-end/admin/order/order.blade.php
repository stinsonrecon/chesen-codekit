@extends('back-end.app')
@section('title')
<title>
    Order
</title>
@endsection

@section('back-end.contents')

@include('back-end.components.content-header',['name'=>'Đơn hàng','key'=>''])
<!-- component -->
<div class="overflow-x-auto flex flex-col">
    <div class="flex flex-row-reverse">
        <div class="m-6"><a href="{{route('order.create')}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                Thêm
            </a></div>
    </div>

    <div class=" w-full  mx-auto mx-8 bg-green-700  table-auto">
        @if(session()->has('success'))

        <div class="bg-green-300 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
                <div class="py-1"><i class=" fas fa-check-circle fill-current h-6 w-6 text-green-700 mr-4"> </i></div>

                <div>

                    <p class="text-lg">{{ session()->get('success') }}</p>
                </div>
            </div>
        </div>
        @endif

    </div>

    <div>
        <div class=" w-full  mx-auto mx-8  table-auto">
            {{ $orders->links() }}
        </div>
    </div>
    <div>
        <table class=" w-full  mx-auto mx-8  table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">

                    <th class="py-3 px-6 text-center">Mã đơn chuyển khoản</th>
                    <th class="py-3 px-6 text-left">Tên khách hàng</th>
                    <th class="py-3 px-6 text-center">Địa chỉ</th>
                    <th class="py-3 px-6 text-center">Số điện thoại</th>
                    <th class="py-3 px-6 text-center">Tình trạng thanh toán</th>
                    <th class="py-3 px-6 text-center">Tình trạng vận chuyển</th>
                    <th class="py-3 px-6 text-center">Phương thức thanh toán</th>
                    <th class="py-3 px-6 text-center">Ghi chú</th>
                    <th class="py-3 px-6 text-center">Hành động</th>

                </tr>
            </thead>
            @foreach($orders as $order)
            <tbody class="text-gray-600 text-sm font-light">
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-2 text-center">
                        <span class="font-medium">@if($order->typePay==0) {{$order->idBanking}} @endif</span>
                    </td>
                    <td class="py-3 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <a href="{{route('orderDetail.index',['id' => $order->id])}}" target="_blank" class="align-middle hover:text-gray-400 border-b-2 border-gray-800">
                                <span class="font-medium">{{$order->name}}</span>
                            </a>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <span class="font-medium">{{$order->address}}</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <span class="font-medium">{{$order->phoneNumber}}</span>

                    </td>

                    <td class="py-3 2xl:px-6 text-center text-xs">
                        @if ($order->statusPay == 0)
                        <span class="font-medium py-1 bg-red-200 rounded-full text-red-600"> Chưa thanh toán </span>
                        @else
                        <span class="font-medium py-1 bg-green-200 rounded-full text-green-600"> Đã thanh toán </span>
                        @endif

                    </td>
                    <td class="py-3 2xl:px-6 text-center">
                        @if ($order->statusDeli == 0)
                        <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Chờ lấy hàng</span>
                        @elseif($order->statusDeli == 1)
                        <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Đang vận chuyển</span>
                        @else
                        <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">Đã nhận hàng</span>
                        @endif
                    </td>
                    <td class="py-3 text-center">
                        @if ($order->typePay == 0)
                        <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">Chuyển khoản</span>
                        @else
                        <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">Tiền mặt</span>
                        @endif
                    </td>

                    <td class="py-3 px-6 text-center">
                        <span class="font-medium">{{$order->note}}</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex item-center justify-center">
                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                <a href="{{route('order.edit',['id' => $order->id])}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa !')" class="first" href="{{route('order.delete',['id' => $order->id])}}">
                                    <i class="fas fa-trash-alt"></i>
                                </a>

                            </div>
                        </div>
                    </td>
                </tr>

            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection