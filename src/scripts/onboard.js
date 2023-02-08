let current_slide = 0;
const slides = ["slide-1", "slide-2", "slide-3"];

function next(){
    document.getElementById(slides[current_slide]).style.display = "none"
    current_slide++;
    if (current_slide > slides.length) {
        console.log("ALL Done")
        document.getElementById("slides-container").style.display = "none"

    } else {
        document.getElementById(slides[current_slide]).style.display = "block"
    }
    
}