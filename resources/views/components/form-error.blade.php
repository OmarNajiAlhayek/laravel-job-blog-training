            {{-- class="text-red-500 text-xs italic"> --}}
{{--                    @if($errors->any())--}}
{{--                        <ul>--}}
{{--                            @foreach($errors->all() as $error)--}}
{{--                                <li class="text-red-500 italic">{{ $error }}</li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    @endif--}}
{{--                </div>--}}


@props(['name'])
@error($name)
    <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
@enderror