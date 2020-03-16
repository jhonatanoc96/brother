@section('title', 'Manage Debt')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')

<div class="cat__content">

    <!-- START: ecommerce/Motos-list -->
    <section class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-8">
                    <form action="{{ route('consultar')}}">
                        <select class="form-control js-example-basic-single" name="income" onchange="this.form.submit()">
                            <option value="">--- Seleccione un Ingreso ---</option>
                            @foreach($incomes as $income)
                            <option value="{{ $income->id }}">{{ $income->created_at }} - ${{ number_format($income->amount) }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="dropdown pull-right">

                        @if (\Route::is('consultar'))

                        @foreach($incomeSelected as $temp)
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalLong{{$temp->id}}">
                            Add Debt
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong{{$temp->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">

                                    {!! Form::open(array('route' => 'debt.store','method'=>'POST')) !!}

                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Descripción</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Descripción</label>
                                                    <input class="form-control" placeholder="Descripción" name="description" placeholder="Descripción" value="{{ old('description') }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Valor:</label>
                                                    <input class="form-control" placeholder="Valor" name="amount" type="number" value="{{ old('amount') }}">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Guardar cambios</button> </div>

                                    {!! Form::close() !!}

                                </div>
                            </div>
                        </div>

                        @endforeach


                        @else
                        <!-- No hacer nada -->
                        @endif

                    </div>




                </div>
            </div>

            <br>

            <span class="cat__core__title">
                @if (\Route::is('consultar'))
                <strong>Debt List - Fecha: {{$incomeSelected[0]->created_at}} - Valor: ${{number_format($incomeSelected[0]->amount)}}</strong>
                @else
                <strong>Debt List</strong>
                @endif

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
                        <th>Descripción</th>
                        <th>Valor</th>
                        <th>Activo</th>
                        <th>Creado en</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($debts as $debt)
                    <tr>
                        {!! Form::model($debt, ['method' => 'PATCH', 'id'=>$debt->id, 'route' => ['debt.update', $debt->id]]) !!}
                        <td>{{ $debt->id }}</td>

                        <td><input class="form-control" name="description" type="text" value="{{$debt->description}}"></td>

                        <td><input class="form-control" name="amount" type="number" value="{{$debt->amount}}"></td>
                        <td>
                            <label class="switch">
                                <input type="checkbox" name="active" onclick="getElementById({{ $debt->id }}).submit()" {{ ($debt->active) ? "checked" : "" }}>
                                <span class="slider round"></span>
                            </label>
                        </td>

                        <td>{{ $debt->created_at }}</td>
                        <td style="width:250px;">
                            <!-- Button trigger modal -->
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>

                            {!! Form::close() !!}


                            {!! Form::open(['method' => 'DELETE','route' => ['debt.destroy', $debt->id],'style'=>'display:inline','role'=>'form','onsubmit' => 'return confirm("Do you want to delete this ?")']) !!}
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
    <script src="{!! asset('/js/select.js') !!}"></script>

    @include('components/footer')