@extends('templates.admin.master')
@section('main-content')
<div class="agile-grids">   
    <div class="agile-tables">
        <div class="w3l-table-info">
             @if(Session::has('msg'))
            <p class="category success">{{ Session::get('msg') }}</p>
            @endif
            <h2>Danh mục tin con của <b>{{ $arCat[0]->name }}</b></h2>
            
            <ul class="bt-list">
                <li><a href="{{ route('admin.catchild.create') }}" class="hvr-icon-float-away col-24">Thêm</a></li>
            </ul>
            <table id="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên danh mục con</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($arChild as $item)
                    <?php 
                    $idchild = $item->id;
                    $name = $item->name;
                    $urlEdit = route('admin.catchild.edit',['id'=>$idchild]);
                    $urlDel = route('admin.catchild.destroy',['id'=>$idchild]);
                    ?>
                    <tr>
                        <td>{{ $idchild }}</td>
                        <td>{{ $name }}</td>
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