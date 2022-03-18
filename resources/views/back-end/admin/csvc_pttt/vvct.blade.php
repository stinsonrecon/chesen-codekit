@extends('back-end.app')
@section('title')
<title>
    Về với chúng tôi
</title>
@endsection

@section('back-end.contents')

@include('back-end.components.content-header',['name'=>'Về với chúng tôi','key'=>' | Sửa'])
<!-- component -->
<div class="overflow-x-auto flex flex-col">
    
   <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{route('c.store')}}" enctype="multipart/form-data" >
   @csrf
   <div class=" mb-6  bg-green-700  ">
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

    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" >
       Nội dung
      </label>
     
      <textarea  id="editor1" class="@error('content') is-invalid @enderror w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="10" name="content">
      <?php while(!feof($file)) {  echo fgets($file) ;  }  fclose($file); ?></textarea>
      
    </div>
    

   
    <div class="flex items-center justify-between">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
       Sửa
      </button>
      
    </div>




  </form>
     
                
</div>
 @endsection
 @section('js')
 
 

<script src="{{asset('js/back-end/admin/new/add/add.js')}}"></script>

@endsection