@extends('front-end.app')
@section('content')
<div class="w-full px-6 pb-10 flex" style="background-color: #fafafa;">
    {{-- content --}}
    <div class="w-full justify-around items-center pt-8 lg:pl-7">
        <div class="font-normal text-3xl pb-3">Liên hệ chúng tôi</div>
        <div>
            <div class="font-bold text-lg text-center">
                Bách Diệp Trà Shop.
            </div>
            <div class="text-center p-2">
                Địa chỉ: số nhà 02, ngõ 209/22/4 đường An Dương Vương, Quận Tây Hồ, TP. Hà Nội
            </div>
            <div class="text-center p-2">
                Điện thoại:
                <span  class="text-green-primary font-semibold">
                    0983.538.799 <span class="text-black">hoặc</span> 0942.309.818
                </span>
            </div>
            <div class="text-center p-2 pb-5">
                Email: 
                <a href = "" class="text-green-primary hover:text-green-primary_1 font-semibold">
                    bachdieptra@gmail.com
                </a>
            </div>

            <div class="font-normal text-2xl pb-10">Bản đồ</div>
            <div class="flex-col lg:flex-row flex justify-around items-center pb-10">
                <iframe class="map w-full h-80 lg:mr-8"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d232.66438888411182!2d105.80552059957034!3d21.087426214852243!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1641974401170!5m2!1svi!2s"
                    style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>

        </div>
    </div>
</div>
@endsection