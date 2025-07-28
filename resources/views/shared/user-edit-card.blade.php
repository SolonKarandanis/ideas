@php use Illuminate\Support\Facades\Auth; @endphp
<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form enctype="multipart/form-data"
              method="post"
              action="{{route('users.update',$user->id)}}">
            @csrf
            @method('PUT')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                         src="{{$user->getImageUrl()}}" alt="Mario Avatar">
                    <div>
                        <input name="name" value="{{$user->name}}" type="text" class="form-control">
                        @error('name')
                            <span class="d-block fs-6 text-danger mt-2">{{$message}}</span>
                        @enderror
                            <input name="email" value="{{$user->email}}" type="email" class="form-control">
                        @error('email')
                            <span class="d-block fs-6 text-danger mt-2">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div>
                    @auth
                        @if(Auth::id() === $user->id)
                            <a href="{{route('users.show',$user->id)}}">View</a>
                        @endif
                    @endauth
                </div>
            </div>
            <div class="mt-4">
                <label for="image">Profile Picture:</label>
                <input id="image" name="image" type="file" class="form-control">
            </div>
            <div class="px-2 mt-4">
                <h5 class="fs-5"> Bio : </h5>
                <textarea name="bio" class="form-control" id="bio" rows="3">{{$user->bio}}</textarea>
                @error('bio')
                <span class="d-block fs-6 text-danger mt-2">{{$message}}</span>
                @enderror
                <button class="btn btn-dark mt-2" type="submit">Save</button>

                <div class="d-flex justify-content-start mt-2">
                    <a href="#" class="fw-light nav-link fs-6 me-3">
                        <span class="fas fa-user me-1"></span>
                        120 Followers
                    </a>
                    <a href="#" class="fw-light nav-link fs-6 me-3">
                        <span class="fas fa-brain me-1"></span>
                        {{$user->ideas_count}}
                    </a>
                    <a href="#" class="fw-light nav-link fs-6">
                        <span class="fas fa-comment me-1"></span>
                        {{$user->comments_count}}
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
