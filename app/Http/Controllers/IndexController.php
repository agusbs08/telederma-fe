<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Session;

class IndexController extends Controller
{
    public function index()
    {
      if (Session::get('authenticated')){
        if (Session::get('role') === 'clinic')
          return redirect()->route('puskesmas.patients');
        elseif (Session::get('role') === 'doctor')
          return redirect()->route('doctor.examinations');
        elseif (Session::get('role') === 'admin')
          return redirect()->route('admin.doctors');
      } else {
        return view('pages.login')->with('pagename', 'login');
      }
    }
}

?>