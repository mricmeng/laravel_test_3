@extends('layouts.app')

@section('content')
    <div>
        <h2>{{$product->name}}</h2>

        <img src="{{$product->image}}">

        <p>{{$product->description}}</p>

        <div>
            ${{ number_format($product->price, 2)}}
        </div>

        <form action="{{ route('checkout', $product->id)}}" method="POST">
            @csrf
            <button>
                Generate KHQR Pay
            </button>
        </form>
    </div>
@endsection