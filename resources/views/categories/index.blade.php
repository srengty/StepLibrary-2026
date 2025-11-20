<x-layout>
    <h1>Categories List</h1>
    @session('status')
        <div class="alert alert-success">{{ $value }}</div>
    @endsession
    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
        data-bs-target="#addCategoryModal">Create</button>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">
                    {{ $categories->links() }}
                </td>
            </tr>
        </tfoot>
    </table>
    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <div class="modal modal-lg" id="addCategoryModal">
            <div class="modal-body">
                <h1 class="modal-title">Add new category</h1>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Save</button>
                <button class="btn btn-secondary">Save</button>
            </div>
        </div>
    </form>
</x-layout>