<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <a href="/posts" class="font-medium text-blue-500 hover:underline">&laquo; Back to Posts</a>
                    <address class="flex items-center my-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                            <div>
                                <a href="/posts?author={{ $post->author->username }}" rel="author"
                                    class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->name }}
                                </a>

                                <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate
                                        datetime="2022-02-08"
                                        title="February 8th, 2022">{{ $post['created_at']->translatedFormat('l\, d F Y') }}
                                        ({{ $post->created_at->diffForHumans() }})</time></p>
                                <div class="flex justify-between items-center my-1 text-gray-500">
                                    <a href="/posts?category={{ $post->category->slug }}"
                                        class="bg-{{ $post->category->color }}-100 text-gray-500 text-base font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-gray-200 dark:text-gray-500">
                                        {{ $post->category->name }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </address>
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                        {{ $post->title }}</h1>
                </header>
                <p>
                    {{ $post->body }}
                </p>


            </article>
        </div>
    </main>

</x-layout>
