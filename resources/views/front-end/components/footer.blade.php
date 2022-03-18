<footer id="footer" class="footer-1 py-8 sm:py-12 text-white"
    style="background-image: url('{{ asset('images/front-end/footer/footer-bg.jpg') }}'); background-repeat: no-repeat; background-size: cover;">
    <div class="container mx-auto px-4">
        <div class="sm:flex sm:flex-wrap sm:-mx-4 md:py-4">
            <div class="px-4 sm:w-1/2 md:w-1/4 xl:w-1/6 mt-8 md:mt-0">
                <h5 class="text-xl font-bold mb-6">Địa chỉ</h5>
                <ul class="list-none footer-links">
                    <li class="mb-2">
                        <a href="{{ route('contact') }}"
                            class="border-b border-solid border-transparent hover:border-yellow-500 hover:text-yellow-500">số nhà 02, ngõ 209/22/4 đường An Dương Vương, Quận Tây Hồ, TP. Hà Nội</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('contact') }}"
                            class="border-b border-solid border-transparent hover:border-yellow-500 hover:text-yellow-500">Bản đồ</a>
                    </li>
                </ul>
            </div>
            <div class="px-4 sm:w-1/2 md:w-1/4 xl:w-1/6 mt-8 md:mt-0">
                <h5 class="text-xl font-bold mb-6">Về chúng tôi</h5>
                <ul class="list-none footer-links">
                    <li class="mb-2">
                        <a href="{{ route('aboutus') }}"
                            class="border-b border-solid border-transparent hover:border-yellow-500 hover:text-yellow-500">Đội
                            ngũ</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('shippingPolicy') }}"
                            class="border-b border-solid border-transparent hover:border-yellow-500 hover:text-yellow-500">Chính
                            sách</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('paymentMethod') }}"
                            class="border-b border-solid border-transparent hover:border-yellow-500 hover:text-yellow-500">Phương
                            thức thanh toán</a>
                    </li>
                </ul>
            </div>

            <div class="px-4 sm:w-1/2 md:w-1/4 xl:w-1/6 mt-8 md:mt-0">
                <h5 class="text-xl font-bold mb-6">Hỗ trợ</h5>
                <ul class="list-none footer-links">
                    <li class="mb-2">
                        <a href="#"
                            class="border-b border-solid border-transparent hover:border-yellow-500 hover:text-yellow-500">Hotline1:
                            0983.538.799</a>
                    </li>
                    <li class="mb-2">
                        <a href="#"
                            class="border-b border-solid border-transparent hover:border-yellow-500 hover:text-yellow-500">Hotline2:
                            0942.309.818</a>
                    </li>
                    <li class="mb-2">
                        <a href="#"
                            class="border-b border-solid border-transparent hover:border-yellow-500 hover:text-yellow-500">Liên
                            hệ qua Zalo: 0983.538.799</a>
                    </li>
                    <li class="mb-2">
                        <a href="#"
                            class="border-b border-solid border-transparent hover:border-yellow-500 hover:text-yellow-500">Liên
                            hệ qua Zalo: 0942.309.818</a>
                    </li>
                    <li class="mb-2">
                        <a href="#"
                            class="border-b border-solid border-transparent hover:border-yellow-500 hover:text-yellow-500">Email: bachdieptrasen@gmail.com</a>
                    </li>
                    
                </ul>
            </div>
            <div class="px-4 sm:w-1/2 md:w-1/4 xl:w-1/6 mt-8 md:mt-0">

            </div>
            <div class="px-4 mt-4 sm:w-1/3 xl:w-1/6 sm:mx-auto xl:mt-0 xl:ml-auto">
                <h5 class="text-xl font-bold mb-6 sm:text-center xl:text-left">Kênh truyền thông</h5>
                <div class="flex sm:justify-center xl:justify-start">
                    <a href="https://www.facebook.com/profile.php?id=100077337032292" target="blank"
                        class="w-8 h-8 border border-2 border-gray-400 rounded-full text-center py-0.5 text-white hover:text-white hover:bg-blue-600 hover:border-blue-600">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="https://www.youtube.com/channel/UCRl6H_hiKQ-3oli2uK8hlUA" target="blank"
                        class="w-8 h-8 border border-2 border-gray-400 rounded-full text-center py-0.5 ml-2 text-white hover:text-white hover:bg-red-400 hover:border-red-400">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="#"
                        class="w-8 h-8 border border-2 border-gray-400 rounded-full text-center py-0.5 ml-2 text-white hover:text-white hover:bg-red-600 hover:border-red-600">
                        <i class="fab fa-google-plus-g"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    .footer-links {
        a {
            padding-bottom: 2px;
        }
    }

</style>
