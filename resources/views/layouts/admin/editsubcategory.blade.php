<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Sub Kategori</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('subcategories.update', $subCategory) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Nama Sub Kategori</label>
                        <input type="text" name="name" class="form-control" value="{{ $subCategory->name }}">
                    </div>

                    <div class="form-group">
                        <label for="category_id">Kategori</label>
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $subCategory->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>