@auth()
    <h4> Share yours ideas </h4>
    <div class="row">
        <form method="post" action="{{route('ideas.create')}}">
            @csrf
            <div class="mb-3">
                <textarea name="content" class="form-control" id="idea" rows="3"></textarea>
                @error('content')
                <span class="d-block fs-6 text-danger mt-2">{{$message}}</span>
                @enderror
            </div>
            <div class="">
                <button class="btn btn-dark" type="submit"> Share </button>
            </div>
        </form>
    </div>
@endauth
@guest
    <h4>{{trans('ideas.login.to.share')}}</h4>
@endguest
