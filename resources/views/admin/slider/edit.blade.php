@extends('layouts.admin')

@section('title', 'Page Title')
@section('css')
    <link href="{{ asset('admins/slider/add/list.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',['name' => 'slider','key' => 'edit'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('slider.update',['id' => $sliderForEdit -> id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên slider</label>
                                <input type="text" class="form-control" name="name" placeholder="Nhập tên slider"
                                       value="{{$sliderForEdit->name}}">
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea
                                    class="form-control"
                                    name="description"
                                    rows="3"
                                    placeholder="Nhập tên mô tả">{{$sliderForEdit->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" class="form-control-file" name="image_path">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <img src="{{$sliderForEdit -> image_path}}" alt=""
                                                 class="image_slider_150_100"/>
                                        </div>
                                    </div>
                                </div>
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
