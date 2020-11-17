@extends('layouts.admin')

@section('title', 'Page Title')

@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet"/>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',['name' => 'product','key' => 'add'])
    <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                       placeholder="Nhập tên sản phẩm">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Giá sản phẩm </label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror"
                                       name="price" placeholder="Nhập giá sản phẩm">
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh </label>
                                <input type="file" class="form-control-file" name="feature_image_path"
                                       placeholder="Chọn hình ảnh">
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh chi tiết </label>
                                <input type="file" class="form-control-file" name="image_path[]"
                                       placeholder="Chọn hình ảnh chi tiết" multiple="multiple">
                            </div>
                            <div class="form-group">
                                <label>Nhập tags cho sản phẩm </label>
                                <select class="form-control tags_selected_choose" name="tags[]" multiple="multiple">
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Chọn danh mục </label>
                                <div class="input-group mb-3">
                                    <select
                                        class="custom-select select2_init @error('category_id') is-invalid @enderror"
                                        id="inputGroupSelect02" name="category_id">
                                        <option selected>Chọn danh mục</option>
                                        {!! $html !!}
                                    </select>
                                    <div class="input-group-append">
                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                    </div>
                                </div>
                                @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nhập nội dung</label>
                                    <textarea
                                        class="form-control tinymce_editor_init @error('contents') is-invalid @enderror"
                                        name="contents"
                                        rows="3"></textarea>
                                </div>
                            </div>
                            @error('contents')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->
@endsection

@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="https://cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{ asset('admins/product/add/add.js') }}"></script>
@endsection
