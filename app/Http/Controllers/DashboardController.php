<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function user()
    {
      // Jika user adalah admin, redirect ke admin
      if ( Auth::user()->role == 'admin' )
      {
        return redirect('/admin');
      }

      $headline = 'Halaman Dashboard';
      $nama = 'Muhammad Ali';

      return view('layouts/template_dashboard', compact('nama', 'headline'));
      // return view('layouts/template_dashboard', ['nama' => 'Muhammad Ali']);
    }

    public function admin()
    {

      if ( Auth::user()->role != 'admin' )
      {
        return redirect('/dashboard')->with('mesej-gagal', 'Anda bukan admin!');
      }

      $headline = 'Halaman Dashboard';
      $nama = 'Muhammad Ali';

      return view('layouts/template_dashboard', compact('nama', 'headline'));
      // return view('layouts/template_dashboard', ['nama' => 'Muhammad Ali']);
    }
}
