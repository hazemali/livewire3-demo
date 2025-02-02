<div class="border border-[rgba(255, 255, 255, 1)] rounded h-11 w-[528px] ">
    <label for="search" class="h-full mx-1 flex items-center justify-between  ">
        <input id="search"
               wire:model.live.debounce.500ms="searchTerm"
               class="ml-2 w-full flex-1  text-sm text-info outline-none"
               placeholder="Search"
               autocomplete="off"
        />
        <div class="mr-2">
            <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M18.1123 17.5L13.1123 12.5M14.779 8.33333C14.779 11.555 12.1673 14.1667 8.94564 14.1667C5.72398 14.1667 3.1123 11.555 3.1123 8.33333C3.1123 5.11167 5.72398 2.5 8.94564 2.5C12.1673 2.5 14.779 5.11167 14.779 8.33333Z"
                    stroke="#171717" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>

        </div>
    </label>
</div>
