@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="{{route('admin.tournament.update',$tournament->id)}}" method="post">

                    @csrf

                    <div class="card">
                        <div class="card-header">
                            <h3>Update Tournament</h3>
                        </div>
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
                                    <input  required class="form-control" name="name" value="{{$tournament->name}}">
                                </div>
                                <div class="col-md-6">
                                    <select name="game_id" class="form-control">
                                        <option value="{{$tournament->game->id}}">{{$tournament->game->name}}</option>
                                        @foreach($games as $g)
                                            <option value="{{$g->id}}">{{$g->name}}</option>
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
                                    <input  required class="form-control" name="start_date" type="date" value="{{$tournament->start_date}}">
                                </div>
                                <div class="col-md-6">
                                    <select name="status" class="form-control">
                                        <option value="{{$tournament->status}}">{{$tournament->status}}</option>
                                        <option value="Active">Active</option>
                                        <option value="Unactive">Unactive</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label >
                                        Duration (months)
                                    </label>
                                    <br>
                                    <input  required class="form-control" name="duration" type="number" value="{{$tournament->duration}}">
                                </div>
                                <div class="col-md-6">
                                    <label >
                                        Collected Amount
                                    </label>
                                    <br>
                                    <input  required class="form-control" name="collected_amount" value="{{$tournament->collected_amount}}" type="number">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <button class="btn btn-primary float-right" type="submit">Update Tournament</button>
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
