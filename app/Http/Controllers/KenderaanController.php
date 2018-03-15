<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kenderaan;
use DataTables;
use File;

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

      return view('kenderaan/template_index', compact('page_title'));
    }


    public function datatables()
    {
      // Dapatkan rekod dari table kenderaan
      $senarai_kenderaan = Kenderaan::select('id', 'jenis', 'model', 'no_plat', 'gambar', 'status');

      // Return result menerusi DataTables
      return DataTables::of( $senarai_kenderaan )
      ->addColumn('tindakan', function($kenderaan) {

        return '

          <a href="'. route('kenderaan.edit', ['id' => $kenderaan->id ]) .'" class="btn btn-sm btn-info">Edit</a>

        ';

      })
      ->rawColumns(['tindakan'])
      ->make(true);
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
        // Sekiranya tidak wujud rekod, kembali ke halaman senarai kenderaan
        if( ! count( $kenderaan ) )
        {
          return redirect()->back()->with('mesej-gagal', 'Tiada rekod dijumpai');
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
      // Form validation
      // $this->validate($request, []);
      $request->validate([
        'jenis' => 'required|min:3',
        'model' => 'required',
        'status' => 'required|in:available,booked',
        'gambar' => 'image'
      ]);

      // Dapatkan maklumat kenderaan berdasarkan ID
      $kenderaan = Kenderaan::find($id);

      // Dapatkan semua rekod data KECUALI fail gambar
      $data = $request->except('gambar');
      // Buat semakan adakah wujud fail gambar
      if( $request->hasFile('gambar') )
      {
        // Dapatkan maklumat fail gambar
        $gambar = $request->file('gambar');
        // Dapatkan NAMA fail gambar tersebut
        $nama_gambar = $gambar->getClientOriginalName();
        // Berikan nama baru fail gambar dengan adanya timestamp
        $nama_baru = date('Y-m-dH-i-S').'-'.$nama_gambar;
        // Upload gambar ke folder simpanan gambar bernama uploads yang berada di dalam public
        $gambar->move('uploads', $nama_baru);
        // Masukkan maklumat nama gambar ke array $data
        $data['gambar'] = $nama_baru;

        // Semak jika fail lama wujud dalam directory uploads. Jika ada, hapuskan ia
        if ( File::exists( public_path('uploads/') . $kenderaan->gambar ) )
        {
          // Jika fail wujud, delete fail tersebut dari folder uploads yang berada di dalam folder public
          File::delete( public_path('uploads/') . $kenderaan->gambar );
        }
      }
      // Kemaskini rekod ke dalam table kenderaan
      $kenderaan->update($data);
      // Beri response kembali ke halaman sebelum
      return redirect()->back()->with('mesej-sukses', 'Rekod berjaya dikemaskini!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // DApatkan maklumat kenderaan yang ingin dihapuskan berdasarkan ID
      $kenderaan = Kenderaan::find($id);
      // Delete rekod dari table kenderaan
      $kenderaan->delete();
      // Bagi response redirect ke halaman senarai kenderaan
      // return redirect('/kenderaan');
      return redirect()->route('kenderaan.index')->with('mesej-sukses', 'Data ' . $kenderaan->model . ' berjaya dihapuskan!');
    }
}
