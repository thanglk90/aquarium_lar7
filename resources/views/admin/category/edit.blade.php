@extends('layouts.admin.index')

@section('main')
    <h1 class="mt-4">{{ ucfirst($controllerName) }}</h1>

    <div class="row mt-4">
        <form action="{{ route('category.update', ['category' => $item->id]) }}" method="POST">
            <input type="hidden" name="id" value="{{ $item->id }}">
            @method('PUT')
            @csrf
            <div class="offset-md-4 col-md-4">
                <div class="mb-3">
                    <label class="form-label"><h4>Tên danh mục</h4></label>
                    <input type="text" name="name"  class="form-control" id="slug_resource" onkeyup="ChangeToSlug();" placeholder="Tên danh mục" value="{{ $item->name }}">

                    @if ($errors->has('name'))
                        <span style="color:red;">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                
                <div class="mb-3">
                    <label class="form-label"><h4>Đường dẫn SEO</h4></label>
                    <input type="text" name="slug" class="form-control" id="convert_slug" placeholder="vd: ao-nam" value="{{ $item->slug }}">

                    @if ($errors->has('slug'))
                        <span style="color:red;">{{ $errors->first('slug') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label"><h4>Danh mục cha</h4></label>
                    <select class="form-select" name="parent_id" aria-label="Default select example">
                        <option value="0" selected>Cha</option>
                        @foreach ($categoryList as $category)
                            @if ($category->id == $item->parent_id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>  
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>

                    @if ($errors->has('parent_id'))
                        <span style="color:red;">{{ $errors->first('parent_id') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Trạng thái danh mục {{ $item->status }}</h4></label>
                    <div class="form-check">
                        
                        <input class="form-check-input" type="radio" name="status" id="status1" value="inactive" {{ ($item->status == 'inactive') ? 'checked' : '' }}>
                        <label class="form-check-label" for="status1">
                            Ẩn
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status2" value="active" {{ ($item->status == 'active') ? 'checked' : '' }}>
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
                        <button type='submit' class="btn btn-primary me-3" type="button">Cập nhật</button>
                        <a type='submit' class="btn btn-warning" href="{{ route($controllerName . '.index') }}">Quay về</a>
                    </div>
                </div>
                
            </div>
        </form>
    </div>
@endsection