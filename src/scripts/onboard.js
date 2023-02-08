let current_slide = 0;
const slides = ["slide-1", "slide-2", "slide-3", "slide-4"];



function next(){
    document.getElementById(slides[current_slide]).style.display = "none"
    current_slide++;
    document.getElementById(slides[current_slide]).style.display = "block"

    if (current_slide == slides.length-1) {
        console.log("Last Slide")

        document.getElementById("next-button").style.display = "none"
    }
    
    
}