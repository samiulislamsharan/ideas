@auth()
    <h4> Share yours ideas </h4>
    <div class="row">
        <form action="{{ route('ideas.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <textarea name="content" class="form-control" id="content" rows="3" placeholder="Any idea today?"></textarea>
                {{-- display error if form validation fails --}}
                @error('content')
                    <div class="d-block mt-2 fs-6 text-danger"> {{ $message }} </div>
                @enderror
            </div>
            <div class="">
                <button type="submit" class="btn btn-dark"> Share </button>
            </div>
        </form>
    </div>
@endauth

@guest()
    <h4>Log in to Share yours ideas </h4>
@endguest
