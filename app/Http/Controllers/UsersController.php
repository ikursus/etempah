<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Bagi response paparkan template_index.blade.php dari folder
        // resources/views/users
        $page_title = 'Senarai Users';
        // Dapatkan SEMUA rekod data dari table users
        $senarai_users = DB::table('users')->get();
        // Dapatkan data berdasarkan no kp
        // $senarai_users = DB::table('users')
        // ->where('id', '=', '1')
        // ->get();
        // Dapatkan senarai rekod dari table users dan sorting asc / desc
        // $senarai_users = DB::table('users')
        // ->orderBy('nama', 'asc')
        // ->get();
        // Dapatkan data dari column yang diperlukan sahaja.
        // $senarai_users = DB::table('users')
        // ->select('id', 'nama', 'email', 'username')
        // ->get();
        // Buatkan pagination page
        $senarai_users = DB::table('users')
        ->orderBy('id', 'desc')
        ->paginate(2);

        // Paparkan template index dari folder users beserta data
        return view('users/template_index', compact('page_title', 'senarai_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Tajuk Halaman
        $page_title = 'Borang Tambah User';
        return view('users/template_add', compact('page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate data dari borang
        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email|email',
            'no_kp' => 'required|unique:users,no_kp|digits:12',
            'password' => 'required|confirmed'
        ]);
        // Dapatkan SEMUA data dari borang
        // $data = $request->all();
        // Dapatkan data yang diperlukan untuk disimpan ke dalam DB Table Users
        $data = $request->only([
          'username',
          'email',
          'no_kp',
          'nama',
          'telefon',
          'status',
          'role'
        ]);
        // Dapatkan data password dan encrypt
        $data['password'] = bcrypt( $request->input('password') );

        // Masukkan rekod ke dalam database table users
        DB::table('users')->insert($data);
        // Bagi response redirect ke halaman senarai users.
        // return redirect('/users');
        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
      $page_title = 'Borang Edit';
      // Dapatkan data bagi user berdasarkan ID yang dibekalkan pada parameter
      $user = DB::table('users')->where('id', '=', $id)->first();
      // Bagi response papar template edit
      return view('users/template_edit', compact('page_title', 'user'));
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
      // Validate data dari borang
      $request->validate([
          'nama' => 'required',
          'username' => 'required|unique:users,username,' . $id,
          'email' => 'required|email|unique:users,email,' . $id,
          'no_kp' => 'required|digits:12|unique:users,no_kp,' . $id
      ]);
      // Dapatkan SEMUA data dari borang
      // $data = $request->all();
      // Dapatkan data yang diperlukan untuk disimpan ke dalam DB Table Users
      $data = $request->only([
        'username',
        'email',
        'no_kp',
        'nama',
        'telefon',
        'status',
        'role'
      ]);
      // Semak jika ruangan password diisi
      // Jika ada password baru, Dapatkan data password dan encrypt
      if ( ! empty( $request->input('password') ) )
      {
        $data['password'] = bcrypt( $request->input('password') );
      }

      // Kemaskini rekod ke dalam database table users berdasarkan ID user
      DB::table('users')->where('id', '=', $id)->update($data);
      // Bagi response redirect ke halaman edit semula
      // return redirect('/users');
      return redirect()->back()->with('mesej-sukses', 'Kemaskini berjaya!');
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
