@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Listagem de Produtos  
                     <div class="novoproduto">
                        <a class="btn btn-primary" href="{{ url('produtos/novo') }}">Cadastrar</a>
                    </div>
                </div>   
                
                  <div class="panel-body">
                    @if(Session::has('mensagem_sucesso'))
                        <div class="alert alert-success">
                            {{ Session::get('mensagem_sucesso') }}
                        </div>
                    @endif
                      
                      <table class="table">
                          <th>Descrição</th>
                          <th>Valor de Compra</th>
                          <th>Valor de Venda</th>
                          <th>Grupo</th>                          
                          <th>Ações</th>
                          <tbody>
                              @foreach($produtos as $produto)
                              <tr>
                                  <td>{{ $produto->descricao }}</td>
                                  <td>{{ number_format($produto->valorcompra, 2) }}</td>
                                  <td>{{ number_format($produto->valorvenda, 2) }}</td>
                                  <td>{{ $produto->grupos->descricao }}</td>
                                  <td>
                                      <a href="produtos/{{ $produto->id }}/editar" class="btn btn-outline-dark">Editar</a>
                                      {!! Form::open(['method' => 'DELETE', 'url' => '/produtos/'.$produto->id, 'style' => 'display: inline;' ]) !!}
                                      <button type ="submit" class="btn btn-outline-dark">Excluir</button>
                                      {!! Form::close() !!}
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection