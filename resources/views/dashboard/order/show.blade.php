@extends('dashboard.layouts.base') @section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        شناسه سفارش #{{ $order->id }}
    </h1>
</div>

<div class="col-md-12 mt-3 d-block text-end">
    @if($order->isCompleted())
    <p class="fs-5 badge bg-success">
        پرداخت شده
    </p>
    @else
    <p class="fs-5 badge bg-danger">
        پرداخت نشده
    </p>
    @endif
</div>

<div class="card">
    <div class="card-header bg-light">
        جزییات سفارش
    </div>
    <div class="card-body">

        <table class="table  mb-5">
            <thead>
                <tr>
                    <th scope="col">شماره میز سفارش دهنده</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $order->table->number }}</td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="bg-light" scope="col">نام محصول</th>
                    <th class="bg-light">قیمت واحد </th>
                    <th class="bg-light" scope="col">تعداد</th>
                </tr>
            </thead>
            <tbody>

                @foreach($order->items as $details)
                <tr>
                    <td>
                        <a target="_blank">
                                {{$details->product->title}}
                            </a>
                    </td>
                    <td>{{ $details->getPriceWithToman() }}</td>
                    <td>{{ $details->quantity }}</td>
                </tr>
                @endforeach

                <tr>
                    <td class="bg-light">
                        <b> تعداد کل سفارشات : </b> {{ $order->items()->count() }}
                    </td>
                    <td class="bg-light" colspan="2">
                        <b> مجموع خرید: </b> {{ $order->getTotalWithToman() }}
                    </td>
                </tr>

            </tbody>
        </table>

        <div class="col-sm-8 pt-5">
            <form action="{{ route('dashboard.orders.update',  $order ) }}" method="post">
                @csrf {{ method_field('PUT') }}

                <div class="row">
                    <div class="col-md-12 mb-2">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">وضعیت سفارش</label>
                            <select class="form-control" name="status">
                                    <option value="Pending">
درانتظار پرداخت
                                    </option>
                                    <option value="Rejected">
                                        رد شده
                                    </option>
                                    <option value="Completed">
                                        تکمیل شده
                                    </option>
                                </select>
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-block text-end mt-3">
                        <button type="submit" class="btn btn-primary btn-sm px-5">ذخیره</button>
                        <a href="{{ route('dashboard.orders.index') }}" class="btn btn-secondary btn-sm px-5">انصراف</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection