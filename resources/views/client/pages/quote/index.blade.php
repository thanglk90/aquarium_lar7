@extends('layouts.client.index')

@php
use App\Http\Helper\Meta;
@endphp

@section('canonical', route('quote'))

@section('og-type', 'website')
@section('og-url', route('quote'))
@section('article-modified_time', now())
@section('og-image', asset('client/assets/images/favicon.jpg'))

@section('title', Meta::showTitle($options['meta_title_quote'], $options))
@section('og-title', Meta::showTitle($options['meta_title_quote'], $options))
@section('desc', Meta::showDesc($options['meta_desc_quote'], $options))
@section('og-desc', Meta::showDesc($options['meta_desc_quote'], $options))


@section('mainTitle')
    @include('client.blocks.mainTitle', [
        'text' => 'BẢNG GIÁ TẤT CẢ SẢN PHẨM',
    ])
@endsection

@section('main')

    @include('client.pages.quote.searchBox')

    @include('client.pages.quote.quoteHeader')

    <div class="banggia">
        <div class="container">
            @if (count($items) > 0)
                @php
                    // echo '<pre>';
                    // print_r($items);
                    // echo '</pre>';die();
                @endphp

                @foreach ($items as $item)
                    @php
                        $category_name = $item['category_name'];
                    @endphp

                    <div class="banggia-wrapper">
                        <div class="banggia__title">
                            {{ $category_name }}
                        </div>

                        @foreach ($item['products'] as $key => $product)
                            @php
                                $name = $product['name'];
                                $price = number_format($product['price'], 0, '', ',');
                                // $guarantee = $product['guarantee'] > 0 ? $product['guarantee'] . 'T' : "0T";
                                $store = $product['store'] > 0 ? 'Còn hàng' : 'Liên hệ';
                            @endphp

                            <div class="banggia__list">
                                <div class="banggia__list-item banggia__list-item-name">
                                    {{ $name }}
                                </div>
                                <div class="banggia__list-item banggia__list-item-price">{{ $price }}</div>
                                {{-- <div class="banggia__list-item banggia__list-item-guarantee">{{ $guarantee }}</div> --}}
                                <div class="banggia__list-item banggia__list-item-store">{{ $store }}</div>
                                <div class="banggia__list-item banggia__list-item-detail banggia__list-item-detail-view">
                                    <a href="{{ route('detail', ['slug' => $product['slug']]) }}">XEM HÌNH</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            @else
                <div class="row">
                    <div class="col-md-12">Sản phẩm đang cập nhật</div>
                </div>
            @endif



        </div>
    </div>
@endsection
