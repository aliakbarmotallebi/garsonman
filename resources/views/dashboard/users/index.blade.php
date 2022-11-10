@extends('dashboard.layouts.base')


@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">مدیریت کاربران</h1>

        <div class="card mt-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                لیست کاربران
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام و نام خانوادگی</th>
                            <th scope="col">شماره موبایل</th>
                            <th>نقش</th>
                            <th scope="col">تاریخ عضویت</th>
                            <th scope="col">عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->full_name }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td>
                                @if($user->isAdmin())
                                    <span class="badge bg-success">ادمین</span>
                                @else
                                    <span class="badge bg-danger">کاربر عادی</span>
                                @endif
                            </td>
                            <td>{{ verta($user->created_at)->format('Y-m-d h:i:s') }}</td>
                            <td>
                                <form action="" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <div class="btn-group" dir="ltr">
                                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection