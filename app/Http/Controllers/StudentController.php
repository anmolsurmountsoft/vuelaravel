<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;

class StudentController extends Controller
{
  public function index()
 {
      return view('students');
 }

 public function showAll()
 {
   return Students::all();
 }
 public function showById($id)
 {
     return Students::find($id);
 }

 public function store(Request $request)
 {
     return Students::create($request->all());
 }

 public function update(Request $request, $id)
 {
     $article = Students::findOrFail($id);
     $article->update($request->all());

     return $article;
 }

 public function delete(Request $request, $id)
 {
     $article = Students::findOrFail($id);
     $article->delete();

     return 204;
 }
}
