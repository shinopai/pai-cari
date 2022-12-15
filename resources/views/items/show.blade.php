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
    <div class="detail__icons flex">
      @if(App\Models\Item::checkKeepItem($item->id))
      <form
        action="{{ route('items.removeKeep', ['item' => $item->id]) }}"
        method="post"
        class="detail__ico"
      >
        @csrf @method('delete')
        <img src="{{ asset('images/ico_heart_red.png') }}" alt="" srcset="" />
        <figcaption>{{ $keep_count }}</figcaption>
        <input type="submit" value="" />
      </form>
      @else
      <form
        action="{{ route('items.keep', ['item' => $item->id]) }}"
        method="post"
        class="detail__ico"
      >
        @csrf
        <img src="{{ asset('images/ico_heart.png') }}" alt="" srcset="" />
        <figcaption>いいね！</figcaption>
        <input type="submit" value="" />
      </form>
      @endif
      <a href="#comment" class="contents">
        <figure class="detail__ico">
          <img src="{{ asset('images/ico_comment.png') }}" alt="" srcset="" />
          <figcaption>{{ count($comments) }}</figcaption>
        </figure>
      </a>
    </div>
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
    <h3 class="detail__heading">コメント({{ count($comments) }})</h3>
    @if($comments->isNotEmpty())
    <ul class="comment" id="comment">
      @foreach($comments as $comment)
      <li class="comment__item flex">
        <div class="comment__ico">
          <img src="{{ asset('images/img_user.png') }}" alt="{{ $comment->user->name }}" srcset="">
        </div>
        <div class="comment__body">
          <h4 class="comment__name">{{ $comment->user->name }}</h4>
          <div class="comment__content">
            <p>{{ $comment->body }}</p>
            <p>{{ $comment->created_at->diffForHumans() }}</p>
          </div>
        </div>
      </li>
      @endforeach
    </ul>
    @endif
    <form
      action="{{ route('items.addComment', ['item' => $item->id]) }}"
      method="post"
      class="form"
    >
      @csrf
      <label for="body" class="form__label">商品へのコメント</label><br />
      <textarea name="body" id="body" class="form__textarea" rows="5">{{
        old("body")
      }}</textarea>
      <x-input-error :messages="$errors->get('body')" class="mt-2" />
      <input type="submit" value="コメントを送信する" class="form__link" />
    </form>
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
