@section('title', 'Add Entry')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')
<div class="cat__content">

<!-- START: ecommerce/Pages-edit -->
<section class="card">
   <div class="card-header">
        <div class="dropdown pull-right">
           <a href="{{ url('moto/create')}}" class="btn btn-success "><i class="fa fa-plus"></i>&nbsp; &nbsp; Add Entry &nbsp; &nbsp;</a>
       </div>
        <span class="cat__core__title">
            <strong>Add Entry</strong>
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
			 {!! Form::open(array('route' => 'moto.store','method'=>'POST', 'id'=>'form-validation', 'name'=>'form-validation')) !!}
				<div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="validation-pagename">Título <span style="color:red; font-weight:900; font-size:20px;">*</span></label>
                            <input id="validation-pagename" class="form-control"  placeholder="Título"   name="title"  type="text" data-validation="[NOTEMPTY]" data-validation-message="Título no puede estar vacío!">
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label class="form-control-label">Descripción</label>
                    <textarea class="summernote" rows="4" id="l15" name="description" placeholder="Descripción"></textarea>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="validation-metatitle">Kilometraje <span style="color:red; font-weight:900; font-size:20px;">*</span></label>
                            <input id="validation-metatitle" class="form-control"  placeholder="Kilometraje"   name="kilometer"  type="number" data-validation="[NOTEMPTY]" data-validation-message="Descripción no puede estar vacío!">
                        </div>
                    </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                            <label for="validation-metatitle" style="margin-top:9px;">Creado en</label>
                            <input class="form-control"  placeholder="Creado en"   name="realized_at"  type="date" >
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                     <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Activo &nbsp; &nbsp; &nbsp; &nbsp;</label>
                            <input type="checkbox" name="active" checked value="1" >
                        </div>
                     </div>   
               </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary width-150" >Enviar</button>
                    <button type="reset" class="btn btn-warning width-150" >Restablecer</button>
                    <a href="{{ url('moto')}}"  class="btn btn-default">Cancelar</a>
                </div>
			{!! Form::close() !!}
            </div>
 
        </div>
    </div>
</section>

<!-- START: page scripts -->
<script src="{!! asset('/js/textarea.js') !!}"></script>

<script>
    $(function() {

        // Form Validation
        $('#form-validation').validate({
            submit: {
                settings: {
                    inputContainer: '.form-group',
                    errorListClass: 'form-control-error',
                    errorClass: 'has-danger'
                }
            }
        });

       
    });
</script>
<!-- END: page scripts -->
@include('components/footer')
