@extends('layout')
@section('content')
    <div class="modal-body all-servers">
        <h1>Projects <span style="float: right"><a class="btn btn-success" href="{{URL::to('/projects/create')}}"><i
                            style="font-size: 15px;margin-right: 5px" class="fa fa-plus" aria-hidden="true"></i> Add New Project</a></span>
        </h1>
        @if ($projects->isEmpty())
            There are no projects!
        @else
            <table class="single-server">
                <thead>
                <tr>
                    <th style="text-align: center !important;">R.N.</th>
                    <th data-name="name">Name <i class="fa fa-sort-desc" aria-hidden="true"></i></th>
                    <th data-name="type">Type <i class="fa fa-sort-desc" aria-hidden="true"></i></th>
                    <th data-name="status">Status <i class="fa fa-sort-desc" aria-hidden="true"></i></th>
                    <th data-name="start">Start Date <i class="fa fa-sort-desc" aria-hidden="true"></i></th>
                    <th data-name="end">End Date <i class="fa fa-sort-desc" aria-hidden="true"></i></th>
                    <th data-name="price">Price <i class="fa fa-sort-desc" aria-hidden="true"></i></th>
                    <th style="text-align: center !important;">Actions</th>
                </tr>
                </thead>
                <tbody>
				<?php $i = 1; ?>
                @foreach($projects as $project)
                    <tr>
                        <td data-name="rb">{{$i}} </td>
                        <td data-name="name"><a
                                    href="{{URL::to('projects/' . $project->id . '/edit')}}">{{$project->name}}</a></td>
                        <td data-name="type">{{$project->type}}</td>
                        <td data-name="status" class="{{projectstatus($project->status)}}">{{$project->status}}</td>
                        <td data-name="start">{{$project->start_date}}</td>
                        <td data-name="end">{{$project->end_date}}</td>
                        <td data-name="price">{{$project->price}}</td>
                        <td data-name="actions">
                            <a href="{{URL::to('projects/' . $project->id) . '/edit'}}"
                               class="btn edit-server btn-secondary"><i style="margin-right: 0" class="fa fa-pencil"
                                                                        aria-hidden="true"></i>
                            </a>
                            <a data-toggle="modal" class="btn btn-secondary delete-server"
                               data-target="#myModal"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @include('components.modals.project-delete-modal')
					<?php $i ++;?>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection