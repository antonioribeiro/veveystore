@extends('admin.layouts.admin')

@section('container')
    @include('admin.partials.pageHeader', ['title' => 'Novo produto'])

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Digite os dados do novo produto
                </div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'admin.products.store']) !!}
                        <div class="form-group">
                            <label>Nome</label>
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label>Descrição completa</label>
                            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Quantidade no estoque</label>
                                    {!! Form::text('stock', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-md-4">
                                    <label>Preço de custo</label>
                                    {!! Form::text('cost', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-md-4">
                                    <label>Preço de venda</label>
                                    {!! Form::text('price', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Marca</label>
                                    {!! Form::select('brand_id', $brands, null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-md-4">
                                    <label>Categoria</label>
                                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-md-4">
                                    <label>Unidade</label>
                                    {!! Form::select('unit_id', $units, null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Gravar</button>
                    {!! Form::close() !!}
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@stop

@section('javascript')

@stop
