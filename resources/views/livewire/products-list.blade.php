<div class="mt-11  flex flex-wrap justify-start gap-14">

    @foreach($products as $product)
        <div>
            <div class="w-72 h-72  3xl:w-80 3xl:h-80 overflow-clip bg-gray-200 rounded">
                <img src="{{$product->image_cover}}" alt="{{$product->title}}"/>
            </div>
            <div class="mt-2.5 flex justify-between">
                <div>
                    <h3 class="font-light">{{$product->title}}</h3>
                    <div class="font-[400] text-lg">£{{number_format($product->price,2)}}</div>
                    <div class="mt-1 flex items-center gap-1  font-[400]">
                        <img src="/images/avatar.png"/>
                        <h3 class="text-xs">Josie Parker</h3>
                        
                    </div>
                </div>

                <div class="w-9 h-9 flex justify-center items-center border-[rgba(229, 229, 229, 1)] border rounded">
                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4.53487 5.52572C3.07041 6.99018 3.07041 9.36455 4.53487 10.829L10.9366 17.2307L17.3382 10.829C18.8026 9.36455 18.8026 6.99018 17.3382 5.52572C15.8737 4.06125 13.4993 4.06125 12.0349 5.52572L10.9366 6.62411L9.83817 5.52572C8.37371 4.06125 5.99934 4.06125 4.53487 5.52572Z"
                            stroke="#171717" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
        </div>
    @endforeach
</div>
