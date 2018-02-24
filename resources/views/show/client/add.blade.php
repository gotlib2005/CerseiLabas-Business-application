@extends('layout')
@section('content')
    <div class="modal-body">
        <h1>Add New Client</h1>
        <form class="form-new-server" method="post" id="form-new-server">
            {{ csrf_field() }}
            <fieldset>
                <div class="control-group">
                    <div class="controls">
                        <input id="name" name="name" type="text" placeholder="Client Name">
                        <div class="error-response">
                            {{printErrorText('name', $errors, 'Client name is required!')}}
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <select name="server_id" id="server">
                            <option value="">Choose server</option>
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
                        <input id="email" name="email" type="email" placeholder="E-mail">
                        <div class="error-response">
                            {{printErrorText('email', $errors, 'Client email is required!')}}
                        </div>
                    </div>
                </div>
                <input type="submit" id="add-new-server-button" value="SAVE" class="btn btn-outline-success w-50 submit-button">
            </fieldset>
        </form>
    </div>
@endsection