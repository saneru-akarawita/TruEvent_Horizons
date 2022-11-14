const toast = document.querySelector(".statusToast");
const title = document.querySelector(".statusToast span");
const subtitle = document.querySelector(".statusToast p");
const toastCloseBtn =  document.querySelector(".statusToast .close-icon");


function displayToast(state, titleText, subtitleText){
    let btnVisible = 1;
    title.innerText = titleText;
    subtitle.innerText = subtitleText;

    if(state == 1){
        toastState = "success";
    }
    else{
        toastState = "error";
    }
    toast.classList.add(toastState);
    toast.classList.remove("hide");
    toast.classList.add("show");

    toastCloseBtn.onclick = ()=>{
        closeToast(toastState);
        btnVisible = 0;
    }
    
    if(btnVisible == 1){
        setTimeout(()=>{
            closeToast(toastState);
        }, 5000);
    }
}

function closeToast(toastState) {
    toast.classList.add("hide");
    toast.classList.remove("show");
    setTimeout(()=>{
        toast.classList.remove("hide");
        toast.classList.remove(toastState);
    }, 800);     
}