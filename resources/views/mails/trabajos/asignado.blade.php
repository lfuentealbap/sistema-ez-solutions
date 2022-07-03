<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Sistema de EZ Solutions</title>
</head>
<body>
    <div class="card">
        <div class="card-header">
         <h3> {{$contenido['titulo']}} </h3>
        </div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            <p>Se te ha asignado con los siguientes detalles:</p>
            <div><strong>Detalles: </strong> {{$contenido['descripcion']}}</div>
            <div><strong>Fecha inicio: </strong> {{$contenido['fecha_inicio']}}</div>
            <div><strong>Fecha termino: </strong> {{$contenido['fecha_termino']}}</div>
            <div><strong>Pago por este servicio: </strong> ${{$contenido['pago']}}</div>
            <br><br>
            Se despide, EZ Solutions.
            <br>
            Correo generado desde plataforma EZ Solutions.
            <div class="container">
                <img src="{{ asset('img/inicio/logo.png') }}" class="logo-inicio" alt="EZ Solutions"></img>
            </div>
          </blockquote>
        </div>
      </div>
</body>
</html>
