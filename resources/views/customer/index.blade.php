@section('title', 'Manage Customer')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')

<div class="cat__content">

    <!-- START: ecommerce/Motos-list -->
    <section class="card">
        <div class="card-header">
            <div class="dropdown pull-right">
                <a href="{{ url('customer/create')}}" class="btn btn-success "><i class="fa fa-plus"></i>&nbsp; &nbsp; Add Customer &nbsp; &nbsp;</a>
            </div>
            <span class="cat__core__title">
                <strong>Lista de Clientes</strong>
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
                        <th>Cédula/NIT</th>
                        <th>Nombre</th>
                        <th>Celular</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->ident }}</td>
                        <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                        <td>{{ $customer->cel }}</td>
                        <td style="width:250px;">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalLong{{ $customer->id }}">
                                <span class="icmn-eye"></span>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalLong{{ $customer->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        {!! Form::model($customer, ['method' => 'PATCH', 'id'=>'form-validation', 'name'=>'form-validation', 'route' => ['customer.update', $customer->id]]) !!}

                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Descripción</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row border border-secondary">
                                                <div class="col border border-secondary">Cédula / NIT</div>
                                                <div class="col border border-secondary">{{$customer->ident}}</div>
                                                <div class="w-100"></div>
                                                <div class="col border border-secondary">Nombre</div>
                                                <div class="col border border-secondary">{{$customer->first_name}} {{$customer->last_name}}</div>
                                                <div class="w-100"></div>
                                                <div class="col border border-secondary">Celular</div>
                                                <div class="col border border-secondary">{{$customer->cel}}</div>
                                                <div class="w-100"></div>
                                                <div class="col border border-secondary">Teléfono</div>
                                                <div class="col border border-secondary">{{$customer->tel}}</div>
                                                <div class="w-100"></div>
                                                <div class="col border border-secondary">Email</div>
                                                <div class="col border border-secondary">{{$customer->email}}</div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        </div>

                                        {!! Form::close() !!}

                                    </div>
                                </div>
                            </div>


                            </a>
                            <a href="{{ route('customer.edit',$customer->id ) }}" class="btn btn-primary"> Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['customer.destroy', $customer->id],'style'=>'display:inline','role'=>'form','onsubmit' => 'return confirm("Do you want to delete this ?")']) !!}
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