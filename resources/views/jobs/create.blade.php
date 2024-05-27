
<x-layout>
    <x-slot:title>
        {{ 'Create new job' }}
    </x-slot:title>
    <x-slot:heading>
        Create job
    </x-slot:heading>

<form method="POST" action="{{ route('jobs.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Create new job</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">We just need title and salary</p>
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <x-form-feild>
            <x-form-lable for="title">Title</x-form-lable>
            <div class="mt-2">
                <x-form-input
                name="title"
                id="title"
                autocomplete="title"
                value="{{ old('title') }}"
                placeholder="CEO."
                 />
                 <x-form-error name="title"></x-form-error>
            </div>
          </x-form-feild>

          <x-form-feild>
            <x-form-lable for="salary">Salary</x-form-lable>
            <div class="mt-2">
              <x-form-input
               name="salary"
               id="salary"
               value="{{ old('salary') }}"
               placeholder="$100,000 Per Year."
                 />
                 <x-form-error name="salary"></x-form-error>
            </div>
          </x-form-feild>

          <x-form-feild>
            <x-form-lable for="image">Image</x-form-lable>
            <div class="mt-2">
              <x-form-input
               name="image"
               id="image"
               type="file"
                 />
                 <x-form-error name="image"></x-form-error>
            </div>
          </x-form-feild>

        </div>
      </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">


      {{-- https://youtu.be/PanSES2v2gk?si=nw64r9Gr6kxUezfw
      https://youtu.be/w6DexyuWszQ?si=byRSVWZpIYdcWdj4
      https://youtu.be/CeL-W_Ap1Ls?si=3z3HJmMpBAvyVv41
      https://youtu.be/z1GiuhR3MrA?si=bfPxMLyLo-oxzjl7 --}}
                      {{-- my be I have to use sesstion --}}
      <button onclick="history.back()" type="button" class="text-sm font-semibold leading-6 text-gray-900">
        Cancel
      </button>
      <x-form-submit-btn>
        Save
      </x-form-submit-btn>
    </div>
  </form>


</x-layout>
