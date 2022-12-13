@props(['messages']) @if ($messages)
<ul {{ $attributes->
  merge(['class' => '']) }}> @foreach ((array) $messages as $message)
  <li class="err-msg">{{ $message }}</li>
  @endforeach
</ul>
@endif
