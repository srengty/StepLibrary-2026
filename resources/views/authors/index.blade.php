<x-layout>
    <h1>Auhtors List</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)
            <tr>
                <td>{{ $author->id }}</td>
                <td>{{ $author->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>