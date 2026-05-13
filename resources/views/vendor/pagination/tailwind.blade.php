@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex justify-center">
        <div>
            <span class="relative z-0 inline-flex shadow-sm rounded-md">

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)

                    {{-- Three Dots Separator --}}
                    @if (is_string($element))
                        <span aria-disabled="true">
                            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5">
                                {{ $element }}
                            </span>
                        </span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)

                            {{-- Current Page --}}
                            @if ($page == $paginator->currentPage())
                                <span aria-current="page">
                                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-indigo-600 border border-indigo-600 leading-5">
                                        {{ $page }}
                                    </span>
                                </span>
                            @else
                                <a href="{{ $url }}"
                                   class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 transition ease-in-out duration-150"
                                   aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                    {{ $page }}
                                </a>
                            @endif

                        @endforeach
                    @endif

                @endforeach

            </span>
        </div>
    </nav>
@endif