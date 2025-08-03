<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::active()->paginate(12);
        return view('schools.index', compact('schools'));
    }

    public function show(School $school)
    {
        $school->load('programs');
        return view('schools.show', compact('school'));
    }
}
