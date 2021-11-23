@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a class="btn btn-primary mb-3" href="{{ route('products.create') }}">สร้างสินค้า</a>
                <div class="row">
                    @foreach ($productsView as $item)
                        <div class="col-4">
                            <form action="{{ route('orders.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" placeholder="" value="{{ $item->id }}">
                                <div class="card p-2">
                                    <h4> ชื่อสินค้า {{ $item->name }}</h4>
                                    <p>ราคา {{ $item->price }}</p>
                                    <button class="btn btn-secondary" type="submit">ซื้อ</button>
                                </div>
                            </form>
                            <a class="btn btn-warning mt-2" href="{{ route('products.edit', $item->id) }}">แก้ไข</a>
                            <form action="{{ route('products.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">ลบ</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
