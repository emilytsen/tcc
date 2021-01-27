var flexSliderXDown = null;
var flexSliderYDown = null;

var FlexSlider = class
{
    static onTouchStart(event)
    {
        flexSliderXDown = event.touches[0].clientX;
        flexSliderYDown = event.touches[0].clientY;
    };

    static onTouchMove(event)
    {
        if (! flexSliderXDown || ! flexSliderYDown) return;

        let  xUp = event.touches[0].clientX;
        let  yUp = event.touches[0].clientY;
        let  xDiff = flexSliderXDown - xUp;
        let  yDiff = flexSliderYDown - yUp;

        if (xDiff > 0) {
            event.currentTarget.querySelector(".flexSliderBtnNext").click();
        } else if(xDiff < 0) {
            event.currentTarget.querySelector(".flexSliderBtnBack").click();
        }

        flexSliderXDown = null;
        flexSliderYDown = null;
    };

    static back(btn)
    {
        FlexSlider.move(btn, 'left');
    }

    static next(btn)
    {
        FlexSlider.move(btn, 'right');
    }

    static move(btn, direction)
    {
        let flexSlider = btn.parentNode;
        let flexSliderBody = flexSlider.querySelector('.flexSliderBody');

        let distance = flexSlider.offsetWidth;
        let isLastSlide = (flexSliderBody.scrollLeft >= (flexSliderBody.scrollWidth - flexSlider.offsetWidth));
        let isFirstSlide = (flexSliderBody.scrollLeft === 0);

        if(isFirstSlide && direction === 'left') {
            flexSliderBody.scroll({
                left: flexSliderBody.scrollWidth - flexSlider.offsetWidth,
                behavior: 'smooth'
            });

            FlexSlider.changeActiveDot(flexSlider, 'last');
            return;
        }

        if(isLastSlide && direction === 'right') {
            flexSliderBody.scroll({
                left: 0,
                behavior: 'smooth'
            });

            FlexSlider.changeActiveDot(flexSlider, 'first');
            return;
        }

        if(direction === 'left') distance = -(distance);

        flexSliderBody.scrollBy({
            left: distance,
            behavior: 'smooth'
        });

        FlexSlider.changeActiveDot(flexSlider, direction);
    }

    static changeActiveDot(flexSlider, direction)
    {
        if(typeof flexSlider === 'string') flexSlider = document.querySelector(flexSlider);
        if(! flexSlider || !direction) return false;

        let flexSliderDots = flexSlider.querySelector('.flexSliderDots');
        if(! flexSliderDots) return false;

        let allDots = flexSliderDots.querySelectorAll('.dot');

        let indexDot = 0;
        let indexActive = 0;

        for(let dot of allDots) {
            if(dot.classList.contains('active')) {
                indexActive = indexDot;
                dot.classList.remove('active');
            }
            indexDot++;
        }

        let dotNewActive = null;

        if(direction === 'first') {
            dotNewActive = flexSliderDots.querySelector(".dot:nth-child(1)");
        }

        if(direction === 'last') {
            dotNewActive = flexSliderDots.querySelector(".dot:nth-child("+ allDots.length +")");
        }

        if(direction === 'right' || direction === 'left') {
            let indexNewActive = (direction === 'right') ? (indexActive + 1) : (indexActive - 1);
            dotNewActive = flexSliderDots.querySelector(".dot:nth-child("+ (indexNewActive + 1) +")");
        }

        if(dotNewActive) dotNewActive.classList.add('active');
    }

    static startAutoSlide(target, milisseconds)
    {
        if(typeof target === 'string') target = document.querySelector(target);
        if(! target) return false;

        let flexSliderBtnNext = target.querySelector('.flexSliderBtnNext');
        if(! flexSliderBtnNext) return false;

        let intervalId = setInterval(function() {
            FlexSlider.next(target.querySelector('.flexSliderBtnNext'));
        }, milisseconds);

        flexSliderBtnNext.addEventListener('click', function() { clearInterval(intervalId); });
    }
};
