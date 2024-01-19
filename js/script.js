
// INDEX code #######################################################
const startSwiper = () =>{
    // SWIPER code #########################################
    const swiper = new Swiper('.swiper', {
        direction: 'horizontal',
        effect: 'cards',
        // loop: true,
    
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    
        navigation:{
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    
        autoplay:{
            delay: 2000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
    
    });
    // swiper.start();

    // DROPDOWNMENU code #########################################
    dropDownMenu();
    
}

const dropDownMenu = () =>{
    var subMenu = document.querySelectorAll('.submenu');
    var openSubMenu = document.querySelectorAll('.open-submenu');

    
    openSubMenu.forEach(element => {
        element.addEventListener('click', function(){
            subMenu.forEach(element2 => {
                element2.classList.toggle('show');
            });
        });
    });

    // openSubMenu.addEventListener('click', function(){
    //     subMenu.classList.toggle('show');
    // }); 
    document.addEventListener('click', function(e){

        for (let i = 0; i < subMenu.length; i++) {
            if(subMenu[i].classList.contains('show') && !subMenu[i].contains(e.target) && !openSubMenu[i].contains(e.target)){
                subMenu[i].classList.remove('show');
            }
        }

        // if(subMenu[1].classList.contains('show') && !subMenu[1].contains(e.target) && !openSubMenu[1].contains(e.target)){
        //     subMenu[1].classList.remove('show');
        // }
    })
}

// USER PROFILE
const userProfile = () =>{
    dropDownMenu();

    const image = document.getElementById('uploadPreview');
    const inputImage = document.getElementById('inputbox-i');

    const btnEdit = document.getElementById('edit-profile');
    const cancelEdit = document.getElementById('cancel-edit');
    const btnSave = document.getElementById('save-profile');
    const btnLogout = document.getElementById('close-session');
    let ids = ['inputbox-i','inputbox-0', 'inputbox-1', 'inputbox-2', 'inputbox-3', 'inputbox-4', 'inputbox-5'];
    let inputArray = [];
    ids.forEach(id =>{
        inputArray.push(document.getElementById(id));
    });
    
    const hidde = (isHidde) =>{
        cancelEdit.hidden = isHidde;
        btnSave.hidden = isHidde;
        btnLogout.hidden = !isHidde;
        btnEdit.hidden = !isHidde;
        inputArray.forEach(element => {
            element.hidden = isHidde;
        });
    }
    const show = (isHidde) =>{
        cancelEdit.hidden = isHidde;
        btnSave.hidden = isHidde;
        btnLogout.hidden = !isHidde;
        btnEdit.hidden = !isHidde;
        
        inputArray.forEach(element =>{
            element.hidden = isHidde;
        });
    }
    hidde(true);
    btnEdit.addEventListener('click', ()=>{
        show(false);
    });
    cancelEdit.addEventListener('click', ()=>{
        hidde(true);
    });
    inputImage.addEventListener('change', ()=>{
        // image.style.display = 'block';
        image.src = URL.createObjectURL(inputImage.files[0]);   
    });
    
    
}

// ABOUT US
const aboutUs = () =>{
    dropDownMenu();
}

// CONTACT US
const contactUs = () =>{
    dropDownMenu();
}

// TUTORIAL
const tutorials = () =>{
    dropDownMenu();
}

// UNIDAD 1
const unity = () =>{
    dropDownMenu();
}

// REGISTRO
const signup = () =>{
    dropDownMenu();
    const image = document.getElementById('uploadPreview');
    const inputImage = document.getElementById('image-upload');

    inputImage.addEventListener('change', ()=>{
        image.style.display = 'block';
        image.src = URL.createObjectURL(inputImage.files[0]);   
    });


}

// RECUPERAR CLAVE
const forgotPass = () =>{
    dropDownMenu();
}