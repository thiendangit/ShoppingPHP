@extends('layouts.admin')

@section('title', 'Page Title')
@section('css')
    <link href="{{ asset('admins/slider/index/list.css') }}" rel="stylesheet"/>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',['name' => 'setting','key' => 'List'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('setting.create')}}" class="btn btn-success m-2 float-right">
                            Add New
                        </a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Config Key</th>
                                <th scope="col">Config Value</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <div class="container">

                            </div>
                            @foreach($settings as $setting)
                                <tr>
                                    <th scope="row">{{$setting->id}}</th>
                                    <td>{{$setting->config_key}}</td>
                                    <td>{{$setting->config_value}}</td>
                                    <td>
                                        <a href="{{route('setting.edit', ['id' => $setting->id])}}"
                                           class="btn btn-default">Edit</a>
                                        <a class="btn btn-danger action_delete"
                                           data-url="{{route('setting.delete',['id' => $setting->id])}}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12">{{$settings->links()}}</div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@section('js')
    <script src="{{ asset('vendors/sweetAlert2/sweetalert2@10.js')}}"></script>
    <script src="{{ asset('admins/setting/index/list.js') }}"></script>
@endsection
@endsection
