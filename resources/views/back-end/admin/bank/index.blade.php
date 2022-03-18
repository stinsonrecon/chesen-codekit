@extends('back-end.app')
@section('title')
<title>
    Ngân hàng
</title>
@endsection

@section('back-end.contents')

@include('back-end.components.content-header',['name'=>'Ngân hàng','key'=>''])
<!-- component -->
<div class="overflow-x-auto flex flex-col">
    <div class="flex flex-row-reverse">
        <div class="m-6"><a href="{{route('bank.create')}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
      Thêm số tài khoản
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
        {{ $banks->links() }}
        </div>



        <table class=" w-11/12  mx-auto mx-8  table-auto">
        
                        <thead>
                        
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Tên ngân hàng</th>
                                <th class="py-3 px-6 text-left">Tên khách hàng</th>
                                <th class="py-3 px-6 text-left">Số tài khoản</th>
                                <th class="py-3 px-6 text-left">Chi nhánh</th>
                                <th class="py-3 px-6 text-center">Hành động</th>
                                
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach($banks as $bank)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        
                                        <span class="font-medium">{{$bank->bankName}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        
                                        <span class="font-medium">{{$bank->userName}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                        <div class="mr-2">
                                            
                                        </div>
                                        <span class="font-medium">{{$bank->bankNumber}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                        <div class="mr-2">
                                            
                                        </div>
                                        <span class="font-medium">{{$bank->department}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex item-center justify-center">
                                       
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="{{route('bank.edit',['id'=>$bank->id])}}">
                                            <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a class="" onclick="return myFunction();"   href="{{route('bank.delete',['id'=>$bank->id])}}" >
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