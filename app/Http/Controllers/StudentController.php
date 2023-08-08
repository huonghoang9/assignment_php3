<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function list_student(Request $request){
        $student = new Student();
        $listStudent = $student::all();

        return view('students.list', compact('listStudent'));
    }

    public function add(StudentRequest $request){
        if($request->isMethod('POST')){
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $request->image = uploadFile('images', $request->file('image'));
            }

            $params = $request->except('_token');
            $params['image'] = $request->image;

            $student =Student::create($params);

            if($student->id){
                Session::flash('success', 'Thêm thông tin sinh viên thành công');
            }
        }

        return view('students.add');
    }

    public  function  edit(StudentRequest $request, $id){
            $student = DB::table('students')
                ->where('id', $id)->first();
        if($request->isMethod('POST')){
            $params = $request->except('_token');
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $resultDL = Storage::delete('/public/'.$student->image);
                if($resultDL){
                    $request->image = uploadFile('images', $request->file('image'));
                    $params['image'] =  $request->image;
                }
            }else{
                $params['image'] = $student->image;
            }
            $result = Student::where('id', $id)->update($params);
            if($result){
                Session::flash('success', 'Sửa thông tin sinh viên thành công');
                return redirect()->route('edit', ['id'=>$id]);
            }
        }
        return view('students.edit', compact( 'student'));
    }
    
    public function delete(Request $request, $id){
        $studentDL = Student::where('id', $id)->delete();
        if($studentDL){
            Session::flash('success', 'Xóa thông tin sinh viên thành công ');
            return redirect()->route('list');
        }
    }
}
