@extends('back-end.app')
@section('title')
    <title>
        Thêm đơn hàng chi tiết
    </title>
@endsection

@section('back-end.contents')
    @php
    $dh = $orders->idBanking ? $orders->idBanking : ' ';
    @endphp
    @include('back-end.components.content-header',['name'=>'Đơn hàng '.$dh.' khách '.$orders->name,'key'=>' | Thêm sản
    phẩm'])
    <!-- component -->
    <div class="overflow-x-auto flex flex-col">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('orderDetail.store') }}">
            @csrf
            @method('POST')
            <input type="hidden" name="orderID" value="{{$orders->id}}">
            <div class="mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                    Chọn sản phẩm: 
                </label>
                <div class="relative w-80">
                    <select name="product"
                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        @foreach ($products as $p)
                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" >
                  Số lượng
                  <span class="text-red-500 text-base">*</span>
                </label>
                <input required min="1" name="quantity" class="@error('quantity') is-invalid @enderror shadow appearance-none border rounded w-48 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="number">
               
              </div>
            <div class="mb-4">
                @error('note')
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">{{ $message }}</strong>

                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <title>Close</title>
                                <path
                                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                            </svg>
                        </span>
                    </div>
                @enderror
            </div>


            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Thêm sản phẩm vào đơn
                </button>

            </div>




        </form>


    </div>
@endsection
@section('js')



    <script src="{{ asset('js/back-end/admin/new/add/add.js') }}"></script>

@endsection
