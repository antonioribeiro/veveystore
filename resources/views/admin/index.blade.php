@extends('layouts.admin')

@section('container')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Clipping

                <a href="{{ route('admin.clipping.create') }}">
                    <button type="button" class="btn btn-info btn-circle pull-right"><i class="fa fa-plus"></i>
                    </button>
                </a>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Gerenciamento do Clipping
                    </div><!-- /.panel-heading -->

                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Título</th>
                                    <th>Editoria</th>
                                    <th>Localidade</th>
                                    <th>Veículo</th>
                                    <th>Extras</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $post->published_at->format('d/m/Y') }}</td>
                                            <td>{{ $post->heading }}</td>
                                            <td>{{ $post->category ? $post->category->name : '' }}</td>
                                            <td>{{ $post->locality ? $post->locality->name : '' }}</td>
                                            <td>{{ $post->vehicle ? $post->vehicle->name : '' }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <a href="{{ route('clipping.post', ['id' => $post->id]) }}"><i class="fa fa-eye"></i></a>
                                                    </div>

                                                    <div class="col-sm-2">
                                                        <a href="{{ route('admin.clipping.edit', ['id' => $post->id]) }}"><i class="fa fa-pencil"></i></a>
                                                    </div>

                                                    <div class="col-sm-2">
                                                        <a href="{{ route('admin.clipping.delete', ['id' => $post->id]) }}"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
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
    </div>
@stop

@section('javascript')
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>
@stop
