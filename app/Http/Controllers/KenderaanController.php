<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kenderaan;

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
      $senarai_kenderaan = Kenderaan::all();

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
        // Simpan data ke dalam table kenderaan
        Kenderaan::create($data);
        // Beri response kembali ke halaman senarai kenderaan
        return redirect()->route('kenderaan.index')->with('mesej-sukses', 'Rekod berjaya ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = $request->input('no_plat');

        // Dapatkan senarai data yang mempunyai ciri ciri keyword yanng ditaip
        //$kenderaan = Kenderaan::where('no_plat', 'like', $data.'%')->first();
        // Dapatkan 1 data yang mempunyai keyword yang ditaip
        $kenderaan = Kenderaan::where('no_plat', 'like', $data)->first();

        if( ! count( $kenderaan ) )
        {
          return redirect()->back();
        }

        // Beri response paparkan tempalte edit maklumat kenderaan
        return view('kenderaan/template_edit', compact('page_title', 'kenderaan'));
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
      $page_title = 'Borang Edit Kenderaan';
      // Dapatkan maklumat kenderaan berdasarkan ID
      $kenderaan = Kenderaan::find($id);
      // Beri response paparkan tempalte edit maklumat kenderaan
      return view('kenderaan/template_edit', compact('page_title', 'kenderaan'));
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
