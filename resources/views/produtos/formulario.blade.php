@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Informe abaixo os dados do produto                                        
                     <div class="listagemprodutos">
                       <a class="btn btn-outline-secondary" href="{{ url('produtos') }} ">Ver Listagem</a>
                    </div>
                </div>

                <div class="panel-body">
                    @if(Session::has('mensagem_sucesso'))
                        <div class="alert alert-success">
                            {{ Session::get('mensagem_sucesso') }}
                        </div>
                    @endif
                
                    @if(Request::is('*/editar'))
                      {!! Form::model($produto, ['method' => 'PATCH', 'url' => 'produtos/'.$produto->id]) !!}
                    @else
                       {!! Form::open(['url' => 'produtos/salvar']) !!}
                    @endif                                       

                    {!! Form::label('descricao', 'Descrição:') !!}
                    {!! Form::input('text', 'descricao', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Descrição', 'required' ]) !!}
                    
                    {!! Form::label('valorcompra', 'Valor de compra:') !!}
                    {!! Form::input('number', 'valorcompra', null, ['class' => 'form-control onlynumbers', '', 'placeholder' => 'R$', 'required' ]) !!}
                    
                    {!! Form::label('valorvenda', 'Valor de venda:') !!}
                    {!! Form::input('number', 'valorvenda', null, ['class' => 'form-control onlynumbers', '', 'placeholder' => 'R$', 'required' ]) !!}
                  
                    {!! Form::label('grupo_id', 'Grupo:') !!}
                    {!! Form::select('grupo_id', $grupos, $produto->grupo_id, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Selecione', 'required' ]) !!}
                    
                    <div class="salvarproduto">
                        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                    </div>
                    
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
