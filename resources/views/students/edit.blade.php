@extends('templates.layout')
@section('content')
    <form action="{{route('edit', ['id'=>request()->route('id')])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-floating mb-3">
        <label for="floatingInput">Tên Sinh Viên</label>
        <input type="text" placeholder="Tên Sinh Viên" name="name" class="form-control" value="{{$student->name}}">
        </div>
        
        <input type="radio" name="gender" value="1" {{$student->gender == 1? 'checked': ''}}>
        <label for="">Nam</label>
        <input type="radio" name="gender" value="0" {{$student->gender == 0? 'checked': ''}}>
        <label for="">Nữ</label><br>

        <div class="form-floating mb-3">
        <label for="floatingInput">Số Điện Thoại</label>
        <input type="text" placeholder="Số Điện Thoại" name="phone" class="form-control" value="{{$student->phone}}">
        </div>

        <div class="form-floating mb-3">
        <label for="floatingInput">Địa Chỉ</label>
        <input type="text" placeholder="Địa Chỉ" name="address" class="form-control" value="{{$student->address}}">
        </div>

        <div class="form-group">
            <label class="col-md-3 col-sm-4 control-label">Ảnh</label>
            <div class="col-md-9 col-sm-8">
                <div class="row">
                    <div class="col-xs-6">
                        <img  src="{{$student->image? Storage::url($student->image): 'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg'}}" alt="your image"
                             style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                        <input type="file" name="image" accept="image/*"
                               class="form-control-file @error('image') is-invalid @enderror" id="cmt_anh">
                        <label for="cmt_truoc">Ảnh thẻ</label><br/>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Sửa</button>
        <td><a class="btn btn-primary" role="button" href="{{route('list')}}">Danh sách</a>
    </form>
@endsection