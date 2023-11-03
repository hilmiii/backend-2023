<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();
    
        if ($students->isEmpty()) {
            $data = [
                'message' => 'Students not found',
            ];
        return response()->json($data, 204);
        } else {
            $data = [
                'message' => 'Get all students',
                'data' => $students
            ];
            return response()->json($data, 200);
        }
    }


    
    # mendapatkan detail resource student #membuat method show
    public function show($id){  
    # cari id student yang ingin didapatkan
    $student = Student::find($id); 

        if ($student) {
            $data = [
                'message' => 'Get detail student', 
                'data' => $student,
            ];
            # mengembalikan data (json) dan kode 200 
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found',
            ];
            # mengembalikan data (json) dan kode 404 
            return response()->json($data, 404);
        }
    }

     public function store(Request $request){
        // validasi data request
        $request->validate([
            "nama" => "required",
            "nim" => "required",
            "email" => "required|email",
            "jurusan" => "required"
        ]);
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        $student = Student::create($input);

        $data = [
            'message' => 'Student is created succesfully',
            'data' => $student,
        ];

        return response()->json($data, 201);
    }

    public function update(Request $request, $id) { 
        #cari id student yang ingin diupdate
        $student = Student::find($id);
        if ($student) {
            #menangkap data request
            $input = [
                'nama' => $request->nama ?? $student->nama, 
                'nim' => $request->nim ?? $student->nim, 
                'email' => $request->email ?? $student->email, 
                'jurusan' => $request->jurusan ?? $student->jurusan
            ];
            #melakukan update data
            $student->update($input);
            $data = [
                'message' => 'Student is updated', 'data' =>    $student
            ];
            # mengembalikan data (json) dan kode 200 
            return response()->json($data, 200);
        }
        else {
            $data = [
                'message' => 'Student not found'
            ];

            return response()->json($data, 404);
        }
    }

    public function destroy($id) {
        $student = Student::find($id);
        if ($student) {
            #hapus student tersebut 
            $student->delete();
            $data = [
                'message' => 'Student is deleted'
            ];       
            #mengembalikan data (json) dan kode 200 
            return response()->json     ($data, 200);
        }
        else {
            $data = [
                'message' => 'Student not found'
            ];       
            return response()->json($data, 404);
        }
    }
}