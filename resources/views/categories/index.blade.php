<x-layout>
    <h1>Categories List</h1>
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
    </table>
</x-layout>