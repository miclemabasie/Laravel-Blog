<x-base-layout>
    <div class="form-container">
        <h2>Create a New Post</h2>

        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="input-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required>
                @error('title') <small class="error">{{ $message }}</small> @enderror
            </div>

            <div class="input-group">
                <label for="content">Content</label>
                <textarea id="content" name="content" required>{{ old('content') }}</textarea>
                @error('content') <small class="error">{{ $message }}</small> @enderror
            </div>

            <div class="input-group">
                <label for="image">Image URL</label>
                <input type="text" id="image" name="image" accept="image/*">
                @error('image') <small class="error">{{ $message }}</small> @enderror
            </div>

            <!-- <div class="input-group">
                <label for="published">Publish?</label>
                <input type="checkbox" id="published" name="published" value="1" {{ old('published') ? 'checked' : '' }}>
            </div> -->

            <input class="submit-btn" type="submit" value="Create Post">

            <!-- <button class="submit-btn" type="submit">Create Post</button> -->
        </form>
    </div>
</x-base-layout>