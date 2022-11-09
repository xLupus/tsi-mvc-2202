<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendedores;

class VendedoresController extends Controller
{

    public function __construct()
    {
        $this->middleWare('permission:vendedores-list|vendedores-create|vendedores-edit|vendedores-delete',
                          ['only' => ['index', 'show']]);

        $this->middleWare('permission:vendedores-create',
                          ['only' => ['create', 'store']]);

        $this->middleWare('permission:vendedores-edit',
                          ['only' => ['edit', 'update']]);

        $this->middleWare('permission:vendedores-delete',
                          ['only' => ['destroy']]);
    }

    private $qtdPorPagina = 5;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vend = Vendedores::orderBy('id','ASC')->paginate($this->qtdPorPagina);

        return view('vendedores.index', compact('vend'))
                    ->with('i', ($request->input('page', 1  ) - 1) * $this->qtdPorPagina);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nome'  => 'required',
                                   'matricula' => 'required']);

        $input = $request->all();

        $vendedor = Vendedores::create($input);


        return redirect()->route('vendedores.index')->with('success','Vendedor cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vendedor = Vendedores::find($id);

        return view('vendedores.show', compact('vendedor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendedor = Vendedores::find($id);

        return view('vendedores.edit', compact('vendedor'));
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
        $this->validate($request, ['nome'  => 'required',
                                   'matricula' => 'required']);

        $vendedor = Vendedores::find($id);

        $input = $request->all();

        $vendedor->update($input);

        return redirect()->route('vendedores.index')->with('success','Vendedor atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendedor = Vendedores::find($id)->delete();

        return redirect()->route('vendedores.index')->with('sucess','Vendedores removido com sucesso');
    }

    public function checkVendedor(int $x)
    {
        if ($x <= 1) {
            return true;
        }

        return false;
    }

    public function existeVendedor(string $nome):bool
    {
        $vendedores = ['Paula', 'Matheus', 'Amanda', 'José'];

        if ( in_array($nome, $vendedores) ) {
            return true;
        }

        return false;
    }

    public function getVendedor(int $id):?string
    {
        $vendedores = [1 => 'Paula', 2 => 'Romeu', 3 => 'Amanda', 4 => 'José'];

        if ( isset($vendedores[$id]) ) {
            return $vendedores[$id];
        }

        return null;
    }

    public function getVendedorJSON(int $id):?string
    {
        $vendedores = [1 => 'Paula', 2 => 'Romeu', 3 => 'Amanda', 4 => 'José'];

        if ( isset($vendedores[$id]) ) {
            return json_encode($vendedores[$id]);
        }

        return null;
    }
}
