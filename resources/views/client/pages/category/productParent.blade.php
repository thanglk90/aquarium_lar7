@extends('layouts.client.index')

@php
use App\Http\Helper\Meta;
@endphp

@section('canonical', route('cate_parent', ['slug' => Str::slug($cate_parent->slug, '-')]))
@section('og-type', 'article')
@section('og-url', route('cate_parent', ['slug' => Str::slug($cate_parent->slug, '-')]))
@section('article-modified_time', $cate_parent->updated_at)
@section('og-image', asset('client/assets/images/favicon.jpg'))

@section('title', Meta::showTitle($options['meta_title_search_by_category'], $options, ['category' => $cate_parent->name]))
@section('og-title', Meta::showTitle($options['meta_title_search_by_category'], $options, ['category' => $cate_parent->name]))
@section('desc', Meta::showDesc($cate_parent->seo_desc ?? $options['meta_desc_search_by_category'], $options, ['category' => $cate_parent->name]))
@section('og-desc', Meta::showDesc($cate_parent->seo_desc ?? $options['meta_desc_search_by_category'], $options, ['category' => $cate_parent->name]))

@section('breadcrumb')
    @php
    $breadcrumb = [
        'home' => [
            'name' => 'Trang chủ',
            'url' => route('home'),
            'active' => false,
        ],
        'cate_parent' => [
            'name' => $cate_parent->name,
            'url' => '',
            'active' => true,
        ],
    ];
    @endphp

    @include('client.blocks.breadcrumb', $breadcrumb)

@endsection

@section('mainTitle')
    @include('client.blocks.mainTitle', [
        'text' => $cate_parent->name,
    ])
@endsection

@section('main')

    @php
    use App\Http\Helper\Url;
    // echo '<pre>';
    // print_r($items);
    // echo '</pre>';die();
    @endphp

    <div class="container">
        @if (count($items) > 0)
            <div class="product-list">
                @foreach ($items as $item)
                    @php
                        $name = $item->name;
                        $price = $item->sale_price > 0 ? $item->sale_price : $item->price;
                        $price = number_format($price, 0, '', '.') . ' VNĐ';
                        $thumb = Url::linkThumbSmall($item->thumb);
                        $link = route('detail', ['slug' => $item->slug]);
                    @endphp

                    <div class="product-item">
                        <a href="{{ $link }}">

                            <div class="product-item__flag">Chính hãng</div>
                            <div class="product-item__box-img">
                                <img src="{!! $thumb !!}" alt="{{ $name }}">
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
            <div class="row">
                <div class="col-md-12">
                    {{ $items->links() }}
                </div>
            </div>
        @else
            <div class="row mb-5">
                <div class="col-md-12">Nội dung đang cập nhật vui lòng quay lại sau!</div>
            </div>
        @endif
    </div>

@endsection
