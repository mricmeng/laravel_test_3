@extends('layouts.app')

@section('content')
    <div>
        <h1>Product List</h1>

        <div>
            @foreach ($products as $product)
                <div>
                    <div>
                        <h5>{{$product->name}}</h5>

                        <p>{{$product->description}}</p>

                        <p>
                            <strong>
                                ${{number_format($product->price, 2)}}
                            </strong>
                        </p>

                        <a href="{{route('product.show', $product->id)}}">
                            Buy
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection