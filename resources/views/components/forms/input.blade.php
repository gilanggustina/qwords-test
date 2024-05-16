@php
  $type = $attributes['type'] ?? 'text';
@endphp
<input
  type="{{$type}}"
  autocomplete="{{$attributes['autocomplete'] ?? 'off'}}"
  placeholder="{{$attributes['placeholder'] ?? ''}}"
  {{-- @if (isset($attributes['placeholder']))
    placeholder="{{$attributes['placeholder']}}"
  @endif --}}
  @if(isset($attributes['required']) && $attributes['required'])
    required
  @endif
  @class([
    'form-input',
    'choosed-input' => in_array($type,['checkbox','radio']),
    $attributes['class'] ?? $class    
  ])
  {{$attributes}}
  {{-- :placeholder="$placeholder" --}}
/>
