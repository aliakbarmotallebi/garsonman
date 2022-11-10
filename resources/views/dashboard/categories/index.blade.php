@extends('dashboard.layouts.base') @section('title') مدیریت دسته بندی @endsection @section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">مدیریت دسته بندی</h1>
    </div>
    <div class="card mb-3">
        <div class="card-header">ایجاد دسته بندی</div>
        <div class="card-body">
            <form action="{{ route('dashboard.categories.store') }}" enctype="multipart/form-data" class="col-md-6" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <div class="form-group">
                            <label for="name">نام دسته بندی</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <div class="form-group">
                            <label for="image" class="form-label">
                                تصویر دسته بندی
                            </label>
                            <input class="form-control" type="file" name="image" id="image">
                        </div>
                    </div>
                    <div class="col-md-12 mt-3 d-block text-end">
                        <button type="submit" class="btn btn-primary btn-sm px-5">ذخیره</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">لیست دسته بندی ها</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>تصویر</th>
                            <th>نام دسته بندی</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="48" height="48" src="{{ asset($category->image) }}">
                            </td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <form action="{{ route('dashboard.categories.destroy', $category) }}" method="POST">
                                    @csrf {{ method_field('DELETE') }}
                                    <div class="btn-group btn-group-sm">

                                        <a href="{{ route('dashboard.categories.edit', $category) }}" class="link-primary p-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                        </svg> ویرایش
                                        </a>

                                        <button class="btn btn-link link-danger p-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>

                                        حذف
                                    </button>


                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $categories->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection