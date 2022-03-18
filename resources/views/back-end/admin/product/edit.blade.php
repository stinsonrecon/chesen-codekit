@extends('back-end.app')
@section('title')
<title>
    Sửa sản phẩm
</title>
@endsection

@section('back-end.contents')

@include('back-end.components.content-header',['name'=>'Sản phẩm','key'=>' | Sửa'])
<!-- component -->
<div class="overflow-x-auto flex flex-col">
    
   <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{route('product.update',['id'=>$products->id])}}" enctype="multipart/form-data" >
   @csrf
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" >
        Tên sản phẩm
        <span class="text-red-500 text-base">*</span>
      </label>
      <input name="name" value="{{$products->name}}"  class="@error('name') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="bankName" name="bankName" type="text" placeholder="Nhập tên sản phẩm">
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
   
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" >
        Gía ban đầu
        <span class="text-red-500 text-base">*</span>
      </label>
      <input value="{{$products->priceRoot}}" name="priceRoot" class="@error('priceRoot') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text" placeholder="Nhập giá ban đầu">
     
    </div>
    
    <div class="mb-6">
        @error('priceRoot')
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
        Gía khuyến mãi
      </label>
      <input value="{{$products->pricePromo}}" name="pricePromo" class="@error('pricePromo') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text" placeholder="Nhập giá khuyến mãi">
     
    </div>
    
    <div class="mb-6">
        @error('pricePromo')
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
        Số lượng
        <span class="text-red-500 text-base">*</span>
      </label>
      <input value="{{$products->quantity}}" name="quantity" class="@error('quantity') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text" placeholder="Nhập số lượng">
     
    </div>
    
    <div class="mb-6">
        @error('quantity')
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
        Ảnh
        </label>
        <input type="file" value="{{$products->linkImg}}" name="linkImg" class="@error('linkImg') is-invalid @enderror w-full text-gray-700 px-3 py-2 border rounded">
        <img style="width: 300px;height: 200px;" src="{{ asset('storage/product').'/'.$products->linkImg}}" alt="">
    </div>

    <div class="mb-6">
        @error('linkImg')
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
       Mô tả
      </label>
     
      <textarea  id="editor1" class="@error('description') is-invalid @enderror w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="6" name="description">{{$products->description}}</textarea>
      
    </div>

    <div class="mb-6">
        @error('description')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{$message}}</strong>
  
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        @enderror
    </div>
    
    <div class="mb-6">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
        Loại khuyến mãi
      </label>
      <div class="relative">
        <select name="promotion" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" >
         
          <option @if($products->promoID==NULL) selected @endif value="0"   >Không có khuyến mãi</option>
         @foreach($promotions as $promotion)
         <option @if($products->promoID==$promotion->id) selected @endif    value="{{$promotion->id}}">{{$promotion->name}}</option>
         @endforeach
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
      </div>
    </div>


    
    <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2">Hiển thị sản phẩm <span class="text-red-500 text-base">*</span></label>
        <div class="flex @error('status') is-invalid @enderror">
            <div class="flex items-center mb-2 mr-4">
                <input  @if(($products->status)==1) checked @endif type="radio" value="1" id="radio-example-1" name="status" class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2">
                <label for="radio-example-1" class="text-gray-600">Có</label>
            </div>
            <div class="flex items-center mb-2">
                <input  @if(($products->status)==0) checked @endif type="radio" value="0" id="radio-example-2" name="status" class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2">
                <label for="radio-example-2" class="text-gray-600">Không</label>
            </div>
        </div>
    </div>

    <div class="mb-6">
        @error('status')
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
       Chỉnh sửa
      </button>
      
    </div>




  </form>
     
                
</div>
 @endsection
 @section('js')
 
 

<script src="{{asset('js/back-end/admin/new/add/add.js')}}"></script>

@endsection