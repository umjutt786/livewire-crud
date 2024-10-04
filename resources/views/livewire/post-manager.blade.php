<div class="container mt-4">
    <h1>Post Manager</h1>
    <button class="btn btn-primary mb-3" wire:click="$set('isOpen', true)">Add Post</button>

    @if($isOpen)
        <div class="modal fade show" style="display: block;" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">{{ $postId ? 'Edit Post' : 'New Post' }}</h5>
                        <button type="button" class="close" wire:click="closeModal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" wire:model="title" placeholder="Enter title">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" wire:model="content" placeholder="Enter content"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal">Close</button>
                        <button type="button" class="btn btn-primary" wire:click="store">Save Post</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" wire:click="edit({{ $post->id }})">Edit</button>
                        <button class="btn btn-danger btn-sm" wire:click="delete({{ $post->id }})">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
