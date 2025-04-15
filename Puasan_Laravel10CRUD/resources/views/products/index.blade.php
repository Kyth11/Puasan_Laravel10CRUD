@extends('products.layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>
            Laravel 10 CRUD – (David Kieth Puasan)
            <a class="btn btn-primary float-end" href="{{ route('products.create') }}">Create New Product</a>
        </h2>
    </div>

    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Search Bar --}}
        <form class="d-flex align-items-center flex-nowrap mb-3" action="/products/">
            <input name="q" class="form-control me-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-sm btn-info">Search</button>
        </form>

        <table class="table table-bordered">
            <tr align="center">
                <th>No</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th width="200px">Action</th>
            </tr>
            @php $i = $products->firstItem() - 1; @endphp
            @foreach ($products as $product)
                <tr>
                    <td align="center">{{ ++$i }}</td>
                    <td align="center">{{ $product->name }}</td>
                    <td align="right">&#8369; {{ $product->price }}</td>
                    <td align="center">{{ $product->description }}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('products.show', $product->id) }}">Show</a>
                        <a class="btn btn-primary btn-sm" href="{{ route('products.edit', $product->id) }}">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        {!! $products->links() !!}
    </div>
</div>
@endsection
