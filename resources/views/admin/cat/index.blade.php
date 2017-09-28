@extends('templates.admin.master')
@section('main-content')
<div class="agile-grids">   
    <div class="agile-tables">
        <div class="w3l-table-info">
            <h2>Danh mục tin</h2>
            @if(Session::has('msg'))
            <p class="category success">{{ Session::get('msg') }}</p>
            @endif
            <ul class="bt-list">
                <li><a href="{{ route('admin.cat.create') }}" class="hvr-icon-float-away col-24">Thêm</a></li>
            </ul>
            <table id="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên danh mục</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($arItems as $item)
                    <?php 
                    $id = $item->id_cat;
                    $name = $item->name;
                    $urlchild = route('admin.catchild.index',['id'=>$id]);
                    $urlEdit = route('admin.cat.edit',['id'=>$id]);
                    $urlDel = route('admin.cat.destroy',['id'=>$id]);
                    ?>
                    <tr>
                        <td>{{ $id }}</td>
                        <td><a href="{{ $urlchild }}">{{ $name }}</a></td>
                        <td><a href="{{ $urlEdit }}"><i class="fa fa-edit"></i> Sửa</a>
                            | <a href="{{ $urlDel }}" onclick="return xacNhanXoa()"><i class="fa fa-times-circle-o"></i> Xóa</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @stop