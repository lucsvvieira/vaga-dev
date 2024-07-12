@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Minhas Tarefas</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-tasks-container">
    @if(count($tasks) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Status</th>
                <th scope="col">Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td><a href="/tasks/{{ $task->id }}">{{ $task->title }}</a></td>
                    <td><p>{{ $task->status }}</p></td>
                    <td><p>{{ $task->date }}</p></td>
                    <td>
                        <a href="/tasks/edit/{{ $task->id }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Editar</a> 
                        <form action="/tasks/{{ $task->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Você ainda não tem tarefas, <a href="/tasks/create">Criar Tarefa</a></p>
    @endif
</div>

@endsection