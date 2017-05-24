<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Product;

class ProdutoController extends Controller
{

    private $product;

    /**
     * ProdutoController constructor.
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Listagem dos Produtos";

        $products = $this->product->all();

        return view('painel.products.Index', compact('products', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Cadastrar novo produto";

        $categories = ['eletronicos', 'moveis', 'limpeza', 'banho'];

        return view('painel.products.Create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return "Carregando...";
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function tests()
    {

        /*$prod = $this->product;
        $prod->name = 'Nome do Produto';
        $prod->number = 321321;
        $prod->active = 1;
        $prod->category = 'eletronicos';
        $prod->description = 'Descrição produto';
        $insert = $prod->save();

        if ($insert){
            return 'Inserido com sucesso!';
        }else{
            return 'Falha ao inserir!';
        }*/

        /*$insert = $this->product->create([
            'name' => 'Nome do Produto2',
            'number' => 321321,
            'active' => 0,
            'category' => 'eletronicos',
            'description' => 'Descrição produto'
        ]);

        if ($insert){
            return 'Inserido com sucesso!';
        }else{
            return 'Falha ao inserir!';
        }*/

        /*$prod = $this->product->find(3);
        $prod->name = 'Update';
        $prod->number = 321321;
        $prod->active = 1;
        $prod->category = 'eletronicos';
        $prod->description = 'Teste update';
        $update = $prod->save();

        if ($update) {
            return 'Alterado com sucesso!';
        } else {
            return 'Falha ao alterar!';
        }*/

        /*$prod = $this->product->find(4);
        $update = $prod->update([
            'name' => 'Update 2',
            'number' => '0101010',
            'active' => 1,
            'description' => 'Update 2 '
        ]);

        if ($update) {
            return 'Alterado com sucesso!';
        } else {
            return 'Falha ao alterar!';
        }*/
    }
}
