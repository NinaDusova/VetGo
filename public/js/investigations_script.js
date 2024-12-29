document.addEventListener('DOMContentLoaded', function () {
    const circles = document.querySelectorAll('.circle');
    const investigationContainers = document.querySelectorAll('.investigation-container');
    const circleWrapper = document.querySelector('.circle-wrapper');

    circles.forEach((circle, index) => {
        circle.addEventListener('click', () => {
            investigationContainers.forEach(container => {
                container.style.display = 'none';
                container.querySelectorAll('.information').forEach(info => {
                    info.classList.remove('visible'); // Reset animácie
                });
            });

            const target = document.querySelector(`#investigations-pet-${index}`);
            if (target) {
                target.style.display = 'block';

                const informationItems = target.querySelectorAll('.information');
                informationItems.forEach((info, i) => {
                    setTimeout(() => {
                        info.classList.add('visible');
                    }, i * 100); // Interval medzi záznamami
                });
            }

            const selectedCircle = circleWrapper.removeChild(circle);
            circleWrapper.insertBefore(selectedCircle, circleWrapper.firstChild);
        });
    });
});
