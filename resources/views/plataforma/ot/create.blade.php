@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Crear Orden de trabajo') }}</div>

                    <div class="card-body">
                        <form  id="form" action="{{ route('ot.store') }}" method="post">
                            @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <input type="hidden" class="form-control" name="rut_trabajador"
                                            value="{{ Auth::user()->rut }}" required>
                                            <input type="hidden" class="form-control" name="id_trabajo"
                                            value="{{ $trabajo->id }}" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="fecha" class="col-md-4 col-form-label text-md-end">Trabajo a finalizar:</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control"
                                            value="{{ $trabajo->titulo }}" required disabled>
                                    </div>
                                </div>

                            <div class="row mb-3">
                                <label for="fecha" class="col-md-4 col-form-label text-md-end">Fecha:</label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="fecha"
                                        value="{{ \Carbon\Carbon::parse(\Carbon\Carbon::now())->format('Y-m-d') }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nombre_colaborador" class="col-md-4 col-form-label text-md-end">Nombre Colaborador:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nombre_colaborador" value="{{ old('nombre_colaborador') }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="direccion" class="col-md-4 col-form-label text-md-end">Dirección:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="ciudad" class="col-md-4 col-form-label text-md-end">Ciudad:</label>
                                <div class="col-md-6">
                                    <select class="form-select" id="ciudad" name="ciudad" required>
                                        <option selected value="">Seleccione ciudad...</option>
                                        @foreach ($ciudades as $ciudad)
                                            <option value="{{ $ciudad->ciudad }}">{{ $ciudad->ciudad }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="id_area" class="col-md-4 col-form-label text-md-end">Area del trabajo</label>
                                <div class="col-md-6">
                                    <select class="form-select" id="id_area" name="id_area">
                                        <option selected value="">Seleccione area...</option>
                                        @foreach ($areas as $area)
                                        <option value="{{ $area->id }}">{{$area->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tipo_requerimiento" class="col-md-4 col-form-label text-md-end">Tipo de requerimiento</label>
                                <div class="col-md-6">
                                    <select class="form-select" id="tipo_requerimiento" name="tipo_requerimiento">
                                        <option selected value="Instalación">Instalación</option>
                                        <option value="Rollout">Rollout</option>
                                        <option value="Incidente">Incidente</option>
                                        <option value="Otros">Otros</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="detalles_equipo_antiguo" class="col-md-4 col-form-label text-md-end">Detalles equipo(s) antiguo:</label>
                                <div class="col-md-6">
                                    <textarea type="text" class="form-control" name="detalles_equipo_antiguo" value="{{ old('detalles_equipo_antiguo') }}" rows="5"> </textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="detalles_equipo_nuevo" class="col-md-4 col-form-label text-md-end">Detalles equipo(s) nuevo:</label>
                                <div class="col-md-6">
                                    <textarea type="text" class="form-control" name="detalles_equipo_nuevo" value="{{ old('detalles_equipo_nuevo') }}" rows="5"> </textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="descripcion_solucion" class="col-md-4 col-form-label text-md-end">Descripcion solucion:</label>
                                <div class="col-md-6">
                                    <textarea type="text" class="form-control" name="descripcion_solucion" value="{{ old('descripcion_solucion') }}" rows="5"> </textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="observaciones" class="col-md-4 col-form-label text-md-end">Observaciones:</label>
                                <div class="col-md-6">
                                    <textarea type="text" class="form-control" name="observaciones" value="{{ old('observaciones') }}" rows="5"> </textarea>
                                </div>
                            </div>
                            <!-- Contenedor y Elemento Canvas -->
                            <div class="row mb-3">
                                <label for="firma" class="col-md-4 col-form-label text-md-end">Firma colaborador:</label>
                                <div id="signature-pad" class="signature-pad" >
                                    <div class="col-md-6">
                                        <div class=" col-md-6 signature-pad--body">
                                            <canvas style="width: 320px; height: 210px; border: 1px black solid; display:flex; justify-content: center;" id="canvas"></canvas>
                                        </div>
                                </div>
                            </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <input type="hidden" name="firma"  value="{{
                                        \Carbon\Carbon::parse(\Carbon\Carbon::now())->format('dmYHis');

                                    }}">
                                    <input type="hidden" name="base64" value="" id="base64">
                                    <input type="hidden" name="estado" value="finalizado" >
                                </div>
                            </div>





                            <div class=" col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Crear orden de trabajo</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

        var wrapper = document.getElementById("signature-pad");

        var canvas = wrapper.querySelector("canvas");
        var signaturePad = new SignaturePad(canvas, {
          backgroundColor: 'rgb(255, 255, 255)'
        });

        function resizeCanvas() {

          var ratio =  Math.max(window.devicePixelRatio || 1, 1);

          canvas.width = canvas.offsetWidth * ratio;
          canvas.height = canvas.offsetHeight * ratio;
          canvas.getContext("2d").scale(ratio, ratio);

          signaturePad.clear();
        }

        window.onresize = resizeCanvas;
        resizeCanvas();

        </script>
        <script>

           document.getElementById('form').addEventListener("submit",function(e){

            var ctx = document.getElementById("canvas");
              var image = ctx.toDataURL(); // data:image/png....
              document.getElementById('base64').value = image;
           },false);

        </script>
        <script>
            $('#ciudad').select2();
        </script>


@endsection
