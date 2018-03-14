<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KenderaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // Bagi response paparkan template_index.blade.php dari folder
      // resources/views/kenderaan
      $page_title = 'Senarai Kenderaan';
      $senarai_kenderaan = [
          ['id' => 1, 'model' => 'Proton Wira', 'no_plat' => 'WXB 8888', 'status' => 'Available'],
          ['id' => 2, 'model' => 'Toyota Hilux', 'no_plat' => 'VA 3388', 'status' => 'Booked'],
          ['id' => 3, 'model' => 'Proton Exora', 'no_plat' => 'PNG 6666', 'status' => 'Available']
      ];

      return view('kenderaan/template_index', compact('page_title', 'senarai_kenderaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // Tajuk Halaman
      $page_title = 'Borang Tambah Kenderaan';

      // Bagi response papar borang tambah maklumat kenderaan
      return view('kenderaan/template_add', compact('page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        // $this->validate($request, []);
        $request->validate([
          'jenis' => 'required|min:3',
          'model' => 'required',
          'status' => 'required|in:available,booked'
        ]);

        // Dapatkan semua data dari borang
        $data = $request->all();
        // Dapatkan 1 data sahaja dari maklumat yang dikirim
        // $data = $request->input('no_plat');
        // Dapatkan data yang diperlukan sahaja
        // $data = $request->only('status', 'no_plat');
        // Dapatkan semua data KECUALI yang dinyatakan
        // $data = $request->except('no_plat');

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      // Tajuk Halaman
      $page_title = 'Borang Edit Kenderaan ID: ' . $id;
      return view('kenderaan/template_edit', compact('page_title'));
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
      $data = $request->all();

      return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
