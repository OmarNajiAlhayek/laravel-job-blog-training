{{--

 /jobs/{{ $job->id }}/edit
           ===
 route('jobs.edit', $job->id)


 --}}

<x-layout>


    @if($job->image)
        <img src="{{ Storage::url($job->image->url) }}" alt="Job Image">
    @endif

    <x-slot:title>
        {{ ucwords($job['title']) }}
    </x-slot:title>
    <x-slot:heading>
        Job
    </x-slot:heading>
    <div class="flex flex-col">
        <strong>{{ $job['title'] }}.</strong>

        @php
            $favoraties = $job->number_of_favorites;
        @endphp
        @if ($favoraties !== 0)
            Number of favoraites: {{ $favoraties }}
        @endif


    </div>

    <div class="flex gap-5 mt-10">


        @can('edit', $job)
            <x-btn-link href="{{ route('jobs.edit', $job->id) }}">
                Edit Job
            </x-btn-link>
        @endcan


        {{-- ! is favorated in the heplers.php --}}




        @auth
            {{-- @if(isFavorited($job)) --}}
            @if(isFavoritedJob($job))
                <form action="{{ route('favorites.destroy', $job->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" title="remove from favorites">
                        {{-- <i class="bi bi-star-fill"></i> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                    </button>
                </form>
            @else
                <form action="{{ route('favorites.store', $job->id) }}" method="POST">
                    @csrf
                    <button type="submit" title="add to favorites">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                            <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                        </svg>
                        {{-- <i class="bi bi-star"></i> --}}
                        {{-- <i class="fas fa-times"></i> --}}
                        {{-- <i class="fas fa-star"></i> --}}

                    </button>
                </form>
            @endif
        @endauth


    </div>


<div class="mt-4">
    <form action="{{ route('comments.store', $job) }}" method="POST">
        @csrf
            <div class="mb-4">
                <x-form-input
                    name="comment"
                    id="comment"
                    type="text"
                    value="{{ old('comment') }}"
                    placeholder="Add new comment"
                   />
                   <x-form-error name="comment"></x-form-error>
            </div>

        <x-form-submit-btn>
            Add Comment
        </x-form-submit-btn>

    </form>

    <div class="space-y-4 mt-4">
        @foreach ($comments as $comment)
        <div class="flex justify-between px-4 py-6 border border-gray-200 rounded-lg transform transition duration-300 ease-in-out hover:bg-gray-100">
            <div>
                <div class="font-bold text-blue-500 text-sm">
                    {{ $comment->user->full_name }}
                </div>

                    @cannot('update', $comment)
                        {{  $comment->content  }}
                    @endcannot

                    @can('update', $comment)
                        <div class="mt-1">
                            <x-form-input
                            name="updated-comment"
                            id="updated-comment"
                            autocomplete="comment"
                            value="{{ $comment->content }}"
                            class=" w-96"
                            form="update-comment-form"
                        />
                        </div>
                    @endcan

            </div>

            @can('update', $comment)
                <div class="flex space-x-4">
                    <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="rounded-md bg-white px-3 py-2 text-sm font-semibold text-red-600 border border-red-600 shadow-sm hover:bg-red-600 hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                            Delte
                        </button>
                    </form>

                    <form id="update-comment-form" action="{{ route('comments.update', $comment) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <x-form-submit-btn form="update-comment-form">
                            Edit
                        </x-form-submit-btn>
                    </form>
                </div>

            @endcan
        </div>


        @endforeach
        <x-form-error name="updated-comment"></x-form-error>

    </div>

{{--
    <ul>
        @foreach ($job->comments as $comment)
            <li>{{ $comment->content }}</li>
        @endforeach

    </ul> --}}


</div>






</x-layout>









{{--




    <x-layout>
    <x-slot:title>
        {{ ucwords($job['title']) }}
    </x-slot:title>
    <x-slot:heading>
        Job
    </x-slot:heading>
    <div class="flex flex-col">
        <strong>{{ $job['title'] }}.</strong>

        @php
            $favorites = $job->number_of_favorites;
        @endphp
        @if ($favorites !== 0)
            Number of favorites: {{ $favorites }}
        @endif

        @foreach ($job->comments as $comment)
            {{ $comment }}
        @endforeach
    </div>

    <div class="flex gap-5 mt-10">
        @can('edit', $job)
            <x-btn-link href="{{ route('jobs.edit', $job->id) }}">
                Edit Job
            </x-btn-link>
        @endcan

        @auth
            @if($job->isItFavorited())
                <form action="{{ route('favorites.destroy', $job->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-form-submit-btn>
                        Remove from favorite
                    </x-form-submit-btn>
                </form>
            @else
                <form action="{{ route('favorites.store', $job->id) }}" method="POST">
                    @csrf
                    <x-form-submit-btn>
                        Add to favorite
                    </x-form-submit-btn>
                </form>
            @endif
        @endauth
    </div>
</x-layout>
--}}
