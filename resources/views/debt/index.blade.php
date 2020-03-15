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
                        <!-- <button type="submit">Consultar</button> -->
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="dropdown pull-right">
                        <a href="{{ url('debt/create')}}" class="btn btn-success "><i class="fa fa-plus"></i>&nbsp; &nbsp; Add Debt &nbsp; &nbsp;</a>
                    </div>
                </div>
            </div>

            <br>

            <span class="cat__core__title">
                @if (\Route::is('consultar'))
                <strong>@foreach($incomeSelected as $temp)Debt List - Fecha: {{$temp->created_at}} - Valor: ${{number_format($temp->amount)}} @endforeach</strong>
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
                            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong{{ $debt->id }}">
                                <span class="icmn-eye"></span>
                            </button> -->

                            <!-- Modal -->
                            <!-- <div class="modal fade" id="exampleModalLong{{ $debt->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        {!! Form::model($debt, ['method' => 'PATCH', 'route' => ['debt.update', $debt->id]]) !!}

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
                            </div> -->

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