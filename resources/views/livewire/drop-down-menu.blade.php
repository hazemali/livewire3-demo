<div class="relative">
    <button
        id="listbox-label"
        wire:click="$toggle('openDropDown')"
        type="button"
        class="relative w-full h-11 cursor-default rounded-md bg-white py-1.5  pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm sm:leading-6"
        aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                 <span class="flex items-center {{empty($selectedOption['title']) ? 'text-opacity-60' : ''}}">
                      <span class="ml-3 block truncate">

                            {{$selectedOption['title'] ?? 'Select' }}

                     </span>
                 </span>
        <span class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">

                    <svg width="21" class="{{$openDropDown ? 'rotate-180' : ''}}" height="20" viewBox="0 0 21 20"
                         fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.2233 7.5L10.39 13.3333L4.55664 7.5" stroke="#171717" stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"/>
                        </svg>
            </span>
    </button>

        <div class="{{!$openDropDown ? 'hidden' : ''}}
                    absolute z-10 mt-1 max-h-56 w-48 overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
             tabindex="-1" role="listbox" aria-labelledby="listbox-label"
             aria-activedescendant="listbox-option-3"
             x-on:click.away="() =>{if($wire.openDropDown) {$wire.openDropDown = false; $wire.$refresh();}}"
        >

            @foreach($options as $key => $option)
                <div
                    class="{{$option['value'] === $selectedOption['value'] ? 'text-opacity-100': 'text-opacity-60'}} relative font-light  cursor-default select-none py-2 pl-3 pr-9 text-gray-900 hover:bg-gray-100"
                    role="option"
                    wire:click="select('{{$option['value']}}')"
                    wire:key="option-{{$option['value']}}"
                >
                    <div class="flex items-center" wire:key="option-div-{{$option['value']}}">
                            <span class="ml-3 block truncate font-normal"
                                  wire:key="option-div-span-{{$option['value']}}">{{$option['title']}}</span>
                    </div>
                </div>
            @endforeach

        </div>

</div>

