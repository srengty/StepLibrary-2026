<x-layout>
    <h1>Auhtors List</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)
            <tr>
                <td>{{ $author->id }}</td>
                <td>{{ $author->name }}</td>
                <td>
                    @can('update',[$author])
                    <a href="{{ route('authors.edit', $author->id) }}">Edit</a>
                    @else
                    Not allow
                    @endcan
                    
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">
                    {{ $authors->links() }}
                </td>
            </tr>
        </tfoot>
    </table>
</x-layout>