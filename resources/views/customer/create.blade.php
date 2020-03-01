@section('title', 'Add Customer')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')
<div class="cat__content">

    <!-- START: ecommerce/Pages-edit -->
    <section class="card">
        <div class="card-header">
            <div class="dropdown pull-right">
                <a href="{{ url('customer/create')}}" class="btn btn-success "><i class="fa fa-plus"></i>&nbsp; &nbsp; Add Customer &nbsp; &nbsp;</a>
            </div>
            <span class="cat__core__title">
                <strong>Add Customer</strong>
            </span>
        </div>
        <div class="card-body">
            <div class="row">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="col-lg-12">
                    {!! Form::open(array('route' => 'customer.store','method'=>'POST', 'id'=>'form-validation', 'name'=>'form-validation')) !!}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Cédula / NIT</label>
                                <input class="form-control" placeholder="CC / NIT" name="ident" type="text" value="{{ old('ident') }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Nombre(s)</label>
                                <input class="form-control" placeholder="Primer Nombre" name="first_name" type="text" value="{{ old('first_name') }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Apellido(s)</label>
                                <input class="form-control" placeholder="Apellidos" name="last_name" type="text" value="{{ old('last_name') }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Email</label>
                                <input class="form-control" placeholder="Email" name="email" type="email" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Celular</label>
                                <input class="form-control" placeholder="Celular" name="cel" type="text" value="{{ old('cel') }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Teléfono</label>
                                <input class="form-control" placeholder="Teléfono" name="tel" type="text" value="{{ old('tel') }}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Activo &nbsp; &nbsp; &nbsp; &nbsp;</label>
                                <input type="checkbox" name="active">
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary width-150">Enviar</button>
                        <button type="reset" class="btn btn-warning width-150">Restablecer</button>
                        <a href="{{ url('customer')}}" class="btn btn-default">Cancelar</a>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </section>

    @include('components/footer')