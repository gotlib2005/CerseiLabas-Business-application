@extends('layout')
@section('content')
    <div class="modal-body">
        <h1>Edit : {{$client->name}}</h1>
        <form class="form-new-server" method="post" id="form-new-server">
            {{ csrf_field() }}
            <fieldset>
                <div class="control-group">
                    <div class="controls">
                        <label for="name">Client Name</label>
                        <input id="name" name="name" type="text" value="{{$client->name}}">
                        <div class="error-response">
                            {{printErrorText('name', $errors, 'Client name is required!')}}
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label for="server_id">Server</label>
                        <select name="server_id" id="server">
                            @if($client->server)
                                <option value="{{$client->server->id}}">{{$client->server->name}}</option>
                                <option value="">No server</option>
                            @else
                                <option value="">No server</option>
                            @endif
                            @foreach($servers as $server)
                                <option value="{{$server->id}}">{{$server->name}}</option>
                            @endforeach
                        </select>
                        <div class="error-response">
                            {{printErrorText('server_id', $errors, 'Select server!')}}
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label for="email">E mail</label>
                        <input id="email" name="email" type="email" value="{{$client->email}}">
                        <div class="error-response">
                            {{printErrorText('email', $errors, 'Client email is required!')}}
                        </div>
                    </div>
                </div>
                <input type="submit" id="add-new-server-button" value="SAVE"
                       class="btn btn-outline-success w-50 submit-button">
            </fieldset>
        </form>
    </div>
@endsection