<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorExaminationsController extends Controller
{
    public function getDoctorExaminationListView()
    {
        return view('partials.doctor.examinations.examinations-list')
            ->with('pagename', 'doctor-get-examination-list');
    }
}
