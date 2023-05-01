@include('admin.layouts.partials.header')
    @include('admin.layouts.partials.sidebar')
        <main class="contentMain">
            <div class="container">
                {{ $slot }}
            </div>
        </main>
@include('admin.layouts.partials.footer')
