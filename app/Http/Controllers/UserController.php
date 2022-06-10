<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    private $usuarios = [
        ['id' => 1, 'login' => 'keven',],
        ['id' => 2, 'login' => 'joão',],
        ['id' => 3, 'login' => 'maria',],
        ['id' => 4, 'login' => 'aline',]
    ];
    public function  __construct()
    {
        $usuarios = session('usuarios');
        if(!isset($usuarios)) {
          session(['usuarios' => $this->usuarios]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = session('usuarios');
        return view('usuarios/index', compact("usuarios"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuarios = session('usuarios');
       $id = end($usuarios)['id'] + 1;
       $login = $request->login;
       $dados = ['id' => $id , "login" => $login];
   $usuarios[] = $dados;
   session(['usuarios' => $usuarios]);

   return redirect()->route('usuarios.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuarios = session('usuarios');
        $ids = array_column($usuarios, 'id');
        $index = array_search($id, $ids);
        $usuario = $usuarios[$index];
        return view('usuarios.info', compact('usuario'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuarios = session('usuarios');
        $ids = array_column($usuarios, 'id');
        $index = array_search($id, $ids);
        $usuario = $usuarios[$index];
        return view('usuarios/edit', compact('usuario'));

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
        $usuarios = session('usuarios');
        $login = $request->login;
        $dados = ['id' => $id , "login" => $login];
        $ids = array_column($usuarios, 'id');
        $index = array_search($id, $ids);
    $usuarios[$index] = $dados;
    session(['usuarios' => $usuarios]);

   return redirect()->route('usuarios.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuarios = session('usuarios');
        $ids = array_column($usuarios, 'id');
        $index = array_search($id, $ids);
        array_splice($usuarios, $index,1);
        session(['usuarios' => $usuarios]);

    return redirect()->route('usuarios.index');


    }
}
