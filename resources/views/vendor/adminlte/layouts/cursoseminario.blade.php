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
    <section class="content" id="cursoseminario" name="cursoseminario">
        <!-- Modal -->
        @include('vendor.adminlte.layouts.partials.modalmeinteresa')
        <div style="width: 100%" class="container">
            <!-- Search panel -->
            @include('vendor.adminlte.layouts.partials.searchcursoseminario')
            <?php $countPagado = 0; ?>
            <?php $countFree = 0; ?>
            @foreach($cursoseminarios as $cursoseminario)
                @if($cursoseminario->plan === "1G" || $cursoseminario->plan === "2P")
                    @if($countPagado === 0)
                        <div class="row">
                            @endif
                            {{-- Gold y Premium --}}
                            <br>
                            <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div style="padding: 1px" class="widget-user-header bg-blue-active">
                            <!-- /.widget-user-image -->
                            <h2 style="color: white">{{ str_limit($cursoseminario->nombre, $limit=29, $end="...") }}</h2>
                            <h4 style="color: white;margin-left: 0px" class="widget-user-desc">{{ $cursoseminario->institucion }}</h4>
                        </div>
                        <div class="box-footer no-padding">
                            <div style="min-height: 25px; max-height: 25px; font-size: 16px" class="description-block">
                                {{ str_limit($cursoseminario->objetivo, $limit=50, $end="...") }}
                            </div>
                            <div class="col-sm-4 centered">
                                <a href="{{ route('cursoseminario.show', [$cursoseminario->id, $cursoseminario->slug]) }}" target="_blank" class="btn-sm bg-navy">
                                    Más información
                                </a>
                            </div>
                            <br>
                            <hr class="bg-blue-active">
                            <div class="col-sm-6">
                                <div class="description-block pull-left">
                                    <span style="font-size: 18px" class="description-text"><i style="font-size: 40px" class="ion ion-clock text-blue"></i> {{ $cursoseminario->duracion }}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                                <div class="description-block pull-left">
                                    <span style="font-size: 18px;" class="description-text"><i style="font-size: 40px" class="ion ion-android-calendar text-blue"></i> {{ $cursoseminario->fecha_inicio }}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                                <div class="description-block pull-left">
                                    <span style="font-size: 18px" class="description-text"><i style="font-size: 40px" class="ion ion-social-usd text-blue"></i> {{ $cursoseminario->costo }}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                                <div class="description-block pull-left">
                                    <span style="font-size: 18px" class="description-text"><i style="font-size: 40px" class="ion ion-ios-people-outline text-blue"></i>
                                        @if($cursoseminario->presencial)
                                            Presencial</span>
                                        @elseif($cursoseminario->semipresencial)
                                            Semipresencial</span>
                                        @elseif($cursoseminario->distancia)
                                            Distancia</span>
                                        @endif
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
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
                            <div class="row">
                        @endif
                            <div class="col-md-4">
                                <!-- Widget: user widget style 1 -->
                                <div class="box box-widget widget-user-2">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    <div style="padding: 1px" class="widget-user-header bg-blue-active">
                                        <!-- /.widget-user-image -->
                                        <h2 style="color: white">{{ str_limit($cursoseminario->nombre, $limit=29, $end="...") }}</h2>
                                        <h4 style="color: white;margin-left: 0px" class="widget-user-desc">{{ $cursoseminario->institucion }}</h4>
                                    </div>
                                    <div class="box-footer no-padding">
                                        <div style="min-height: 25px; max-height: 25px; font-size: 16px" class="description-block">
                                            {{ str_limit($cursoseminario->objetivo, $limit=50, $end="...") }}
                                        </div>
                                        <hr class="bg-blue-active">
                                        <div class="col-sm-6">
                                            <div class="description-block pull-left">
                                                <span style="font-size: 18px" class="description-text"><i style="font-size: 40px" class="ion ion-clock text-blue"></i> {{ $cursoseminario->duracion }}</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-6">
                                            <div class="description-block pull-left">
                                                <span style="font-size: 18px;" class="description-text"><i style="font-size: 40px" class="ion ion-android-calendar text-blue"></i> {{ $cursoseminario->fecha_inicio }}</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-6">
                                            <div class="description-block pull-left">
                                                <span style="font-size: 18px" class="description-text"><i style="font-size: 40px" class="ion ion-social-usd text-blue"></i> {{ $cursoseminario->costo }}</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-6">
                                            <div class="description-block pull-left">
                                    <span style="font-size: 18px" class="description-text"><i style="font-size: 40px" class="ion ion-ios-people-outline text-blue"></i>
                                        @if($cursoseminario->presencial)
                                            Presencial</span>
                                                @elseif($cursoseminario->semipresencial)
                                                    Semipresencial</span>
                                                @elseif($cursoseminario->distancia)
                                                    Distancia</span>
                                                @endif
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </div>
                                <!-- /.widget-user -->
                            </div>
                        <?php $countFree += 1; ?>
                @endif
            @endforeach
                        </div>
            <div class="row">
                {{ $cursoseminarios->render() }}
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
        $('#search_city').empty();
        $('#search_sector').empty();
        $('#search_city').append('<option value="">...</option>');
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
