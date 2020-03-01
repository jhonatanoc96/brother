@section('title', 'Update Income')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')
<div class="cat__content">

    <!-- START: ecommerce/moto-edit -->
    <section class="card">
        <div class="card-header">
            <div class="dropdown pull-right">
                <a href="{{ url('income/create')}}" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp; &nbsp; Add Income &nbsp; &nbsp;</a>
            </div>
            <span class="cat__core__title">
                <strong>Edit income</strong>
            </span>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
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
                    {!! Form::model($income, ['method' => 'PATCH', 'id'=>'form-validation', 'name'=>'form-validation', 'route' => ['income.update', $income->id]]) !!}
                    @section('title', 'Update income')
                    @include('main')
                    @include('components/mainmenu')
                    @include('components/breadcrumb')
                    <div class="cat__content">

                        <!-- START: ecommerce/moto-edit -->
                        <section class="card">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
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
                                        {!! Form::model($income, ['method' => 'PATCH', 'id'=>'form-validation', 'name'=>'form-validation', 'route' => ['income.update', $income->id]]) !!}
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Descripción</label>
                                                    <textarea class="summernote" rows="4" id="l15" name="description" placeholder="Descripción">{{ $income->description}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">Cliente:</label>
                                                    <select class="form-control js-example-basic-single" name="customer_id">

                                                        @foreach($customers as $customer)
                                                        @if($income->customer->id == $customer->id)
                                                        <option value="{{ $customer->id }}" selected>{{ $customer->first_name }} {{ $customer->last_name }}</option>
                                                        @else
                                                        <option value="{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->last_name }}</option>
                                                        @endif

                                                        @endforeach

                                                    </select> </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">Valor:</label>
                                                    <input class="form-control" placeholder="Valor" name="amount" type="number" value="{{$income->amount}}">
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Activo &nbsp; &nbsp; &nbsp; &nbsp;</label>
                                                    <input type="checkbox" name="active" {{ ($income->active) ? "checked" : "" }}>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary width-150">Submit</button>
                                            <button type="reset" class="btn btn-warning width-150">Reset</button>
                                            <a href="{{ url('income')}}" class="btn btn-default">Cancel</a>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>

                                </div>
                            </div>
                        </section>

                    </div>

                </div>
            </div>
    </section>

    <!-- TEXTAREA -->
    <script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });
    </script>

    @include('components/footer')