@extends('layouts.client.index')

@php
use App\Http\Helper\Meta;
@endphp

@section('canonical', route('client-home'))
@section('og-type', 'website')
@section('og-url', route('client-home'))
@section('article-modified_time', now())
@section('og-image', asset('client/assets/images/favicon.jpg'))

@section('title', Meta::showTitle($options['meta_title_home_page'], $options))
@section('og-title', Meta::showTitle($options['meta_title_home_page'], $options))
@section('desc', Meta::showDesc($options['meta_desc_home_page'], $options))
@section('og-desc', Meta::showDesc($options['meta_desc_home_page'], $options))

@section('main')

    @include('client.pages.index.list', ['items' => $items])

@endsection
