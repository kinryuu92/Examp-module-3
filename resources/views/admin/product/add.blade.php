@extends('layouts.admin')

@section('title')
    <title>Add product</title>
@endsection

@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet"/>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name'=>'product', 'key'=>'Add'])
        <div class="col-md-12">
        </div>
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            @csrf
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                       placeholder="Nhập tên sản phẩm " name="name"
                                       value="{{ old('name') }}"
                                >
                            </div>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input type="text" class="form-control-file @error('price') is-invalid @enderror"
                                       placeholder="Nhập giá sản phẩm " name="price"
                                       value=" {{ old('price') }}" >
                            </div>
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <input type="file" class="form-control-file"
                                       name="feature_image_path">
                            </div>

{{--                            <div class="form-group">--}}
{{--                                <label>Chọn danh mục</label>--}}
{{--                                <select class="form-control select2_init @error('category_id') is-invalid @enderror"--}}
{{--                                        name="category_id" >--}}

{{--                                    <option value="">Chọn danh mục</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            @error('category_id')--}}
{{--                            <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                            @enderror--}}

                        </div>
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{ asset('admins/product/add/add.js') }}"></script>
@endsection

