@extends('layout')

@section('content')
    <div class="modal-body">
        <h1>Add New Server</h1>
        <form class="form-new-server" method="post" id="form-new-server">
            {{ csrf_field() }}
            <fieldset>
                @include('components.tabsection')
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <div class="control-group">
                            <div class="controls">
                                <label for="name">Server Name:</label>
                                <input id="name" required name="name" type="text">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <label for="server_ip">Server address</label>
                                <input id="server_ip" required name="server_ip" type="text">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <label for="server_technology">Server Technology</label>
                                <select required name="server_technology" id="server_technology">
                                    <option value=""></option>
                                    <option value="Nginx">Nginx</option>
                                    <option value="Apache">Apache</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <label for="parent_id">Choose parent Server</label>
                                <select name="parent_id" id="parent_id">
                                    <option value=""></option>
                                    @foreach($allServers as $server)
                                        <option value="{{$server->id}}">{{$server->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <div class="control-group">
                            <div class="controls">
                                <label for="ssh_user">SSH Username</label>
                                <input id="ssh_user" required name="ssh_user" type="text">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <label for="ssh_pass">SSH Password</label>
                                <input id="ssh_pass" required name="ssh_pass" type="text">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <label for="ssh_port">SSH port</label>
                                <input id="ssh_port" required name="ssh_port" type="number">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <label for="ssh_key">SSH key</label>
                                <textarea id="ssh_key" required name="ssh_key" type="text"></textarea>
                            </div>
                        </div>

                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <div class="control-group">
                            <div class="controls">
                                <label for="ftp_user">FTP user</label>
                                <input id="ftp_user" required name="ftp_user" type="text">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <label for="ftp_pass">FTP pass</label>
                                <input id="ftp_pass" required name="ftp_pass" type="text">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <label for="ftp_dir">FTP directory</label>
                                <input id="ftp_dir" required name="ftp_dir" type="text">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <label for="ftp_port">FTP port</label>
                                <input id="ftp_port" required name="ftp_port" type="number">
                            </div>
                        </div>
                    </div>
                    <div id="menu3" class="tab-pane fade">

                        <div class="control-group">
                            <div class="controls">
                                <label for="mysql_user">MySQL username</label>
                                <input id="mysql_user" required name="mysql_user" type="text">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <label for="mysql_pass">MySQL password</label>
                                <input id="mysql_pass" required name="mysql_pass" type="text">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <label for="mysql_db">MySQL database</label>
                                <input id="mysql_db" required name="mysql_db" type="text">
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <label for="mysql_host">MySQL host</label>
                                <input id="mysql_host" name="mysql_host" type="text">
                            </div>
                        </div>

                    </div>
                    <div id="menu4" class="tab-pane fade">
                        <div class="control-group">
                            <div class="controls">
                                <label for="wp_admin_url">WP admin url</label>
                                <input id="wp_admin_url" required name="wp_admin_url" type="text">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <label for="wp_admin_user">WP username</label>
                                <input id="wp_admin_user" required name="wp_admin_user" type="text">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <label for="wp_admin_pass">WP password</label>
                                <input id="wp_admin_pass" required name="wp_admin_pass" type="text">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <label for="wp_website_address">WP Website Address</label>
                                <input id="wp_website_address" required name="wp_website_address" type="text">
                            </div>
                        </div>
                    </div>
                </div>
                <input style="cursor:pointer;max-width: 400px;margin: 0 auto;" type="submit" value="SAVE"
                       id="add-new-server-button"
                       class="btn btn-outline-success w-50 submit-button">
            </fieldset>
        </form>
    </div>
@endsection