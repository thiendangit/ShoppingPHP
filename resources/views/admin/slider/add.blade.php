@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',['name' => 'slider','key' => 'add'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data"
                              accept-charset="UTF-8">
                            @csrf
                            <div class="form-group">
                                <label>Tên slider</label>
                                <input type="text" class="form-control" name="name" placeholder="Nhập tên slider">
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control" name="description" rows="3" type="text"
                                          placeholder="Nhập tên mô tả">{{old('description')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" class="form-control-file" name="image_path">
                            </div>
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
