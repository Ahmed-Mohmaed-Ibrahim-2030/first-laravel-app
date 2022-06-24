@extends('dashboard.layoutParent.app')
@section('title', 'All Products')
@section('content')
    <div class="col-12">
        @if (session('success'))
            <div class="alert alert-success text-center font-weight-bold py-3">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Price (EGP)</th>
                        <th>Quantity</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name_en }}</td>
                            <td>{{ $product->code }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>
                                <a href="{{ route('edit', ['id' => $product->id]) }}"
                                    class="btn btn-outline-primary btn-sm">Edit</a>
                                <a href="{{ route('delete', ['id' => $product->id]) }}"
                                    class="btn btn-outline-danger btn-sm">Delete</a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
                {{-- <tfoot>
                    <tr>

                        <th>Id</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Price (EGP)</th>
                        <th>Quantity</th>
                        <th>Operations</th>
                    </tr>
                </tfoot> --}}
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
