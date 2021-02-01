<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CategoriaProduto;
use App\Produto;
use App\User;

class ProdutoController extends Controller
{
    private $objCategoria;
    private $objProduto;

    public function __construct(){
        $this->objCategoria=new CategoriaProduto();
        $this->objProduto=new Produto();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
        // dd($this->objProduto->find(4)->relCategoria);
        // dd($this->objProduto->all());

        // $produtos = Produto::latest()->paginate(5);

        // return view('index', compact('produtos'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = CategoriaProduto::all();
        return view('produtos.create', compact('categorias'));
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
            'nome_produto'=>'required',
            'valor_produto'=>'required',
            'id_categoria'=>'required',
        ]);
        $produto = new Produto([
            'nome_produto' => $request->get('nome_produto'),
            'valor_produto'=> $request->get('valor_produto'),
            'id_categoria'=> $request->get('id_categoria')
        ]);
        $produto->save();
        return redirect('produtos')->with('success', 'Produto cadastrado.');

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
        $produto = Produto::find($id);
        $categorias = CategoriaProduto::all();

        return view('produtos.edit', compact('produto', 'categorias'));
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
            'nome_produto'=>'required',
            'valor_produto'=>'required',
            'id_categoria'=>'required',
        ]);
        $produto = Produto::find($id);
        $produto->nome_produto = $request->get('nome_produto');
        $produto->valor_produto = $request->get('valor_produto');
        $produto->id_categoria = $request->get('id_categoria');
        $produto->save();

        return redirect('produtos')->with('success', 'Produto alterado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=$this->objProduto->destroy($id);
        return($del)?"Sim":"Não";
        // $produto = Produto::find($id);
        // $produto->delete();

        // return redirect('/produtos')->with('success', 'Produto deletado.');
    }
}
