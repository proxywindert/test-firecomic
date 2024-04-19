@foreach($relations as $relation)
    <a href="{{ route('comic-info',['comic_code'=>$relation->comic_code]) }}" class="skeleton-loader comic">
        <div class="skeleton-bg-content"
             style="background:{{ $relation->skeleton_bg_color }}"></div>
        <div class="skeleton-tranfer-bg" style="{{ $relation->tranfer_color }}">
        </div>
        <picture class="bg-content-comic">
            <img
                class="lazyload"
{{--                src="{!! $relation->link_bg?getLinkSpinImg():'' !!}"--}}
                data-src="{!! $relation->link_bg !!}"
                alt="">
        </picture>
        <picture class="comic-avatar">
            <img
                class="lazyload"
{{--                src="{!! $relation->link_avatar?getLinkSpinImg():'' !!}"--}}
                data-src="{!! $relation->link_avatar !!}"
                alt="">
        </picture>
        <div class="tranfer-comic"
             style="{{ $relation->tranfer_color }}">
        </div>
        <div class="comic-name">
            <img
                class="lazyload"
{{--                src="{!! $relation->link_comic_small_name?getLinkSpinImg():'' !!}"--}}
                data-src="{!! $relation->link_comic_small_name !!}"
                alt="">
        </div>


{{--        <div class="extend-info">--}}
{{--            <span class="label-free-span bg-color-yellow"> miễn phí</span>--}}
{{--        </div>--}}
    </a>
@endforeach

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let lazyImageObserver;
        lazyImageObserver = new IntersectionObserver(function (entries, observer) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    try {
                        let lazyImage = entry.target;
                        let lazyImages = lazyImage.querySelectorAll('img[class^=lazyload]')
                        let loadedImages = 0;
                        lazyImages.forEach(item => {
                            item.src = item.dataset.src;
                            item.removeAttribute('data-src');
                            item.addEventListener('load', (inner) => {
                                loadedImages++;
                                if (loadedImages === lazyImages.length) {
                                    let bg_content = lazyImage.querySelector('div[class="skeleton-bg-content"]')
                                    let tranfer_anchor = lazyImage.querySelector('div[class="skeleton-tranfer-bg"]')
                                    lazyImage.removeChild(bg_content)
                                    lazyImage.removeChild(tranfer_anchor)

                                    lazyImage.classList.remove("skeleton-loader");
                                  \
                                }
                            });
                        })
                        lazyImageObserver.unobserve(lazyImage);
                    } catch (e) {

                    }

                }
            });
        }, {
            root: null, // Quan sát theo viewport
            rootMargin: '0px', // Không có margin xung quanh phần tử gốc
            threshold: 0.1 // Kích hoạt sự kiện khi phần tử hiển thị ít nhất 10% trong vùng nhìn thấy
        });

        let imgs = document.querySelectorAll('.image-list a[class^=skeleton-loader]')
        imgs.forEach((item) => {
            lazyImageObserver.observe(item);
        })

        new IOlazy({
            image: 'img',
            threshold: 0.1,
        });
    });
</script>
