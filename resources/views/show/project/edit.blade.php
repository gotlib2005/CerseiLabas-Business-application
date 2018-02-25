@extends('layout')
@section('content')
    <div class="model-body">
        <h1>Project : {{$project->name}}</h1>
        <form class="form-new-server" method="post" id="form-new-server">
            {{ csrf_field() }}
            <fieldset>
                <div class="control-group">
                    <div class="controls">
                        <label for="name">Project name</label>
                        <input id="name" name="name" value="{{$project->name}}" type="text">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label for="client_id">Client for project</label>
                        <select name="client_id" id="client_id">
                            @if ($project->client_id)
                                <option value="{{$project->client_id}}">{{$client->name}}</option>
                                @if ($clients)
                                    @foreach($clients as $client)
                                        <option value="{{$client->id}}">{{$client->name}}</option>
                                    @endforeach
                                        <option value="">No clients</option>
                                @else
                                    <option value="">No clients</option>
                                @endif
                            @else
                                <option value="">No clients</option>
                                @if ($clients)
                                    @foreach($clients as $client)
                                        <option value="{{$client->id}}">{{$client->name}}</option>
                                    @endforeach
                                @else
                                    <option value="">No clients</option>
                                @endif
                            @endif
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label for="description">Project description</label>
                        <textarea id="description" name="description" type="text">{{$project->description}}</textarea>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label for="type">Project type</label>
                        <select id="type" name="type" type="text">
                            <option value="{{$project->type}}">{{$project->type}}</option>
                            <option value="Wordpress">Wordpress</option>
                            <option value="Magento">Magento</option>
                            <option value="Laravel">Laravel</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label for="status">Status</label>
                        <select id="status" name="status" type="text">
                            <option value="{{$project->status}}">{{$project->status}}</option>
                            <option value="Completed">Completed</option>
                            <option value="Active">Active</option>
                            <option value="Pending">Pending</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label for="start_date">Start date</label>
                        <input id="start_date" value="{{$project->start_date}}" name="start_date" type="date">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label for="end_date">End date</label>
                        <input id="end_date" name="end_date" value="{{$project->end_date}}" type="date">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label for="price">Price</label><span style="font-size: 12px"> ( in euro )</span>
                        <input id="price" name="price" value="{{$project->price}}" type="number">
                    </div>
                </div>
                <input type="submit" id="add-new-server-button" value="Update"
                       class="btn btn-primary submit-button float-left">
            </fieldset>
        </form>
    </div>
@endsection