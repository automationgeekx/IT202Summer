function flash(message = "", color = "info") {
    let flash = document.getElementById("flash");
    //create a div (or whatever wrapper we want)
    let outerDiv = document.createElement("div");
    outerDiv.className = "row justify-content-center";
    let innerDiv = document.createElement("div");

    //apply the CSS (these are bootstrap classes which we'll learn later)
    innerDiv.className = `alert alert-${color}`;
    //set the content
    innerDiv.innerText = message;

    outerDiv.appendChild(innerDiv);
    //add the element to the DOM (if we don't it merely exists in memory)
    flash.appendChild(outerDiv);

    clear();
}

let timeout = null;
function clear () {
    let flash = document.getElementById("flash");
    if (!timeout && flash)
    {
        timeout = setTimeout(() => {
            console.log("clearing");
            if (flash.children.length > 0)
            {
                flash.children[0].remove();
            }
            timeout = null;
            if (flash.children.length > 0)  {
                clear();
            }

        }, 2500);
    }
}
window.addEventListener("load", () => setTimeout(clear(), 100));