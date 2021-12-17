@extends('layouts.client.index')

@section('title', ucfirst($item->name))

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
                'url'  => route('home'),
                'active' => false
            ],
            'parent' => [
                'name' => $cate_parent->name,
                'url'  => route('cate_parent', ['slug' => $cate_parent->slug]),
                'active' => false
            ],
            'sub' => [
                'name' => $cate_sub->name,
                'url'  => route('cate_sub', ['slug' => $cate_sub->slug]),
                'active' => false
            ],
            'detail' => [
                'name' => $item->name,
                'url'  => '',
                'active' => true
            ],
        ]
    @endphp
    @include('client.blocks.breadcrumb', $breadcrumb)
@endsection

@section('main')
  
    @include('client.pages.detail.introduce')

    @include('client.blocks.related', ['items' => $related_products])

@endsection