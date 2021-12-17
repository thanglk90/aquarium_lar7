@extends('layouts.admin.index')

@section('main')
    @php
        use App\Models\CategoryModel;
        use App\Http\Helper\Template;
        
        $index = 0;
    @endphp
    <h1 class="mt-4">{{ ucfirst($controllerName) }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('notify'))
            <div class="alert alert-success">
                {{ session('notify') }}
            </div>
        @endif

        <form action="{{ route('product.update', ['product' => $item->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $item->id }}">
            <div class="row mt-4">
                <div class="col-md-7">
                    <div class="mb-3">
                        <label class="form-label"><h5>Tên sản phẩm</h5></label>
                        <input type="text" name="name"  class="form-control" id="slug_resource" onkeyup="ChangeToSlug();" placeholder="Tên sản phẩm" value="{{ $item->name }}">

                        @if ($errors->has('name'))
                            <span style="color:red;">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label"><h5>Đường dẫn SEO</h5></label>
                        <input type="text" name="slug" class="form-control" id="convert_slug" placeholder="vd: ao-nam" value="{{ $item->slug }}">

                        @if ($errors->has('slug'))
                            <span style="color:red;">{{ $errors->first('slug') }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><h5>Mã định danh sản phẩm (SKU)</h5></label>
                        <input type="text" name="sku" class="form-control" placeholder="vd: ao-nam" value="{{ $item->sku }}">

                        @if ($errors->has('sku'))
                            <span style="color:red;">{{ $errors->first('sku') }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><h5>Giới thiệu ngắn về sản phẩm</h5></label>
                        <textarea name="introduce" class="form-control" id="introduce_editor" placeholder="Mô tả sản phẩm">{{ $item->introduce }}</textarea>

                        @if ($errors->has('introduce'))
                            <span style="color:red;">{{ $errors->first('introduce') }}</span>
                        @endif
                    </div>

                    {{-- <div class="mb-3">
                        <label class="form-label"><h5>Mô tả sản phẩm</h5></label>
                        <textarea name="description" class="form-control" id="description_editor" placeholder="Mô tả sản phẩm">{{ $item->description }}</textarea>

                        @if ($errors->has('description'))
                            <span style="color:red;">{{ $errors->first('description') }}</span>
                        @endif
                    </div> --}}
                    
                    <div class="mb-3">
                        <label class="form-label"><h5>Trạng thái sản phẩm</h5></label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status1" value="inactive" {{ ($item->status == 'inactive') ? 'checked' : '' }}>
                            <label class="form-check-label" for="status1">
                                Ẩn
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status2" value="active" {{ ($item->status == 'active') ? 'checked' : '' }}>
                            <label class="form-check-label" for="status2">
                                Hiển thị
                            </label>
                        </div>

                        @if ($errors->has('status'))
                            <span style="color:red;">{{ $errors->first('status') }}</span>
                        @endif
                    </div>
                    
                </div>
                <div class="col-md-5">
                    <div class="mb-3">
                        <label class="form-label"><h5>Thuộc danh mục</h5></label>
                        <select class="form-select" name="category_id" aria-label="Default select example">
                            <option>Chọn danh mục sản phẩm</option>
                            @foreach ($categoryList as $id => $categoryName)
                                @if ($id == $item->category_id)
                                    <option value="{{ $id }}" selected>{{ $categoryName }}</option>
                                @else   
                                    <option value="{{ $id }}">{{ $categoryName }}</option>
                                @endif
                            @endforeach
                        </select>

                        @if ($errors->has('category_id'))
                            <span style="color:red;">{{ $errors->first('category_id') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><h5>Giá</h5></label>
                        <input type="text" name="price" class="form-control" placeholder="vd: 100000" value="{{ $item->price }}">

                        @if ($errors->has('price'))
                            <span style="color:red;">{{ $errors->first('price') }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><h5>Giá khuyến mãi</h5></label>
                        <input type="text" min="0" name="sale_price" class="form-control" placeholder="" value="{{ $item->sale_price }}">

                        @if ($errors->has('sale_price'))
                            <span style="color:red;">{{ $errors->first('sale_price') }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><h5>Tồn kho</h5></label>
                        <input type="text" min="0" name="store" class="form-control" placeholder="" value="{{ $item->store }}">

                        @if ($errors->has('store'))
                            <span style="color:red;">{{ $errors->first('store') }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><h5>Bảo hành (tháng)</h5></label>
                        <input type="text" min="0" name="guarantee" class="form-control" placeholder="" value="{{ $item->guarantee }}">

                        @if ($errors->has('guarantee'))
                            <span style="color:red;">{{ $errors->first('guarantee') }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><h5>Ảnh đại diện sản phẩm</h5></label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail" class="form-control" type="text" name="thumb" value="{{ $item->thumb }}">
                        </div>
                        <div id="holder" style="margin-top:15px;max-height:100px;">
                            {!! Template::showThumb($item->thumb) !!}
                        </div>
                        
                    </div>

                    <div class="d-grid gap-2 col-6 mx-auto">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type='submit' class="btn btn-primary me-3" type="button">Lưu</button>
                            <a type='submit' class="btn btn-warning" href="{{ route($controllerName . '.index') }}">Quay về</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    
@endsection