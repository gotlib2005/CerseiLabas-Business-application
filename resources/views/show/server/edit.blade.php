@extends('layout')
@section('content')
    <h1>{{$server->name}}</h1>
    <form action="" method="POST" class="form-new-server" id="static-server-form">
        {{ csrf_field() }}
        <fieldset>

            @include('components.tabsection')

            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <div class="control-group">
                        <div class="controls">
                            <label for="name">Server Name:</label>
                            <input id="name" required name="name" type="text" value="{{$server->name}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <label for="server_ip">Server address</label>
                            <input id="server_ip" required name="server_ip" type="text" value="{{$server->server_ip}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <label for="server_technology">Server Technology</label>
                            <select required name="server_technology" id="server_technology">
                                <option value="{{$server->server_technology}}">{{$server->server_technology}}</option>
                                @if ($server->server_technology == 'Nginx')
                                    <option value="Apache">Apache</option>
                                @else
                                    <option value="Nginx">Nginx</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <label for="address">Parent Server:</label>
                            <select name="parent_id" id="parent_id">
                                @if (isset($server->parent))
                                    <option value="{{$server->parent->id}}">{{$server->parent->name}}</option>
                                    @foreach($allParentServers as $parentserver)
                                        <option value="{{$parentserver->id}}">{{$parentserver->name}}</option>
                                    @endforeach
                                    <option value="">No Parent Server</option>
                                @else
                                    <option value="">No Parent Server</option>
                                    @foreach($allParentServers as $parentserver)
                                        <option value="{{$parentserver->id}}">{{$parentserver->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <div class="control-group">
                        <div class="controls">
                            <label for="ssh_user">SSH Username</label>
                            <input id="ssh_user" required name="ssh_user" type="text" value="{{$server->ssh_user}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <label for="ssh_pass">SSH Password</label>
                            <input id="ssh_pass" required name="ssh_pass" type="text" value="{{$server->ssh_pass}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <label for="ssh_port">SSH port</label>
                            <input id="ssh_port" required name="ssh_port" type="text" value="{{$server->ssh_port}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <label for="ssh_key">SSH key</label>
                            <textarea id="ssh_key" required name="ssh_key" type="text">{{$server->ssh_key}}</textarea>
                        </div>
                    </div>

                </div>
                <div id="menu2" class="tab-pane fade">
                    <div class="control-group">
                        <div class="controls">
                            <label for="ftp_user">FTP user</label>
                            <input id="ftp_user" required name="ftp_user" type="text" value="{{$server->ftp_user}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <label for="ftp_pass">FTP pass</label>
                            <input id="ftp_pass" required name="ftp_pass" type="text" value="{{$server->ftp_pass}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <label for="ftp_dir">FTP directory</label>
                            <input id="ftp_dir" required name="ftp_dir" type="text" value="{{$server->ftp_dir}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <label for="ftp_port">FTP port</label>
                            <input id="ftp_port" required name="ftp_port" type="text" value="{{$server->ftp_port}}">
                        </div>
                    </div>
                </div>
                <div id="menu3" class="tab-pane fade">

                    <div class="control-group">
                        <div class="controls">
                            <label for="mysql_user">MySQL username</label>
                            <input id="mysql_user" required name="mysql_user" type="text"
                                   value="{{$server->mysql_user}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <label for="mysql_pass">MySQL password</label>
                            <input id="mysql_pass" required name="mysql_pass" type="text"
                                   value="{{$server->mysql_pass}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <label for="mysql_db">MySQL database</label>
                            <input id="mysql_db" required name="mysql_db" type="text" value="{{$server->mysql_db}}">
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <label for="mysql_host">MySQL host </label>
                            <span style="font-size: 13px">(localhost is by default)</span>

                            <input id="mysql_host" name="mysql_host" type="text" value="{{$server->mysql_host}}">
                        </div>
                    </div>

                </div>
                <div id="menu4" class="tab-pane fade">
                    <div class="control-group">
                        <div class="controls">
                            <label for="wp_admin_url">WP admin url</label>
                            <input id="wp_admin_url" required name="wp_admin_url" type="text"
                                   value="{{$server->wp_admin_url}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <label for="wp_admin_user">WP username</label>
                            <input id="wp_admin_user" required name="wp_admin_user" type="text"
                                   value="{{$server->wp_admin_user}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <label for="wp_admin_pass">WP password</label>
                            <input id="wp_admin_pass" required name="wp_admin_pass" type="text"
                                   value="{{$server->wp_admin_pass}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <label for="wp_website_address">WP Website Address</label>
                            <input id="wp_website_address" required name="wp_website_address" type="text"
                                   value="{{$server->wp_website_address}}">
                        </div>
                    </div>
                </div>
            </div>
            <input style="max-width: 200px;margin-top: 20px" type="submit" value="Update"
                   class="btn btn-primary">
        </fieldset>
    </form>
@endsection
