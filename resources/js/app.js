const menuToggle = document.querySelector('[data-menu-toggle]');
const menu = document.querySelector('[data-menu]');

if (menuToggle && menu) {
    menuToggle.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
}

const slider = document.querySelector('[data-testimonial-slider]');
if (slider) {
    const track = slider.querySelector('[data-testimonial-track]');
    const dots = Array.from(slider.querySelectorAll('[data-testimonial-dots] button'));
    let index = 0;

    const update = () => {
        track.style.transform = `translateX(-${index * 100}%)`;
        dots.forEach((dot, i) => {
            dot.classList.toggle('bg-emerald-600', i === index);
            dot.classList.toggle('bg-midnight-200', i !== index);
        });
    };

    dots.forEach((dot, i) => {
        dot.addEventListener('click', () => {
            index = i;
            update();
        });
    });

    update();
    if (dots.length > 1) {
        setInterval(() => {
            index = (index + 1) % dots.length;
            update();
        }, 6000);
    }
}
