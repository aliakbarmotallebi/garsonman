@extends('dashboard.layouts.base') @section('title') ویرایش - {{ $product->title }} @endsection @section('content')

<div class="container-fluid">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">ویرایش</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('dashboard.products.index') }}" class="btn mr-2 btn-sm btn-secondary">همه محصولات</a>
        </div>
    </div>

    <div class="px-5 py-5">
        <form class="needs-validation" action="{{ route('dashboard.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row">
                <div class="col-md-6  mb-3">
                    <label for="title">عنوان<span class="text-muted">(الزامی)</span></label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $product->title }}">
                </div>
                <div class="col-md-6  mb-3">
                    <label for="price">قیمت تومان<span class="text-muted">(الزامی)</span></label>
                    <input type="text" class="form-control" id="price" name="price" value="{{  $product->getRawOriginal('price') }}">
                </div>
            </div>
            <div class="mb-3">
                <label for="description">توضیحات <span class="text-muted">(الزامی)</span></label>
                <textarea name="description" id="description" class="form-control" rows="7">{{  $product->description }}</textarea>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="category_id">دسته بندی <span class="text-muted">(الزامی)</span></label>
                    <select class="form-control" name="category_id">
                        @foreach($categories  as $category)
                            <option value="{{ $category->id }}" {{ ( $category->id ==  $product->category->id ) ? "selected" : "" }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="img">عکس محصول <span class="text-muted">(الزامی)</span></label>
                    <input type="file" class="form-control" id="img" name="img" value="img">
                </div>

                <div class="col-md-6 mb-3">
                    @if($product->hasImage())
                    <div class="text-right">
                        <img src="{{ asset($product->getImageTumblr()) }}" style="object-fit: cover" width="200px" class="rounded" alt="...">
                    </div>
                    @else
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                            <div>
                                عکسی بارگذاری نشده است
                            </div>
                        </div>
                    @endif
                </div>

            </div>

            <hr class="mb-4">
            <button class="btn btn-primary btn-sm btn-block" type="submit">ثبت تغییرات محصول</button>

        </form>
    </div>
</div>
@endsection @section('scripts')
<script>

    ClassicEditor
        .create(document.querySelector('#description'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection