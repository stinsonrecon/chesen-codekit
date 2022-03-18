@extends('back-end.app')
@section('title')
<title>
    Thêm đơn hàng
</title>
@endsection

@section('back-end.contents')

@include('back-end.components.content-header',['name'=>'Đơn hàng','key'=>' | Thêm'])
<!-- component -->
<div class="overflow-x-auto flex flex-col">
    
   <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{route('order.create')}}" enctype="multipart/form-data" >
   @csrf
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" >
        Tên khách hàng
      </label>
      <input name="name" value="{{old('name')}}"  class="@error('name') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text" placeholder="Nhập tên khách hàng">
    </div>

    <div class="mb-4">
        @error('name')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{$message}}</strong>
  
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        @enderror
    </div>
   
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" >
        Tỉnh/ Thành phố
      </label>
      <input name="city" value="{{old('city')}}"  class="@error('city') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text" placeholder="Nhập tỉnh/ thành phố">
    </div>

    <div class="mb-4">
        @error('city')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{$message}}</strong>
  
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        @enderror
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" >
        Địa chỉ
      </label>
      <input name="address" value="{{old('address')}}"  class="@error('address') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text" placeholder="Nhập địa chỉ">
    </div>

    <div class="mb-4">
        @error('address')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{$message}}</strong>
  
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        @enderror
    </div>
   

    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" >
        Số điện thoại
      </label>
      <input value="{{old('phoneNumber')}}" name="phoneNumber" class="@error('phoneNumber') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Nhập số điện thoại">
     
    </div>
    
    <div class="mb-6">
        @error('phoneNumber')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{$message}}</strong>
  
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        @enderror
    </div>

    
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" >
        Tình trạng thanh toán
      </label>
      <div class="flex @error('statusPay') is-invalid @enderror">
            <div class="flex items-center mb-2 mr-4">
                <input @if(old('statusPay')==0) checked @endif type="radio" value="0" id="radio-example-1" name="statusPay" class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2">
                <label for="radio-example-1" class="text-gray-600">Chưa thanh toán</label>
            </div>
            <div class="flex items-center mb-2">
                <input @if(old('statusPay')==1) checked @endif type="radio" value="1" id="radio-example-2" name="statusPay" class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"  >
               
                <label for="radio-example-2" class="text-gray-600">Đã thanh toán</label>
            </div>
        </div>
    </div>

    <div class="mb-6">
        @error('statusPay')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{$message}}</strong>
  
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        @enderror
    </div>


    
    <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2">Tình trạng vận chuyển </label>
        <div class="flex @error('statusDeli') is-invalid @enderror">
            <div class="flex items-center mb-2 mr-4">
                <input @if(old('statusDeli')==0) checked @endif type="radio" value="0" id="radio-example-1" name="statusDeli" class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2">
                <label for="radio-example-1" class="text-gray-600">Chờ lấy hàng</label>
            </div>
            <div class="flex items-center mb-2 mr-4">
                <input @if(old('statusDeli')==1) checked @endif type="radio" value="1" id="radio-example-2" name="statusDeli" class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2">
                <label for="radio-example-2" class="text-gray-600">Đang vận chuyển</label>
            </div>
            <div class="flex items-center mb-2">
                <input @if(old('statusDeli')==2) checked @endif type="radio" value="2" id="radio-example-3" name="statusDeli" class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2">
                <label for="radio-example-3" class="text-gray-600">Đang vận chuyển</label>
            </div>
        </div>
    </div>

    <div class="mb-6">
        @error('statusDeli')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{$message}}</strong>
  
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        @enderror
    </div>

    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" >
        Phương thức thanh toán
      </label>
      <div class="flex @error('typePay') is-invalid @enderror">
            <div class="flex items-center mb-2 mr-4">
                <input @if(old('typePay')) checked @endif type="radio" value="1" id="radio-example-1" name="typePay" class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2">
                <label for="radio-example-1" class="text-gray-600">Tiền mặt</label>
            </div>
            <div class="flex items-center mb-2">
                <input @if(!old('typePay')) checked @endif type="radio" value="0" id="radio-example-2" name="typePay" class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"  >
               
                <label for="radio-example-2" class="text-gray-600">Ngân hàng</label>
            </div>
        </div>
    </div>

    <div class="mb-6">
        @error('typePay')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{$message}}</strong>
  
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        @enderror
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" >
        Ghi chú
      </label>
      <textarea name="note" value="{{old('note')}}"  class="@error('note') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text" placeholder="Nhập ghi chú"> </textarea>
    </div>

    <div class="mb-4">
        @error('note')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{$message}}</strong>
  
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        @enderror
    </div>


    <div class="flex items-center justify-between">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
       Thêm mới
      </button>
      
    </div>




  </form>
     
                
</div>
 @endsection
 @section('js')
 
 

<script src="{{asset('js/back-end/admin/new/add/add.js')}}"></script>

@endsection