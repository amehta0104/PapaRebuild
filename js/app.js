const targets = document.querySelectorAll("img");
const headers = document.querySelectorAll(".display-2");
const icon = document.querySelectorAll("i");
const socialBar = document.getElementById("social_icons_list");
const h3 = document.querySelectorAll("h3");

function mouseOver() {
   
let ff;


let i=1


for(let i = 1 ; i < socialBar.children.length; i++){


    const selectedIcon = socialBar.children[i];


    selectedIcon.addEventListener('mouseover',() => {

        clearTimeout(ff);
            gg = setTimeout(() => {

                animateIcon(selectedIcon);

            }, 50);




        });


        for(let j = 1 ; j < socialBar.children.length; j++){
            const selectedIcon = socialBar.children[j];
        selectedIcon.addEventListener('mouseleave',() => {
clearTimeout(gg);

            ff = setTimeout(() => {

                removeIcon(selectedIcon);

            }, 300);




        });





    }

}
}


function animateIcon(entry){

  
           
            entry.classList.add("fa-beat-fade");
            entry.style.cssText = "--fa-animation-timing: ease; --fa-animation-duration: 1.5s; --fa-animation-iteration-count: 3;  ";
           
     


   


}

function removeIcon(entry) {
    
 
        
   
       entry.classList.remove("fa-beat-fade");
    
     
     
    

    }


const lazyLoad = (target)=>{
  const io = new IntersectionObserver((entries,observer)=>{
      entries.forEach(entry=>{
          if(entry.isIntersecting){
              const img=entry.target;
             
              

            
              img.classList.add("fade");
              observer.disconnect();
          }
      })
  },{threshold:[0.5]});

  io.observe(target);
}

const translatex = (target)=>{
    const io = new IntersectionObserver((entries,observer)=>{
        entries.forEach(entry=>{
            if(entry.isIntersecting){
                const header=entry.target;
                
  
              
                header.classList.add("translatex");
              
                observer.disconnect();
            }
        })
    },{threshold:[0.5]});
  
    io.observe(target);
  }

  const translatey = (target)=>{
    const io = new IntersectionObserver((entries,observer)=>{
        entries.forEach(entry=>{
            if(entry.isIntersecting){
                const icon=entry.target;
                
  
              
                icon.classList.add("delay-1");
                
                observer.disconnect();
            }
        })
    },{threshold:[0.5]});
  
    io.observe(target);
  }
targets.forEach(lazyLoad);
h3.forEach(lazyLoad);

headers.forEach(translatex);
icon.forEach(translatey);



document.addEventListener('DOMContentLoaded', mouseOver);