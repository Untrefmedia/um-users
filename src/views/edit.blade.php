@extends('admin.layouts.app')

@section('title', 'Edit User')


@section('content')

    <div class="crud-container">
        <form action="">
            <label for="name">Name</label> <br>
            <input type="text" name="name" value="{{ $user->name }}">
        </form>
    </div>
@stop
