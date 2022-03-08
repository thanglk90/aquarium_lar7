@extends('layouts.admin.index')

@section('main')
    <h1 class="mt-4">{{ ucfirst($controllerName) }}</h1>

    <div class="row mt-4">
        <form action="{{ route('option.update', ['option' => $item->id]) }}" method="POST">
            <input type="hidden" name="id" value="{{ $item->id }}">
            @csrf
            @method('PUT')
            <div class="offset-md-4 col-md-4">
                <div class="mb-3">
                    <label class="form-label"><h4>Tên hạng mục tùy chọn</h4></label>
                    <input type="text" name="name"  class="form-control" id="slug_resource" placeholder="Tên tùy chọn" value="{{ $item->name }}">

                    @if ($errors->has('name'))
                        <span style="color:red;">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                
                <div class="mb-3">
                    <label class="form-label"><h4>Giá trị hạng mục tùy chọn</h4></label>
                    {{-- <input type="text" name="value"  class="form-control" id="slug_resource" placeholder="Giá trị của tùy chọn" value="{{ $item->value }}"> --}}
                    <textarea name="value" cols="30" rows="5" class="form-control">{{ $item->value }}</textarea>

                    @if ($errors->has('value'))
                        <span style="color:red;">{{ $errors->first('value') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label"><h4>Ghi chú</h4></label>
                    <textarea name="note" cols="30" rows="7" class="form-control">{{ $item->note }}</textarea>
                </div>

                <div class="d-grid gap-2 col-6 mx-auto">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type='submit' class="btn btn-primary me-3" type="button">Cập nhật</button>
                        <a type='submit' class="btn btn-warning" href="{{ route($controllerName . '.index') }}">Quay về</a>
                    </div>
                </div>
                
            </div>
        </form>
    </div>
@endsection