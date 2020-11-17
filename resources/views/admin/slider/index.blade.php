@extends('layouts.admin')

@section('title', 'Page Title')
@section('css')
    <link href="{{ asset('admins/slider/index/list.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',['name' => 'slider','key' => 'List'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('slider.create')}}" class="btn btn-success m-2 float-right">
                            Add New
                        </a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên slider</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <div class="container">

                            </div>
                            @foreach($sliders as $slider)
                                <tr>
                                    <th scope="row">{{$slider->id}}</th>
                                    <td>{{$slider->name}}</td>
                                    <td>{{$slider->description}}</td>
                                    <td><img src="{{$slider->image_path}}" alt="" class="image_slider_150_100"/></td>
                                    <td>
                                        <a href="{{route('slider.edit', ['id' => $slider->id])}}" class="btn btn-default">Edit</a>
                                        <a href="{{route('menus.delete', ['id' => $slider->id])}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12">{{$sliders->links()}}</div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
