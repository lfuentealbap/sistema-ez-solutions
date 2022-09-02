<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de EZ Solutions</title>
</head>
<body>
    <div style="
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.125);
    border-radius: 0.25rem;">
        <div style="padding: 0.5rem 1rem;
        margin-bottom: 0;
        background-color: rgb(96, 207, 244);
        border-bottom: 1px solid rgba(0, 0, 0, 0.125);">
        <span>
          <img src="{{ asset('img/inicio/logo.png') }}" style="height: 50px;" alt="EZ Solutions">
         <h3 style="color: rgb(255, 255, 255)"> Se ha actualizado el trabajo "{{$contenido['titulo']}}" </h3>
        </span>
        </div>
        <div class="card-body" style="flex: 1 1 auto;
        padding: 1rem 1rem;">
          <blockquote class="blockquote mb-0">
            <p>Información del trabajo:</p>

            <div><strong>Descripción: </strong> {{$contenido['descripcion']}}</div>
            <div><strong>Ubicación: </strong> {{$contenido['direccion']}}, {{$contenido['ciudad']}}</div>
            <div><strong>Fecha inicio: </strong> @php

                echo \Carbon\Carbon::parse($contenido['fecha_inicio'])->format('d-m-Y H:i');
            @endphp</div>
              <div><strong>Fecha termino: </strong> @php

                echo \Carbon\Carbon::parse($contenido['fecha_termino'])->format('d-m-Y H:i');
            @endphp</div>
            <div><strong>Pago por este servicio: </strong> ${{$contenido['pago']}}</div>
            <br><br>
            Se despide,
            EZ Solutions.
            <br>
            Correo generado desde plataforma EZ Solutions.
            <div>
                <img src="{{ asset('img/inicio/logo.png') }}" style="height: 200px;" alt="EZ Solutions">
            </div>
          </blockquote>
        </div>
      </div>
</body>
</html>
