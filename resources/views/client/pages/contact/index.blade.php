@extends('layouts.client.index')

@php
use App\Http\Helper\Meta;
@endphp

@section('canonical', route('contact'))
@section('og-type', 'website')
@section('og-url', route('contact'))
@section('article-modified_time', now())
@section('og-image', asset('client/assets/images/favicon.jpg'))

@section('title', Meta::showTitle($options['meta_title_contact'], $options))
@section('og-title', Meta::showTitle($options['meta_title_contact'], $options))
@section('desc', Meta::showDesc($options['meta_desc_contact'], $options))
@section('og-desc', Meta::showDesc($options['meta_desc_contact'], $options))

@section('main')
  
    <div class="container">
        <div class="fs-1 color-blue">Liên hệ</div>
        <div class="fs-3 fw-bold color-red">{{ $options['site_name'] }}</div>
        <div class="fs-6 fw-bold fst-italic color-blue">Địa chỉ: {{ $options['contact_address'] }}</div>
        <br>
        <div class="fs-5 fw-bold fst-italic color-red">Điện thoại {{ $options['contact_phone'] }}</div>
        <div class="fs-6 fw-bold fst-italic color-blue">{{ $options['contact_email'] }}</div>
    </div>

    <div class="container mt-5">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.239885302712!2d106.75660311526056!3d10.869350560442602!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527889de52729%3A0xfde2b42acee9b6ac!2zODAgxJDGsOG7nW5nIE5nw7QgR2lhIFThu7EsIEFuIELDrG5oLCBExKkgQW4sIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1636773758791!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

@endsection