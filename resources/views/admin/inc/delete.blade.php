    <!-- Delete modal -->
    <div class="modal fade" id="deleteModal-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          
          @can('isAdmin')
          <form action="{{ URL::route($url.'.destroy', [$row->id]) }}" method="post" class="delete-form">
          @endcan
          @can('isReviewer')
          <form action="{{ URL::route('reviewer.'.$url.'.destroy', [$row->id]) }}" method="post" class="delete-form">
          @endcan
          @can('isAuthor')
          <form action="{{ URL::route('author.'.$url.'.destroy', [$row->id]) }}" method="post" class="delete-form">
          @endcan

          @csrf
          @method('DELETE')
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h3>Are You Sure?</h3>
                    <p>You will not be able to recover this!</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Confirm</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
          </form>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->