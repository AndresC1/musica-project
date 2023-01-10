'use strict'

const mode = document.querySelector('#btnMode')
const mainHTML = document.querySelector('html')

if(mainHTML.className != 'dark'){
    mode.className = mode.className + ' justify-end';
} else{
    mode.className = 'bg-white w-14 h-auto rounded-full mx-3 border-[1px] mx-3 bg-white border-[#30343F] dark:bg-[#30343F] flex transition-all justify-start';
}

mode.addEventListener('click', function() {
    if(mainHTML.className === 'dark'){
        mainHTML.className = ''
        mode.className = mode.className + ' justify-end';
    } else{
        mainHTML.className = 'dark'
        mode.className = 'bg-white w-14 h-auto rounded-full mx-3 border-[1px] mx-3 bg-white border-[#30343F] dark:bg-[#30343F] flex transition-all justify-start';
    }
})
