{{--{{ dd($items) }}--}}
@foreach( $items as $item)

    <li  >
        <a href="{{ $item->url() }}">{{ $item->title }}</a>
{{--        {{ dump($item) }}--}}
        @if ($item->hasChildren())
{{--            {{ dump($item->children()) }}--}}
            <ul class="sub-menu">
                @include(env('THEME'). '.MenuItems', ['items'=>$item->children()] )
            </ul>
        @endif

    </li>
@endforeach