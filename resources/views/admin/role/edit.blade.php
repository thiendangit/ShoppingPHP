@extends('layouts.admin')

@section('title', 'Page Title')
@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('admins/role/add/add.css')}}" rel="stylesheet"/>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',['name' => 'user','key' => 'edit'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('role.update',['id'=>$role->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên vai trò</label>
                                <input type="text" class="form-control" name="name"
                                       placeholder="Nhập tên vai trò" value="{{$role->name}}">
                            </div>
                            <div class="form-group">
                                <label>Mô tả vai trò</label>
                                <input type="text" class="form-control"
                                       name="display_name"
                                       placeholder="Nhập mô tả vai trò" value="{{$role-> display_name}}">
                            </div>
                            <div class="row">
                                @foreach($permissions as $permission)
                                    <div class="card border-primary mb-3 col-md-12">
                                        <div class="card-header">
                                            <label>
                                                <input type="checkbox" class="checkbox_parent" name="permission_id"
                                                       value="{{$permission -> id}}">
                                            </label>
                                            {{$permission -> name}}
                                        </div>
                                        <div class="row">
                                            @foreach($permission -> permissionChildren as $child)
                                                <div class="card-body text-primary">
                                                    <h5 class="card-title">
                                                        <label>
                                                            <input type="checkbox"
                                                                   class="checkbox_children"
                                                                   {{ $permissionChecked -> contains('id', $child->id) ? 'checked' : '' }}
                                                                   name="permission_child_id[]"
                                                                   value="{{$child -> id}}">
                                                        </label>
                                                        {{$child -> name}}
                                                    </h5>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
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
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('admins/user/add/add.js')}}"></script>
    <script>
        $('.checkbox_parent').on('click', function () {
            $(this).parents('.card').find('.checkbox_children').prop('checked', $(this).prop('checked'));
        })
    </script>
@endsection
