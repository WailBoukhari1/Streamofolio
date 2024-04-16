<x-main>
 <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Blog: {{ $blog->title }}</div>

                    <div class="card-body">
                        <form action="{{ route('blogs.update', $blog->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ $blog->title }}" required>
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content" id="content" rows="5" class="form-control" required>{{ $blog->content }}</textarea>
                            </div>
                            <!-- Add other fields here if needed -->
                            <button type="submit" class="btn btn-primary">Update Blog</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>
