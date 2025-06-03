<!DOCTYPE html>
<html>
<head>
    <title>Bienvenido</title>
</head>
<body>
    <h1>¡Hola {{$alumno->nombre}}, bienvenido!</h1>

    <p>Sede: {{$alumno->sede->name}}</p>
    <p>Matricula: {{$alumno->matricula}}</p>
    <p>Nombre: {{$alumno->nombre}}</p>
    <p>Apellido: {{$alumno->apellido}}</p>
    @if($alumno->apellido_materno)
    <p>Apellido Materno{{$alumno->apellido_materno}}</p>
    @endif
    <p>Correo electrónico: {{$alumno->correo_electronico}}</p>

</body>
</html>