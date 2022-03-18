@extends('back-end.app')
@section('title')
    <title>
        Sản phẩm
    </title>
@endsection

@section('back-end.contents')

    @include('back-end.components.content-header',['name'=>'Sản phẩm','key'=>''])
    <!-- component -->
    <div class="overflow-x-auto flex flex-col">
        <div class="flex flex-row-reverse">
            <div class="m-6"><a href="{{ route('product.create') }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="button">
                    Thêm
                </a></div>
        </div>
        <div class=" w-11/12  mx-auto mx-8 bg-green-700  table-auto">
            @if (session()->has('success'))
                <div class="bg-green-300 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                    role="alert">
                    <div class="flex">
                        <div class="py-1"><i class=" fas fa-check-circle fill-current h-6 w-6 text-green-700 mr-4">
                            </i></div>
                        <div>
                            <p class="text-lg">{{ session()->get('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div>
            <div class=" w-11/12  mx-auto mx-8  table-auto">
                {{ $products->links() }}
            </div>


        </div>
        <div>
            <table class=" w-11/12  mx-auto mx-8  table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Tên sản phẩm</th>
                        <th class="py-3 px-6 text-center">Hình ảnh</th>
                        <th class="py-3 px-6 text-left">Giá gốc</th>
                        <th class="py-3 px-6 text-center">Giá khuyến mãi</th>
                        <th class="py-3 px-6 text-center">Số lượng</th>
                        <th class="py-3 px-6 text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($products as $product)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="font-medium">{{ $product->name }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center">

                                    <img style="width: 150px;height: 100px;"
                                        src="{{ asset('storage/product') . '/' . $product->linkImg }}" />

                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <span class="font-medium">{{ number_format($product->priceRoot) }} VND</span>
                                </div>
                            </td>
                            @if (empty($product->pricePromo))
                                <td class="py-3 px-6 text-center">
                                    <span class="font-medium">

                                        .........................

                                    </span>
                                </td>

                            @else
                                <td class="py-3 px-6 text-center">
                                    <span class="font-medium">

                                        {{ number_format($product->pricePromo) }}

                                    </span>
                                </td>


                            @endif
                            <td class="py-3 px-6 text-center">
                                <span class="font-medium">{{ $product->quantity }}</span>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">

                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <a href="{{ route('product.edit', ['id' => $product->id]) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </div>
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <a href="{{ route('product.delete', ['id' => $product->id]) }}"
                                            onclick="return myFunction();" href="">
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

    <script src="{{ asset('js/back-end/admin/bank/index/index.js') }}"></script>
@endsection
