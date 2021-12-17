@php
    use App\Http\Helper\Url;
    // echo '<pre>';
    // print_r($item);
    // echo '</pre>';die();

    $name        = $item->name;
    $price       = $item->sale_price > 0 ? $item->sale_price : $item->price;
    $price       = number_format($price, 0, '', '.') . ' VNĐ';
    $store       = $item->store > 0 ? 'Còn hàng' : 'Hết hàng';
    $introduce   = $item->introduce ?? '';
    $sku         = $item->sku;
    // $guarantee   = $item->guarantee > 0 ? $item->guarantee . 'T' : 'Sản phẩm không thuộc diện bảo hành';
    $thumb       = Url::linkThumb($item->thumb);

@endphp

<div class="product-detail">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="product-detail__img">
                    <img src="{{ $thumb }}" alt="{{ $name }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-detail__box">
                    <h3 class="product-detail__name color-red fw-bold">{{ $name }}</h3>
                    <div class="product-field">
                        <div class="product-detail__price"><strong>Giá sỉ: </strong> <span class="color-red fw-bold">{{ $price }}</span></div>
                        <div class="product-detail__note color-red">
                            *** Lưu ý: Giá lẻ = Giá sỉ + (5 -> 50k) tùy theo sản phẩm và chưa bao gồm phí vận chuyển
                        </div>
                        <div class="product-detail__sku"><strong>Mã sản phẩm: </strong> {{ $sku }}</div>
                        <div class="product-detail__store"><strong>Tình Trạng: </strong> <span class="color-blue fw-bold">{{ $store }}</span></div>
                        {{-- <div class="product-detail__guarantee"><strong>Bảo hành: </strong> {{ $guarantee }}</div> --}}
                        {{-- <div class="product-detail__views"><strong>Lượt xem: </strong> 314</div> --}}
                        @if ($introduce != '')
                            <div class="product-detail__introduce">
                                <strong>Giới thiệu:</strong> <br>
                                {!! $introduce !!}
                            </div>                            
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

