@extends('layouts.app')

@section('title')
{{ $todo->name }}
@endsection

@section('content')



                <h1 class="text-center my-5">{{ $todo->name }}</h1>

                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card card-default">

                                <div class="card-header">
                                    Details
                                </div>

                                <div class="card-body">
                                    {{ $todo->description }}
                                </div>

                        </div>

                        {{-- <a href="/todos/{{ $todo->id }}/destroy" class="btn btn-danger my-2">Delete</a> --}}
                        {{-- <a href="/todos/{{ $todo->id }}/edit" class="btn btn-info my-2">Edit</a> --}}
                        <div class="d-flex flex-row bd-highlight mb-3">

                            <form action="/todos/{{ $todo->id }}/edit" method="GET">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <div class="form-group">
                                <button type="submit" class="btn btn-info my-2">Edit</button>
                            </div>
                            </form>

                            <form action="/todos/{{ $todo->id }}" method="POST">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <div class="form-group">
                                <button type="submit" class="btn btn-danger my-2 mx-2">Delete</button>
                            </div>
                            </form>

                        </div>
                </div>

            </div>





            @endsection
