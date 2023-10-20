

/*
Desktop Main Navigation Sub-Menu System
*/

const allSubMenuButtons = document.querySelectorAll('.site-header .menu-main-nav-container .sub-menu li');

// Add listeners (hover) to each button
for(let menuBtnI = 0; menuBtnI < allSubMenuButtons.length; menuBtnI++){
    const btn = allSubMenuButtons[menuBtnI];

    btn.addEventListener('mouseover', (evt)=>{
        // Revert all btns
        resetSubMenus();

        const currentLI = evt.target.parentElement;

        if(currentLI.classList.contains('sub-menu') === false){
            iterateMenu(currentLI);
        }
        

    });
}

const formatForGoogleQuery = (query) => {
    const encodedQuery = encodeURIComponent(query);


    // Replace spaces with '+'
    return encodedQuery.replace(/%20/g, '+');
}

const activateDesktopSearch = () => {
    const searchBtnContainer = document.querySelector('header .secondary-navigation #top-secondary-menu .search-btn');
    const searchBtn = document.querySelector('header .secondary-navigation #top-secondary-menu .search-btn a');

    // Add Search bar to container
    const sbarContainer = document.createElement('div');
    sbarContainer.classList.add('input-container');
    searchBtnContainer.append(sbarContainer);

    // Input field
    const sbar = document.createElement('input');
    sbar.classList.add('input-bar');

    sbarContainer.append(sbar);


    // Close btn
    const closeBtn = document.createElement('div');
    closeBtn.classList.add('close-btn');

    sbarContainer.append(closeBtn);



    // Use search functionality
    let toggled = false;

    function onKeydown(evt){
        if(evt.keyCode === 13){
            onSearch();
        }

    }

    function onSearch(){
        // Check if string length > 0
        if(sbar.value.length > 0){

            window.open('/?s=' + formatForGoogleQuery(sbar.value), '_self');
        }else{
            searchBtnContainer.classList.remove('on');
        }

        document.removeEventListener('keydown', onKeydown);

        toggled = false;
    }

    searchBtn.addEventListener('click', (evt) => {
        evt.preventDefault();


        if(toggled === true){
            toggled = false;
            searchBtnContainer.classList.remove('on');
        }else{
            toggled = true;
            searchBtnContainer.classList.add('on');
            document.addEventListener('keydown', onKeydown);
        }
    });

    closeBtn.addEventListener('click', onSearch);

}

activateDesktopSearch();

function resetSubMenus(){
    for(let i2 = 0; i2 < allSubMenuButtons.length; i2++){
        const resetBtn = allSubMenuButtons[i2];
        resetBtn.classList.remove('hover');
    }
}

function iterateMenu(node){

    const fromEl = node.parentElement.parentElement; // UL (SUB-MENU)

    if(fromEl.classList.contains('parent') === false ){
        fromEl.classList.add('hover');
        iterateMenu(fromEl);
    }
}


/*
OFF CANVAS
*/
const activateOffCanvasNav = () => {
    const hamburger = document.querySelector('.mobile-navigation .menu-toggle');
    const menuCloseBtn = document.querySelector('.offcanvas .close-btn');
    const mobileLI = document.querySelectorAll('.offcanvas #menu-primary-navigation li');

    menuCloseBtn.addEventListener('click', (evt) => {
        const offCanvas = document.querySelector('.offcanvas');
        offCanvas.classList.remove('show');
    })

    hamburger.addEventListener( 'click', (evt)=>{
        const body = document.querySelector('body');
        const offCanvas = document.querySelector('.offcanvas');

        offCanvas.classList.add('show');

        setTimeout( () => {
            body.classList.add('fixed');
        }, 100);

        // CLOSE ANY EXPANDED
        for(let i = 0; i < mobileLI.length; i++){
            const liItem = mobileLI[i];
            liItem.classList.remove('expanded');
        }
        
    });

    // Assign class to <a> tags within container <li>
    const allItems = document.querySelectorAll('.offcanvas #menu-primary-navigation  li a');
    allItems.forEach( a => {
        a.classList.add('mobile-item-btn');
    })

    // Insert Dropdown arrows to Menu Nav
    const parentsWithChildren = document.querySelectorAll('.offcanvas #menu-primary-navigation  li.menu-item-has-children');

    parentsWithChildren.forEach(item => {
        const Atag = document.createElement('a');

        Atag.setAttribute('href', '#');
        Atag.classList.add('arrow-expand');

        item.insertAdjacentElement('afterbegin', Atag);


        // Activate Arrows
        Atag.addEventListener('click', (evt) => {
            evt.preventDefault();

            setTimeout( ()=>{
                const parentEl = evt.target.parentElement;
                
                if( parentEl.classList.contains('expanded') ){
                    parentEl.classList.remove('expanded');
                }else{

                    mobileLI.forEach( liItem => {
                        liItem.classList.remove('expanded');
                    })

                    parentEl.classList.add('expanded');
                }
    
            }, 100);
        });
    })




    
}

activateOffCanvasNav();


const onMobileSearch = () => {

    const mobileBar = document.querySelector('.offcanvas #searchbar #search-field');

    // Check if string length > 0
    if(mobileBar.value.length > 0){

       window.open('/?s=' + formatForGoogleQuery(mobileBar.value), '_self');
    }

    
    return false;
}
