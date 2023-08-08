@extends('templates.layout')
@section('content')

    <table class="table ">
        <th>ID</th>
        <th>Tên Sinh Viên</th>
        <th>Giới Tính</th>
        <th>Số Điện Thoại</th>
        <th>Địa Chỉ</th>
        <th>Ảnh</th>
        <th>Thao tác</th>
        @foreach($listStudent as $student)
            <tr>
                <td>{{$student->id}}</td>
                <td>{{$student->name}}</td>        
                <td>{{$student->gender == 1? 'Nam': 'Nữ' }}</td>
                <td>{{$student->phone}}</td>
                <td>{{$student->address}}</td>
                <td><img src="{{$student->image? Storage::url($student->image): ''}}" style="width: 100px; height: 100px"></td>
                <td><a class="btn btn-primary" role="button" href="{{route('edit',['id'=>$student->id])}}">Sửa</a>
                <a class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa thông tin sinh viên này không ?')" href="{{route('delete',['id'=>$student->id])}}" role="button">Xóa</a></td>
            </tr>
        @endforeach

    </table>
    <td><a class="btn btn-primary" role="button" href="{{route('add')}}">Thêm</a>
@endsection