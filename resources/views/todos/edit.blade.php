@extends('layouts.app')

@section('title')
 Edit Todo
@endsection

@section('content')


        <h1 class="text-center my-5">Edit Todo</h1>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">

                    <div class="card-header">
                        Edit todo
                    </div>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    <div class="card-body">

                                <form action="/todos/update" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name" name="name" value="{{ $todo->name }}">
                                        <input name="_method" type="hidden" value="PUT">
                                    </div>

                                    <div class="form-group">
                                        <textarea name="description"  cols="5" rows="5" placeholder="Description" class="form-control">{{ $todo->description }}</textarea>
                                    </div>

                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>

                                </form>

                    </div>

            </div>


        </div>
        </div>

        </div>



@endsection
