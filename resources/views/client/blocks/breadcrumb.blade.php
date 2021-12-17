<nav class="site-breadcrumb mt-3">
    <div class="container">
        <ol class="breadcrumb">
            @foreach ($breadcrumb as $item)
                @php
                    $url = $item['url'] ?? '';
                    $active = $item['active'] == true ? '' : 'active';
                @endphp
                
                @if ($active)
                    <li class="breadcrumb-item" {{ $active }}>
                        <a href="{{ $url }}">{{ $item['name'] }}</a>
                    </li>
                @else
                    <li class="breadcrumb-item" {{ $active }}>
                        {{ $item['name'] }}
                    </li>
                @endif
                
            @endforeach
        </ol>
    </div>
</nav>
