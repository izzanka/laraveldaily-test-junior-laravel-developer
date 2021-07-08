<li class="nav-item">
    <a class="nav-link" href="{{ route('companies.index') }}">
        {{ __('home.component-companie') }}
        <span class="badge badge-primary badge-pill">
            {{ $companies ?? 0 }}</span>
    </a>
</li>