@section('title', 'Add Income')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')
<div class="cat__content">

    <!-- START: ecommerce/Pages-edit -->
    <section class="card">
        <div class="card-header">
            <div class="dropdown pull-right">
                <a href="{{ url('income/create')}}" class="btn btn-success "><i class="fa fa-plus"></i>&nbsp; &nbsp; Add Income &nbsp; &nbsp;</a>
            </div>
            <span class="cat__core__title">
                <strong>Add Income</strong>
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
                    {!! Form::open(array('route' => 'income.store','method'=>'POST', 'id'=>'form-validation', 'name'=>'form-validation')) !!}
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Descripción</label>
                                <textarea class="summernote" rows="4" id="l15" name="description" placeholder="Descripción">{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Cliente: <span style="color:red; font-weight:900; font-size:20px;">*</span></label>
                                <select class="form-control js-example-basic-single" name="customer_id">
                                    <option value="">--- Seleccione un Cliente ---</option>
                                    @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ (Input::old("customer_id") == $customer->id ? "selected":"") }}>{{ $customer->first_name }} {{ $customer->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Valor:</label>
                                <input class="form-control" placeholder="Valor" name="amount" type="number" value="{{ old('amount') }}">
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
                        <a href="{{ url('income')}}" class="btn btn-default">Cancelar</a>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </section>
    <!-- END: ecommerce/product-edit -->
    <!-- END: ecommerce/products-list -->

    <!-- START: page scripts -->
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });
    </script>

    @include('components/footer')