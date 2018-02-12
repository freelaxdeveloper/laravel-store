
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Новая категория</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('cat.newPost', $category->id) }}">
                        @csrf
                        @if ($category->id)
                            <div class="form-group row">
                                <label for="category_id" class="col-sm-4 col-form-label text-md-right">Родительская категория</label>

                                <div class="col-md-6">
                                    <input id="category_id" type="hidden" name="category_id" value="{{ $category->id }}" required>
                                    <input id="category" type="text" name="category" value="{{ $category->name }}" disabled>
                                </div>
                            </div>
                        @endif
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label text-md-right">Название</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Создать
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>