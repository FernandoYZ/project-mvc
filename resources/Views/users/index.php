@section('content')
    <h1>{{ $tag }}</h1>
    <p>{{ $description }}</p>
    <a href="/users/create" class="btn btn-primary mb-3">Agregar Usuario</a>
    <div id="app">
        <table id="tableUsuarios" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Identificación</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection
