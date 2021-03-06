<!-- Main Footer -->
<footer style="background-color: #ff9c00; padding: 10px">
    <div class="row ">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="row logo-wrapper">
                <img style="padding-left: 10%;"
                     src="{{ asset('/img/logo-white.png') }}" alt="ExpoEducar">
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="row access-wrapper">
                <ul class="menu">
                    <li style="font-size: 14px">¿Quiénes Somos?</li>
                    <li style="font-size: 14px">Términos y Condiciones</li>
                    <li style="font-size: 14px">Preguntas Frecuentes</li>
                    <li style="font-size: 14px">Contáctanos</li>
                </ul>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="row links-wrapper">
                <ul class="menu">
                    <li style="font-size: 14px">Beneficios para Instituciones</li>
                    <li style="font-size: 14px">Beneficios para Estudiantes</li>
                    <li style="font-size: 14px"><a style="color: #555555" href="{{ route('planes.all') }}">Planes y
                            Tarifas</a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            {{--style="width: 30px; margin-right: 10px;"--}}
            <div class="row links-wrapper">
                <SPAN style="font-size: 14px">
                    <a class="btn-sm bg-blue-active" data-toggle="collapse" href="{{ url('/register') }}">
                                    "PUBLICA AQUÍ"
                                </a>
                <br>
                <br>
                <a href="https://www.facebook.com/Expoeducar-685682501640613"
                   class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
                <a href="https://twitter.com/expoeducar" class="btn btn-social-icon btn-twitter"><i
                            class="fa fa-twitter"></i></a>
                <a href="https://www.linkedin.com/in/expo-educar-547944135" class="btn btn-social-icon btn-linkedin"><i
                            class="fa fa-linkedin"></i></a>
            </div>
        </div>

    </div>
</footer>