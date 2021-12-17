<div class="filter mt-3">
    <form>
        @csrf
        <div class="container">
            @if (count($cate_parents) > 0)
                <div class="row filter-box justify-content-end">
                    <div class="col-md-auto col-6 mt-1 col-sm-4">
                        <select class="form-select" id="category-parent">
                            <option selected="true" disabled="disabled">Danh mục cha</option>
                            @foreach ($cate_parents as $cate_parent)
                                <option value="{{ $cate_parent->slug }}">{{ $cate_parent->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-auto col-6 mt-1 col-sm-4">
                        <select class="form-select" id="category-child">
                            <option selected="true" disabled="disabled">Danh mục con</option>
                        </select>
                    </div>
                    <div class="col-md-auto col-6 mt-1 col-sm-4">
                        <select class="form-select" id="product-select">
                            <option selected="true" disabled="disabled">Sản phẩm</option>
                        </select>
                    </div>
                    <div class="col-md-auto col-6 mt-1 col-sm-4 search-submit-btn">
                        <button type="submit" class="btn btn-danger">Tìm kiếm</button>
                    </div>
                </div>
            @else
                
            @endif
            
        </div>
    </form>
</div>