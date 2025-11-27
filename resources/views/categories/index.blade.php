<x-layout>
    <h1>Categories List</h1>
    <x-login-status></x-login-status>
    @session('status')
        <div class="alert alert-success">{{ $value }}</div>
    @endsession
    @can('admin-gate')
    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
        data-bs-target="#addCategoryModal">Create</button>
    @endcan
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        @canAny(['librarian-gate','admin-gate'])
                        <button type="button" class="btn btn-link" onclick="handleEdit({{ $category->id }},'{{ $category->name }}')">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        @endcan
                    </td>
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
        <div class="modal fade" id="addCategoryModal">
            <div class="modal-dialog">
                <div class="modal-content">
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
            </div>
        </div>
    </form>
    <form action="{{ route('categories.update',1) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="put">
        <div class="modal fade" id="editCategoryModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h1 class="modal-title">Update category</h1>
                        <div class="mb-3">
                            <label for="id" class="form-label">ID</label>
                            <span class="form-control" id="categoryId"></span>
                            <label for="categoryName" class="form-label">Name</label>
                            <input type="text" name="name" id="categoryName" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Save</button>
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" data-bs-target="#editCategoryModal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        let updateUrl='{{ route('categories.update',1) }}'
        updateUrl = updateUrl.substring(0,updateUrl.length-1)
        window.onload=function(){
            let modal = document.querySelector('#editCategoryModal')
            modal.addEventListener('show.bs.modal', event => {
                console.log('modal is showing')
                document.querySelector('#categoryId').textContent= modal.getAttribute('data-cate-id')
                document.querySelector('#categoryName').value= modal.getAttribute('data-cate-name')
                modal.closest('form').setAttribute('action',`${updateUrl}${modal.getAttribute('data-cate-id')}`)
            })
        }
        function handleEdit(id, name){
            let modal = document.querySelector('#editCategoryModal')
            modal.setAttribute('data-cate-id',id)
            modal.setAttribute('data-cate-name',name)
            bootstrap.Modal.getOrCreateInstance(modal).show()
        }
    </script>
</x-layout>