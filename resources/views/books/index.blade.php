<x-layout>
    <h1>Books List</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Pages</th>
                <th>Year</th>
                <th>Category {{count($books)}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->pages }}</td>
                <td>{{ $book->year }}</td>
                <td>{{ $book->category_id }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>