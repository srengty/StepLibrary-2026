<x-layout title="Create new book">
    <form action="{{ route('books.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control">
        </div>
        <div class="mb-3">
            <label for="pages" class="form-label">Pages</label>
            <input type="number" id="pages" name="pages" class="form-control">
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>

            <select name="category_id" id="category_id">
                @foreach ($categories as $key=>$cat)
                    <option value="{{ $key }}">{{ $cat }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary">Save</button>
        </div>
    </form>
</x-layout>