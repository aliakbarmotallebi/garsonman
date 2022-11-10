@extends('dashboard.layouts.base') @section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">پنل مدیریت</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">مدیریت محتوا</li>
    </ol>

    <x-dashboard.counter/>

    <div class="row my-4 border-bottom">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-header">
                    آخرین سفارشات
                </div>
                <div class="card-body">
                    <div class=" table table-responsive">
                        <table class="table table-sm table-striped table-borderless mb-0">
                            <tbody>
                                @foreach($orders as $order)
                                <tr class="p-3">
                                    <td>
                                        <a target="_blank" href="{{ route('dashboard.orders.show', $order) }}">
                                            {{ $order->id }}
                                        </a>
                                    </td>
                                    <td class="text-right fw-bold">
                                        شماره میز {{ $order->table->number }}
                                    </td>
                                    <td>
                                        <span>
                                            @if($order->isCompleted())
                                                    <span class="badge bg-success">
                                                    تانید شده
                                                </span> @elseif($order->isRejected())
                                        <span class="badge bg-danger">
                                                تائیدنشده
                                                </span> @elseif($order->isPending())
                                        <span class="badge bg-secondary">
                                                درحال بررسی
                                                </span> @endif
                                        </span>
                                    </td>
                                    <td>
                                        {{ verta($order->created_at)->formatDifference() }}
                                    </td>
                                    <td>
                                        مبلغ {{ number_format($order->total) }} تومان
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    آخرین محصولات
                </div>
                <div class="card-body">
                    <div class="bg-body rounded shadow-sm">
                        @foreach($products as $product)
                        <div class="d-flex text-muted pt-3">
                            <img class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" src="{{ asset($product->getImageTumblr()) }}">

                            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                                <div class="d-flex justify-content-between">
                                    <strong class="text-gray-dark">{{ $product->title }}</strong>
                                    <a class="btn btn-primary btn-sm" target="_blank" href="{{ route('dashboard.products.edit', $product) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                                    </svg> ویرایش
                                    </a>
                                </div>
                                <span class="d-block">{{$product->getPriceWithToman()}}</span>
                            </div>
                        </div>
                        @endforeach
                        <small class="d-block text-end mt-3 ">
                                    <a target="_blank" class="btn btn-secondary px-3 py-1" href="{{ route('dashboard.products.index') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
                                            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                            <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                                        </svg>
                                        تمامی محصولات
                                    </a>
                                </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection