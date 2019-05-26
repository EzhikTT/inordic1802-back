const images = [
    "./photos/top.jpg",
    "./images/2_02.jpg",
    "./images/2_04.jpg"
];

// Отрисовка элементов слайдера
for (let image of images) {

    const div = document.createElement('div');

    div.className = 'img slider_img'; // document.getElementByClassName()

    const img = document.createElement('img');

    img.src = image;

    div.appendChild(img);

    document.getElementById('data_images').appendChild(div);
}


$(document).ready(function () {

    const left = $('.slider_arrow.left');
    const right = $('.slider_arrow.right');

    const slider = $('.slider .images');

    let slideNum = 0; // Индекс текущего слайда

    right.on('click', function ( e ) {

        if (slideNum < images.length) {

            left.removeClass('inactive');

            if (slideNum >= images.length - 1) {

                const div = document.createElement('div');
                div.className = 'img';

                const img = document.createElement('img');
                img.src = images[slideNum - 2];

                div.appendChild(img);

                images.push(images[slideNum - 2]);

                $('.slider .images .data').css('width', `${images.length * 100}%`);

                document.getElementById('data_images').appendChild(div);
            }

            const translate = slider[0].clientWidth * ++slideNum * -1;

            slider.css(
                'transform',
                `translate(${translate}px)`
            );
        }
    });

    left.on('click', function ( e ) {

        if (slideNum >= 0) {

            right.removeClass('inactive');

            if (slideNum <= 0) {

                slideNum = images.length - 1;

            } else {

                slideNum--;
            }

            const translate = slider[0].clientWidth * slideNum;

            slider.css(
                'transform',
                `translate(-${translate}px)`
            );
        }
    });
});







