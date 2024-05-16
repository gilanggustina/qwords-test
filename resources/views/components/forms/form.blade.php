<form 
  @isset($onsubmit)
    method="post" onsubmit="{{$onsubmit}}"
  @else
    @isset($attributes['post'])
      method="post" action="{{$attributes['post']}}"
    @elseif($attributes['put'])
      method="post"
    @else 
      method="get"
      @if(isset($get) || isset($action))
        action="{{$get ?? $action}}"
      @endif
    @endisset
  @endisset

  {{$attributes}}
>
  @isset($attributes['put'])
    @method($attributes['put'])
  @endisset
  @csrf
  {{$slot}}
</form>