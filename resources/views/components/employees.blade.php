<li class="nav-item">
    <a class="nav-link" href="{{ route('employees.index') }}">
        {{ __('home.component-employee') }}
        <span class="badge badge-success badge-pill">
            {{ $employees ?? 0 }}</span>
    </a>
</li>