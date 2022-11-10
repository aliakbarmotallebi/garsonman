@extends('dashboard.layouts.base')

@section('title')
    ویرایش شماره میز
    ({{ $table->number }})
@endsection

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">مدیریت میزها</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('dashboard.tables.index') }}" class="btn btn-sm btn-outline-secondary">
                    همه میزها
                </a>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">ویرایش میز</div>
            <div class="card-body row">
                <form action="{{ route('dashboard.tables.update', $table) }}" enctype="multipart/form-data"
                      class="col-md-6" method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label for="number">
                                    شماره میز
                                </label>
                                <input type="text" class="form-control" id="number" name="number" value="{{ $table->number }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label for="token" class="form-label">
                                   ادرس و توکن میز
                                </label>
                                <input class="form-control" type="text" name="token" id="token" value="{{ $table->token }}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-block text-end mt-3">
                        <button type="submit" class="btn btn-primary btn-sm px-5">ویرایش</button>
                        <a href="{{ route('dashboard.tables.index') }}" class="btn btn-secondary btn-sm px-5">انصراف</a>
                    </div>
                </form>
                <div class="col-md-6 text-center">
                    <img
                            class="text-center d-block bd-placeholder-img me-2 rounded"
                            src="{{ asset($table->qrcode) }}">
                    <a href="" class="w-50 mt-2 d-block btn btn-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-cloud-download" viewBox="0 0 16 16">
                            <path d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z"/>
                            <path d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"/>
                        </svg>
                        دانلود
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection



