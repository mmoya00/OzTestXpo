<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="es">
@include('vendor.adminlte.layouts.partials.headexpoeducar');

<body data-spy="scroll" data-target="#navigation" data-offset="50">

<div id="app" v-cloak>
    <!-- Fixed navbar -->
@include('vendor.adminlte.layouts.partials.navbarexpoeducar')
<!-- Banner -->
@include('vendor.adminlte.layouts.partials.bannercategory')

<!-- style="padding-top: 0px" -->
    <section class="content" id="univ" name="univ">
        <!-- Modal -->
        @include('vendor.adminlte.layouts.partials.modalmeinteresa')
        <div style="width: 100%;" class="container">
            <!-- Search panel -->
            @include('vendor.adminlte.layouts.partials.searchsuperior')
            <?php $countPagado = 0; ?>
            <?php $countFree = 0; ?>
            @foreach($superiors as $pregrado)
                @if($pregrado->plan === "1G" || $pregrado->plan === "2P")
                    @if($countPagado === 0)
                        <div class="row">
                    @endif
                        {{-- Gold y Premium --}}
                        <div class="col-md-4"
                             onmouseleave="if($('#collapse{{ $pregrado->id }}').attr('aria-expanded') === 'true'){ $('#collapse{{ $pregrado->id }}').collapse('toggle');}">
                            <!-- Widget: user widget style 1 -->
                            <div class="box box-widget widget-user">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-black"
                                    @if(!empty($pregrado->pregrade_bg_picture))
                                        style="background: url('{{ asset($pregrado->pregrade_bg_picture) }}') center;">
                                    @else
                                        style="background: url('{{ asset('/img/ucla_campus_superior_destacado.jpg') }}') center center;">
                                    @endif
                                </div>

                                <div class="box-footer">
                                    <h3 style="color:black"
                                        class="widget-user-username">{{ str_limit($pregrado->nombre_corto, $limit=29, $end="...") }}</h3>
                                    <div class="row">
                                        <div class="centered">
                                            <div style="min-height: 15px; max-height: 15px" class="description-block">
                                                <h5 class="description-header">Carreras</h5>
                                                <span class="description-text">{{ str_limit($pregrado->carreras_corto, $limit=65, $end="...") }}</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-sm-4 centered">
                                        <a class="btn-sm bg-green" data-target="#meInteresa" data-toggle="modal"
                                           href="#meInteresa">
                                            Me interesa
                                        </a>
                                    </div>
                                    <div class="col-sm-4 centered">
                                        <a href="{{ $pregrado->url }}" target="_blank" class="btn-sm bg-navy">
                                            Más información
                                        </a>
                                    </div>
                                    <div class="centered">
                                        <a class="btn-sm bg-green" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapse{{ $pregrado->id }}">
                                            Contactos...
                                        </a>
                                    </div>
                                    <div id="collapse{{ $pregrado->id }}" class="panel-collapse collapse">
                                        <br>
                                        <div class="box-body">
                                            <i class="fa  fa-map margin-r-5"></i> {{ $pregrado->direccion }}<br>
                                            <i class="fa fa-phone margin-r-5"></i> {{ $pregrado->telefono }}
                                            / {{ $pregrado->celular }} <br>
                                            <i class="fa fa-envelope margin-r-5"></i> {{ $pregrado->email }}
                                        </div>
                                        <div class="text-center">
                                            <a href="{{ $pregrado->facebook }}"
                                               class="btn btn-social-icon btn-facebook"><i
                                                        class="fa fa-facebook"></i></a>
                                            <a href="{{ $pregrado->twitter }}"
                                               class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
                                            <a href="{{ $pregrado->linkedin }}"
                                               class="btn btn-social-icon btn-linkedin"><i
                                                        class="fa fa-linkedin"></i></a>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
                            <!-- /.widget-user -->
                        </div>
                        <?php $countPagado += 1; ?>
                @else
                    @if($countPagado > 0 && $countFree === 0)
                    </div>
                @endif
                    @if($countFree === 0)
                        <div class="row centered">
                    @endif
                        <div class="col-md-3" onmouseleave="if($('#collapse{{ $pregrado->id }}').attr('aria-expanded') === 'true'){ $('#collapse{{ $pregrado->id }}').collapse('toggle');}">
                                <div class="box box-primary">
                                    <div class="box-header with-border bg-gray-active">
                                        <h3 class="box-title"><strong>{{ str_limit($pregrado->nombre_corto, $limit=25, $end="...") }}</strong></h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <h5><strong><i class="fa fa-map-marker margin-r-5"></i> Ubicación</strong></h5>

                                        <p class="text-muted">{{ isset($pregrado->province->name) ? $pregrado->province->name : "ND" }}
                                            , {{ isset($pregrado->city->name) ? $pregrado->city->name : "ND" }}</p>
                                        <hr>
                                        <a class="btn-sm bg-green" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapse{{ $pregrado->id }}">
                                            Contactos...
                                        </a>
                                        <div id="collapse{{ $pregrado->id }}" class="panel-collapse collapse">
                                            <div class="box-body">
                                                <i class="fa  fa-map margin-r-5"></i> {{ $pregrado->direccion }}<br>
                                                <i class="fa fa-phone margin-r-5"></i> {{ $pregrado->telefono }}
                                                / {{ $pregrado->celular }} <br>
                                                <i class="fa fa-envelope margin-r-5"></i> {{ $pregrado->email }}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>
                        <?php $countFree += 1; ?>
                    @endif
                            @endforeach
                        </div>
                <div class="row">
                    {{ $superiors->render() }}
                </div>
                <br>
            <br>
        </div> <!--/ .container -->
    </section>

    <footer>
        @include('vendor.adminlte.layouts.partials.footerexpoeducar')
    </footer>

</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ url (mix('/js/app-landing.js')) }}"></script>
<script>
    $('.carousel').carousel({
        interval: 3500
    })
</script>

<!-- Ion Slider -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.2.0/js/ion.rangeSlider.js"></script>
<!-- Bootstrap slider -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.1/bootstrap-slider.js"></script>
<script>
    $(function () {
        /* BOOTSTRAP SLIDER */
        $('.slider').slider();

        /* ION SLIDER */
        $("#range_1").ionRangeSlider({
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "$",
            prettify: false,
            hasGrid: true
        });
        $("#range_2").ionRangeSlider();

        $("#range_5").ionRangeSlider({
            min: 0,
            max: 10,
            type: 'single',
            step: 0.1,
            postfix: " mm",
            prettify: false,
            hasGrid: true
        });
        $("#range_6").ionRangeSlider({
            min: -50,
            max: 50,
            from: 0,
            type: 'single',
            step: 1,
            postfix: "°",
            prettify: false,
            hasGrid: true
        });

        $("#range_4").ionRangeSlider({
            type: "single",
            step: 100,
            postfix: " light years",
            from: 55000,
            hideMinMax: true,
            hideFromTo: false
        });
        $("#range_3").ionRangeSlider({
            type: "double",
            postfix: " miles",
            step: 10000,
            from: 25000000,
            to: 35000000,
            onChange: function (obj) {
                var t = "";
                for (var prop in obj) {
                    t += prop + ": " + obj[prop] + "\r\n";
                }
                $("#result").html(t);
            },
            onLoad: function (obj) {
                //
            }
        });
    });

    $('#search_province').on('change', function (e) {
        var province_id = e.target.value;
        $('#search_sector').empty();
        $('#search_city').empty();
        $('#search_city').append('<option value="">Ciudad</option>');
        //ajax
        $.get('ajax-city?province_id='+province_id, function(data) {
            //success_data
            $.each(data, function(index, cityObj) {
                $('#search_city').append('<option value="'+cityObj.id+'">'+cityObj.name+'</option>');
            });
        });
    });
</script>
</body>
</html>
