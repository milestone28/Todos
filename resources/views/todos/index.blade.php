@extends('layouts.app')

@section('title')
    Todo List
@endsection

@section('content')



                <h1 class="text-center my-5">TODOS PAGE</h1>

                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card card-default">

                                <div class="card-header">
                                    Todos
                                </div>

                                <div class="card-body">
                                    <ul class="list-group">

                                        @foreach ($todos as $todo)

                                            <li class="list-group-item">
                                                {{ $todo->name }}

                                                {{-- <a href="" class="btn btn-primary float-right mx-2">View</a>
                                                <a href="" class="btn btn-warning float-right" style="color: white;">Completed</a> --}}

                                                <div class="d-flex flex-row bd-highlight float-right">

                                                    <form action="/todos/{{ $todo->id }}" method="GET">
                                                        @csrf

                                                        <button type="submit" class="btn btn-primary mx-2">View</button>

                                                    </form>

                                                    @if (!$todo->completed)

                                                    <form action="/todos/{{ $todo->id }}/completed" method="GET">
                                                        @csrf
                                                        <button type="submit" class="btn btn-warning" style="color: white;">Completed</button>
                                                    </form>

                                                    @endif

                                                </div>

                                            </li>

                                        @endforeach
                                    </ul>
                                </div>

                        </div>
                    </div>
                </div>

            </div>





            @endsection
