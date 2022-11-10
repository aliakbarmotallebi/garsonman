@extends('dashboard.layouts.base') @section('title') لیست محصولات @endsection @section('content')

<div class="container-fluid px-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="mt-4">مدیریت محصولات</h1>
    </div>
</div>


<div class="card mt-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i> لیست محصولات
    </div>
    <div class="card-body">
        <div class="list-group list-group-checkable">
            @foreach($products as $product)
            <li class="list-group-item list-group-product list-group-item-action d-flex gap-3 py-3 @if(! $product->isPublished())opacity-50 @endif">
                <img src="{{  asset($product->getImageTumblr()) }}" style="object-fit: cover" width="70px" class="rounded flex-shrink-0">
                <div class="d-flex gap-2 w-100 justify-content-between">
                    <div class="d-flex justify-content-between flex-column">
                        <h6>
                            {{ $product->title }}
                        </h6>
                        <small class="pb-1">{{ $product->category->name }}</small>
                        <div class="opacity-75">
                            <ul class="list-group list-group-horizontal">
                                <li class="list-group-item fw-bold text-success">
                                    {{ $product->getPriceWithToman() }}
                                </li>
                                <li class="list-group-item">
                                    {{ $product->user->full_name }}
                                </li>
                                <li class="list-group-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                        </svg> {{ $product->visit_count }}
                                </li>
                                <li class="list-group-item flex">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" width="16" height="16" class="text-danger" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z"></path>
                                    </svg>
                                    <span>
                                        {{floor($product->ratingPercent())}}
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                        </svg> {{ verta($product->created_at)->format('h:i:s Y-m-d') }}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="text-nowrap">
                        <form action="{{ route('dashboard.products.destroy', $product) }}" method="POST">
                            @csrf {{ method_field('DELETE') }}
                            <div class="btn-group btn-group-sm">

                                <a href="{{ route('dashboard.products.edit', $product) }}" class="link-primary p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                        </svg> ویرایش
                                </a>


                                <button type="submit" class="btn btn-link link-danger p-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>

                                        حذف
                                    </button>
                            </div>
                        </form>

                        <div class="mt-3 text-end">
                            <livewire:status-switch :content="$product" />
                        </div>

                    </div>
                </div>
            </li>
            @endforeach
        </div>
    </div>
    {{ $products->links('vendor.pagination.bootstrap-4') }}
</div>
</div>

@endsection