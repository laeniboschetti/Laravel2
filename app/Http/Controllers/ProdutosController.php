<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Grupo;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produto::with('grupos')->get();
        //$grupos = Grupo::get();

        return view('produtos.lista', ['produtos' => $produtos]);

    }
    
    public function novo()
    {
        //return view('produtos.formulario');
               
        $grupos = Grupo::pluck('descricao','id'); 
        //$grupos = Grupo::all();
        return view('produtos.formulario', ['grupos' => $grupos]); 
    }
    
    public function salvar(Request $request)
    {
        $produto = new Produto();
        
        $produto = $produto->create($request->all());
        
        \Session::flash('mensagem_sucesso', 'Produto cadastrado com sucesso!');
        
        return Redirect::to('produtos/novo');
    }
    
    public function editar($id)
    {
        $produto = Produto::findOrFail($id);        
        $grupos = Grupo::pluck('descricao', 'id');
                            
        return view('produtos.formulario', ['produto' => $produto, 'grupos' => $grupos]);        
    }
    
    public function atualizar($id, Request $request)
    {
        $produto = Produto::findOrFail($id);
        
        $produto = $produto->update($request->all());
        
        \Session::flash('mensagem_sucesso', 'Produto atualizado com sucesso!');
        
        //return Redirect::to('clientes/'.$cliente->id.'/editar');
        
        return Redirect::to('produtos');
               
    }
    
    public function deletar($id)
    {
        $produto = Produto::findOrFail($id);
        
        $produto = $produto->delete();
        
         \Session::flash('mensagem_sucesso', 'Produto deletado com sucesso!');                
        
        return Redirect::to('produtos');
     
     }
    
   /* public function consultagrupos()
    {
        //$grupos = Grupo:all();
        $grupo = Grupo::lists('descricao','id')->all(); 
        return view('/produtos', compact('grupo'));
    }*/
}
