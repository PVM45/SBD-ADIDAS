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
<<<<<<< Updated upstream
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
=======
                        <th>ID</th>
                        <th>Nama Sub Kategori</th>
                        <th>Nama Kategori</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subcategories as $subcategory)
                        <tr>
                            <td>{{ $subcategory->id }}</td>
                            <td>{{ $subcategory->nama_subkategori }}</td>
                            <td>{{ $subcategory->nama_kategori }}</td>
                            <td>
                                <form action="{{ route('admin.subcategories.update', $subcategory->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="name" value="{{ $subcategory->nama_subkategori }}">
                                    <select name="kategori_id">
                                        @foreach ($kategori as $category)
                                            <option value="{{ $category->id }}" @if($subcategory->id_kategori == $category->id) selected @endif>
                                                {{ $category->nama_kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form></td><td>
                                <form action="{{ route('admin.subcategories.destroy', $subcategory->id) }}" method="POST" style="display: inline-block;" >
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
>>>>>>> Stashed changes
    </div>
</div>
