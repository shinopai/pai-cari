@extends('layouts.app')

<!-- main -->
@section('content')

<!-- main visual -->
<a href="https://apps.apple.com/jp/app/id667861049" target="_blank">
  <figure class="mv">
    <img src="{{ asset('images/bnr_app.png') }}" alt="メルカリスマホアプリ" srcset="" class="mv__bnr">
  </figure>
</a>

<!-- おすすめの商品 -->
<section class="list">
  <h2 class="section-heading">おすすめの商品</h2>
  <div class="list__body flex">
    @foreach($items as $item)
    <a href="{{ route('items.show', ['item' => $item->id]) }}" class="contents">
      <div class="list__item">
        <div class="list__img">
          <img src="{{ asset('images/'.$item->item_image) }}" alt="{{ $item->name }}" srcset="">
          <span class="list__label">￥{{ number_format($item->price) }}</span>
        </div>
        <h3 class="list__name">{{ $item->name }}</h3>
      </div>
    </a>
    @endforeach
  </div>
</section>
@endsection
