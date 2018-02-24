@extends ('layout')
@section('content')
    <div class="modal-body">
        <h1>Add New Project</h1>
        <form class="form-new-server" method="post" id="form-new-server">
            {{ csrf_field() }}
            <fieldset>
                <div class="control-group">
                    <div class="controls">
                        <label for="name">Project name</label>
                        <input id="name" name="name" type="text">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label for="">Client for project</label>
                        <select required name="client_id" id="client_id">
                            @foreach($clients as $client)
                                <option value="{{$client->id}}">{{$client->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label for="description">Project description</label>
                        <input required id="description" name="description" type="text">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label for="type">Project type</label>
                        <select required id="type" name="type" type="text">
                            <option value="Other">Choose</option>
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
                        <select required id="status" name="status" type="text">
                            <option value="Other">Status</option>
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
                        <input id="start_date" value="{{$nowDate}}" name="start_date" type="date">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label for="end_date">End date</label>
                        <input id="end_date" name="end_date" value="{{$nowDate}}" type="date">
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label for="price">Price</label><span style="font-size: 12px"> ( in euro )</span>
                        <input id="price" name="price" type="number">
                    </div>
                </div>
                <input type="submit" id="add-new-server-button" value="SAVE"
                       class="btn btn-outline-success w-50 submit-button">
            </fieldset>
        </form>
    </div>
@endsection