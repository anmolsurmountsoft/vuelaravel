<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('home');
    }

    public function showall()
    {
      return User::all();
    }
    public function show($id)
   {
       return User::findOrFail($id);
   }

   public function update(Request $request, $id)
   {
       $User = User::findOrFail($id);
       $User->update($request->all());

       return $User;
   }

   public function store(Request $request)
   {
       $User = User::create($request->all());
       return $User;
   }

   public function destroy($id)
   {
       $User = User::findOrFail($id);
       $User->delete();
       return '';
   }
}
