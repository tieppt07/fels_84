<!-- Modal -->
<div class="modal fade" id="followeesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Followers</h4>
            </div>
            @if ($currentUser->followees->count() > 0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($currentUser->followees as $followee)
                            <tr>
                                <td><img src="{{ $followee->avatar }}" alt="{{ $followee->name }}" width="50px" height="50px"></td>
                                <td>{{ $followee->name }}</td>
                                <td>{{ $followee->email }}</td>
                                <td><a href="{{ url('users/' . $followee->id) }}" class="btn btn-success">Profile</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else 
                No results!
            @endif
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
