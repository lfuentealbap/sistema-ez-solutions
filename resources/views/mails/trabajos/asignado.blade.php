<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <!-- Styles -->
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Sistema de EZ Solutions</title>
</head>
<body>
    <div class="card" style="position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.125);
    border-radius: 0.25rem;">
        <div class="card-header" style="padding: 0.5rem 1rem;
        margin-bottom: 0;
        background-color: rgba(0, 0, 0, 0.03);
        border-bottom: 1px solid rgba(0, 0, 0, 0.125);">
         <h3> {{$contenido['titulo']}} </h3>
        </div>
        <div class="card-body" style="flex: 1 1 auto;
        padding: 1rem 1rem;">
          <blockquote class="blockquote mb-0">
            <p>Se te ha asignado este trabajo con los siguientes detalles:</p>
            <div><strong>Detalles: </strong> {{$contenido['descripcion']}}</div>
            <div><strong>Fecha inicio: </strong> {{$contenido['fecha_inicio']}}</div>
            <div><strong>Fecha termino: </strong> {{$contenido['fecha_termino']}}</div>
            <div><strong>Pago por este servicio: </strong> ${{$contenido['pago']}}</div>
            <br><br>
            Se despide, EZ Solutions.
            <br>
            Correo generado desde plataforma EZ Solutions.
            <div class="container">
                <img src="{{ asset('img/inicio/logo.png') }}" style="height: 200px;" alt="EZ Solutions"></img>
            </div>
          </blockquote>
        </div>
      </div>
</body>
</html>
