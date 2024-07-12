@extends('layouts.main')

@section('title', 'Editando: ' . $task->title)

@section('content')

    <div id="task-create-container" class="col-md-6 offset-md-3">
        <h1>Editando: {{ $task->title }}</h1>
        <form action="/tasks/update/{{ $task->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Tarefa:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome da tarefa" value="{{ $task->title }}">
            </div>
            <div class="form-group">
                <label for="date">Data da tarefa:</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $task->date->format('Y-m-d') }}">
            </div>
            <div class="form-group">
                <label for="title">Status da tarefa:</label>
                <select name="status" id="status" class="form-control">
                    <option value="value1">Pendente</option>
                    <option value="value2">Em progresso</option>
                    <option value="value3">Concluída</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Descrição:</label>
                <textarea name="description" id="description" class="form-control" placeholder="Descreva sua tarefa..">{{ $task->description }}</textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="Editar Tarefa">
        </form>
    </div>

@endsection