@section('title', 'Manage Income')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')

<div class="cat__content">

    <!-- START: ecommerce/Motos-list -->
    <section class="card">
        <div class="card-header">
            <div class="dropdown pull-right">
                <a href="{{ url('income/create')}}" class="btn btn-success "><i class="fa fa-plus"></i>&nbsp; &nbsp; Add Income &nbsp; &nbsp;</a>
            </div>
            <span class="cat__core__title">
                <strong>Income List</strong>
            </span>
        </div>


        <div class="card-body">
            @if ($message = Session::get('error'))
            <div class="alert alert-danger" role="alert" id="id">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Oh snap! </strong> {{ $message }}
            </div>
            @endif
            @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert" id="id">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Well done! </strong> {{ $message }} !
            </div>
            @endif
            <table class="table table-hover nowrap" id="example1" width="100%">
                <thead class="thead-default">
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Valor</th>
                        <th>Activo</th>
                        <th>Creado en</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($incomes as $income)
                    <tr>
                        <td>{{ $income->id }}</td>
                        <td>{{ $income->customer->first_name }} {{ $income->customer->last_name }}</td>
                        <td>${{ number_format($income->amount) }} </td>
                        {!! Form::model($income, ['method' => 'PATCH', 'id'=>$income->id, 'name'=>'form-validation', 'route' => ['income.update', $income->id]]) !!}
                        <td>
                            <label class="switch">
                                <input type="checkbox" name="active" onclick="getElementById({{ $income->id }}).submit()" {{ ($income->active) ? "checked" : "" }}>
                                <span class="slider round"></span>
                            </label>
                        </td>
                        {!! Form::close() !!}

                        <td>{{ $income->created_at }}</td>
                        <td style="width:250px;">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalLong{{ $income->id }}">
                                <span class="icmn-eye"></span>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalLong{{ $income->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        {!! Form::model($income, ['method' => 'PATCH', 'id'=>'form-validation', 'name'=>'form-validation', 'route' => ['income.update', $income->id]]) !!}

                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Descripción</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Guardar cambios</button> </div>

                                        {!! Form::close() !!}

                                    </div>
                                </div>
                            </div>


                            </a>
                            <a href="{{ route('income.edit',$income->id ) }}" class="btn btn-primary"> Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['income.destroy', $income->id],'style'=>'display:inline','role'=>'form','onsubmit' => 'return confirm("Do you want to delete this ?")']) !!}
                            {!! Form::submit('Remove', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </section>

    <!-- JS -->
    <script src="{!! asset('/js/datatable.js') !!}"></script>
    
    @include('components/footer')