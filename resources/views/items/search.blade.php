@extends('layouts.app')

<!-- main -->
@section('content')

<!-- 検索結果 -->
<section class="list">
  <h2 class="section-heading">{{ $search_word }}の検索結果</h2>
  <p class="list__txt">{{ count($items) }}件</p>
  <div class="list__body flex">
    @forelse($items as $item)
    <a href="{{ route('items.show', ['item' => $item->id]) }}" class="contents">
      <div class="list__item">
        <div class="list__img">
          <img
            src="{{ asset('images/'.$item->item_image) }}"
            alt="{{ $item->name }}"
            srcset=""
          />
          <span class="list__label">￥{{ number_format($item->price) }}</span>
        </div>
        <h3 class="list__name">{{ $item->name }}</h3>
      </div>
    </a>
    @empty
    <p class="list__txt">商品は見つかりませんでした。</p>
    @endforelse
  </div>
</section>
@endsection
