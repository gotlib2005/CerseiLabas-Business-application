<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete server</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure?
            </div>
            <div class="modal-footer">
                <a class="btn btn-secondary float-left" data-dismiss="modal">Close</a>
                <a href="{{URL::to('projects/' . $project->id) . '/delete'}}"
                   style="margin-left: 10px"
                   data-target=".bd-example-modal-sm"
                   class="btn btn-primary confirm float-left">Confirm
                </a>
            </div>
        </div>
    </div>
</div>