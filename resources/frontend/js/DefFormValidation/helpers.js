const animationsList = {
    fade: [
        [
            {opacity: 0},
            {opacity: 1}
        ],
        [
            {opacity: 1},
            {opacity: 0}
        ]
    ],
    fadeDown: [
        [
            {opacity: 0, transform: 'translateY(-500px)'},
            {opacity: 1, transform: 'translateY(0)'}
        ],
        [
            {opacity: 1, transform: 'translateY(0)'},
            {opacity: 0, transform: 'translateY(-500px)'}
        ],
    ],
    fadeFromTopToDown: [
        [
            {opacity: 0, transform: 'translateY(-500px)'},
            {opacity: 1, transform: 'translateY(0)'}
        ],
        [
            {opacity: 1, transform: 'translateY(0)'},
            {opacity: 0, transform: 'translateY(500px)'}
        ],
    ],
    slideDownHeight: [
        [
            {opacity: 0, height: 0},
            {
                opacity: 1, height: function (el) {
                    return el.clientHeight + 'px'
                }
            }
        ],
        [
            {
                opacity: 1, height: function (el) {
                    return el.clientHeight + 'px'
                }
            },
            {opacity: 0, height: 0}
        ]
    ],
    slideDown: [
        [
            {opacity: 0, transform: 'translateY(-500px)'},
            {opacity: 1, transform: 'translateY(0)'}
        ],
        [
            {opacity: 1, transform: 'translateY(0)'},
            {opacity: 0, transform: 'translateY(-500px)'}
        ],
    ],
    slideRight: [
        [
            {opacity: 0, transform: 'translateX(500px)'},
            {opacity: 1, transform: 'translateX(0)'}
        ],
        [
            {opacity: 1, transform: 'translateX(0)'},
            {opacity: 0, transform: 'translateX(500px)'}
        ],
    ],
    slideBottom: [
        [
            {opacity: 0, transform: 'translateY(200px)'},

            {opacity: 1, transform: 'translateY(0)'}
        ],
        [
            {opacity: 1, transform: 'translateY(0)'},
            {opacity: 0, transform: 'translateY(500px)'}
        ],
    ],
}

// controlDisplayWithAnimation
// type : toggle, show, hide
// showClass : show

export function controlDisplayWithAnimation(argsConfig) {
    const defConfig = {
        elem: null,
        targetInElem: false,
        elemSelector: '',
        animationName: 'fade',
        duration: 200,
        toggleClassName: 'show',
    }
    const config = {
        ...defConfig,
        ...argsConfig
    }
    const elem = config.elem
    const target = config.targetInElem ? elem.querySelector(config.elemSelector) : elem
    const computedStyle = window.getComputedStyle(target)

    const elemsToSwitchDisplay = () => {

        const {elemSelector} = config
        let elements = []
        // console.log(' elemSelector ', elemSelector);
        if (elemSelector.length) {

            if (typeof elemSelector === 'string') {
                elements.push(...document.querySelectorAll(elemSelector))
            } else if (Array.isArray(elemSelector)) {
                elements = elemSelector.reduce((acc, item) => {
                    acc.push(...document.querySelectorAll(item))
                    return acc
                }, [])
            }

        }

        return elements
    }

    let keyframesToShow
    let keyframesToHide

    if (typeof animationsList[config.animationName] === "function") {

        const [show, hide] = animationsList[config.animationName](elem)
        keyframesToShow = show
        keyframesToHide = hide
        console.log(' show, hide ', show, hide);

    } else {
        keyframesToShow = animationsList[config.animationName][0]
        keyframesToHide = animationsList[config.animationName][1];
    }

    if (keyframesToHide === null) {
        keyframesToHide = [...keyframesToShow].reverse();
    }

    const isElemHide = !target.classList.contains(config.toggleClassName)
    const isElemShow = !isElemHide
    const isElemIsObject = typeof elem === 'object'

    const allElemsLength = elemsToSwitchDisplay().length > 0

    const show = () => {
        const showElement = () => {
            elem.classList.add(config.toggleClassName);
            let showAnimation = target.animate(
                compileKeyframes(target, keyframesToShow),
                {duration: config.duration}
            );


            // console.log(' target.clientHeight ', target.clientHeight);

            showAnimation.addEventListener('finish', function () {
                target.jsAnim = false;
            });

            return new Promise((resolve) => {
                resolve({show: true, target})
            })
        }
        if (allElemsLength) {
            const toggleElements = elemsToSwitchDisplay()
            const eachAllElements = () => {
                const each = () => {
                    if (allElemsLength) {
                        if (config.targetInElem) {
                            toggleElements.forEach((item) => {
                                    let classes = item.parentNode.classList
                                    // item.parentNode.classList.remove(config.toggleClassName);
                                    if (classes.contains(config.toggleClassName)) {
                                        hide(item)
                                    }

                                }
                            )

                        } else {
                            toggleElements.forEach((item) => {
                                // item.classList.remove(config.toggleClassName)
                                let classes = item.classList
                                if (classes.contains(config.toggleClassName)) {
                                    hide(item)
                                }

                            })
                        }
                    }
                }
                return new Promise((resolve) => {
                    resolve(each())
                })
            }
            eachAllElements().then(() => {
                return showElement()
            })
        } else {
            return showElement()
        }


    }
    const hide = (newTargetElem) => {
        //        console.log(' newTargetElem ', newTargetElem);
        if (newTargetElem) {
            let hideAnimation = newTargetElem.animate(
                compileKeyframes(newTargetElem, keyframesToHide),
                {duration: config.duration}
            );

            hideAnimation.addEventListener('finish', () => {

                if (config.targetInElem) {
                    newTargetElem.parentNode.classList.remove(config.toggleClassName);
                } else {
                    newTargetElem.classList.remove(config.toggleClassName);
                }

                newTargetElem.jsAnim = false;
            });
        } else {
            if (allElemsLength) {
                if (isElemHide) {
                    let hideAnimation = target.animate(
                        compileKeyframes(target, keyframesToHide),
                        {duration: config.duration}
                    );
                    hideAnimation.addEventListener('finish', () => {
                        elem.classList.remove(config.toggleClassName);
                        target.jsAnim = false;
                    });
                } else {
                    target.jsAnim = false;
                }
            } else {
                let hideAnimation = target.animate(
                    compileKeyframes(target, keyframesToHide),
                    {duration: config.duration}
                );
                hideAnimation.addEventListener('finish', () => {
                    elem.classList.remove(config.toggleClassName);
                    target.jsAnim = false;

                });
                return new Promise((resolve) => {
                    resolve({show: false, target})
                })
            }
        }


    }
    const toggle = () => {

        if (isElemIsObject) {
            if (target.jsAnim) {
                return;
            }
            target.jsAnim = true;
            if (isElemHide) {

                // console.log(' 1 ', 1);
                show()
            } else if (isElemShow) {

                hide()
            }
        }

    }

    function compileKeyframes(el, keyframes) {
        let res = [];

        for (let i = 0; i < keyframes.length; i++) {
            let frame = keyframes[i];
            let realFrame = {};
            for (let name in frame) {
                if (typeof frame[name] === 'function') {
                    realFrame[name] = frame[name](el)
                } else {
                    realFrame[name] = frame[name];
                }
            }
            res.push(realFrame);
        }
        return res;
    }

    return {
        toggle, hide, show
    }

}


export function toggleItemWithAnimation({Elem, elSelector = []}, config) {

    const initialConfig = {
        animationName: 'fade',
        rate: 300,
        type: 'toggle',


    }
    const localConfig = {
        ...initialConfig,
        ...config
    }
    const {
        animationName: ANIMATION_NAME,
        rate
    } = localConfig
    let keyframesToShow = animationsList[ANIMATION_NAME][0]
    let keyframesToHide = animationsList[ANIMATION_NAME][1];

    //selectors
    const allEls = elSelector.reduce((acc, item) => {
        acc.push(...document.querySelectorAll(item))
        return acc
    }, []);
    // console.log('allEls', allEls)
    const allElsLength = allEls.length > 0

    if (typeof Elem === 'object') {
        const isThisHide = !Elem.classList.contains('show')
        const isThisShow = !isThisHide
        if (Elem.jsAnim) {
            return;
        }
        Elem.jsAnim = true;
        if (keyframesToHide === null) {
            keyframesToHide = [...keyframesToShow].reverse();
        }


        if (isThisHide) {
            if (allElsLength) {
                allEls.forEach((item) => item.classList.remove('show'))
            }
            let showAnimation = Elem.animate(
                compileKeyframes(Elem, keyframesToShow),
                {duration: rate}
            );

            Elem.classList.add('show');
            showAnimation.addEventListener('finish', function () {
                Elem.jsAnim = false;
            });
        } else if (isThisShow) {
            // console.log(' 22 ');
            if (allElsLength) {
                if (isThisHide) {
                    let hideAnimation = Elem.animate(
                        compileKeyframes(Elem, keyframesToHide),
                        {duration: rate}
                    );
                    hideAnimation.addEventListener('finish', function () {
                        Elem.classList.remove('show');
                        Elem.jsAnim = false;
                    });
                } else {
                    Elem.jsAnim = false;
                }
            } else {
                let hideAnimation = Elem.animate(
                    compileKeyframes(Elem, keyframesToHide),
                    {duration: rate}
                );
                hideAnimation.addEventListener('finish', function () {
                    Elem.classList.remove('show');
                    Elem.jsAnim = false;
                });
            }


        }

        // else{
        //
        // }
    }


    function compileKeyframes(el, keyframes) {
        let res = [];

        for (let i = 0; i < keyframes.length; i++) {
            let frame = keyframes[i];
            let realFrame = {};

            for (let name in frame) {
                realFrame[name] = typeof frame[name] === 'function' ?
                    frame[name](el) :
                    frame[name];
            }

            res.push(realFrame);
        }

        return res;
    }


}


export function debounce(fn, wait) {
    let timeout
    return function (...args) {
        const later = () => {
            clearTimeout(timeout)
            // eslint-disable-next-line
            fn.apply(this, args)
        }
        clearTimeout(timeout)
        timeout = setTimeout(later, wait)
    }
}

function DefWindowResize() {

}

export class EventEmitter {
    constructor() {
        this.listeners = {}
    }


    emit(event, ...args) {
        if (!Array.isArray(this.listeners[event])) {
            return false
        }
        this.listeners[event].forEach(listener => {
            listener(...args)
        })
        return true
    }

    on(event, fn) {
        this.listeners[event] = this.listeners[event] || []
        this.listeners[event].push(fn)
        return () => {
            this.listeners[event] =
                this.listeners[event].filter(listener => listener !== fn)
        }
    }
}

export function createElementWithClass(tagName, classNames, innerHtml) {
    let newElement = document.createElement(tagName)
    if (Array.isArray(classNames)) {
        classNames.forEach(item => newElement.classList.add(item))
    } else {
        newElement.classList.add(classNames)
    }

    if (innerHtml && innerHtml.length) {
        newElement.innerHTML = innerHtml
    }
    return newElement
}


export function reverse(s) {
    return s.split("").reverse().join("");
}


export const replaceItemInArray = (array, index, ...items) => [...array.slice(0, index), ...items, ...array.slice(index + 1)];
