@extends('layouts.app')

<!-- main -->
@section('content')
<a href="/" class="contents"
  ><i class="fa-light fa-less-than back-btn" title="戻る"></i
></a>
<div class="detail flex">
  <figure class="detail__img">
    <img
      src="{{ asset('images/'.$item->item_image) }}"
      alt="{{ $item->name }}"
      srcset=""
    />
  </figure>
  <div class="detail__mass">
    <h2 class="detail__name">{{ $item->name }}</h2>
    <span class="detail__price"
      >￥{{ number_format($item->price) }}<span>(税込み)</span></span
    >
    <span class="detail__postage">{{ $item->postage }}</span>
    <h3 class="detail__heading">商品の説明</h3>
    <p class="detail__desc">{{ $item->description }}</p>
    <p class="detail__date">{{ $item->created_at->diffForHumans(); }}</p>
    <h3 class="detail__heading">商品の情報</h3>
    <dl class="detail__data">
      <dt>ブランド</dt>
      <dd>{{ $item->brand->name }}</dd>
      <dt>商品の状態</dt>
      <dd>{{ $item->condition }}</dd>
      <dt>配送料の負担</dt>
      <dd>{{ $item->postage }}</dd>
    </dl>
    <h3 class="detail__heading">出品者</h3>
    <dl class="detail__data">
      <dt class="user-img">
        <img
          src="{{ asset('images/'.$item->user->profile_image) }}"
          alt="{{ $item->user->name }}"
          srcset=""
        />
      </dt>
      <dd class="user-name">{{ $item->user->name }}</dd>
    </dl>
  </div>
</div>
<h3 class="detail__heading">この商品を見ている人におすすめ</h3>
<section class="list">
  <div class="list__body flex">
    @foreach($recommended_items as $item)
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
    @endforeach
  </div>
</section>
@endsection
