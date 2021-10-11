<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();
        return response()->json($sections);
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
        $validation = $request->validate([
            'section_name' => 'required|string|max:15|unique:sections',
    ]);
    $input = $request->all();
    try{
         $section = Section::create($input);
         return response()->json(['success' => $section, 'success code'=>200]);
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
        $section = Section::find($id);
        if(!$section){
             return response('This section is not exists! try another one.');
        }else{
            return response()->json(['message' => 'Yeah! data available.', 'data' => $section]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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
        $section = Section::find($id);
        $validation = $request->validate([
            'section_name' => 'required|string|max:15|unique:sections',
    ]);
    $input = $request->all();
    try{
         $section->update($input);
         return response()->json(['success' => $section, 'success code'=>200]);
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
        $section = Section::find($id);
        try{
            $section->delete();
            return response()->json(['success' => 'Section has been deleted!']);
       }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], $e->getCode());
       }
    }
}
