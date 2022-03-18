@extends('back-end.app')
@section('title')
<title>
    Trang chủ
</title>
@endsection
@section('back-end.contents')

@include('back-end.components.content-header',['name'=>'Trang chủ','key'=>''])
<div class="flex flex-wrap">

    @php $revenue = 0
    @endphp

        @foreach($orderDetails as $orderDetail)
        @php
            $revenue += ($orderDetail->price)*($orderDetail->quantity);
        @endphp
        @endforeach
    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
        <!--Metric Card-->
        <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded-full p-5 bg-green-600"><i class="fa fa-wallet fa-2x fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h5 class="font-bold uppercase text-gray-600">Tổng doanh thu</h5>
                    <h3 class="font-bold text-3xl">{{$revenue}} VNĐ <span class="text-green-500"><i class="fas fa-caret-up"></i></span></h3>
                </div>
            </div>
        </div>
        <!--/Metric Card-->
    </div>

    @php $sumOfOrder = 0
    @endphp

    @foreach($orders as $order)
    @php
    if($order->statusDeli == 0){
    $sumOfOrder++;
    }
    @endphp
    @endforeach

    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
        <!--Metric Card-->
        <div class="bg-gradient-to-b from-indigo-200 to-indigo-100 border-b-4 border-indigo-500 rounded-lg shadow-xl p-5">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded-full p-5 bg-indigo-600"><i class="fas fa-tasks fa-2x fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h5 class="font-bold uppercase text-gray-600">Chờ lấy hàng</h5>
                    <h3 class="font-bold text-3xl">{{$sumOfOrder}} đơn</h3>
                </div>
            </div>
        </div>
        <!--/Metric Card-->
    </div>

    @php $sumOfQuantity=0
    @endphp

    @foreach($products as $product)
    @php
    $sumOfQuantity += $product->quantity;
    @endphp
    @endforeach
    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
        <!--Metric Card-->
        <div class="bg-gradient-to-b from-red-200 to-red-100 border-b-4 border-red-500 rounded-lg shadow-xl p-5">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded-full p-5 bg-red-600"><i class="fas fa-inbox fa-2x fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h5 class="font-bold uppercase text-gray-600">Số sản phẩm còn trong kho</h5>
                    <h3 class="font-bold text-3xl">{{$sumOfQuantity}} <span class="text-red-500"><i class="fas fa-caret-up"></i></span></h3>
                </div>
            </div>
        </div>
        <!--/Metric Card-->
    </div>

</div>


<div class="flex flex-row flex-wrap flex-grow mt-2">



    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
        <!--Graph Card-->
        <div class="bg-white border-transparent rounded-lg shadow-xl">
            <div class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                <h5 class="font-bold uppercase text-gray-600">Tổng đơn hàng theo tháng năm {{ \Carbon\Carbon::now(7)->year}}</h5>
            </div>
            <div class="p-5">
                <canvas id="chartjs-1" class="chartjs" width="undefined" height="undefined"></canvas>
                <script>
                    var _xdata = JSON.parse('{!! json_encode($data) !!}');
                    new Chart(document.getElementById("chartjs-1"), {
                        "type": "bar",
                        "data": {
                            "labels": ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                            "datasets": [{
                                "label": "Đơn hàng",
                                "data": _xdata,
                                "fill": false,
                                "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)", "rgb(105, 205, 356, 0.2)", "rgb(52, 256, 108, 0.2)", "rgb(101, 105, 322, 0.2)", "rgb(213, 105, 32, 0.2)", "rgb(187, 113, 205, 0.2)"],
                                "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)", "rgb(105, 205, 356)", "rgb(52, 256, 108)", "rgb(101, 105, 322)", "rgb(213, 105, 32)", "rgb(187, 113, 205)"],
                                "borderWidth": 1
                            }]
                        },
                        "options": {
                            "scales": {
                                "yAxes": [{
                                    "ticks": {
                                        "beginAtZero": true
                                    }
                                }]
                            }
                        }
                    });
                </script>
            </div>
        </div>
        <!--/Graph Card-->
    </div>

    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
        <!--Graph Card-->
        <div class="bg-white border-transparent rounded-lg shadow-xl">
            <div class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                <h5 class="font-bold uppercase text-gray-600">số lượng theo từng loại sản phẩm </h5>
            </div>

            <div class="p-5 text-left"><canvas id="chartjs-4" class="chartjs" width="undefined" height="undefined"></canvas>
            
                <script>
                    var _name = JSON.parse('{!! json_encode($productN) !!}');
                    var _data = JSON.parse('{!! json_encode($productQ) !!}');
                    var _colour = JSON.parse('{!! json_encode($colours) !!}');
                    new Chart(document.getElementById("chartjs-4"), {

                            "type": "doughnut",
                            "data": {
                                "labels": _name,
                                "datasets": [{
                                    "label": "Issues",
                                    "data": _data,
                                    "backgroundColor": _colour
                                }]
                            }
                        });
                    
                </script>
            </div>
        </div>
        <!--/Graph Card-->
    </div>

    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
        <!--Advert Card-->
        <div class="bg-white border-transparent rounded-lg shadow-xl">
            <div class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                <h5 class="font-bold uppercase text-gray-600">Nhạc trẻ</h5>
            </div>
            <div class="p-5 text-center">
                <iframe class="w-56 h-40" src="https://www.youtube.com/embed/rSXuM8GhmW4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <!--/Advert Card-->
    </div>


</div>
@endsection