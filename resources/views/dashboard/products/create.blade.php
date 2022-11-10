@extends('dashboard.layouts.base') @section('title') ایجاد محصول جدید @endsection @section('content')

<div class="container-fluid">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">ایجاد محصول جدید</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('dashboard.products.index') }}" class="btn mr-2 btn-sm btn-secondary">همه محصولات</a>
        </div>
    </div>

    <div class="px-5 py-5">
        <form class="needs-validation" action="{{ route('dashboard.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6  mb-3">
                    <label for="title">عنوان<span class="text-muted">(الزامی)</span></label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                </div>
                <div class="col-md-6  mb-3">
                    <label for="price">قیمت تومان<span class="text-muted">(الزامی)</span></label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
                </div>
            </div>
            <div class="mb-3">
                <label for="description">توضیحات <span class="text-muted">(الزامی)</span></label>
                <textarea name="description" id="description" class="form-control" rows="7">{{ old('description') }}</textarea>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="category">دسته بندی <span class="text-muted">(الزامی)</span></label>
                    <select class="form-control" name="category_id">
                        @foreach($categories  as $category)
                            <option value="{{ $category->id }}" {{ ( $category->id == old('category') ) ? "selected" : "" }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="img">عکس محصول <span class="text-muted">(الزامی)</span></label>
                    <input type="file" multiple class="form-control" id="img" name="img" value="img">
                </div>
            </div>

            <hr class="mb-4">
            <button class="btn btn-primary btn-sm btn-block" type="submit">ثبت محصول جدید</button>

        </form>
    </div>
</div>
@endsection @section('scripts')
<script>
    $(document).ready(function() {
        $('.js-select2').select2({
            tags: true
        });
    });

    ClassicEditor
        .create(document.querySelector('#description'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection