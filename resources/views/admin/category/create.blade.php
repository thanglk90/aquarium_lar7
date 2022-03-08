@extends('layouts.admin.index')

@section('main')
    <h1 class="mt-4">{{ ucfirst($controllerName) }}</h1>

    <div class="row mt-4">
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="offset-md-4 col-md-4">
                <div class="mb-3">
                    <label class="form-label"><h4>Tên danh mục</h4></label>
                    <input type="text" name="name"  class="form-control" id="slug_resource" onkeyup="ChangeToSlug();" placeholder="Tên danh mục">

                    @if ($errors->has('name'))
                        <span style="color:red;">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                
                <div class="mb-3">
                    <label class="form-label"><h4>Đường dẫn SEO</h4></label>
                    <input type="text" name="slug" class="form-control" id="convert_slug" placeholder="vd: ao-nam">

                    @if ($errors->has('slug'))
                        <span style="color:red;">{{ $errors->first('slug') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label"><h4>Danh mục cha</h4></label>
                    <select class="form-select" name="parent_id" aria-label="Default select example">
                        <option value="0" selected>Cha</option>
                        @foreach ($categoryList as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('parent_id'))
                        <span style="color:red;">{{ $errors->first('parent_id') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label"><h5>Mô tả của thẻ Meta SEO - 300 kí tự (chèn tên danh mục bằng ':category', tên trang bằng ':site_name')</h5></label>
                    <textarea name="seo_desc" class="form-control">{{ old('seo_desc') }}</textarea>

                    @if ($errors->has('seo_desc'))
                        <span style="color:red;">{{ $errors->first('seo_desc') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label"><h4>Trạng thái danh mục</h4></label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status1" value="inactive">
                        <label class="form-check-label" for="status1">
                            Ẩn
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status2" value="active" checked>
                        <label class="form-check-label" for="status2">
                            Hiện
                        </label>
                    </div>

                    @if ($errors->has('status'))
                        <span style="color:red;">{{ $errors->first('status') }}</span>
                    @endif
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