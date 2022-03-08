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
            <a class="btn btn-success" href="{{ route('banner.create') }}">Thêm</a>
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
                    <th width="5%" scope="col">#</th>
                    <th width="15%" scope="col">Tên vị trí banner</th>
                    <th width="" scope="col">Hình ảnh</th>
                    <th width="30%" scope="col">Giải thích</th>
                    {{-- <th width="10%" scope="col">Ngày tạo/Ngày cập nhật</th> --}}
                    <th width="10%" scope="col">Hành động</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        use App\Http\Helper\Template;
                        $index = 0;
                    @endphp
                    @if (count($items) > 0)
                        @foreach ($items as $item)
                            @php
                                $id             = $item->id;
                                $name           = $item->name;
                                $thumb           = $item->thumb;
                                $note           = $item->note;
                                $created_at     = $item->created_at;
                                $updated_at     = $item->updated_at;
                            @endphp                       
                            <tr>
                                <th scope="row">{{ $index += 1 }}</th>
                                <td>{{ $name }}</td>
                                <td>{!! $thumb !!}</td>
                                <td>{!! $note !!}</td>
                                {{-- <td>{{ $created_at }} <br> {{ $updated_at }}</td> --}}
                                <td>
                                    <form action="{{ route('banner.destroy', ['banner' => $item->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-primary btn-sm" href="{{ route('banner.edit', ['banner' => $id]) }}">Sửa</a>
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Bạn xác nhận xóa vĩnh viễn dòng này?')">Xóa</button>
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
