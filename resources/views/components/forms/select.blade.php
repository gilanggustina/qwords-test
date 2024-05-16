<select 
  autocomplete="{{$attributes['autocomplete'] ?? 'off'}}"
  placeholder="{{$attributes['placeholder'] ?? ''}}"
  @class([
    'form-input',
    $attributes['class'] ?? ''
  ])
  {{$attributes}}
>
  {{ $slot }}
</select>