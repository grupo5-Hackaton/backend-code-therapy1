<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;


class CourseController extends Controller
{
    public function index(){
        return Course::paginate();
    }

    public function show($id){
        return Course::find($id);
    }

    public function create(Request $request){
        $course = new Course();
        $course->id = $request->input('id');
        $course->id = $request->input('language');
        $course->name = $request->input('name');
        $course->description = $request->input('description');
        $course->price = $request->input('price');
        $course->save();
        return json_encode(['msg' => 'added']);
    }

    public function destroy($id){
        Course::destroy($id);
        return json_encode(['msg' => 'deleted']);
    }

    public function edit(Request $request, $id){
        $id = $request->input('id');
        $language = $request->input('language');
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        Course::where('id', $id)->update(
            ['id'=>$id,
            'language'=>$language,
            'name'=>$name,
            'description'=>$description,
            'price'=>$price]
        );
        return json_encode(['msg' => 'updated']);
    }
}
