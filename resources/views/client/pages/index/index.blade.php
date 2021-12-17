@extends('layouts.client.index')

@section('title', 'Cá cảnh giá rẻ | Bảng giá')

@section('main') 

    @include('client.pages.index.list', ['items' => $items])

@endsection