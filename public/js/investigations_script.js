document.addEventListener('DOMContentLoaded', function () {
    const circles = document.querySelectorAll('.circle');
    const investigationContainers = document.querySelectorAll('.investigation-container');

    circles.forEach((circle, index) => {
        circle.addEventListener('click', () => {
            investigationContainers.forEach(container => container.style.display = 'none');

            const target = document.querySelector(`#investigations-pet-${index}`);
            if (target) {
                target.style.display = 'block';
            }
        });
    });
});
