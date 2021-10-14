<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return response()->json($students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validation = $request->validate([
            'email' => 'required|string|max:50|unique:students',
            'phone' => 'required|string|max:14|unique:students',
            'photo' => 'mimes:jpg,png,webp,jpeg|max:2048',
    ]);
    
    $input['password'] = Hash::make($input['password']);
    if($request->hasFile('photo')){
           $file = $request->file('photo');
           $input['photo'] = $this->upload_image($file);
    }
     try{
         $student = Student::create($input);
         return response()->json(['success' => $student, 'success code'=>200]);
    }catch(\Exception $e){
         return response()->json(['error' => $e->getMessage()], $e->getCode());
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::where('id',$id)->first();

        if(!$student){
              return response()->json(['message'=>'Request Id not found.', 404]);
        }

        $input = $request->all();

        $validation = $request->validate([
            'email' => 'string|max:50|unique:students',
            'phone' => 'string|max:14|unique:students',
            'photo' => 'mimes:jpg,png,webp,jpeg|max:2048',
    ]);
    
    // $input['password'] = Hash::make($input['password']);
    if($request->hasFile('photo')){
           $file = $request->file('photo');
           $input['photo'] = $this->upload_image($file);
           $this->delete_image($student['photo']);
        $file_path='uploads/'.$student['photo'];
        if($student['photo']!=null and file_exists($file_path)){
            unlink($file_path);
        }
    }
     try{
         $student->update($input);
         return response()->json(['success' => $student, 'success code'=>200]);
    }catch(\Exception $e){
         return response()->json(['error' => $e->getMessage()], $e->getCode());
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // image upload  
    protected function upload_image($file){
         $fileType = $file->getClientOriginalExtension();
         $fileName = rand(1, 10000).date('dmyhis').".".$fileType;
         $file->move('uploads', $fileName);
         return $fileName;
    }

    // image delete
    protected function delete_image($fileName){
         $filePath = 'uploads/'.$fileName;
         if($filePath != null and file_exists($filePath)){
             unlink($filePath);
         }
    }
}
