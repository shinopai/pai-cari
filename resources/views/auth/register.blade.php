@section('title', '会員登録')

<x-guest-layout>
    <div class="wrap">
        <a href="/" class="contents"><i class="fa-light fa-less-than back-btn" title="戻る"></i></a>
        <form method="POST" action="{{ route('register') }}" class="form" novalidate>
            @csrf
        <h2 class="form__heading">会員登録</h2>

            <!-- Name -->
            <div class="form__item">
                <x-text-input class="form__input" type="text" name="name" :value="old('name')" placeholder="ユーザー名" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

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

            <!-- Confirm Password -->
            <div class="form__item">
                <x-text-input class="form__input"
                                type="password"
                                name="password_confirmation"
                                placeholder="パスワード(確認)" required />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <x-primary-button class="form__item">
                {{ __('登録') }}
            </x-primary-button>

            <hr class="form__line">

            <h3 class="form__txt">アカウントをお持ちの方</h3>
            <a class="form__link" href="{{ route('login') }}">
                {{ __('ログイン') }}
            </a>
        </form>
        </div>
</x-guest-layout>
