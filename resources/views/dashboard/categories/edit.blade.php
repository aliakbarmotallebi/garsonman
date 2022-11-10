@extends('dashboard.layouts.base') @section('title') ویرایش دسته بندی ({{ $category->name }}) @endsection @section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">مدیریت دسته بندی</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('dashboard.categories.index') }}" class="btn btn-sm btn-outline-secondary">
                    همه دسته بندی
                </a>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">ویرایش دسته بندی</div>
        <div class="card-body">
            <form action="{{ route('dashboard.categories.update', $category) }}" enctype="multipart/form-data" class="col-md-6" method="POST">
                @csrf {{ method_field('PUT') }}
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <div class="form-group">
                            <label for="name">نام دسته بندی</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <div class="form-group">
                            <label for="image" class="form-label">
                                    تصویر دسته بندی
                                </label>
                            <input class="form-control" type="file" name="image" id="image">
                        </div>
                        <img class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="80" height="80" src="{{ asset($category->image) }}">
                    </div>
                    <div class="d-grid gap-2 d-md-block text-end mt-3">
                        <button type="submit" class="btn btn-primary btn-sm px-5">ویرایش</button>
                        <a href="{{ route('dashboard.categories.index') }}" class="btn btn-secondary btn-sm px-5">انصراف</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection