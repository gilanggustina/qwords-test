@php
  $roundedCenterNone = isset($attributes['rounded-center-none'] ) ? "rounded-center-none" : "";
@endphp
<div @class([
  "field",
  $attributes['class']
]) style="{{$attributes['style'] ?? ''}}" id="{{$attributes['id'] ?? ''}}">
    <div @class([
        "field-container",
        $roundedCenterNone,
        $attributes['class-field-container']
      ]) >
      {{$slot}}
    </div>
</div>