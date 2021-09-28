<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->id? __('Update Post'): __('Create Post') }}
        </h2>
    </x-slot>

    @include('components.alert')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                  <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">{{ $post->id? __('Update Post'): __('Create Post') }}</h3>
                    <p class="mt-1 text-sm text-gray-600">
                      This information will be displayed publicly so be careful what you share.
                    </p>
                  </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">

                  <form action="{{ $post->id? route('posts.update', $post->id): route('posts.store') }}" method="POST">
                      @csrf
                      @if($post->id) @method('PUT') @endif
                    <div class="shadow sm:rounded-md sm:overflow-hidden">

                      <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <div class="grid grid-cols-3 gap-6">
                          <div class="col-span-3 sm:col-span-2">
                            <label for="company-website" class="block text-sm font-medium text-gray-700">
                              Post Title
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                              <input type="text" name="title" id="company-website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="Hello World" value="{{ old('title', $post->title) }}">
                            </div>
                          </div>
                        </div>

                        <div>
                          <label for="about" class="block text-sm font-medium text-gray-700">
                            Content
                          </label>
                          <div class="mt-1">
                            <textarea id="about" name="body" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Something Interesting.!">{{ old('body', $post->body) }}</textarea>
                          </div>
                        </div>
                      </div>
                      <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                          {{ $post->id? 'Update': 'Save' }}
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
    </div>
</x-app-layout>
