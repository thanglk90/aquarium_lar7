@extends('layouts.admin.index')

@section('main')
    <h1 class="mt-4">{{ ucfirst($controllerName) }}</h1>

    <div class="row mt-4">
        <form action="{{ route('banner.store') }}" method="POST">
            @csrf
            <div class="offset-md-4 col-md-4">
                <div class="mb-3">
                    <label class="form-label"><h4>Tên vị trí banner</h4></label>
                    <input type="text" name="name" class="form-control" id="slug_resource" placeholder="Tên tùy chọn" value="{{ old('name') }}">

                    @if ($errors->has('name'))
                        <span style="color:red;">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label"><h5>Hình ảnh banner</h5></label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose
                            </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="thumb" value="{{ old('thumb') }}">
                    </div>
                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                </div>

                <div class="mb-3">
                    <label class="form-label"><h4>Ghi chú</h4></label>
                    <textarea name="note" cols="30" rows="7" class="form-control">{{ old('note') }}</textarea>
                </div>

                <div class="d-grid gap-2 col-6 mx-auto">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type='submit' class="btn btn-primary me-3" type="button">Tạo</button>
                        <a type='submit' class="btn btn-warning" href="{{ route($controllerName . '.index') }}">Quay về</a>
                    </div>
                </div>
                
            </div>
        </form>
    </div>
@endsection

