@section('title', 'ログイン')

<x-guest-layout>
    <div class="wrap">
        <a href="/" class="contents"><i class="fa-light fa-less-than back-btn" title="戻る"></i></a>
        <form method="POST" action="{{ route('login') }}" class="form" novalidate>
            @csrf
        <h2 class="form__heading">ログイン</h2>

            <!-- Email Address -->
            <div class="form__item">
                <x-text-input class="form__input" type="email" name="email" :value="old('email')" placeholder="メールアドレス" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="form__item">
                <x-text-input class="form__input"
                                type="password"
                                name="password"
                                placeholder="パスワード"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <x-primary-button class="form__item">
                {{ __('ログイン') }}
            </x-primary-button>

            <hr class="form__line">

            <h3 class="form__txt">アカウントをお持ちでない方</h3>
            <a class="form__link" href="{{ route('register') }}">
                {{ __('会員登録') }}
            </a>
        </form>
        </div>
</x-guest-layout>
