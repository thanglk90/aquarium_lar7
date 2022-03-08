@extends('layouts.client.index')

@php
use App\Http\Helper\Meta;
@endphp

@section('canonical', route('detail', ['slug' => $item->slug]))
@section('og-type', 'article')
@section('og-url', route('detail', ['slug' => $item->slug]))
@section('article-modified_time', $item->updated_at)
@section('og-image', route('client-home') . '/storage/photos/shares/products/' . $item->thumb)

@section('title', Meta::showTitle($options['meta_title_detail'], $options, ['product' => $item->name])))
@section('og-title', Meta::showTitle($options['meta_title_detail'], $options, ['product' => $item->name])))
@section('desc', Meta::showDesc($item->seo_desc ?? $options['meta_desc_detail'], $options, ['product' => $item->name]))
@section('og-desc', Meta::showDesc($item->seo_desc ?? $options['meta_desc_detail'], $options, ['product' => $item->name]))

@section('breadcrumb')
    @php
    // echo '<pre>';
    // print_r($cate_parent->toArray());
    // echo '</pre>';
    // echo '<pre>';
    // print_r($cate_sub->toArray());
    // echo '</pre>';

    $breadcrumb = [
        'home' => [
            'name' => 'Trang chủ',
            'url' => route('home'),
            'active' => false,
        ],
        'parent' => [
            'name' => $cate_parent->name,
            'url' => route('cate_parent', ['slug' => $cate_parent->slug]),
            'active' => false,
        ],
        'sub' => [
            'name' => $cate_sub->name,
            'url' => route('cate_sub', ['slug' => $cate_sub->slug]),
            'active' => false,
        ],
        'detail' => [
            'name' => $item->name,
            'url' => '',
            'active' => true,
        ],
    ];
    @endphp
    @include('client.blocks.breadcrumb', $breadcrumb)
@endsection

@section('main')

    @include('client.pages.detail.introduce')

    @include('client.blocks.related', ['items' => $related_products])

@endsection
