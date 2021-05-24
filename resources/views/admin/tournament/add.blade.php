@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
    <form action="{{route('admin.tournament.add')}}" method="post">
        @csrf
        <div class="card">

            <div class="card-body">
                @include('errorBars.errorsArray',['title' => 'Error','errors'=>$errors])
                <div class="row">
                    <div class="col-md-6">
                        <label >
                           Name
                        </label>
                        <br>
                    </div>
                    <div class="col-md-6">
                        <label >
                            Game
                        </label>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input  required class="form-control" name="name">
                    </div>
                    <div class="col-md-6">
                        <select name="game_id" class="form-control">
                            @foreach($games as $game)
                                <option value="{{$game->id}}">{{$game->name}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <label >
                           Start Date
                        </label>
                        <br>
                    </div>
                    <div class="col-md-6">
                        <label >
                            Status
                        </label>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input  required class="form-control" name="start_date" type="date">
                    </div>
                    <div class="col-md-6">
                        <select name="status" class="form-control">
                            <option value="Active">Active</option>
                            <option value="Unactive">Unactive</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12 ">
                        <button class="btn btn-primary float-right" type="submit">Add Game</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection