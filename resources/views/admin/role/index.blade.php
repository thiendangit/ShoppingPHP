@extends('layouts.admin')

@section('title', 'Page Title')
@section('css')
    <link href="{{ asset('admins/user/add/add.css') }}" rel="stylesheet"/>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',['name' => 'user','key' => 'List'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('role.create')}}" class="btn btn-success m-2 float-right">
                            Add New
                        </a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên vai trò</th>
                                <th scope="col">Mô tả vai trò</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <div class="container">

                            </div>
                            @foreach($roles as $role)
                                <tr>
                                    <th scope="row">{{$role->id}}</th>
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->display_name}}</td>
                                    <td>
                                        <a href="{{route('role.edit', ['id' => $role->id])}}"
                                           class="btn btn-default">Edit</a>
                                        <a class="btn btn-danger action_delete"
                                           data-url="{{route('role.delete',['id' => $role->id])}}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12">{{$roles->links()}}</div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@section('js')
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/sweetalert2@10')}}"></script>
    <script src="{{ asset('admins/user/index/list.js') }}"></script>
@endsection
@endsection
