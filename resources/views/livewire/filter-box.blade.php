<div class="flex justify-between items-center ">

    <div class="flex gap-2">
        <livewire:searchBox key="search-box"/>
        <div class="w-44">
            <livewire:drop-down-menu
                @updated="$dispatch('filtersChanged',{'key': 'category_id' , 'value': $event.detail.value})"
                key="drop-down-menu" :options="$categories"/>
        </div>

    </div>
    <div class="w-[528px] justify-end flex gap-3 ">

        <livewire:sort-by-box key="sort-by"/>
        <div
            wire:click="$dispatch('openModal')"
            class="flex w-32 rounded cursor-pointer font-light gap-2.5 sell-button-bg justify-center items-center px- h-11">

            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.99967 3.33337V16.6667M16.6663 10L3.33301 10" stroke="#171717" stroke-width="1.5"
                      stroke-linecap="round" stroke-linejoin="round"/>
            </svg>

            <div class="font-[300]">
                Sell item
            </div>
        </div>

    </div>

</div>
