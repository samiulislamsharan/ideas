@auth()
    <h4> {{ __('ideas.share_ideas') }} </h4>
    <div class="row">
        <form action="{{ route('ideas.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <textarea name="content" class="form-control" id="content" rows="3" placeholder="{{ __('ideas.any_idea') }}"></textarea>
                {{-- display error if form validation fails --}}
                @error('content')
                    <div class="d-block mt-2 fs-6 text-danger"> {{ $message }} </div>
                @enderror
            </div>
            <div class="">
                <button type="submit" class="btn btn-dark"> {{ __('ideas.share') }} </button>
            </div>
        </form>
    </div>
@endauth

@guest()
    <h4>{{ __('ideas.log_into_share_ideas') }} </h4>
@endguest
