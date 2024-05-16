<a 
    href="{{$attributes['href'] ?? '#'}}"
    @class([
        'w-full no-underline my-auto flex gap-1 min-h-[34px]',
        'rounded-full border-0 !text-sm py-1 px-3 p-2 cursor-pointer' => isset($attributes['likeButton']),
        'bg-gradient-to-r from-primary to-primary-60 text-white' => isset($attributes['likeButton']) && $attributes['likeButton'] == 'primary',
        'bg-gradient-to-r from-secondary to-secondary-60 text-white' => isset($attributes['likeButton']) && $attributes['likeButton'] == 'secondary',
        'bg-gradient-to-r from-danger to-danger-60 text-white' => isset($attributes['likeButton']) && $attributes['likeButton'] == 'danger',
        'bg-gradient-to-r from-lightprimary to-lightprimary-60 text-black' => isset($attributes['likeButton']) && $attributes['likeButton'] == 'info',
        'bg-gradient-to-r from-success to-success-60 text-white' => isset($attributes['likeButton']) && $attributes['likeButton'] == 'success',
        'bg-gradient-to-r from-grey to-grey-60 text-white' => isset($attributes['likeButton']) && $attributes['likeButton'] == 'grey',
        $attributes['class']
    ])
    {{$attributes}}
>
    <div class="w-full flex gap-2">
      <div class="w-full my-auto">
        {{$slot}}
      </div>
    </div>
</a>