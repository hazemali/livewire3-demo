<div>

    @if($modalIsOpen)
        <div>
            <div class="fixed bg-black opacity-95 w-screen h-screen top-0 left-0"></div>
            <div class="fixed z-10 rounded  w-[900px]  bg-white top-20 left-1/2 transform -translate-x-1/2"
                 x-on:click.away="if($wire.modalIsOpen) $wire.closeModal()">

                <div class="flex w-full p-5  justify-end" wire:click="closeModal">
                    <div class="cursor-pointer absolute">
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 15.2712L15 5.27124M5 5.27124L15 15.2712" stroke="#171717" stroke-width="1.5"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>


                <form wire:submit="save">
                    <div>
                        <h1 class="text-3xl m-7 font-[500]">Sell an item</h1>
                        <div class="overflow-y-scroll h-[500px] 4xl:h-[700px]">

                            <div class="mt-2 mx-7">

                                <div>
                                    <label for="image_cover" class="text-sm font-light">
                                        Upload photos
                                    </label>
                                    <div class="rounded mt-1 h-56 flex flex-col justify-center items-center border">

                                        @if ($image_cover)
                                            <div class="w-40 h-40 overflow-hidden rounded">
                                                <img src="{{ $image_cover->temporaryUrl() }}" class="mb-2"/>
                                            </div>
                                        @endif

                                        @error('image_cover')
                                        <div class="error">{{ $message }}</div>
                                        @enderror

                                        <button x-on:click="document.getElementById('image_cover').click()"
                                                class="primary-border rounded h-11 w-32 flex justify-center items-center">
                                            Upload photo
                                        </button>

                                        <input type="file" accept="image/png,image/jpg,image/jpeg" id="image_cover"
                                               wire:model.live="image_cover" class="hidden"/>


                                    </div>
                                </div>

                                <div class="mt-4">
                                    <label class="text-sm font-light" for="title">
                                        Title
                                    </label>
                                    <div class="mt-1">
                                        <input
                                            wire:model.live.debounce.500ms="title"
                                            id="title"
                                            class="px-1 w-full  text-sm text-info outline-none border border-[rgba(255, 255, 255, 1)] rounded h-11"
                                        />
                                    </div>

                                    @error('title')
                                    <div class="error">{{ $message }}</div>
                                    @enderror

                                </div>

                                <div class="mt-4">
                                    <label class="text-sm font-light" for="description">
                                        Describe your item
                                    </label>

                                    <div class="text-sm mt-1 text-info  border
                                        border-[rgba(255, 255, 255, 1)] rounded w-full">
                                        <textarea
                                            id="description"
                                            class="px-1 resize-none outline-none"
                                            autocomplete="off"
                                            rows="7"
                                            wire:model="description"
                                            wire:key="description"
                                        ></textarea>
                                    </div>
                                    @error('description')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mt-4">
                                    Category
                                    <div class="mt-1">
                                        <livewire:drop-down-menu
                                            wire:key="selectCategories"
                                            :options="$categories"
                                            @updated="updateCategory($event.detail.value)"
                                        />
                                    </div>
                                    @error('category_id')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mt-4">
                                    <label class="text-sm font-light" for="title">
                                        Item price
                                    </label>
                                    <div
                                        class="mt-1 px-1 w-full  text-sm text-info outline-none border border-[rgba(255, 255, 255, 1)] rounded flex items-center">

                                        <label for="price">
                                            <svg class="mr-3" width="20" height="21" viewBox="0 0 20 21" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.125 6.87463C14.125 5.35585 12.8938 4.12463 11.375 4.12463C9.85622 4.12463 8.625 5.35585 8.625 6.87463V13.7496C8.625 15.2684 7.39378 16.4996 5.875 16.4996H14.125M5.875 10.9996H11.375"
                                                    stroke="#171717" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"/>
                                            </svg>
                                        </label>

                                        <input
                                            wire:model.live="price"
                                            id="price"
                                            placeholder="00.00"
                                            type="number"
                                            min="0"
                                            class="px-1  placeholder-[rgba(163, 163, 163, 1)] w-full text-right text-sm text-info outline-none h-11"
                                        />

                                    </div>

                                    @error('price')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>


                            </div>

                        </div>
                        <div class="mt-4 mb-4 mx-7">
                            <button type="submit" class="w-full rounded h-11 sell-button-bg text-sm">Upload item
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
