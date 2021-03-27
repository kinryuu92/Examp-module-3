@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{  asset('admins/slider/add/slider.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name'=>'slider', 'key'=>'Edit'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('slider.update', ['id'=>$slider->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Tên slider</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror "
                                       placeholder="Nhập tên "
                                       name="name"
                                       value="{{ $slider->name }}"
                                >
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Mô tả slider</label>

                                <textarea class="form-control @error('name') is-invalid @enderror"
                                name="description" rows="4" > {{ $slider->description }} </textarea>

                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" class="form-control-file"
                                       name="image_path"
                                       @error('image_path') is-invalid @enderror >
                                <div class="col-md-4">
                                    <div class="row">
                                        <img class="image_slider_edit " src="{{ $slider->image_path }}">
                                    </div>
                                </div>
                                @error('image_path')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection


