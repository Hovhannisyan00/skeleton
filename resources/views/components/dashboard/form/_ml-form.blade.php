<div class="{{ $attributes['class'] ?? '' }}">
    <ul class="nav nav-tabs mb-3" id="__mls__tabs" role="tablist">
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <li class="nav-item">
                <a class="nav-link @if(!$loop->index)  active @endif" id="{{$localeCode}}" data-toggle="tab" href="#__mls__tab__{{$localeCode}}" role="tab" aria-controls="home"
                   aria-selected="true">{{ $properties['name'] }}</a>
            </li>
        @endforeach
    </ul>
    <div class="tab-content {{ $attributes['tabContentClass'] ?? '' }}" id="__mls__tabs__content">
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <div class="{{ $attributes['tabsClass'] ?? '' }} tab-pane fade @if(!$loop->index) show active @endif" id="__mls__tab__{{$localeCode}}" role="tabpanel" aria-labelledby="{{$localeCode}}">
                {{  $renderHtml($slot, $localeCode, $attributes['mlData'] ?? '') }}
            </div>
        @endforeach
    </div>
</div>
