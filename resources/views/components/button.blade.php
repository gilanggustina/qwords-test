@props(['buttonType' => 'primary'])
<button @class([
  'rounded-2xl' => !isset($attributes['norounded']),
  'rounded-sm' => $attributes['rounded'] === 'sm',
  'rounded-md' => $attributes['rounded'] === 'md',
  'rounded-xl' => $attributes['rounded'] === 'xl',
 'bg-gradient-to-r from-primary to-primary-60 text-white' => $buttonType == 'primary' && !isset($attributes['nogradient']),
 'bg-primary text-white' => $buttonType == 'primary' && isset($attributes['nogradient']),
 'bg-gradient-to-r from-secondary to-secondary-60'    => $buttonType == 'secondary' && !isset($attributes['nogradient']),
  'bg-secondary text-white' => $buttonType == 'secondary' && isset($attributes['nogradient']),
 'bg-gradient-to-r from-grey to-grey-60 text-white'    => $buttonType == 'grey' && !isset($attributes['nogradient']),
  'bg-grey text-white' => $buttonType == 'grey' && isset($attributes['nogradient']),
 'bg-gradient-to-r from-danger to-danger-60 text-white'  => $buttonType == 'danger' && !isset($attributes['nogradient']),
  'bg-danger text-white' => $buttonType == 'danger' && isset($attributes['nogradient']),
 'bg-gradient-to-r from-success to-success-60 text-white'  => $buttonType == 'success' && !isset($attributes['nogradient']),
  'bg-success text-white' => $buttonType == 'success' && isset($attributes['nogradient']),
 'border-0 py-1 px-2 cursor-pointer min-h-[34px]',
  $attributes['class']
])
type="{{$type ?? 'submit'}}"
{{$attributes}}
>
    <div class="w-max flex gap-1">
        <div class="w-full my-auto">
            {{$slot}}
        </div>
    </div>
</button>
