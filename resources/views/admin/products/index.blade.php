@extends('admin.layouts.admin')

@section('container')
    @include('admin.partials.pageHeader', ['title' => 'Produtos'])

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista de produtos
                    <div class="pull-right">
                        @include('admin.products.partials.tableMenu')
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="productsTable">
                            <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Produto</th>
                                <th>Descrição</th>
                                <th>Preço de custo</th>
                                <th>Preço de venda</th>
                                <th>Estoque</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                                    <td><img src="/files/products/12345.jpg" alt="dress" width="25px"></td>
                                    <td>Vestido rosa e branco</td>
                                    <td>Vestido em tafetá e algodão, busto branco e saia rosa.</td>
                                    <td class="center">R$ 25,00</td>
                                    <td class="center">R$ 75,00</td>
                                    <td class="center">10 pcs</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
@stop

@section('javascript')
    <script>
        $(document).ready(function() {
            $('#productsTable').DataTable({
                responsive: true
            });
        });
    </script>
@stop
