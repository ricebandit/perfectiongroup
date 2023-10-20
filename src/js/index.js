window.onload = () =>{





    /*
    NUM BLOCKS (3 & 4-BLOCK)
    */
    const activateNumBlocks = () => {
        const blocks = document.querySelectorAll('.num-blocks .blocks .block');

        const resizeBlocks = () => {
            blocks.forEach( blk => {
                const description = blk.querySelector('.description');
    
                if(description){
                    const descriptP = description.querySelector('.d-container');
        
                    description.style.maxHeight = descriptP.offsetHeight + 'px';
                }

                const cta = blk.querySelector('.cta.textlink');
    
                if(cta){
                    const ctaP = cta.querySelector('p');
        
                    cta.style.maxHeight = ctaP.offsetHeight + 'px';
                }
    
    
            })
        }

        resizeBlocks();

        window.addEventListener('resize',resizeBlocks)
    }

    activateNumBlocks();






    /*
    SELECTABLE CONTENT
    */

    const activateSelectableContent = () => {

        const component = document.querySelectorAll('.fc-selectable-content');

        component.forEach(comp => {
            const compid = comp.getAttribute('id');
            const btns = document.querySelectorAll('#' + compid + '.fc-selectable-content .selections .tab');

            btns.forEach(btn => {
                btn.addEventListener( 'click', (evt) => {
                    evt.preventDefault();

                    const pageid = evt.target.parentNode.dataset.id;

                    console.log('pageid', pageid);

                    // Unselect
                    const prevTab = document.querySelector('#' + compid + '.fc-selectable-content .selections .tab.selected');
                    prevTab.classList.remove('selected');

                    const prevPage = document.querySelector('#' + compid + '.fc-selectable-content .pages .page.selected');
                    prevPage.classList.remove('selected');

                    // Select
                    const nextTab = evt.target.parentNode;
                    nextTab.classList.add('selected');

                    const nextPage = document.querySelector('#' + compid + '.fc-selectable-content .pages .page#' + pageid);
                    nextPage.classList.add('selected');
                })
            })

        });
    }

    activateSelectableContent();




    /*
    HALF SLIDES
    */
    const activateHalfSlides = () => {
        const instances = document.querySelectorAll('.fc-half-slides');
        let halfSlidesData = [];

        instances.forEach(instance => {
            const id = instance.getAttribute('id');

            const navBtns = document.querySelectorAll('#' + id + '.fc-half-slides .nav .item');

            let data = {index: 0}

            halfSlidesData[id] = {index:0};

            navBtns.forEach(btn => {
                btn.addEventListener('click', (evt) => {
                    let currentIndex = evt.target.parentNode.dataset.id;

                    if(! currentIndex){
                        currentIndex = evt.target.dataset.id;
                    }

                    // Iterate through btns and remove previous designations
                    navBtns.forEach(btnTemp1 => { btnTemp1.classList.remove('next'); btnTemp1.classList.remove('selected')});

                    // Iterate and relabel new designations
                    navBtns.forEach(btnTemp2 => {
                        if( Number(btnTemp2.dataset.id) === Number(currentIndex)){ 
                            btnTemp2.classList.add('selected');
                        }else if( Number(btnTemp2.dataset.id) === Number(currentIndex) + 1){
                            btnTemp2.classList.add('next');
                        }
                    })

                    // Deselect Current Image
                    const currentSlide = document.querySelector('#' + id + '.fc-half-slides .viewer .slide.selected');
                    currentSlide.classList.remove('selected');

                    // Select New Image
                    const newSlide = document.querySelector('#' + id + '.fc-half-slides .viewer .slide#sl-' + Number(currentIndex));
                    newSlide.classList.add('selected');


                    // Deselect Current Page
                    const currentPage = document.querySelector('#' + id + '.fc-half-slides .pages .page.selected');
                    currentPage.classList.remove('selected');

                    // Select New Page
                    const newPage = document.querySelector('#' + id + '.fc-half-slides .pages .page#page-' + Number(currentIndex));
                    newPage.classList.add('selected');

                    // Progress Bar
                    const progressbar = document.querySelector('#' + id + '.fc-half-slides .pages .prevnext .progress-bar .progress');
                    const scale = Number(currentIndex) / (navBtns.length - 1);

                    progressbar.style.transform = 'scaleX(' + scale + ')';


                    halfSlidesData[id].index = currentIndex;


                })
            })

            const arrows = document.querySelectorAll('#' + id + '.fc-half-slides .pages .prevnext .arrow');

            arrows.forEach( arrow => {

                arrow.addEventListener('click', (evt) => {
                    let newIndex = halfSlidesData[id].index;

                    if(arrow.classList.contains('prev')){
                        console.log('prev');
                        newIndex --;

                        if(newIndex < 0){
                            newIndex = 0;
                        }
                    }else{
                        newIndex++;

                        if(newIndex >= navBtns.length - 1){
                            newIndex = navBtns.length - 1;
                        }
                    }

                    // Iterate through btns and remove previous designations
                    navBtns.forEach(btnTemp1 => { btnTemp1.classList.remove('next'); btnTemp1.classList.remove('selected')});

                    // Iterate and relabel new designations
                    navBtns.forEach(btnTemp2 => {
                        if( Number(btnTemp2.dataset.id) === newIndex){ 
                            btnTemp2.classList.add('selected');
                        }else if( Number(btnTemp2.dataset.id) === newIndex + 1){
                            btnTemp2.classList.add('next');
                        }
                    })

                    // Deselect Current Image
                    const currentSlide = document.querySelector('#' + id + '.fc-half-slides .viewer .slide.selected');
                    currentSlide.classList.remove('selected');

                    // Select New Image
                    const newSlide = document.querySelector('#' + id + '.fc-half-slides .viewer .slide#sl-' + newIndex);
                    newSlide.classList.add('selected');


                    // Deselect Current Page
                    const currentPage = document.querySelector('#' + id + '.fc-half-slides .pages .page.selected');
                    currentPage.classList.remove('selected');

                    // Select New Page
                    const newPage = document.querySelector('#' + id + '.fc-half-slides .pages .page#page-' + newIndex);
                    newPage.classList.add('selected');

                    // Progress Bar
                    const progressbar = document.querySelector('#' + id + '.fc-half-slides .pages .prevnext .progress-bar .progress');
                    const scale = newIndex / (navBtns.length - 1);

                    progressbar.style.transform = 'scaleX(' + scale + ')';

                    halfSlidesData[id].index = newIndex;
                })
            })
        })
    }

    activateHalfSlides();






    /*
    SELECTABLE HALF SLIDES
    */
    const activateHalfSlidesSelection = () => {
        const instances = document.querySelectorAll('.fc-half-slides-selection');

        instances.forEach(instance => {
            const id = instance.getAttribute('id');

            const navBtns = document.querySelectorAll('#' + id + '.fc-half-slides-selection .pages .page');

            const goto = (slideid) => {

                // Deselect Previous
                const prevSlide = document.querySelector('#' + id + ' .viewer .slide.selected');
                prevSlide.classList.remove('selected');


                const prevPage = document.querySelector('#' + id + ' .pages .page.selected');
                prevPage.classList.remove('in');
                prevPage.classList.remove('selected');

                // Select Next
                const nextSlide = document.querySelector('#' + id + ' .viewer .slide#sl-' + slideid);
                nextSlide.classList.add('selected');


                const nextPage = document.querySelector('#' + id + ' .pages .page#page-' + slideid);
                nextPage.classList.add('selected');

                setTimeout( () => {
                    nextPage.classList.add('in');
                }, 100);
            }

            navBtns.forEach( item => {
                item.addEventListener('click', (evt) => {

                    const slideid = Number(item.dataset.id);

                    goto(slideid);

                })
            })


        })
    }

    activateHalfSlidesSelection();



    /*
    ABOUT PIE CHART
    */

    const activateAboutPieChart = () => {
        const instances = document.querySelectorAll('.fc-pie_chart');

        instances.forEach(instance => {
            const id = instance.getAttribute('id');

            const navBtns = instance.querySelectorAll('.pages .page'); // navBtns INCLUDES STATIC PAGE INSTANCE in right half menu
            const pieBtns = instance.querySelectorAll('.view-container .viewer .chart-graphic .pie');

            let currentIndex = 0;

            const goto = (slideid) => {
                console.log('goto', slideid);
                // Deselect Previous
                const prevSlides = instance.querySelectorAll('.viewer .pie.selected');
                prevSlides.forEach(pslide => {
                    pslide.classList.remove('selected');
                })
                


                const prevPage = instance.querySelector('.pages .page.selected');
                prevPage.classList.remove('in');
                prevPage.classList.remove('selected');

                // Select Next
                const nextSlides = instance.querySelectorAll('.viewer .pie.piece-' + slideid);
                nextSlides.forEach(nslide => {
                    nslide.classList.add('selected');
                })


                console.log('slideid', slideid)
                const nextPage = instance.querySelector('.pages .page#page-' + slideid);
                nextPage.classList.add('selected');

                setTimeout( () => {
                    nextPage.classList.add('in');
                }, 100);

                // Indicate Progress Bar
                const trueTotal = navBtns.length - 1; // don't count static page instance
                const progressbar = instance.querySelector('.prevnext .progress.bar');

                progressbar.style.transform = 'scaleX(' + ((slideid + 1) / trueTotal) + ')';
            }

            navBtns.forEach( item => {
                item.addEventListener('click', (evt) => {

                    const slideid = Number(item.dataset.id);

                    goto(slideid);
                })
            })

            pieBtns.forEach(pie => {
                pie.addEventListener('click', (evt) => {

                    const slideid = Number(pie.dataset.id);

                    goto(slideid);
                })
            })

            // Mobile subnav
            const prev = instance.querySelector('.prevnext .prev');
            const next = instance.querySelector('.prevnext .next');

            prev.addEventListener('click', () => {
                currentIndex--;

                if(currentIndex < 0){
                    currentIndex = 0;
                }else{
                    goto(currentIndex);
                }

            })

            next.addEventListener('click', () => {
                currentIndex++;

                if(currentIndex >= navBtns.length - 1){
                    currentIndex = navBtns.length - 2;
                }else{
                    goto(currentIndex);
                }

            })

            goto(0);


        })
    }

    activateAboutPieChart();

    /*
    CONTENT SORTER
    */

    const activateContentSorter = () => {
        // Allow for more than one instance of this component
        const instances = document.querySelectorAll('.fc-content-sorter');

        instances.forEach( instance => {
            const id = instance.getAttribute('id');
            const type = instance.dataset.type;

            const btns = instance.querySelectorAll('.subnav .category-items .item');

            // btnsAll does NOT contain ALL buttons! It contains buttons that are designated for the All category
            const btnsAll = instance.querySelectorAll('.subnav .category-items .item.all');



            // HANDLE CLICK
            const btnClick = (evt, btn, clickedObject) => {
                console.log('brnClick');
                // deselect previous
                const navbtn = instance.querySelector('.subnav  .category-items .item.selected')
                if(navbtn){
                    navbtn.classList.remove('selected');
                }

                const subnavbtn = instance.querySelector('.subnav  .category-items .item .children-items .sub-item.selected');

                if(subnavbtn){
                    subnavbtn.classList.remove('selected');
                }
                
                // If there are more than one "All" button, treat them all the same
                if(clickedObject.dataset.id != 'all'){
                    btnsAll.forEach(allItem => {
                        allItem.classList.remove('show');
                        allItem.classList.remove('selected');
                    })
                }else{
                    btnsAll.forEach(allItem => {
                        allItem.classList.add('show');
                        allItem.classList.add('selected');
                    })
                }
                
                if(type === 'pages'){ // PAGES MODE
                    

                    const page = instance.querySelector('.content .page.selected');
                    page.classList.remove('selected');

                    // Select next
                    btn.classList.add('selected');

                    const nextpage = instance.querySelector('.content .page#' + clickedObject.dataset.id);

                    console.log('nextpage', nextpage, btn)
                    nextpage.classList.add('selected');

                }else if(type === 'sort'){ // SORT MODE
                    
                    const car_items = instance.querySelectorAll('.content .carousel-object');

                    car_items.forEach(item => {
                        item.classList.remove('in');
                    })

                    setTimeout(() => {
                        car_items.forEach(item => {
                            item.classList.remove('show');
                        })

                    }, 550);


                    // Select next
                    btn.classList.add('selected');

                    setTimeout(() => {
                        car_items.forEach(item => {

                            if(clickedObject.dataset.id == 'all'){
                                item.classList.add('show');
                            }else{
                                if(item.classList.contains(clickedObject.dataset.id) ){
                                    item.classList.add('show');
                                }
                            }
                            
                        })
                    }, 600);

                    setTimeout( () => {

                        car_items.forEach(item => {
                            item.classList.add('in');
                            
                        })
                    }, 650);

                }else if(type === 'chapters'){ // CHAPTERS MODE
                    const chID = clickedObject.dataset.id;

                    const chapter = instance.querySelector('.chapters .content #' + clickedObject.dataset.id);

                    chapter.scrollIntoView();



/*
                    const offset = chapter.getBoundingClientRect();
                    window.scrollTo(
                        {
                            top:offset.top + 400,
                            behavior:'smooth'
                        }
                    )
*/
                }
            }
            
            btns.forEach(btn => {
                const hot = btn.querySelector('.label');
                btn.addEventListener('click', (evt) => {
                    btnClick(evt, btn, hot);
                });

                // BTN SUBNAV
                if(btn.querySelector('.children-items')){
                    btn.querySelectorAll('.children-items .sub-item').forEach( subitem => {
                        subitem.addEventListener('click', (evt) => {
                            btnClick(evt, btn, subitem);
                        });
                    })
                }
            })

            const expandBtns = instance.querySelectorAll('.subnav .header-container');
            expandBtns.forEach( ebtn => {
                ebtn.addEventListener('click', () => {
                    // deselect all
                    const prevExpanded = instance.querySelectorAll('.subnav .category-container.expand');

                    const parent = ebtn.parentNode;
                    let expanded = false;

                    if(parent.classList.contains('expand')){
                        expanded = true;
                    }

                    prevExpanded.forEach(oldbtn => {
                        oldbtn.classList.remove('expand');
                    })

                    if(expanded == false){
                        parent.classList.add('expand');

                    }

                })
            });

            /*
            const scrollApply = () => {

                if(! instance.querySelector('.fc-content-sorter')){ return; }

                const scrollPos = window.pageYOffset | document.body.scrollTop;
                const windowW = window.innerWidth;
    
                const subnav = instance.querySelector('.fc-content-sorter .content-container .subnav');
                const content = instance.querySelector('.fc-content-sorter .content-container .content');
                const section = instance.querySelector('.fc-content-sorter');
                const header = document.querySelector('header');

                
                if(windowW >= 1000){
                    
                    const desktopYRelease = section.offsetTop + section.offsetHeight - subnav.offsetHeight - header.offsetHeight;
                    
                    // DESKTOP
                    if(scrollPos > 668  && scrollPos < desktopYRelease){
                        subnav.classList.add('sticky');
                        subnav.classList.remove('sticky-mobile');
                        content.classList.add('offset-md-3');
                    }else{
                        subnav.classList.remove('sticky');
                        subnav.classList.remove('sticky-mobile');
                        content.classList.remove('offset-md-3');
                    }

                }else{
                    // MOBILE
                    if(scrollPos > 668){
                        subnav.classList.add('sticky-mobile');
                        subnav.classList.remove('sticky');
                        content.classList.remove('offset-md-3');
                    }else{
                        subnav.classList.remove('sticky-mobile');
                        subnav.classList.remove('sticky');
                        content.classList.remove('offset-md-3');
                    }
                }
            }
    
            document.addEventListener('scroll', () => {
                scrollApply();
            })

            window.addEventListener('resize', () => {
                scrollApply();
            })
            
            scrollApply();
            */
        })
    }


    activateContentSorter();
}





/*
VIDEO BLOCK
*/
const activateVideoBlock = () => {
    const videoBlocks = document.querySelectorAll('.fc-video-block');

    if(videoBlocks){
        videoBlocks.forEach( item => {
            const closeBtn = item.querySelector('.close-btn');
            const viewer = item.querySelector('.viewer');
            const viewerContent = viewer.querySelector('iframe');
            const playBtn = item.querySelector('.video .play-icon');

            viewer.removeChild(viewerContent);

            closeBtn.addEventListener('click', () => {
                setTimeout( () => {
                    viewer.removeChild(viewerContent);
                }, 1200);
                viewer.classList.remove('show');
            })

            playBtn.addEventListener('click', () => {
                viewer.appendChild(viewerContent);
                viewer.classList.add('show');
            })
        })
    }
};

activateVideoBlock();


/** 
 * IMAGE GRID
*/

const activateImageGrid = () => {
    const instances = document.querySelectorAll('.fc-image-grid');

    instances.forEach( instance => {
        if( instance.querySelector('.content-container.white-out') ){
            const images = instance.querySelectorAll('.image-container');

            images.forEach(img => {
                img.addEventListener('click', (evt) => {
                    const oldSelected = instance.querySelector('.image-container.selected');
                    oldSelected.classList.remove('selected');

                    img.classList.add('selected');
                });
            });
        }
    });
}

activateImageGrid();


const activateExpandable = () => {
    if(document.querySelector('.fc-expandable')){
        const instances = document.querySelectorAll('.fc-expandable');

        instances.forEach( instance => {
            const items = instance.querySelectorAll('.content .item');

            items.forEach( item => {
                item.addEventListener('click', (evt) => {
                    // Deselect old item
                    const oldItem = instance.querySelector('.content .item.selected');


                    if(item.classList.contains('selected')){
                        item.classList.remove('selected');

                    }else{
                        item.classList.add('selected');
                        
                        if(oldItem){
                            oldItem.classList.remove('selected');
                        }

                    }

                })
            })
        })
    }
}

activateExpandable();


/* 
CUSTOMIZED WYSIWYG (used for modifying mark-up of WYSIWYG elements with specific classes)
*/

const activateWysiwygs = () => {

    const wysiwygs = document.querySelectorAll('.wysiwyg');

    wysiwygs.forEach(wysi => {

        const ctaOrangeFilled = wysi.querySelectorAll('.cta.orangefilled');

        if(ctaOrangeFilled.length > 0){

            ctaOrangeFilled.forEach(item => {
                const textContent = item.textContent;

                item.innerHTML = '<div class="icon dash left"></div><div class="text-container"><span>' + textContent + '</span></div><div class="icon dash right"></div>';
                
            })
        }

        const wpcf7_submit = wysi.querySelectorAll('.wpcf7 .wpcf7-submit');

        if(wpcf7_submit.length > 0){

            wpcf7_submit.forEach(sitem => {
                const textContent = sitem.getAttribute('value');
                const classes = sitem.classList;

                const a_tag = document.createElement('a');

                // Add classes
                classes.forEach(cl => {
                    a_tag.classList.add( cl );
                    a_tag.setAttribute( 'type',  sitem.getAttribute('type') );
                    a_tag.setAttribute( 'value',  sitem.getAttribute('value') );
                })


                a_tag.innerHTML = '<div class="icon dash left"></div><div class="text-container"><span>' + textContent + '</span></div><div class="icon dash right"></div>';
                
                a_tag.classList.add('cta');
                a_tag.classList.add('orangefilled');

                sitem.replaceWith(a_tag);
            })
        }

    })
}

activateWysiwygs();