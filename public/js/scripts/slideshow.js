var slideshow = {
    
    delay: 8000, 

    
    container: null, 
    caption: null, 
    slides: [], 
    current: 0, 
    timer: null, 

    start: function () {
       

       
        slideshow.container = document.getElementById("slides");
        slideshow.caption = document.getElementById("slide-caption");

        
        let all = slideshow.container.getElementsByTagName("img");
        if (all.length > 0) {
            for (let slide of all) {
                slideshow.slides.push({
                    src: slide.src,
                    caption: slide.dataset.caption
                });
            }

           
            document.getElementById("slide-left").addEventListener("click", slideshow.prev);
            document.getElementById("slide-right").addEventListener("click", slideshow.next);

          
            slideshow.draw();
        }
    },

    draw: function () {
      

        
        var next = document.createElement("img");
        next.src = slideshow.slides[slideshow.current].src;
        next.classList.add("ninja");
        slideshow.container.innerHTML = "";
        slideshow.container.appendChild(next);

     
        setTimeout(function () {
            next.classList.remove("ninja");
        }, 1);

       
        slideshow.caption.innerHTML = slideshow.slides[slideshow.current].caption;

      
        slideshow.timer = setTimeout(slideshow.next, slideshow.delay);
    },

    next: function () {
      

       
        if (slideshow.timer != null) {
            clearTimeout(slideshow.timer);
            slideshow.timer = null;
        }

      
        slideshow.current++;

      
        if (slideshow.current == slideshow.slides.length) {
            slideshow.current = 0;
        }
        slideshow.draw();
    },

    prev: function () {


     
        if (slideshow.timer != null) {
            clearTimeout(slideshow.timer);
            slideshow.timer = null;
        }

     
        slideshow.current--;

      
        if (slideshow.current < 0) {
            slideshow.current = slideshow.slides.length - 1;
        }
        slideshow.draw();
    }
};


window.addEventListener("load", slideshow.start);

// Adaptare dupa https://codepen.io/maheshambure21/pen/qZZrxy
