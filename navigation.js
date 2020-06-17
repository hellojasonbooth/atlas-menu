window.onload=function() {

// All things related to mobile
// All things related to mobile
// All things related to mobile

// Mobile menu toggler
const mbMenuToggler = document.querySelector('#mb-menu-toggler')
const mbMenuTogglerSVG = document.querySelector('svg.menu-toggler-wrap.mb')
const mbMenuTogglerBG = document.querySelector('span.menu-toggler-bg.mb')
const mbMenuBurgerSlices = document.querySelectorAll('span.burger-slice.mb')
const mbMenuBurger = document.querySelector('div.burger.mb')
const mbMenuTogglerExpand = document.querySelector('span.menu-toggler-expand.mb')


// everything burger related
const cookMBBurger = function () {
    bodyTag.classList.toggle('mb-menu-open')
    mbMenuTogglerSVG.classList.toggle('active')
    mbMenuToggler.classList.toggle('active')
    mbMenuTogglerBG.classList.toggle('active')
    mbMenuBurger.classList.toggle('active')

    mbMenuBurgerSlices.forEach(slice => {
        slice.classList.toggle('active')
    })

    if (bodyTag.classList.contains('mb-menu-open')) {
        mbMenuToggler.setAttribute( 'aria-expanded', 'true' )
        mbMenuTogglerExpand.style.animation = 'expand 1s cubic-bezier(0.87, 0, 0.13, 1) 0.2s forwards'
        setTimeout(function() {
            mbMenuTogglerExpand.classList.add('fade')
        }, 1200)
    } else {
        mbMenuToggler.setAttribute( 'aria-expanded', 'false' )
        mbMenuTogglerExpand.style.animation = ''
        mbMenuTogglerExpand.classList.remove('fade')
    }

}



// Mobile Navigation Elements
const mobileNavWrapper = document.querySelector('nav.page-nav.mobile')
const mobileNav = document.querySelector('nav.page-nav.mobile div.nav-overlay')
const mobileNavLinks = mobileNav.querySelectorAll('ul.menu li a')


// Mobile toggler event listener
mbMenuToggler.addEventListener('click', function () {
    runMobileNav()
    cookMBBurger()
})

// run mobile navigation
const runMobileNav = function() {
    mobileNavWrapper.classList.toggle('active')
    mobileNav.classList.toggle('active')

    if(mobileNavWrapper.classList.contains('active')){
        setTimeout(function() {
            mbNavItemsUp()
        }, 1000)
    } else {
        mbNavItemsDown()
    }


}

// nav items animation up
const mbNavItemsUp = function() {
    mobileNavLinks.forEach((link, index) => {
        setTimeout(function() {
            link.style.transform = 'translateY(-4%)'
        }, (70 * (index + 1)))
    }) 
}
// nav items animation down
const mbNavItemsDown = function() {
    mobileNavLinks.forEach((link, index) => {
        setTimeout(function() {
            link.style.transform = 'translateY(100%)'
        }, (70 * (index + 1)))
    }) 
}










// All things related to desktop
// All things related to desktop
// All things related to desktop
const desktopNavWrapper = document.querySelector('nav.page-nav.desktop')
const desktopNav = document.querySelector('nav.page-nav.desktop div.nav-overlay')
const desktopNavLinks = desktopNav.querySelectorAll('ul.menu li a')
const dtSecondaryNavigation = document.querySelector('div.secondary-menu-container')

const runDesktopNav = function () {
    desktopNavWrapper.classList.toggle('active')
    dtSecondaryNavigation.classList.remove('active')

    if(desktopNavWrapper.classList.contains('active')) {
        desktopNav.classList.add('active')
        setTimeout(function() {
            dtNavItemsUp()
            productSpanTag.classList.add('active')
        }, 1000)
        bodyTag.classList.add('overflow-hidden')
    } else {
        setTimeout(function() {
            desktopNav.classList.remove('active')
        }, 800)
        dtNavItemsDown()
        secondaryNavItemsDown()
        productTag.classList.remove('selected')
        
        desktopNavLinks.forEach(link => {
            link.classList.remove('fade')
        })
        bodyTag.classList.remove('overflow-hidden')
        productSpanTag.classList.remove('active')
    }

}


const dtNavItemsUp = function(els) {

    desktopNavLinks.forEach((link, index) => {
        setTimeout(function() {
            link.style.transform = 'translateY(-4%)'
        }, (70 * (index + 1)))
    })
    
}

const dtNavItemsDown = function() {
    desktopNavLinks.forEach((link, index) => {
        setTimeout(function() {
            link.style.transform = 'translateY(100%)'
        }, (70 * (index + 1)))
    })
}




// desktop menu toggler
const dtMenuToggler = document.querySelector('#dt-menu-toggler')
const dtMenuTogglerSVG = document.querySelector('svg.menu-toggler-wrap.dt')
const dtMenuTogglerBG = document.querySelector('span.menu-toggler-bg.dt')
const dtMenuBurgerSlices = document.querySelectorAll('span.burger-slice.dt')
const dtMenuBurger = document.querySelector('div.burger.dt')
const dtMenuTogglerExpand = document.querySelector('span.menu-toggler-expand.dt')

const bodyTag = document.querySelector('body')

// everything burger related
const cookDTBurger = function () {
    bodyTag.classList.toggle('dt-menu-open')
    dtMenuTogglerSVG.classList.toggle('active')
    dtMenuToggler.classList.toggle('active')
    dtMenuTogglerBG.classList.toggle('active')
    dtMenuBurger.classList.toggle('active')

    dtMenuBurgerSlices.forEach(slice => {
        slice.classList.toggle('active')
    })

    if (bodyTag.classList.contains('dt-menu-open')) {
        dtMenuToggler.setAttribute( 'aria-expanded', 'true' )
        dtMenuTogglerExpand.style.animation = 'expand 1s cubic-bezier(0.87, 0, 0.13, 1) 0.2s forwards'
        setTimeout(function() {
            dtMenuTogglerExpand.classList.add('fade')
        }, 1200)
    } else {
        dtMenuToggler.setAttribute( 'aria-expanded', 'false' )
        dtMenuTogglerExpand.style.animation = ''
        dtMenuTogglerExpand.classList.remove('fade')
    }

}





// show secondary navigation
const productTag = document.getElementById('menu-item-20')
const secondaryNavLinks = document.querySelectorAll('div.secondary-menu-container ul li a')

const secondaryNavItemsUp = function() {

    secondaryNavLinks.forEach((link, index) => {
        setTimeout(function() {
            link.style.transform = 'translateY(-4%)'
        }, (70 * (index + 1)))
    })

}

const secondaryNavItemsDown = function(event) {
    secondaryNavLinks.forEach((link, index) => {
        setTimeout(function() {
            link.style.transform = 'translateY(100%)'
        }, (70 * (index + 1)))
    })
}



productTag.addEventListener('click', function (event) {
    event.preventDefault()
    productTag.classList.toggle('selected')

    if(productTag.classList.contains('selected')) {
        dtSecondaryNavigation.classList.add('active')
        secondaryNavItemsUp()

    } else {
        dtSecondaryNavigation.classList.remove('active')
        secondaryNavItemsDown()

    }

    desktopNavLinks.forEach(link => {
        link.classList.toggle('fade')
    })

})


// Desktop toggler event listener
dtMenuToggler.addEventListener('click', function () {
    cookDTBurger()
    runDesktopNav()
})



// All gradient elements here
// gradientbutton elements
const playTag = document.querySelector('li.play')
const edgeTag = document.querySelector('li.edge')
const optimiseTag = document.querySelector('li.optimise')
const boostTag = document.querySelector('li.boost')

const edgeSoon = document.querySelector('li.edge p')
const optimiseSoon = document.querySelector('li.optimise p')
const boostSoon = document.querySelector('li.boost p')

// gradient els
const gradientPlay = document.querySelector('div.gradient.play')
const gradientEdge = document.querySelector('div.gradient.edge')
const gradientOptimise = document.querySelector('div.gradient.optimise')
const gradientBoost = document.querySelector('div.gradient.boost')

playTag.addEventListener('mouseover', function() {
    gradientPlay.style.opacity = '1'
})
playTag.addEventListener('mouseout', function() {
    gradientPlay.style.opacity = '0'
})
// In order to see the coming soon text we need to
// temp remove the overflow! A little hacky
// but the mask on the nav elements looks good!
edgeTag.addEventListener('mouseover', function() {
    gradientEdge.style.opacity = '1'
    edgeTag.style.overflow = 'inherit'
    edgeSoon.style.opacity = '1'
})
edgeTag.addEventListener('mouseout', function() {
    gradientEdge.style.opacity = '0'
    edgeTag.style.overflow = 'hidden'
    edgeSoon.style.opacity = '0'
})

optimiseTag.addEventListener('mouseover', function() {
    gradientOptimise.style.opacity = '1'
    optimiseTag.style.overflow = 'inherit'
    optimiseSoon.style.opacity = '1'
})
optimiseTag.addEventListener('mouseout', function() {
    gradientOptimise.style.opacity = '0'
    optimiseTag.style.overflow = 'hidden'
    optimiseSoon.style.opacity = '0'
})

boostTag.addEventListener('mouseover', function() {
    gradientBoost.style.opacity = '1'
    boostTag.style.overflow = 'inherit'
    boostSoon.style.opacity = '1'
})
boostTag.addEventListener('mouseout', function() {
    gradientBoost.style.opacity = '0'
    boostTag.style.overflow = 'hidden'
    boostSoon.style.opacity = '0'
})



// need to animate the line before the PRODUCT button
// selecting a Pseudo Element is hard in JS 
// so ive created a span el there - Hope thats cool!
const span = document.createElement("span")
productTag.prepend(span)
const productSpanTag = productTag.querySelector('span')



// dropdown stuff
// dropdown stuff
// @nick – you can add more items in WP and this setup will account for the change in height
function collapseSection(drop) {

    const dropdownHeight = drop.scrollHeight
    
    const elementTransition = drop.style.transition
    drop.style.transition = ''
    
    requestAnimationFrame(function() {
      drop.style.height = dropdownHeight+ 'px'
      drop.style.transition = elementTransition
      
      requestAnimationFrame(function() {
        drop.style.height = 0 + 'px'
      })
    })
    
    drop.setAttribute('data-collapsed', 'true');
}
  
function expandSection(drop) {
    const dropdownHeight = drop.scrollHeight
    
    drop.style.height = dropdownHeight + 'px'
  
    drop.addEventListener('transitionend', function(e) {
    drop.removeEventListener('transitionend', arguments.callee);
      
})
    
drop.setAttribute('data-collapsed', 'false')
}

  
document.querySelector('#menu-item-29 a').addEventListener('click', function(e) {
    const dropdown = document.querySelector('#menu-item-29 ul.sub-menu')
    const isCollapsed = dropdown.getAttribute('data-collapsed') === 'true'
      
    if(isCollapsed) {
      expandSection(dropdown)
      dropdown.setAttribute('data-collapsed', 'false')
    } else {
      collapseSection(dropdown)
    }
    
})

// set the height of the dropdown to 0 on load
// in css its set to auto – breaks if you set a px value
const autoHeight = function() {
    const dropdown = document.querySelector('#menu-item-29 ul.sub-menu')
    const isCollapsed = dropdown.getAttribute('data-collapsed') === 'true'
        
    if(isCollapsed) {
        expandSection(dropdown)
        dropdown.setAttribute('data-collapsed', 'false')
    } else {
        collapseSection(dropdown)
    }
}
autoHeight()









}