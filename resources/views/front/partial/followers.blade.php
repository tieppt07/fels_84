<!-- Modal -->
<div class="modal fade" id="followersModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Followers</h4>
            </div>
            @if ($currentUser->followers->count() > 0)
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
                        @foreach ($currentUser->followers as $follower)
                            <tr>
                                <td><img src="{{ $follower->avatar }}" alt="{{ $follower->name }}" width="50px" height="50px"></td>
                                <td>{{ $follower->name }}</td>
                                <td>{{ $follower->email }}</td>
                                <td><a href="{{ url('users/' . $follower->id) }}" class="btn btn-success">Profile</a></td>
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
