@extends('layouts.admin.index')

@section('main')
    <h1 class="mt-3">{{ ucfirst($controllerName) }}</h1>
    <div class="row mt-3">
        <div class="col-md-auto">
            <form class="d-flex" action="" method="GET">
                <input class="form-control me-2" type="search" placeholder="Tìm theo tên" name="search">
                <button class="btn btn-outline-success" type="submit">Tìm</button>
            </form>
        </div>
        <div class="col-md-auto ms-auto">
            <a class="btn btn-success" href="{{ route('category.create') }}">Thêm</a>
        </div>     
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            @if (session('notify'))
                <div class="alert alert-success">
                    {{ session('notify') }}
                </div>
            @endif
            
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Thuộc danh mục cha</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Ngày tạo/Ngày cập nhật</th>
                    <th scope="col">Hành động</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        use App\Models\CategoryModel;
                        use App\Http\Helper\Template;
                        $index = 0;
                    @endphp
                    @if (count($items) > 0)
                        @foreach ($items as $item)
                            @php
                                $id             = $item->id;
                                $name           = $item->name;
                                $slug           = $item->slug;
                                $parent_id      = $item->parent_id;
                                $status         = Template::showStatus(url()->current(), $item->status, $id);
                                $created_at     = $item->created_at;
                                $updated_at     = $item->updated_at;
                                
                                $categoryModel  = new CategoryModel();
                                $parent_name    = $parent_id == 0 ? '<span style="color:red;">Cha</span>' : $categoryModel->getItem($parent_id, ['task' => 'admin-get-item'])->name;

                                $message        = 'Bạn xác nhận muốn xóa dòng này?';
                                if($categoryModel->isParent($id)){
                                    $message = 'Xóa chuyên mục Cha sẽ đồng thời xóa toàn bộ các chuyên mục con, bạn xác nhận muốn xóa?';
                                }
                            @endphp                       
                            <tr>
                                <th scope="row">{{ $index += 1 }}</th>
                                <td>{{ $name }}</td>
                                <td>{!! $parent_name !!}</td>
                                <td>{!! $status !!}</td>
                                <td>{{ $created_at }} <br> {{ $updated_at }}</td>
                                <td>
                                    <form action="{{ route('category.destroy', ['category' => $item->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-primary btn-sm" href="{{ route('category.edit', ['category' => $id, 'parent_id' => $parent_id]) }}">Sửa</a>
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('{{ $message }}')">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center">Empty</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            {{ $items->links() }}
        </div>
    </div>
@endsection
