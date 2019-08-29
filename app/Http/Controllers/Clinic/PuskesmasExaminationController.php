<?php

namespace App\Http\Controllers\Clinic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Session;

class PuskesmasExaminationController extends Controller
{
  public function getExaminationsListView()
  {
    return view('partials.puskesmas.examinations.examinations-list')
      ->with('pagename', 'puskesmas.get-examination-list');
  }
}
