// route:['data-route','data-def-form-route']
import {EventEmitter, createElementWithClass} from "./helpers";


const DEF_ATTRS = {
    submitBtn: 'data-def-form-submit',
    route: ['data-def-form-route', 'action', 'data-route'],
    redirect: ['data-def-form-redirect', 'data-redirect']
}

// const DEF_TAGS = {
//     errorTextTag:'span',
// }
const DEF_CLASSES = {
    parent: 'def-form',
    field: 'def-form-field',
    group: 'def-form-group',
    errorText: 'def-form-field-error',
    submitBlock: 'def-form-submit',
    submitLoader: 'def-form-submit-loader',
    submitLoading: 'loading',
    afterSubmitMsgText: 'def-form-msg',
    successMsg: 'def-form-msg-success',
    errorMsg: 'def-form-msg-error'

};
const DEF_SELECTORS = {};

for (const item in DEF_CLASSES) {
    DEF_SELECTORS[item] = `.${DEF_CLASSES[item]}`
}
const DEF_CONFIG = {
    formSelector: DEF_SELECTORS.parent,
    loader: true,
    loaderTemplate: '<div class="loading-ring"><div></div><div></div><div></div><div></div></div>',

    route: '',
    redirect: undefined,

    errorTextClass: DEF_CLASSES.errorText,

}

let $
let Axios
export default class DefFormLaravelValidation {

    constructor(config, jQuery, httpClientAxios) {

        this.$config = {
            ...DEF_CONFIG,
            ...config
        }
        this.$events = new EventEmitter()
        this.formParentEl = ''
        this.routeStr = ''
        this.redirectStr = ''


        Axios = httpClientAxios
        $ = jQuery

        this.init()
    }

    on(listener, ...args) {
        this.$events.on(listener, ...args)
    }

    emit(event, ...args) {
        this.$events.emit(event, ...args)
    }

    init() {
        this.beforeInitSets()
        this.setListeners()

    }


    beforeInitSets() {
        this.formParentEl = this.$config.formSelector.length
            ? $(this.$config.formSelector) : $(DEF_SELECTORS.parent)
        const formDataRoute = DEF_ATTRS.route.reduce((acc, item) => {
            const routeStr = this.formParentEl.attr(item)
            if (routeStr && routeStr.length) {
                acc = routeStr
            }
            return acc
        }, '')
        const formDataRedirect = DEF_ATTRS.redirect.reduce((acc, item) => {
            const redirectStr = this.formParentEl.attr(item)
            if (redirectStr && redirectStr.length) {
                acc = redirectStr
            }
            return acc
        }, '')

        this.routeStr = formDataRoute && formDataRoute.length > 0
                ? formDataRoute : this.$config.route.length
                ? this.$config.route
                : console.error('action (route) for form is not set')

        if(this.$config.redirect !== undefined){
            this.redirectStr =
                this.$config.redirect === true && formDataRedirect && formDataRedirect.length > 0
                    ? formDataRedirect
                    : typeof this.$config.redirect === "string" && this.$config.redirect.length > 0
                    ? this.$config.redirect
                    : console.error('redirect for form is not set')
        }

        // this.removeParentAttrs(DEF_ATTRS.route)
    }

    setListeners() {
        this.formParentEl.on('submit', (e) => this.onSubmitHandle(e))
        // && this.onSubmitHandle(e)
    }

    removeParentAttrs(attrs) {
        attrs.forEach(item => {
            if (this.formParentEl.attr(item).length) {
                this.formParentEl.removeAttr(item)
            }

        })
    }

    onSubmitHandle(e) {
        e.preventDefault()
        this.toggleLoader()
        Axios({
            url: this.routeStr,
            method: 'post',
            data: this.formParentEl.serialize(),
        })
            .then((response) => this.thenSuccessSubmitHandle(response))
            .catch((errorsResponse) => this.catchErrorsHandle(errorsResponse))
            .finally(() => {
                setTimeout(() => {
                    this.toggleLoader()
                }, 1000);

            })
    }

    thenSuccessSubmitHandle(response) {
        this.emit('submitSuccess', response)
        const redirect = this.redirectStr

        if (redirect.length) {
            window.location.href = redirect;
        }

        if (response.status === 200 && 'success' in response.data) {
            this.showMessageAfterSubmit(response.data.success, 'success')
        }

    }

    catchErrorsHandle({response}) {
        this.emit('submitError', response)

        if (response && response.status === 419 && 'message' in response.data) {
            this.showMessageAfterSubmit(response.data.message, 'error')
        }

        const errorsObject = response && response.data.errors
        this.setErrors(errorsObject)
    }

    removeErrors() {
        const formFieldErrorTextEl = this.formParentEl.find('span' + DEF_SELECTORS.errorText)
        formFieldErrorTextEl.each(function () {
            const self = $(this)
            self.parent().removeClass('error')
            self.remove()
        })
    }

    setErrors(errorsObject) {

        this.removeErrors()
        for (const key in errorsObject) {
            const errorStr = errorsObject[key].join(', ')
            const formFieldEl = this.formParentEl.find(`[name=${key}`).parent()
            const errorElement = $(`<span class='${DEF_CLASSES.errorText}'></span>`).text(errorStr)
            formFieldEl.addClass('error').append(errorElement)
        }
    }

    getElements() {


        const submitBtnEl = this.formParentEl.find('button[type=submit]')
        let submitBlockEl =
            $(this.$config.formSelector).find(DEF_SELECTORS.submitBlock)

        if(submitBlockEl.length === 0){
                submitBlockEl = $(this.formParentEl).find(`[${DEF_ATTRS.submitBtn}]`)
        }




        const groupBlockEl = this.formParentEl.find(DEF_SELECTORS.group)
        const submitBlockMsgTextEl = submitBlockEl.find(DEF_SELECTORS.afterSubmitMsgText)
        return {
            submitBtnEl, submitBlockEl, submitBlockMsgTextEl, groupBlockEl
        }
    }

    toggleLoader() {
        const submitBtn = this.formParentEl.find('button[type=submit]')

        if (submitBtn.hasClass(DEF_CLASSES.submitLoading)) {
            submitBtn.find(DEF_SELECTORS.submitLoader).remove()
            submitBtn.removeClass(DEF_CLASSES.submitLoading)
        } else {
            const newLoaderElement = createElementWithClass('div', DEF_CLASSES.submitLoader)
            newLoaderElement.innerHTML += this.$config.loaderTemplate
            submitBtn.addClass(DEF_CLASSES.submitLoading)
            submitBtn.append(newLoaderElement)
        }

    }

    showMessageAfterSubmit(msgText, type) {
        const {submitBlockEl} = this.getElements()

        const formSubmitMsgTextElement = createElementWithClass('div', DEF_CLASSES.afterSubmitMsgText, msgText)

        if (type === 'error') {
            formSubmitMsgTextElement.classList.add(DEF_CLASSES.errorMsg)
        }
        if (type === 'success') {

            formSubmitMsgTextElement.classList.add(DEF_CLASSES.successMsg)
        }

        const addMsg = () => {
            const existMsgEl = submitBlockEl.find(DEF_SELECTORS.afterSubmitMsgText)

            if(existMsgEl.length){
                existMsgEl.remove()
            }
            submitBlockEl.append(formSubmitMsgTextElement)

            const newMsgEl = submitBlockEl.find(DEF_SELECTORS.afterSubmitMsgText)


            setTimeout(() => {
                newMsgEl.remove()
            }, 2000);
        }

        if (!formSubmitMsgTextElement.length) {
            addMsg()
        } else {

            submitBlockEl.find(DEF_SELECTORS.errorText).remove()
            addMsg()
        }
    }

    clearInputs
}
