<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form enctype="multipart/form-data" method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('put')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageURL() }}"
                        alt="{{ $user->name }}">
                    <div>
                        <input name="name" value="{{ $user->name }}" type="text" class="form-control">
                        {{-- display error if form validation fails --}}
                        @error('name')
                            <div class="d-block mt-2 fs-6 text-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                </div>
                <div>
                    @auth
                        @if (Auth::id() === $user->id)
                            <a href="{{ route('users.show', $user->id) }}"
                                class="badge badge-primary text-bg-primary">View</a>
                        @endif
                    @endauth
                </div>
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Select picture:</label>
                <input name="image" class="form-control" type="file" id="formFile">
                @error('image')
                    <div class="d-block mt-2 fs-6 text-danger"> {{ $message }} </div>
                @enderror
            </div>

            <div class="px-2 mt-4">
                <h5 class="fs-5">Edit bio : </h5>
                <div class="mb-3">
                    <textarea name="bio" class="form-control" id="bio" rows="3">{{ $user->bio }}</textarea>
                    {{-- display error if form validation fails --}}
                    @error('bio')
                        <div class="d-block mt-2 fs-6 text-danger"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="btn btn-dark"> Save </button>
                </div>

                @include('users.shared.user-stats')

            </div>
        </form>
    </div>
</div>
