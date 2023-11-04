import DefFormLaravelValidation from "./DefFormValidation/DefFormLaravelValidation";
import axios from "axios";

import Popover from 'bootstrap/js/dist/popover'


window.$ = $
const body = $('body');

const app = function ($) {

    // $(function () {
    //     $('[data-toggle="popover"]').popover({
    //         html: true,
    //         trigger:'hover',
    //         offset:1,
    //     })
    // });

    // var popover = new Popover(document.querySelector('[data-bs-toggle="popover"]'), )

    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new Popover(popoverTriggerEl, {
            container: 'body',
            html: true,
            trigger: 'hover',

        })
    })


    const checkboxHandle = () => {
        $('.js-check-all').on('click', function () {
            if ($(this).prop('checked')) {
                $('.control--checkbox input[type="checkbox"]').each(function () {
                    $(this).prop('checked', true);
                })
            } else {
                $('.control--checkbox input[type="checkbox"]').each(function () {
                    $(this).prop('checked', false);
                })
            }
        });

        $('.js-ios-switch-all').on('click', function () {
            if ($(this).prop('checked')) {
                $('.ios-switch input[type="checkbox"]').each(function () {
                    $(this).prop('checked', true);
                    $(this).closest('tr').addClass('active');
                })
            } else {
                $('.ios-switch input[type="checkbox"]').each(function () {
                    $(this).prop('checked', false);
                    $(this).closest('tr').removeClass('active');
                })
            }
        });


        $('.ios-switch input[type="checkbox"]').on('click', function () {
            if ($(this).closest('tr').hasClass('active')) {
                $(this).closest('tr').removeClass('active');
            } else {
                $(this).closest('tr').addClass('active');
            }
        });

    };
    const inputProgressHandle = () => {
        $('input').on('keyup', function () {
            const value = this.value;
            const wrappingTd = $(this).parent().parent();

            $(' .progress-bar', wrappingTd)
                .css('width', value + '%')
                .attr('aria-valuenow', value);
        })
    }
    const modalHandle = () => {


        const profileInfoFormHandle = () => {


            const formSelector = '#profile-info-update-form'

            const profileInfoEl = $('.profile-info')

            if ($(formSelector).length) {


                const formValidator = new DefFormLaravelValidation({
                    formSelector: formSelector,
                }, $, axios)

                console.log(' formValidator ', formValidator);

                formValidator.on('submitSuccess', (request) => {
                    const data = request.data['updatedInfo'];


                    ['about_me_desc', 'fullname', 'age'].forEach(item => {
                        profileInfoEl.find('.profile-item--' + item +' span').html(data[item])
                    })

                })

                formValidator.on('submitError', (response) => {
                    console.log('response error profile', response)

                })


            }
        }




        profileInfoFormHandle()


    };
    const svgHandle = () => {
        body.find('img.svg').each(function () {
            let img = $(this);
            let imgID = img.attr('id');
            let imgClass = img.attr('class');
            let imgUrl = img.attr('src');
            $.get(imgUrl, function (data) {
                let svg = $(data).find('svg');
                if (typeof imgID !== 'undefined') {
                    svg = svg.attr('id', imgID);
                }
                if (typeof imgClass !== 'undefined') {
                    svg = svg.attr('class', imgClass + ' replaced-svg');
                }
                svg = svg.removeAttr('xmlns:a');
                img.replaceWith(svg);
            }, 'xml');
        });
    };
    const datePicker = () => {
        $('.datepicker').datepicker({
            format: 'dd.mm.yyyy',
            language: 'ru',
            autoclose: true,
            startDate: '01/01/1950',
        });
    }

    return {
        init() {
            checkboxHandle();
            inputProgressHandle();
            modalHandle();
            svgHandle();
            datePicker();
        }
    }
};

jQuery(document).ready(function ($) {
    app($).init();
});


//______________ favicon dark mode ________________
window.addEventListener('DOMContentLoaded', setFavicon);

function setFavicon() {
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        const favicon = document.querySelector('[data-dark]');
        if (!favicon) {
            return;
        }
        if (favicon.dataset.dark) {
            favicon.href = favicon.dataset.dark;
        }
    }
}
