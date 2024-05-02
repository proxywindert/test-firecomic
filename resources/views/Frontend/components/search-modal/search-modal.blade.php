
<div class="uk-modal-full uk-modal" data-uk-modal="" id="search_modal" style="display: none;">
    <div class="uk-modal-dialog uk-flex uk-flex-center uk-flex-middle" data-uk-height-viewport=""
         style="min-height: calc(100vh);">
        <button id="close-search-modal" class="uk-modal-close-full uk-close uk-icon" data-uk-close="">
            <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" data-svg="close-icon">
                <line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"></line>
                <line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"></line>
            </svg>
        </button>
        <form action="{!! route('search') !!}" class="uk-search uk-search-large uk-padding-small-left uk-padding-small-right">
            <div class="uk-width-1-1 uk-inline">
                <button class="uk-form-icon uk-form-icon-flip uk-icon" data-uk-icon="icon:search;ratio:2" type="submit">
                    <svg width="40" height="40" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                         data-svg="search">
                        <circle fill="none" stroke="#000" stroke-width="1.1" cx="9" cy="9" r="7"></circle>
                        <path fill="none" stroke="#000" stroke-width="1.1" d="M14,14 L18,18 L14,14 Z"></path>
                    </svg>
                </button>
                <input autocomplete="off" autofocus="" class="uk-search-input" placeholder="Search" value="" name="keyword"
                       type="search"></div>
        </form>
    </div>
</div>
