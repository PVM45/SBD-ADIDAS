<div class="card">
    <div class="card-header">{{ __('Daftar Sub Kategori') }}</div>

    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Sub Kategori</th>
                    <th>ID Kategori</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subcategories as $subcategory)
                    <tr>
                        <td>{{ $subcategory->id }}</td>
                        <td>{{ $subcategory->name }}</td>
                        <td>{{ $subcategory->category_id }}</td>
                        <td>
                            <a href="{{ route('subcategories.edit', $subcategory->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('subcategories.destroy', $subcategory->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
