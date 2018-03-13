<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $senarai_users = [
            ['id' => 1, 'username' => 'admin', 'email' => 'admin@gmail.com', 'nama' => 'Administrator'],
            ['id' => 2, 'username' => 'user', 'email' => 'user@gmail.com', 'nama' => 'User'],
            ['id' => 3, 'username' => 'demo', 'email' => 'demo@gmail.com', 'nama' => 'Demo']
        ];

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
        //
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
      $page_title = 'Borang Edit User ID: ' . $id;
      return view('users/template_edit', compact('page_title'));
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
        //
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
