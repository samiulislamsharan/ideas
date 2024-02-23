<div class="card">
    <div class="card-header pb-0 border-0">
        <h5 class="">{{ __('ideas.search') }}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('dashboard') }}" method="GET">
            <input value="{{ request('search', '') }}" name="search" placeholder="{{ __('ideas.search_here') }}"
                class="form-control w-100" type="text">
            <button class="btn btn-dark mt-2">{{ __('ideas.search_btn') }}</button>
        </form>
    </div>
</div>
