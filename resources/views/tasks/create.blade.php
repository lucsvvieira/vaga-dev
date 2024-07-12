@extends('layouts.main')

@section('title', 'Criar Tarefa')

@section('content')

    <div id="task-create-container" class="col-md-6 offset-md-3">
        <h1>Crie a sua tarefa</h1>
        <form action="/tasks" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Tarefa:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome da tarefa">
            </div>
            <div class="form-group">
                <label for="date">Data da tarefa:</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>
            <div class="form-group">
                <label for="title">Status da tarefa:</label>
                <select name="status" id="status" class="form-control">
                    <option value="value1">Pendente</option>
                    <option value="value2">Em progresso</option>
                    <option value="value1">Concluída</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Descrição:</label>
                <textarea name="description" id="description" class="form-control mb-3" placeholder="Descreva sua tarefa.."></textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="Criar Tarefa">
        </form>
    </div>

@endsection