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


    for (let i = 0; i < mbMenuBurgerSlices.length; i++) {
        const slice = mbMenuBurgerSlices[i]
        slice.classList.toggle('active')
    }

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
            for (let i = 0; i < logoTag.length; i++) {
                const tag = logoTag[i]
                tag.style.fill = "white"
            }
            
        }, 1000)
    } else {
        mbNavItemsDown()
        mobileNav.classList.remove('active')
        setTimeout(function() {
            for (let i = 0; i < logoTag.length; i++) {
                const tag = logoTag[i]
                tag.style.fill = ""
            }
        }, 500)
    }

}

// nav items animation up
const mbNavItemsUp = function() {

    for (let i = 0; i < mobileNavLinks.length; i++) {
        const link = mobileNavLinks[i]
        setTimeout(function() {
            link.style.transform = 'translateY(-4%)'
        }, i * 90)
    }

}
// nav items animation down
const mbNavItemsDown = function() {

    for (let i = 0; i < mobileNavLinks.length; i++) {
        const link = mobileNavLinks[i]
        setTimeout(function() {
            link.style.transform = 'translateY(100%)'
        }, i * 90)
    }

}








// All things related to desktop
// All things related to desktop
// All things related to desktop
const desktopNavWrapper = document.querySelector('nav.page-nav.desktop')
const desktopNav = document.querySelector('nav.page-nav.desktop div.nav-overlay')
const desktopNavLinks = desktopNav.querySelectorAll('ul.menu li a')
const dtSecondaryNavigation = document.querySelector('div.secondary-menu-container')

// hover nav links to drop opacity and highlight the selected

for (let i = 0; i < desktopNavLinks.length; i++) {
    const link = desktopNavLinks[i]
    
    link.addEventListener('mouseenter', function () {
        link.style.opacity = '0.2'

        for (let i = 0; i < desktopNavLinks.length; i++) {
            const link = desktopNavLinks[i]
            link.style.opacity = '0.2'
        }

        link.style.opacity = this.style.color
    })

    link.addEventListener('mouseout', function () {
        for (let i = 0; i < desktopNavLinks.length; i++) {
            const link = desktopNavLinks[i]
            link.style.opacity = ''
        }
    })


}





// if nav is open logo is white else is in touched in terms of original styling
const logoTag = document.querySelectorAll('a.nav-logo svg path:not(.green-circle)')

const runDesktopNav = function () {
    desktopNavWrapper.classList.toggle('active')
    dtSecondaryNavigation.classList.remove('active')

    if(desktopNavWrapper.classList.contains('active')) {
        desktopNav.classList.add('active')
        setTimeout(function() {
            dtNavItemsUp()
            
            for (let i = 0; i < logoTag.length; i++) {
                const tag = logoTag[i]
                tag.style.fill = "white"
            }

        }, 1000)
        bodyTag.classList.add('overflow-hidden')
    } else {
        removeNavScrollTop()
        setTimeout(function() {
            desktopNav.classList.remove('active')
            
            for (let i = 0; i < logoTag.length; i++) {
                const tag = logoTag[i]
                tag.style.fill = ""
            }

        }, 800)
        dtNavItemsDown()
        secondaryNavItemsDown()
        productTag.classList.remove('selected')
        

        for (let i = 0; i < desktopNavLinks.length; i++) {
            const link = desktopNavLinks[i]
            link.classList.remove('fade')
        }

        bodyTag.classList.remove('overflow-hidden')
    }

}


const dtNavItemsUp = function(els) {

    for (let i = 0; i < desktopNavLinks.length; i++) {
        const link = desktopNavLinks[i]
        setTimeout(function() {
            link.style.transform = 'translateY(-4%)'
        }, i * 90)
    }
    
}

const dtNavItemsDown = function() {

    for (let i = 0; i < desktopNavLinks.length; i++) {
        const link = desktopNavLinks[i]
        setTimeout(function() {
            link.style.transform = 'translateY(100%)'
        }, i * 90)
    }

}


// remove scrollTop on overflow scroll elements in the navigation
const removeNavScrollTop = function () {
    setTimeout(function (){
        dtSecondaryNavigation.scrollTop = 0
        desktopNav.scrollTop = 0
    }, 1400)
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

    for (let i = 0; i < dtMenuBurgerSlices.length; i++) {
        const slice = dtMenuBurgerSlices[i]
        slice.classList.toggle('active')
    }

    if (bodyTag.classList.contains('dt-menu-open')) {
        dtMenuToggler.setAttribute( 'aria-expanded', 'true' )
        dtMenuTogglerExpand.style.animation = 'expandPurple 1s cubic-bezier(0.87, 0, 0.13, 1) 0.2s forwards'
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

// same for the secondary nav links
for (let i = 0; i < secondaryNavLinks.length; i++) {
    const link = secondaryNavLinks[i]
    
    link.addEventListener('mouseenter', function () {
        link.style.opacity = '0.2'

        for (let i = 0; i < secondaryNavLinks.length; i++) {
            const link = secondaryNavLinks[i]
            link.style.opacity = '0.2'
        }

        link.style.opacity = this.style.color
    })

    link.addEventListener('mouseout', function () {
        for (let i = 0; i < secondaryNavLinks.length; i++) {
            const link = secondaryNavLinks[i]
            link.style.opacity = ''
        }
    })


}




const secondaryNavItemsUp = function() {

    for (let i = 0; i < secondaryNavLinks.length; i++) {
        const link = secondaryNavLinks[i]
        setTimeout(function() {
            link.style.transform = 'translateY(-4%)'
        }, i * 90)
    }

}

const secondaryNavItemsDown = function() {

    for (let i = 0; i < secondaryNavLinks.length; i++) {
        const link = secondaryNavLinks[i]
        setTimeout(function() {
            link.style.transform = 'translateY(100%)'
        }, i * 90)
    }

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

    for (let i = 0; i < desktopNavLinks.length; i++) {
        const link = desktopNavLinks[i]
        link.classList.toggle('fade')
    }

})


// Desktop toggler event listener
dtMenuToggler.addEventListener('click', function () {
    cookDTBurger()
    runDesktopNav()
})



// All gradient elements here
// gradientbutton elements
const navFooterGradient = document.querySelector('span.nav-gradient-footer')

const playTag = document.querySelector('li.play a')

const edgeTag = document.querySelector('li.edge a')
const edgeOverflow = document.querySelector('li.edge')

const optimiseTag = document.querySelector('li.optimise a')
const optimiseOverflow = document.querySelector('li.optimise')

const boostTag = document.querySelector('li.boost a')
const boostOverflow = document.querySelector('li.boost')

const edgeComingSoon = document.querySelector('li.edge p')
const edgeSpanDash = edgeComingSoon.querySelector('li.edge p span.item-dash')
const edgeSpanText = edgeComingSoon.querySelector('li.edge p span.item-text')

const optimiseComingSoon = document.querySelector('li.optimise p')
const optimiseSpanDash = optimiseComingSoon.querySelector('li.optimise p span.item-dash')
const optimiseSpanText = optimiseComingSoon.querySelector('li.optimise p span.item-text')

const boostComingSoon = document.querySelector('li.boost p')
const boostSpanDash = boostComingSoon.querySelector('li.boost p span.item-dash')
const boostSpanText = boostComingSoon.querySelector('li.boost p span.item-text')

// gradient els
const gradientPlay = document.querySelector('div.gradient.play')
const gradientEdge = document.querySelector('div.gradient.edge')
const gradientOptimise = document.querySelector('div.gradient.optimise')
const gradientBoost = document.querySelector('div.gradient.boost')

playTag.addEventListener('mouseenter', function() {
    navFooterGradient.classList.add('inactive')
    gradientPlay.style.opacity = '1'
})
playTag.addEventListener('mouseout', function() {
    navFooterGradient.classList.remove('inactive')
    gradientPlay.style.opacity = '0'
})
// In order to see the coming soon text we need to
// temp remove the overflow! A little hacky
// but the mask on the nav elements looks good!
edgeTag.addEventListener('mouseenter', function() {
    edgeSpanDash.classList.add('active')
    edgeSpanText.classList.add('active')
    navFooterGradient.classList.add('inactive')
    gradientEdge.style.opacity = '1'
    edgeOverflow.style.overflow = 'inherit'
    edgeComingSoon.style.opacity = '1'
})
edgeTag.addEventListener('mouseout', function() {
    edgeSpanDash.classList.remove('active')
    edgeSpanText.classList.remove('active')
    navFooterGradient.classList.remove('inactive')
    gradientEdge.style.opacity = '0'
    setTimeout(function(){
        edgeOverflow.style.overflow = 'hidden'
    }, 500)
})

optimiseTag.addEventListener('mouseenter', function() {
    navFooterGradient.classList.add('inactive')
    optimiseSpanDash.classList.add('active')
    optimiseSpanText.classList.add('active')
    gradientOptimise.style.opacity = '1'
    optimiseOverflow.style.overflow = 'inherit'

})
optimiseTag.addEventListener('mouseout', function() {
    optimiseSpanDash.classList.remove('active')
    optimiseSpanText.classList.remove('active')
    navFooterGradient.classList.remove('inactive')
    gradientOptimise.style.opacity = '0'
    setTimeout(function(){
        optimiseOverflow.style.overflow = 'hidden'
    }, 500)
})

boostTag.addEventListener('mouseenter', function() {
    navFooterGradient.classList.add('inactive')
    boostSpanDash.classList.add('active')
    boostSpanText.classList.add('active')
    gradientBoost.style.opacity = '1'
    boostOverflow.style.overflow = 'inherit'
})
boostTag.addEventListener('mouseout', function() {
    boostSpanDash.classList.remove('active')
    boostSpanText.classList.remove('active')
    navFooterGradient.classList.remove('inactive')
    gradientBoost.style.opacity = '0'
    setTimeout(function(){
        boostOverflow.style.overflow = 'hidden'
    }, 500)
})



// need to animate the line before the PRODUCT button
// selecting a Pseudo Element is hard in JS 
// so ive created a span el there - Hope thats cool!
// const span = document.createElement("span")
// productTag.prepend(span)
// const productSpanTag = productTag.querySelector('span')



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







// here we exclude the product link from the delay
// and we also create a page leave dealy to do some animation
const productTagExcludeDT = document.querySelector('li.menu-item-20 a')
const productTagExcludeMB = document.querySelector('li.menu-item-29 a')
productTagExcludeDT.classList.add('exclude')
productTagExcludeMB.classList.add('exclude')
const menuLeaveLinksDT = document.querySelectorAll('div.menu-main-container ul.menu li a:not(.exclude), li.play a')
const menuLeaveLinksMB = document.querySelectorAll('div.menu-mobile-container ul.menu li a:not(.exclude)')
dtMenuTogglerExpandWhite = document.querySelector('span.menu-toggler-expand.white.dt')
mbMenuTogglerExpandWhite = document.querySelector('span.menu-toggler-expand.white.mb')


    for (let i = 0; i < menuLeaveLinksDT.length; i++) {
        const link = menuLeaveLinksDT[i]

        link.addEventListener("click", function (event) { 
            event.preventDefault()// need this!
            const href = link.getAttribute("href") 
            setTimeout(() => { 
                window.location.href = href
            }, 820)
            dtNavItemsDown()
            secondaryNavItemsDown()
            
            setTimeout(() => { 
                dtMenuTogglerExpandWhite.style.background = 'white'
                dtMenuTogglerExpandWhite.style.animation = 'expandWhite 1.4s cubic-bezier(0.87, 0, 0.13, 1) forwards'
            }, 600)

        })
 
    }


    for (let i = 0; i < menuLeaveLinksMB.length; i++) {
        const link = menuLeaveLinksMB[i]

        link.addEventListener("click", function (event) { 
            event.preventDefault()// need this!
            const href = link.getAttribute("href") 
            setTimeout(() => { 
                window.location.href = href
            }, 820)
            mbNavItemsDown()

            if(bodyTag.classList.contains('.dark-nav')){
                mbMenuTogglerExpandWhite.style.background = 'black'
            } else {
                mbMenuTogglerExpandWhite.style.background = 'white'
            }
            
            setTimeout(() => { 
                mbMenuTogglerExpandWhite.style.background = 'white'
                mbMenuTogglerExpandWhite.style.animation = 'expandWhite 1.4s cubic-bezier(0.87, 0, 0.13, 1) forwards'
            }, 600)

        })
 
    }



}