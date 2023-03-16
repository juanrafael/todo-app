<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div style="width: 40rem;" class="m-auto">
            <h1 class="text-center">Tareas</h1>
            <hr class="hr">
            @if(session('tarea_creada'))
            <div class="alert alert-success" role="alert">
                {{ session('tarea_creada') }}
            </div>
            @elseif(session('tarea_completada'))
            <div class="alert alert-info" role="alert">
                {{ session('tarea_completada') }}
            </div>
            @elseif(session('tarea_eliminada'))
            <div class="alert alert-danger" role="alert">
                {{ session('tarea_eliminada') }}
            </div>
            @endif
            <div class="mb-3">
                <form class="input-group" action="{{ route('tareas.store') }}" method="POST">
                     @csrf
                    <input type="text" class="form-control @error('tarea') is-invalid @enderror" placeholder="Nueva tarea" name="tarea">
                    <button class="btn btn-success" type="submit" id="button-addon2">Agregar</button>
                </form>
                @error('tarea')
                <div class="form-text text-danger">
                    {{ $errors->first('tarea') }}
                </div>
                @enderror
            </div>
            <div class="card" >
                <ul class="list-group list-group-flush">
                    @foreach($tareas as $tarea)
                    <li class="list-group-item">
                        <div class="form-check d-flex justify-content-between align-items-center">
                            <label class="form-check-label text-muted">
                                <form action="{{ route('tareas.update', ['tarea' => $tarea->id]) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input class="form-check-input" type="checkbox" name="completed"  @if($tarea->status) checked @endif onchange="this.form.submit()">
                                    {{ $tarea->task }}
                                </form>
                            </label>
                            <form name="form_delete_task_{{ $tarea->id }}" action="{{ route('tareas.delete', ['tarea' => $tarea->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-link" onclick="document.form_delete_task_{{ $tarea->id }}.submit()">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 7l16 0"></path>
                                        <path d="M10 11l0 6"></path>
                                        <path d="M14 11l0 6"></path>
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                    </svg>
                                </a>
                            </form>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</body>
</html>