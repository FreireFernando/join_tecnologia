<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CategoriaProduto;

class CategoriaProdutoController extends Controller
{
    private $objCategoria;

    public function __construct(){
        $this->objCategoria=new CategoriaProduto();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = CategoriaProduto::all();
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = CategoriaProduto::all();
        return view('categorias.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome_categoria'=>'required'
        ]);
        $categoria = new CategoriaProduto([
            'nome_categoria' => $request->get('nome_categoria')
        ]);
        $categoria->save();
        return redirect('categorias')->with('success', 'Categoria cadastrada.');
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
        $categoria = CategoriaProduto::find($id);

        return view('categorias.edit', compact('categoria'));
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
        $request->validate([
            'nome_categoria'=>'required'
        ]);
        $categoria = CategoriaProduto::find($id);
        $categoria->nome_categoria = $request->get('nome_categoria');
        $categoria->save();

        return redirect('categorias')->with('success', 'Categoria alterada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=$this->objCategoria->destroy($id);
        return($del)?"Sim":"Não";
    }
}
