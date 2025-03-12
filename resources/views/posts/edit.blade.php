<x-base-layout>
    <div class="form-container">
        <h2>{{ isset($post) ? 'Edit Post' : 'Create a New Post' }}</h2>

        <!-- If the post exists, we're editing, otherwise creating -->
        <form action="{{ isset($post) ? route('post.update', $post->id) : route('post.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf

            <!-- Add this to handle the PUT/PATCH method for updating -->
            @if(isset($post))
                @method('PUT')
            @endif

            <div class="input-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $post->title ?? '') }}" required>
                @error('title') <small class="error">{{ $message }}</small> @enderror
            </div>

            <div class="input-group">
                <label for="content">Content</label>
                <textarea id="content" name="content" required>{{ old('content', $post->content ?? '') }}</textarea>
                @error('content') <small class="error">{{ $message }}</small> @enderror
            </div>

            <div class="input-group">
                <label for="image">Image URL</label>
                <input type="text" id="image" name="image" value="{{ old('image', $post->image_path ?? '') }}"
                    accept="image/*">
                @error('image') <small class="error">{{ $message }}</small> @enderror
            </div>

            <input class="submit-btn" type="submit" value="{{ isset($post) ? 'Update Post' : 'Create Post' }}">
        </form>
    </div>
</x-base-layout>