@extends('layouts.main')

@section('title', 'Task Manager')

@section('content')
        <h1 class="text-center">Projeto Laravel</h1>

        <div id="search-container" class="col-md-12">
                <h1>Busque uma tarefa</h1>
                <form action="/" method="GET">
                        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
                </form>
        </div>
        <div id="tasks-container" class="col-md-12">
                @if($search)
                <h2>Buscando por: {{ $search }}</h2>
                @else
                <h2>Próximas Tarefas</h2>
                <p class="subtitle">Veja as tarefas dos próximos dias</p>
                @endif
                <div id="cards-container" class="row">
                        @foreach($tasks as $task)
                        <div class="card col-md-3">
                                <img src="/img/todo-list.png" alt="{{ $task->title }}">
                                <div class="card-body">
                                        <p class="card-date">{{ date('d/m/Y', strtotime($task->date)) }}</p>
                                        <h5 class="card-title">{{ $task->title }}</h5>
                                        <a href="/tasks/{{ $task->id }}" class="btn btn-primary">Saber mais</a>
                                </div>
                        </div>
                        @endforeach
                        @if(count($tasks) == 0 && $search)
                                <p>Não foi possível encontrar nenhuma tarefa com {{ $search }}! <a href="/">Ver todos</a></p>
                        @elseif(count($tasks) == 0)
                                <p>Não há tarefas disponíveis.</p>
                        @endif
                </div>
        </div>
@endsection