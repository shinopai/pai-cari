<button {{ $attributes->
  merge(['type' => 'submit', 'class' => 'form__input--submit']) }}>
  {{ $slot }}
</button>
