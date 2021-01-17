@extends('layouts.app')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    @guest
        <meta http-equiv="refresh" content="1; URL={{ route('login') }}" />
    @else
        <div class="container">
            <br />
            <h3 align="center">Lista de Usuarios</h3>
            <br />
            <div class="table-responsive" >
                <table id="users" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th width="14%">Nombre</th>
                        <th width="14%">Correo</th>
                        <th width="14%">Rol</th>
                        <th width="14%">Accion</th>
                    </tr>
                    </thead>
                </table>
                <br>
            </div>
            <br />
        </div>


        <div id="formModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Añadir un nuevo registro</h4>
                    </div>
                    <div class="modal-body">
                        <span id="form_result"></span>
                        <form method="post" id="sample_form" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-4" >Nombre : </label>
                                <div class="col-md-8">
                                    <input type="text" name="name" id="name" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4" >Correo : </label>
                                <div class="col-md-8">
                                    <input type="text" name="email" id="email" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4" >Rol : </label>
                                <div class="col-md-8">
                                    <input type="text" name="rol" id="rol" class="form-control" />
                                </div>
                            </div>

                            <br />
                            <div class="form-group" align="center">
                                <input type="hidden" name="action" id="action" value="Add" />
                                <input type="hidden" name="hidden_id" id="hidden_id" />
                                <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="confirmModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title">Confirmacion</h2>
                    </div>
                    <div class="modal-body">
                        <h4 align="center" style="margin:0;">Estas seguro que quieres eliminar este dato?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    @endguest
@endsection
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script>
        $(document).ready(function(){

            $('#users').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('user.index') }}",
                },
                columns: [
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'rol',
                        name: 'rol'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    }
                ]
            });

            $('#sample_form').on('submit', function(event){
                event.preventDefault();
                var action_url = '';

                if($('#action').val() == 'Edit')
                {
                    action_url = "{{ route('user.update') }}";
                    setTimeout(function(){
                        $('#formModal').modal('hide');
                        $('#users').DataTable().ajax.reload();
                    }, 2000);
                }

                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    url: action_url,
                    method:"POST",
                    data:$(this).serialize(),
                    dataType:"json",
                    success:function(data)
                    {
                        var html = '';
                        if(data.errors)
                        {
                            html = '<div class="alert alert-danger">';
                            for(var count = 0; count < data.errors.length; count++)
                            {
                                html += '<p>' + data.errors[count] + '</p>';
                            }
                            html += '</div>';
                        }
                        if(data.success)
                        {
                            html = '<div class="alert alert-success">' + data.success + '</div>';
                            $('#sample_form')[0].reset();
                            $('#users').DataTable().ajax.reload();
                        }
                        $('#form_result').html(html);
                    }
                });
            });

            $(document).on('click', '.edit', function(){
                var id = $(this).attr('id');
                $('#formModal').modal('show');
                $('#form_result').html('');
                $.ajax({
                    url :"/user/"+id+"/edit",
                    dataType:"json",
                    success:function(data)
                    {
                        $('#name').val(data.result.name);
                        $('#email').val(data.result.email);
                        $('#rol').val(data.result.rol);
                        $('#hidden_id').val(id);
                        $('.modal-title').text('Editar Registro');
                        $('#action_button').val('Editar');
                        $('#action').val('Edit');
                    }
                })
            });

            var user_id;

            $(document).on('click', '.delete', function(){
                user_id = $(this).attr('id');
                $('#confirmModal').modal('show');
            });

            $('#ok_button').click(function(){
                $.ajax({
                    url:"user/destroy/"+user_id,
                    beforeSend:function(){
                        $('#ok_button').text('OK');
                    },
                    success:function(data)
                    {
                        setTimeout(function(){
                            $('#confirmModal').modal('hide');
                            $('#users').DataTable().ajax.reload();
                            alert('Usuario Eliminado');
                        }, 2000);
                    }
                })
            });

        });
    </script>
@endsection
