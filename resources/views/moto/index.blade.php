@section('title', 'Manage Moto')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')
<div class="cat__content">

    <!-- START: ecommerce/Motos-list -->
    <section class="card">
        <div class="card-header">
            <div class="dropdown pull-right">
                <a href="{{ url('moto/create')}}" class="btn btn-success "><i class="fa fa-plus"></i>&nbsp; &nbsp; Add Entry &nbsp; &nbsp;</a>
            </div>
            <span class="cat__core__title">
                <strong>Moto List</strong>
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
                        <th>Título</th>
                        <th>Kilometraje</th>
                        <th>Creado en</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($motos as $moto)
                    <tr>
                        <td>{{ $moto->id }}</td>
                        <td>{{ $moto->title }}</td>
                        <td>{{ number_format($moto->kilometer) }} km</td>
                        <td>{{ $moto->realized_at }}</td>
                        <td style="width:250px;">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalLong{{ $moto->id }}">
                                <span class="icmn-eye"></span>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalLong{{ $moto->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        {!! Form::model($moto, ['method' => 'PATCH', 'id'=>'form-validation', 'name'=>'form-validation', 'route' => ['moto.update', $moto->id]]) !!}

                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Descripción</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <textarea class="summernote" name="description">{{ $moto->description}}</textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Guardar cambios</button> </div>

                                        {!! Form::close() !!}

                                    </div>
                                </div>
                            </div>


                            </a>
                            <a href="{{ route('moto.edit',$moto->id ) }}" class="btn btn-primary"> Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['moto.destroy', $moto->id],'style'=>'display:inline','role'=>'form','onsubmit' => 'return confirm("Do you want to delete this ?")']) !!}
                            {!! Form::submit('Remove', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </section>
    <!-- END: ecommerce/products-list -->
    <script>
        $('#id').delay(3000).fadeOut('fast');
    </script>
    <!-- START: page scripts -->
    <script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });
    </script>

    <script>
        $(function() {
            $("#m_section_name").html("Moto");
            ///////////////////////////////////////////////////////////
            // tooltips
            $("[data-toggle=tooltip]").tooltip();

            ///////////////////////////////////////////////////////////
            // chart1
            new Chartist.Line(".chart-line", {
                labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
                series: [
                    [5, 0, 7, 8, 12],
                    [2, 1, 3.5, 7, 3],
                    [1, 3, 4, 5, 6]
                ]
            }, {
                fullWidth: !0,
                chartPadding: {
                    right: 40
                },
                plugins: [
                    Chartist.plugins.tooltip()
                ]
            });

            ///////////////////////////////////////////////////////////
            // chart 2
            var overlappingData = {
                    labels: ["Jan", "Feb", "Mar", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    series: [
                        [5, 4, 3, 7, 5, 10, 3, 4, 8, 10, 6, 8],
                        [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4]
                    ]
                },
                overlappingOptions = {
                    seriesBarDistance: 10,
                    plugins: [
                        Chartist.plugins.tooltip()
                    ]
                },
                overlappingResponsiveOptions = [
                    ["", {
                        seriesBarDistance: 5,
                        axisX: {
                            labelInterpolationFnc: function(value) {
                                return value[0]
                            }
                        }
                    }]
                ];

            new Chartist.Bar(".chart-overlapping-bar", overlappingData, overlappingOptions, overlappingResponsiveOptions);

            ///////////////////////////////////////////////////////////
            // custom scroll
            if (!('ontouchstart' in document.documentElement) && jQuery().jScrollPane) {
                $('.custom-scroll').each(function() {
                    $(this).jScrollPane({
                        contentWidth: '100%',
                        autoReinitialise: true,
                        autoReinitialiseDelay: 100
                    });
                    var api = $(this).data('jsp'),
                        throttleTimeout;
                    $(window).bind('resize', function() {
                        if (!throttleTimeout) {
                            throttleTimeout = setTimeout(function() {
                                api.reinitialise();
                                throttleTimeout = null;
                            }, 50);
                        }
                    });
                });
            }

        });
    </script>
    <!-- END: page scripts -->
    @include('components/footer')