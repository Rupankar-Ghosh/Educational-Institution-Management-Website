   console.log(2);
        console.error("Error");
        console.warn("Warning");

        s=document.querySelector("#a");
        console.log(s);
        s.style.background="black";
        s.style.color="rgb(255, 213, 0)";

        function clickjs(a){
            s=document.querySelector(a);
            s.style.color="white";
        }

        a.addEventListener("click", function(){console.log("c");})
        a.addEventListener("mouseover", function(){console.log("toutch");})


    
