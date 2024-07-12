@extends('layouts.main')

@section('title', $task->title)

@section('content')

    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="info-container" class="col-md-6">
                <h1 class="mb-2">{{ $task->title }}</h1>
                <p class="tasks-status mb-3"><ion-icon name="stats-chart-outline"></ion-icon> {{ $task->status }} </p>
                <p class="task-owner mb-3"><ion-icon name="star-outline"></ion-icon> {{ $taskOwner['name'] }} </p>
                <form action="/tasks/join/{{ $task->id }}" method="POST">
                    @csrf
                    <a href="/tasks/join/{{ $task->id }}" 
                        class="btn btn-primary" 
                        id="task-submit"
                        onclick="task.preventDefault();
                        this.closest('form').submit();">
                        Confirmar
                    </a>
                </form>
            </div>
            <div class="col-md-12" id="description-container">
                <h3>Sobre a tarefa:</h3>
                <p class="task-description">{{ $task->description }}</p>
            </div>
        </div>
    </div>
@endsection