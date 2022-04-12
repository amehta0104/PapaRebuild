const targets = document.querySelectorAll("img");
const headers = document.querySelectorAll(".display-2");
const icon = document.querySelectorAll("i");
const socialBar = document.getElementById("social_icons_list");
const h3 = document.querySelectorAll("h3");

var imageFiles = '/images/';


console.log(imageFiles);


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



