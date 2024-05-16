<label for='{{$attributes['for']}}' @class([
  "form-label",
  $attributes['class']
])
{{$attributes}}
>
  {{$slot}}
  @if(isset($attributes['required']) && $attributes['required'])
    <span class="nk-star">*</span>
  @endif
</label>
  