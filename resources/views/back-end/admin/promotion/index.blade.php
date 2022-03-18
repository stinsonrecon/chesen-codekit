@extends('back-end.app')
@section('title')
<title>
    Khuyến mãi
</title>
@endsection

@section('back-end.contents')

@include('back-end.components.content-header',['name'=>'Khuyến mãi','key'=>''])
<!-- component -->
<div class="overflow-x-auto flex flex-col">
    <div class="flex flex-row-reverse">
        <div class="m-6"><a href="{{route('promotion.create')}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
        Thêm
</a></div>
</div>
        <div class=" w-11/12  mx-auto mx-8 bg-green-700  table-auto">
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
    <div class=" w-11/12  mx-auto mx-8  table-auto">
    {{ $p->links() }}
        </div>

    
    </div>
   
    
    <div>
        <table class=" w-11/12  mx-auto mx-8  table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Tên</th>
                    <th class="py-3 px-6 text-left">Thời gian bắt đầu</th>
                    <th class="py-3 px-6 text-center">Thời gian kết thúc</th>
                    <th class="py-3 px-6 text-center">Giới hạn thời gian</th>
                    <th class="py-3 px-6 text-center">Tình trạng</th>
                    <th class="py-3 px-6 text-center">Hành động</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach($p as $a)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            
                            <span class="font-medium">{{$a->name}}</span>
                        </div>
                    </td>
                    @if($a->limitTime==1)
                    <td class="py-3 px-6 text-left">
                        <div class="flex items-center">
                            <span class="font-medium">{{$a->startTime}}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <span class="font-medium">{{$a->endTime}}</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <span><?php
                                    $date1 = $a->startTime;
                                    $date2 = $a->endTime;
                                    $diff = abs(strtotime($date2) - strtotime($date1));
                                    $years = floor($diff / (365*60*60*24));
                                    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                                    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24) / (60*60*24));
                                    $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));
                                    $minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60) / 60);
                                    $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));
                                    echo $years." năm, ".$months." tháng, ".$days." ngày, ".$hours." giờ, ".$minutes." phút, ".$seconds." giây";
                                ?>
                        </span>
                    </td>
                    @else
                    <td class="py-3 px-6 text-left">
                        <div class="flex items-center">
                            <span class="font-medium">.......................................</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <span class="font-medium">.......................................</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <span>Quanh năm</span>
                    </td>
                    @endif

                    @if($timeNow>$a->endTime && $a->endTime!=NULL)
                    <td class="py-3 px-6 text-center">
                        <span class="bg-red-300  py-1 px-3 rounded-full text-xs">Hết hạn</span>
                    </td>
                    @else
                    <td class="py-3 px-6 text-center">
                        <span class="bg-green-200  py-1 px-3 rounded-full text-xs">Còn hạn</span>
                    </td>
                    @endif
                    
                    <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                       
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="{{route('promotion.edit',['id'=>$a->id])}}">
                                            <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="{{route('promotion.delete',['id'=>$a->id])}}" onclick="return myFunction();"   href="" >
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                           
                                        </div>
                                    </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    



</div>
@endsection
@section('js')
<script src="{{asset('js/back-end/admin/bank/index/index.js')}}"></script>
@endsection