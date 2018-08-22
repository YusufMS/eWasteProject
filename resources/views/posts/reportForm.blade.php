<div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Report this post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('complains.store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="content" class="col-form-label">Complain / Report Content</label>
                        <textarea class="form-control" id="content" name="content"></textarea>
                        <small class="text-muted">Include the details of your complains here. Please make it specific and concise.</small>
                    </div>
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Report</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>