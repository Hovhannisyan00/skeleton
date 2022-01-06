@foreach($groupName as $key => $menus)
    @if($key)
        <li class="menu-item-group">{{ $key }}</li>
    @endif
    @foreach($menus as $menu)
        @if($menu->children->count())
            <li class="menu-item">
                <a class="menu-link" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                   aria-controls="collapseExample">
                        <span class="svg-icon">
                            <i class="{{ $menu->icon }}"></i>
                        </span>
                    <span class="menu-text">{{ __('__dashboard.menu.'.$menu->slug) }}</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" data-parent="#menu-nav" id="collapseExample">
                    <ul class="menu-nav">
                        @foreach($menu->children as $child)
                            <li class="menu-item">
                                <a href="{{ urlWithLng($child->url) }}" class="menu-link">
                                    <i class="menu-bullet-line">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">{{ __('__dashboard.menu.'.$child->slug) }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
        @else
            <li class="menu-item ">
                <a href="{{ urlWithLng($menu->url) }}" class="menu-link {{(request()->is('*'.$menu->url.'*')) ? 'active' : ''}}">
                <span class="svg-icon">
                    <i class="{{ $menu->icon }}"></i>
                </span>
                    <span class="menu-text">{{ __('__dashboard.menu.'.$menu->slug) }}</span>
                </a>
            </li>
        @endif
    @endforeach
@endforeach

