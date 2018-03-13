<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function panel() {

      $headline = 'Halaman Dashboard';
      $nama = 'Muhammad Ali';

      return view('layouts/template_dashboard', compact('nama', 'headline'));
      // return view('layouts/template_dashboard', ['nama' => 'Muhammad Ali']);
    }
}
