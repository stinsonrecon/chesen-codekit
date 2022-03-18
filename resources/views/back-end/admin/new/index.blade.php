@extends('back-end.app')
@section('title')
<title>
    Tin tức
</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('css/back-end/admin/new/index.css')}}">
@endsection

@section('back-end.contents')

@include('back-end.components.content-header',['name'=>'Tin tức','key'=>''])
<!-- component -->
<div class="overflow-x-auto flex flex-col">
    <div class="flex flex-row-reverse">
        <div class="m-6"><a href="{{route('new.create')}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
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
    {{ $news->links() }}
        </div>

    
    </div>
    <div>
        <table class=" w-11/12  mx-auto mx-8  table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Tiêu đề</th>
                                <th class="py-3 px-6 text-center">Hình ảnh</th>
                                <th class="py-3 px-6 text-center">Mô tả</th>
                                <th class="py-3 px-6 text-center">Thời gian</th>
                                <th class="py-3 px-6 text-center">Hành động</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                        @foreach($news as $new)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        
                                        <span class="font-medium">{{$new->title}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center">
                                        
                                        <img class="img_index" src="{{ asset('storage/new').'/'.$new->linkImg}}" alt="">
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            
                                        </div>
                                        <span class="font-medium">{{$new->description}}</span>
                                    </div>
                                   
                                </td>                                                          
                                <td class="py-3 px-6 text-center">                     
                                    <span class="font-medium">
                                        @if($new->updated_at != NULL) {{$new->updated_at}}
                                    @else
                                    {{$new->created_at}}
                                    @endif
                                    
                                    </span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                       
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="{{route('new.edit',['id'=>$new->id])}}">
                                            <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a class="" onclick="return myFunction();"   href="{{route('new.delete',['id'=>$new->id])}}" >
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
 
 <script src="{{asset('js/back-end/admin/new/index/index.js')}}"></script>
@endsection