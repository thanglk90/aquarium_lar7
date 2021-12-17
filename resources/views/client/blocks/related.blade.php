@php
    use App\Http\Helper\Url;
@endphp

<div class="related my-5">
    <div class="container">
        @if (count($items) > 0)            
            <h3 class="color-blue">Sản phẩm cùng loại</h3>
            <div class="owl-carousel owl-theme">
                @foreach ($items as $item)    
                    @php
                        $name        = $item->name;
                        $price       = $item->sale_price > 0 ? $item->sale_price : $item->price;
                        $price       = number_format($price, 0, '', '.') . ' VNĐ';
                        $thumb       = Url::linkThumb($item->thumb);
                    @endphp                
                    <div class="product-item">
                        <a href="{{ route('detail', ['slug' => $item->slug]) }}">
                            <div class="product-item__box-img">
                                <img src="{{ $thumb }}" alt="{{ $name }}">
                            </div>
                            <div class="product-item__name">
                                {{ $name }}
                            </div>
                            <div class="product-item__price">
                                <span class="color-red">Giá: {{ $price }}</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            
        @endif
    </div>
</div>