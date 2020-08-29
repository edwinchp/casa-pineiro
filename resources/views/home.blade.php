@extends('main')

@section('content')
    @foreach ($products as $product)
    <div class="col-xs-6 col-md-4 justify-center">
      <div class="card" style="width: 18rem;">
      <img src="{{$product->picture_1}}" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title">{{$product->name}}</h5>
          <p class="card-text">{{$product->description}}</p>
          <a href="#" class="btn btn-primary">Ver más</a>
          @if ($product->show_price)
          <p><strong>${{$product->price}}</strong></p>
          @endif
        </div>
      </div>
    </div>
    @endforeach
@endsection
