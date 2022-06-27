let slider = Array.from(document.querySelectorAll(".properties .properties-list"));
$hero = $(".hero .content");
$nav = $(".navbar-expand-lg");
let isDown = false;
let startX;
let scrollLeft;

slider.map(slide => {
    slide.addEventListener('mousedown', (e) => {
        isDown = true;
        slide.classList.add('active');
        startX = e.pageX - slide.offsetLeft;
        scrollLeft = slide.scrollLeft;
    });
    slide.addEventListener('mouseleave', () => {
        isDown = false;
        slide.classList.remove('active');
    });
    slide.addEventListener('mouseup', () => {
        isDown = false;
        slide.classList.remove('active');
    });
    slide.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        let x = e.pageX - slide.offsetLeft;
        let walk = (x - startX) * 1;
        slide.scrollLeft = scrollLeft - walk;
    });
});
