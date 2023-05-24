<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Sub Category</h2>
        </div>
        <div class="pull-right">
<<<<<<< Updated upstream
            <a class="btn btn-primary" href="{{ route('subcategories.index') }}"> Back</a>
=======
            <a class="btn btn-primary" href="{{ route('admin.categories') }}"> Back</a>
>>>>>>> Stashed changes
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('subcategories.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Sub Category Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category:</strong>
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <label for="category_id">Kategori</label>
    <select name="category_id" id="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
        @endforeach
    </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
