@extends('back-end.app')
@section('title')
    <title>
        Thêm khuyến mãi
    </title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/back-end/admin/promotion/promotion.css') }}">
@endsection
@section('back-end.contents')

    @include('back-end.components.content-header',['name'=>'Khuyến mãi','key'=>' | Thêm'])
    <!-- component -->
    <div class="overflow-x-auto flex flex-col">

        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('promotion.store') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Tên sự kiện khuyến mãi &nbsp <span class="text-red-500 text-base">*</span>
                </label>
                <input @if (session()->has('name')) value="{{ session()->get('name') }}"  @else value="{{ old('name') }}" @endif
                    class="@error('name') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="name" name="name" type="text" placeholder="Nhập tên quảng cáo">
            </div>

            <div class="mb-4">
                @error('name')
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

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Giới hạn thời gian &nbsp <span class="text-red-500 text-base">*</span>
                </label>
                <div class="flex @error('limitTime') is-invalid @enderror">
                    <div class="flex items-center mb-2 mr-4">
                        <input @if (session()->has('name')) checked @endif type="radio" value="1" id="radio-example-1" name="limitTime"
                            class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2" onclick="displayDetailTime()">
                        <label for="radio-example-1" class="text-gray-600">Có</label>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" value="0" id="radio-example-2" name="limitTime"
                            class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2" onclick="displayDetailTime()">
                        <label for="radio-example-2" class="text-gray-600">Không</label>
                    </div>
                </div>
            </div>


            <div class="mb-6">
                @error('limitTime')
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

            <div id="time" class="hidden">
                <div class="mb-6 flex">
                    <div>
                        <label for="appt-time" class="block text-gray-700 text-sm font-bold mb-2">Nhập thời gian bắt đầu
                        </label>
                        <input id="appt-time" type="time" name="time_start" step="1">
                    </div>
                    <div>
                        <label for="start">:</label>

                        <input type="date" id="start" name="date_start" min="2021-01-01">
                    </div>
                </div>
                <div class="mb-6 flex">
                    <div>
                        <label for="appt-time" class="block text-gray-700 text-sm font-bold mb-2">Nhập thời gian kết thúc
                        </label>
                        <input id="appt-time" type="time" name="time_end" step="1">
                    </div>
                    <div>
                        <label for="start">:</label>
                        <input type="date" id="start" name="date_end" min="2021-01-01">
                    </div>
                </div>
            </div>
            <div class=" mb-6  ">
                @if (session()->has('fail'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">{{ session()->get('fail') }}</strong>

                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <title>Close</title>
                                <path
                                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                            </svg>
                        </span>
                    </div>
                @endif
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Thêm mới
                </button>
            </div>
        </form>
    </div>
    <script>
        function displayDetailTime() {
            var r0 = document.getElementById("radio-example-1");
            var r1 = document.getElementById("radio-example-2");
            var text = document.getElementById('time');
            if (r0.checked == true) {
                text.classList.remove('hidden');
            }
            if (r1.checked == true) {
                text.classList.add('hidden');
            }
        }
    </script>
@endsection
