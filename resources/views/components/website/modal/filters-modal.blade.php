@props(['jobTypes', 'categories', 'maxSalary'])

<div class="modal fade" id="filtersModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div
        class="modal-dialog  modal-wrapper md:tw-max-w-[352px] tw-w-[80%] tw-my-0 tw-absolute tw-top-0 tw-bootom-0 tw-left-0">
        <div class="modal-content tw-rounded-none">
            @if (request('keyword') || request('category') || request('job_type') || request('price_min') || request('price_max'))
                <div class="tw-p-5">
                    <div class="tw-flex tw-justify-between items-center tw-mb-5">
                        <h2 class="tw-text-[#18191C] tw-text-xl tw-font-medium tw-mb-0">{{ __('filter') }}</h2>
                        <button type="button" class="tw-p-0 tw-border-0 tw-bg-transparent" data-bs-dismiss="modal"
                            aria-label="Close">
                            <x-svg.close-icon />
                        </button>
                    </div>
                    <div>
                        <h2 class="tw-text-sm tw-text-[#767F8C] tw-mb-3">{{ __('active_filter') }}:</h2>
                        <div class="tw-flex tw-gap-2 tw-flex-wrap">
                            @if (request('keyword'))
                                <span
                                    class="tw-py-1 tw-pl-3 tw-pr-[28px] tw-bg-[#F1F2F4] tw-text-sm tw-text-[#474C54] tw-relative tw-rounded-[30px]">{{ __('search') }}:
                                    {{ request('keyword') }}
                                    <span class="tw-absolute tw-right-[5px] tw-top-[3px] cursor-pointer" onclick="keywordClose()">
                                        <x-svg.tw-close-icon />
                                    </span>
                                </span>
                            @endif
                            @if (request('category'))
                                <span class="tw-py-1 tw-pl-3 tw-pr-[28px] tw-bg-[#F1F2F4] tw-text-sm tw-text-[#474C54] tw-relative tw-rounded-[30px]">{{ __('category') }}: {{ request('category') }}
                                    <span class="tw-absolute tw-right-[5px] tw-top-[3px] cursor-pointer" onclick="jobCategoryClose()">
                                        <x-svg.tw-close-icon />
                                    </span>
                                </span>
                            @endif
                            @if (request('job_type'))
                                <span
                                    class="tw-py-1 tw-pl-3 tw-pr-[28px] tw-bg-[#F1F2F4] tw-text-sm tw-text-[#474C54] tw-relative tw-rounded-[30px]">{{ request('job_type') }}<span
                                        class="tw-absolute tw-right-[5px] tw-top-[3px] cursor-pointer"  onclick="jobTypeClose()">
                                        <x-svg.tw-close-icon />
                                    </span>
                                </span>
                            @endif
                            @if (request('price_min') || request('price_max'))
                                <span
                                    class="tw-py-1 tw-pl-3 tw-pr-[28px] tw-bg-[#F1F2F4] tw-text-sm tw-text-[#474C54] tw-relative tw-rounded-[30px]">{{ __('salary') }}
                                    {{ request('price_min') }} - {{ request('price_max') }}
                                    <span class="tw-absolute tw-right-[5px] tw-top-[3px] cursor-pointer" onclick="jobSalaryClose()">
                                        <x-svg.tw-close-icon />
                                    </span>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <hr class="tw-bg-[#E4E5E8] tw-m-0">
            @endif
            <div class="tw-px-5 tw-pt-5">
                <h2 class="tw-text-sm tw-text-[#0A65CC] tw-mb-2 tw-font-medium">{{ __('category') }}</h2>
                <div class="tw-flex tw-gap-2 tw-items-center tw-py-2">
                    <input {{ request('job_type') ? '' : 'checked' }} type="radio" id="allcategory" class="tw-scale-125" name="category" value="">
                    <label for="allcategory" class="tw-text-sm tw-text-[#18191C] tw-mt-[2px]">{{ __('all_category') }}</label>
                </div>
                @foreach ($categories as $category)
                    <div class="tw-flex tw-gap-2 tw-items-center tw-py-2">
                        <input {{ $category->name == request('category') ? 'checked' : '' }} type="radio"
                            id="{{ $category->name }}_{{ $category->id }}" class="tw-scale-125" name="category"
                            value="{{ $category->name }}">
                        <label for="{{ $category->name }}_{{ $category->id }}"
                            class="tw-text-sm tw-text-[#18191C] tw-mt-[2px]">{{ $category->name }}</label>
                    </div>
                @endforeach
            </div>
            <hr class="tw-bg-[#E4E5E8] tw-m-0">
            <div class="tw-p-5">
                <h2 class="tw-text-sm tw-text-[#0A65CC] tw-mb-2 tw-font-medium">{{ __('job_type') }}</h2>
                @foreach ($jobTypes as $type)
                    <div class="tw-flex tw-gap-2 tw-items-center tw-py-2">
                        <input {{ $type->name == request('job_type') ? 'checked' : '' }} type="radio"
                            id="{{ $type->name }}_{{ $type->id }}" class="tw-scale-125" name="job_type"
                            value="{{ $type->name }}">
                        <label for="{{ $type->name }}_{{ $type->id }}"
                            class="tw-text-sm tw-text-[#18191C] tw-mt-[2px]">{{ $type->name }}</label>
                    </div>
                @endforeach
            </div>
            <hr class="tw-bg-[#E4E5E8] tw-m-0">
            <div class="tw-p-5">
                <h2 class="tw-text-sm tw-text-[#0A65CC] tw-mb-8 tw-font-medium">{{ __('salary') }}</h2>
                <div>
                    <input type="hidden" name="price_min" id="price_min" value="{{ request('price_min') }}">
                    <input type="hidden" name="price_max" id="price_max" value="{{ request('price_max') }}">
                    <div id="priceCollapse" class="accordion-collapse collapse show mt-2" aria-labelledby="priceTag"
                        data-bs-parent="#accordionGroup">
                        <div class="accordion-body list-sidebar__accordion-body">
                            <div class="price-range-slider">
                                <div id="priceRangeSlider"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tw-flex tw-justify-between tw-items-center tw-mb-4">
                    <p class="tw-text-sm tw-text-[#767F8C] tw-mb-0">Min: {{ $currency_symbol }}<span>0</span></p>
                    <p class="tw-text-sm tw-text-[#767F8C] tw-mb-0">Max: {{ $currency_symbol }}<span>{{ round($maxSalary, 0) }}</span></p>
                </div>
                <div class="tw-flex tw-gap-2 tw-items-center tw-py-2">
                    <input {{ request('price_min') == 10 && request('price_max') == 100 ? 'checked':'' }} onclick="changeSalary(10, 100)" type="radio" id="10" class="tw-scale-125" name="salleryRange">
                    <label for="10" class="tw-text-sm tw-text-[#18191C] tw-mt-[2px]">{{ $currency_symbol }}10 - {{ $currency_symbol }}100</label>
                </div>
                <div class="tw-flex tw-gap-2 tw-items-center tw-py-2">
                    <input {{ request('price_min') == 100 && request('price_max') == 1000 ? 'checked':'' }} onclick="changeSalary(100, 1000)" type="radio" id="100" class="tw-scale-125" name="salleryRange">
                    <label for="100" class="tw-text-sm tw-text-[#18191C] tw-mt-[2px]">{{ $currency_symbol }}100 - {{ $currency_symbol }}1,000</label>
                </div>
                <div class="tw-flex tw-gap-2 tw-items-center tw-py-2">
                    <input {{ request('price_min') == 1000 && request('price_max') == 10000 ? 'checked':'' }} onclick="changeSalary(1000, 10000)" type="radio" id="1000" class="tw-scale-125" name="salleryRange">
                    <label for="1000" class="tw-text-sm tw-text-[#18191C] tw-mt-[2px]">{{ $currency_symbol }}1,000 - {{ $currency_symbol }}10,000</label>
                </div>
                <div class="tw-flex tw-gap-2 tw-items-center tw-py-2">
                    <input {{ request('price_min') == 10000 && request('price_max') == 100000 ? 'checked':'' }} onclick="changeSalary(10000, 100000)" type="radio" id="10000" class="tw-scale-125" name="salleryRange">
                    <label for="10000" class="tw-text-sm tw-text-[#18191C] tw-mt-[2px]">{{ $currency_symbol }}10,000 - {{ $currency_symbol }}100,000</label>
                </div>
                <div class="tw-flex tw-gap-2 tw-items-center tw-py-2">
                    <input {{ request('price_min') >= 1000000 && !request('price_max') ? 'checked':'' }} onclick="changeSalary(1000000)" type="radio" id="100000Up" class="tw-scale-125" name="salleryRange">
                    <label for="100000Up" class="tw-text-sm tw-text-[#18191C] tw-mt-[2px]">{{ $currency_symbol }}100,000 Up</label>
                </div>

                <div class="tw-flex tw-justify-between tw-items-center tw-mt-3">
                    <div class="tw-flex tw-items-center tw-w-full ">

                        <label for="remote" class="tw-flex tw-items-center tw-cursor-pointer">
                            <!-- toggle -->
                            <div class="tw-relative remote-toggle">
                                <!-- input -->
                                <input type="checkbox" id="remote" class="tw-sr-only" value="1"
                                    name="is_remote" {{ request('is_remote') ? 'checked' : '' }}>
                                <!-- line -->
                                <div class="tw-block tw-bg-[#E4E5E8] tw-w-10 tw-h-[22px] tw-rounded-full"></div>
                                <!-- dot -->
                                <div
                                    class="dot tw-absolute tw-left-1 tw-top-1 tw-bg-white tw-w-3.5 tw-h-3.5 tw-rounded-full tw-transition">
                                </div>
                            </div>
                            <!-- label -->
                            <div class="tw-ml-3 tw-text-gray-700 tw-font-medium">
                                {{ __('remote_job') }}
                            </div>
                        </label>

                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary tw-inline-block">Apply Filter</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('frontend_scripts')
    <script>
        function keywordClose() {
            $('input[name="keyword"]').val('');
            $('#job_search_form').submit();
        }

        function jobCategoryClose() {
            $('input[name="category"]').val('');
            $('#job_search_form').submit();
        }

        function jobTypeClose() {
            $('input[name="job_type"]').val('');
            $('#job_search_form').submit();
        }

        function jobSalaryClose() {
            $('input[name="price_min"]').val('');
            $('input[name="price_max"]').val('');
            $('#job_search_form').submit();
        }

        function changeSalary(minsalary, maxsalary){
            if (minsalary && maxsalary) {
                $('#price_min').val(minsalary)
                $('#price_max').val(maxsalary)
            }else if(minsalary && !maxsalary){
                $('#price_min').val(minsalary)
                $('#price_max').val('')
            }
        }

        function changeFilter() {
            const slider = document.getElementById('priceRangeSlider')
            const value = slider.noUiSlider.get(true);
            document.getElementById('price_min').value = value[0]
            document.getElementById('price_max').value = value[1]
            const form = $('#job_search_form')
            const data = form.serializeArray();
            // $('#job_search_form').submit()
        }

        function setDefaultPriceRangeValue() {
            const slider = document.getElementById('priceRangeSlider')
            slider.noUiSlider.set([{{ request('price_min') }}, {{ request('price_max') }}]);
        }

        $(document).ready(function() {
            const slider = document.getElementById('priceRangeSlider')
            let maxRange = Number.parseInt("{{ $maxSalary ?? 500 }}")
            let minPrice = 0;
            let maxPrice = maxRange;
            @if (request()->has('price_min') && request()->has('price_max'))
                minPrice = Number.parseInt("{{ request('price_min', 0) }}")
                maxPrice = Number.parseInt("{{ request('price_max', $maxSalary) }}")
            @endif
            noUiSlider.create(slider, {
                start: [minPrice, maxPrice],
                connect: true,
                range: {
                    min: [0],
                    max: [maxRange],
                },
                format: wNumb({
                    decimals: 0,
                    thousand: ',',
                    suffix: ' ({{ $currency_symbol }})',
                }),
                tooltips: true,
                orientation: 'horizontal',
            });

            slider.noUiSlider.on('change', function() {
                changeFilter();
            });

        });
    </script>
@endpush
