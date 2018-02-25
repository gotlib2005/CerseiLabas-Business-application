@extends('layout')
@section('content')

    <div class="modal-body">
        <h1>Edit : {{$user->name}}</h1>
        <form class="form-new-server" method="post" id="form-new-server">
            {{ csrf_field() }}
            <fieldset>
                <div class="control-group">
                    <div class="controls">
                        <label for="name">User Name</label>
                        <input id="name" name="name" type="text" value="{{$user->name}}">
                        <div class="error-response">
                            {{printErrorText('name', $errors, 'User name is required!')}}
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label for="email">E mail</label>
                        <input id="email" name="email" type="email" value="{{$user->email}}">
                        <div class="error-response">
                            {{printErrorText('email', $errors, 'Client email is required!')}}
                        </div>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label for="upload">Image Upload</label>
                        <input type="file" name="image_file">
                        <div class="error-response">
                            {{printErrorText('email', $errors, 'Client email is required!')}}
                        </div>
                    </div>
                </div>
                <input type="submit" id="add-new-server-button" value="Update"
                       class="btn btn-outline-success w-50 submit-button">
            </fieldset>
        </form>
    </div>
@endsection