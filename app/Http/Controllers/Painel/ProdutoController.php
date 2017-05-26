<?php

namespace App\Http\Controllers\Painel;

use App\Http\Requests\Painel\ProductFormRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Product;

class ProdutoController extends Controller
{

    private $product;
    private $totalPorPagina = 3;

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

        $products = $this->product->paginate($this->totalPorPagina);


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

        return view('painel.products.Create-edit', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        $dataForm = $request->all();

        //valida os dados
        //$this->validate($request, $this->product->rules, $this->product->messages);

        $produto = $this->product->create($dataForm);

        if ($produto){
            return redirect()->route('produtos.index');
        }else{
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = $this->product->find($id);

        $title = "Editar produto: {$produto->name}";

        return view('painel.products.show', compact('title', 'produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = $this->product->find($id);

        $title = "Editar produto: {$produto->name}";

        $categories = ['eletronicos', 'moveis', 'limpeza', 'banho'];

        return view('painel.products.Create-edit', compact('title', 'categories', 'produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, $id)
    {
        //RECUPERA TODOS OS DADOS DO FORMULARIO
        $dataForm = $request->all();

        //RECUPERA O ITEM PARA EDITAR
        $produto = $this->product->find($id);

        //VERIFICA SE O PRODUTO ESTÁ ATIVADO
        $dataForm['active'] = ( !isset($dataForm['active']) ) ? 0 : 1;

        //REALIZA OS UPDATES DO PRODUTO
        $update = $produto->update($dataForm);

        //VERIFICA SE REALMENTE EDITOU
        if ($update){
            return redirect()->route('produtos.index');
        }else{
            return redirect()->route('produtos.edit', $id)->with(['errors' => 'Falha ao editar!!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = $this->product->find($id);

        $delete = $produto->delete();

        if ( $delete )
            return redirect()->route('produtos.index');
        else
            return redirect()->route('produtos.show', $id)->with(['errors' => 'Falha ao deletar!!']);
    }

}
