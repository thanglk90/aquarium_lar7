@php
    use App\Http\Helper\Url;
@endphp

<div class="container">
    @if (count($items) > 0)
        @php
            
            // echo '<pre>';
            // print_r($items);
            // echo '</pre>';die();
            
            $number_line = 1;
        @endphp

        @foreach ($items as $key => $item)
            
            @if (count($item['products']) > 0)
                @php
                    // echo '<pre>';
                    // print_r($item);
                    // echo '</pre>';die();  
                    $cate_sub_name = $item['cate_sub']['name'];
                    $cate_sub_slug = $item['cate_sub']['slug'];
                    $cate_sub_url  = route('cate_sub', ['slug' => $cate_sub_slug]);
                @endphp

                <div class="homepage-introduce">
                    <div class="title-box line-{{ $number_line }}">
                        <h2 class="title-box__text">
                            <a href="{{ $cate_sub_url }}">{{ $cate_sub_name }}</a>
                        </h2>
                        <a href="{{ $cate_sub_url }}" class="title-box__more">Xem thêm >></a>
                    </div>

                    <div class="product-list">
                        @foreach ($item['products'] as $product)
                            @php
                                
                                // echo '<pre>';
                                // print_r($product);
                                // echo '</pre>';die();

                                $name   = $product['name'];
                                $price  = $product['sale_price'] > 0 ? $product['sale_price'] : $product['price'];
                                $price  = number_format($price, 0, '', '.') . ' VNĐ';
                                $thumb  = Url::linkThumbSmall($product['thumb']);
                                $link   = route('detail', ['slug' => $product['slug']]);
                            @endphp
                            <div class="product-item">
                                <a href="{{ $link }}" alt="{{ $name }}">
                                    <div class="product-item__flag">Chính hãng</div>
                                    <div class="product-item__box-img">
                                        <img class="lazy" src="{{ asset('client/assets/images/loading.gif') }}" data-src="{{ $thumb }}" alt="{{ $name }}">
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
                </div>

                @php
                    if($number_line == 5) {
                        $number_line = 1;
                    }else {
                        $number_line++;
                    }
                    
                @endphp
            @endif

        @endforeach
    @else
        <div class="row">
            <div class="col-md-12">Sản phẩm đang cập nhật</div>
        </div>
    @endif
    

   
</div>

