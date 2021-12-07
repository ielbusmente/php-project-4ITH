<?php ?>
<style>
    :root {
        --bs-secondary-rgb: 108, 117, 125;
        --bs-light-rgb: 248, 249, 250;
        --bs-dark-rgb: 191, 173, 109;
        --bs-white-rgb: 255, 255, 255;
        --bs-body-font-family: Lato, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
        --bs-body-font-size: 1rem;
        --bs-body-font-weight: 400;
        --bs-body-line-height: 1.5;
        --bs-body-color: #212529;
        --bs-body-bg: #fff;
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }

    @media (prefers-reduced-motion: no-preference) {
        :root {
            scroll-behavior: smooth;
        }
    }

    body {
        margin: 0;
        font-family: var(--bs-body-font-family);
        font-size: var(--bs-body-font-size);
        font-weight: var(--bs-body-font-weight);
        line-height: var(--bs-body-line-height);
        color: var(--bs-body-color);
        text-align: var(--bs-body-text-align);
        background-color: var(--bs-body-bg);
        -webkit-text-size-adjust: 100%;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    }

    h6,
    .h6,
    h5,
    .h5,
    h4,
    .h4,
    h3,
    .h3,
    h2,
    .h2,
    h1,
    .h1 {
        margin-top: 0;
        margin-bottom: 0.5rem;
        font-weight: 700;
        line-height: 1.2;
    }

    h1,
    .h1 {
        font-size: calc(1.375rem + 1.5vw);
    }

    h2,
    .h2 {
        font-size: calc(1.325rem + 0.9vw);
    }

    h3,
    .h3 {
        font-size: calc(1.3rem + 0.6vw);
    }

    h4,
    .h4 {
        font-size: calc(1.275rem + 0.3vw);
    }

    h5,
    .h5 {
        font-size: 1.25rem;
    }

    h6,
    .h6 {
        font-size: 1rem;
    }

    p {
        margin-top: 0;
        margin-bottom: 1rem;
    }

    ol,
    ul {
        padding-left: 2rem;
    }

    ol,
    ul,
    dl {
        margin-top: 0;
        margin-bottom: 1rem;
    }

    ol ol,
    ul ul,
    ol ul,
    ul ol {
        margin-bottom: 0;
    }

    b,
    strong {
        font-weight: bolder;
    }

    a {
        color: #0d6efd;
        text-decoration: underline;
    }

    a:hover {
        color: #0a58ca;
    }

    a.disabled {
        pointer-events: none;
    }

    a:not([href]):not([class]),
    a:not([href]):not([class]):hover {
        color: inherit;
        text-decoration: none;
    }

    li a {
        color: black;
        text-decoration: none
    }

    li a:hover,
    .active {
        text-decoration: none;
        color: #D8C47F;
    }

    img,
    svg {
        vertical-align: middle;
    }

    button {
        border-radius: 0;
    }

    button:focus:not(:focus-visible) {
        outline: 0;
    }

    input,
    button,
    select,
    optgroup,
    textarea {
        margin: 0;
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
    }

    button,
    select {
        text-transform: none;
    }

    [role=button] {
        cursor: pointer;
    }

    button,
    [type=button],
    [type=reset],
    [type=submit] {
        -webkit-appearance: button;
    }

    button:not(:disabled),
    [type=button]:not(:disabled),
    [type=reset]:not(:disabled),
    [type=submit]:not(:disabled) {
        cursor: pointer;
    }

    ::-moz-focus-inner {
        padding: 0;
        border-style: none;
    }

    .bg-light {
        --bs-bg-opacity: 1;
        background-color: rgba(var(--bs-light-rgb), var(--bs-bg-opacity)) !important;
    }


    .row {
        --bs-gutter-x: 0rem;
        --bs-gutter-y: 0;
        display: flex;
        flex-wrap: wrap;
        margin-top: calc(-1 * var(--bs-gutter-y));
        margin-right: calc(-0.5 * var(--bs-gutter-x));
        margin-left: calc(-0.5 * var(--bs-gutter-x));
    }

    .row>* {
        flex-shrink: 0;
        width: 100%;
        max-width: 100%;
        padding-right: calc(var(--bs-gutter-x) * 0.5);
        padding-left: calc(var(--bs-gutter-x) * 0.5);
        margin-top: var(--bs-gutter-y);
    }

    .row-cols-2>* {
        flex: 0 0 auto;
        width: 50%;
    }

    .col-12 {
        flex: 0 0 auto;
        width: 100%;
    }

    .bg-transparent {
        --bs-bg-opacity: 1;
        background-color: transparent !important;
    }

    .p-0 {
        padding: 0 !important;
    }

    .p-1 {
        padding: 0.25rem !important;
    }

    .p-2 {
        padding: 0.5rem !important;
    }

    .p-3 {
        padding: 1rem !important;
    }

    .p-4 {
        padding: 1.5rem !important;
    }

    .p-5 {
        padding: 3rem !important;
    }

    .pt-1 {
        padding: 0.25rem !important;
    }

    .p-0 {
        padding-top: 0 !important;
    }
    .pt-2 {
        padding-top: 0.5rem !important;
    }

    .pt-3 {
        padding-top: 1rem !important;
    }

    .pt-4 {
        padding-top: 1.5rem !important;
    }

    .pt-5 {
        padding-top: 3rem !important;
    }

    .py-2 {
        padding-top: 0.5rem !important;
        padding-bottom: 0.5rem !important;
    }

    .py-3 {
        padding-top: 1rem !important;
        padding-bottom: 1rem !important;
    }

    .py-5 {
        padding-top: 3rem !important;
        padding-bottom: 3rem !important;
    }

    .px-4 {
        padding-right: 1.5rem !important;
        padding-left: 1.5rem !important;
    }

    
    .px-5 {
        padding-right: 3rem !important;
        padding-left: 3rem !important;
    }

    .m-0 {
        margin: 0 !important;
    }

    .m-3 {
        margin: 1rem !important;
    }

    .m-5 {
        margin: 3rem !important;
    }

    .mt-4 {
        margin-top: 1.5rem !important;
    }

    .my-5 {
        margin-top: 3rem !important;
        margin-bottom: 3rem !important;
    }

    .mb-0 {
        margin-bottom: 0 !important;
    }

    .mb-2 {
        margin-bottom: 0.5rem !important;
    }

    .mb-4 {
        margin-bottom: 1.5rem !important;
    }

    .mb-5 {
        margin-bottom: 3rem !important;
    }

    .me-auto {
        margin-right: auto !important;
    }

    .me-5 {
        margin-right: 3rem !important;
    }

    .mx-1 {
        margin-right: 0.25rem !important;
        margin-left: 0.25rem !important;
    }

    .border-bottom {
        border-bottom: 1px solid #dee2e6 !important;
    }

    .border-top-0 {
        border-top: 0 !important;
    }

    .bg-dark {
        --bs-bg-opacity: 1;
        background-color: rgba(var(--bs-dark-rgb), var(--bs-bg-opacity)) !important;
    }

    .container,
    .container-fluid,
    .container-xxl,
    .container-xl,
    .container-lg,
    .container-md,
    .container-sm {
        width: 100%;
        padding-right: var(--bs-gutter-x, 0.75rem);
        padding-left: var(--bs-gutter-x, 0.75rem);
        margin-right: auto;
        margin-left: auto;
    }

    .g-4,
    .gx-4 {
        --bs-gutter-x: 1.5rem;
    }


    @media (min-width: 576px) {

        .container-sm,
        .container {
            max-width: 540px;
        }
    }


    /* md width  */

    @media (max-width:1127px) {
        .me-5 {
            margin: auto !important;
        }

        .col-md-9 {
            text-align: center;
        }
    }

    @media (min-width: 1128px) {
        .col-md-2 {
            flex: 0 0 auto;
            width: 16.66666667%;
        }

        .col-md-3 {
            flex: 0 0 auto;
            width: 25%;
        }

        .col-md-6 {
            flex: 0 0 auto;
            width: 50%;
        }

        .col-md-7 {
            flex: 0 0 auto;
            width: 58.33333333%;
        }

        .col-md-8 {
            flex: 0 0 auto;
            width: 66.66666667%;
        }

        .col-md-9 {
            flex: 0 0 auto;
            width: 75%;
        }

        .col-md-12 {
            flex: 0 0 auto;
            width: 100%;
        }


    }

    @media (min-width: 768px) {

        .container-md,
        .container-sm,
        .container {
            max-width: 720px;
        }
    }


    @media (min-width: 768px) {
        .mb-md-0 {
            margin-bottom: 0 !important;
        }
    }

    /* lg width  */
    @media (min-width: 992px) {
        .navbar-expand-lg .navbar-toggler {
            display: none;
        }

        .g-lg-5,
        .gx-lg-5 {
            --bs-gutter-x: 3rem;
        }

        .col-lg-3 {
            flex: 0 0 auto;
            width: 25%;
        }

        .col-lg-6 {
            flex: 0 0 auto;
            width: 50%;
        }

        .navbar-expand-lg .navbar-collapse {
            display: flex !important;
            flex-basis: auto;
        }

        .navbar-expand-lg {
            flex-wrap: nowrap;
            justify-content: flex-start;
        }

        .navbar-expand-lg .navbar-nav {
            flex-direction: row;
        }

        .navbar-expand-lg .navbar-nav .nav-link {
            padding-right: 0.5rem;
            padding-left: 0.5rem;
        }

        .ms-lg-4 {
            margin-left: 1.5rem !important;
        }

        .container-lg,
        .container-md,
        .container-sm,
        .container {
            max-width: 960px;
        }

        .mb-lg-0 {
            margin-bottom: 0 !important;
        }

        .px-lg-5 {
            padding-right: 3rem !important;
            padding-left: 3rem !important;
        }
    }

    .navbar>.container,
    .navbar>.container-fluid,
    .navbar>.container-sm,
    .navbar>.container-md,
    .navbar>.container-lg,
    .navbar>.container-xl,
    .navbar>.container-xxl {
        display: flex;
        flex-wrap: inherit;
        align-items: center;
        justify-content: space-between;
    }


    .text-center {
        text-align: center !important;
    }

    .text-white {
        --bs-text-opacity: 1;
        color: rgba(var(--bs-white-rgb), var(--bs-text-opacity)) !important;
    }

    .display-4 {
        font-size: calc(1.475rem + 2.7vw);
        font-weight: 300;
        line-height: 1.2;
    }


    .d-flex {
        display: flex !important;
    }

    .list-group-vertical {
        flex-direction: column;
    }

    .fw-bolder {
        font-weight: bolder !important;
    }

    .navbar {
        position: relative;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
    }

    .navbar-nav {
        display: flex;
        flex-direction: column;
        padding-left: 0;
        margin-bottom: 0;
        list-style: none;
        margin-left: auto;

    }

    .navbar-light .navbar-brand {
        color: rgba(0, 0, 0, 0.9);
    }

    .navbar-light .navbar-brand:hover,
    .navbar-light .navbar-brand:focus {
        color: rgba(0, 0, 0, 0.9);
    }

    .navbar-light .navbar-nav .nav-link {
        color: rgba(0, 0, 0, 0.55);
    }

    .navbar-light .navbar-nav .nav-link:hover,
    .navbar-light .navbar-nav .nav-link:focus {
        color: rgba(0, 0, 0, 0.7);
    }

    .navbar-light .navbar-toggler {
        color: rgba(0, 0, 0, 0.55);
        border-color: rgba(0, 0, 0, 0.1);
    }

    .navbar-brand {
        padding-top: 0.3125rem;
        padding-bottom: 0.3125rem;
        margin-right: 1rem;
        font-size: 1.25rem;
        text-decoration: none;
        white-space: nowrap;
    }

    .navbar-toggler {
        padding: 0.25rem 0.75rem;
        font-size: 1.25rem;
        line-height: 1;
        background-color: transparent;
        border: 1px solid transparent;
        border-radius: 0.25rem;
        transition: box-shadow 0.15s ease-in-out;
    }

    .collapse:not(.show) {
        display: none;
    }

    .navbar-collapse {
        flex-basis: 100%;
        flex-grow: 1;
        align-items: center;
    }



    .text-dark {
        --bs-text-opacity: 1;
        color: rgba(var(--bs-dark-rgb), var(--bs-text-opacity)) !important;
    }

    .nav-link {
        display: block;
        padding: 0.5rem 1rem;
        color: #0d6efd;
        text-decoration: none;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
    }

    @media (prefers-reduced-motion: reduce) {
        .nav-link {
            transition: none;
        }
    }

    .nav-link:hover,
    .nav-link:focus {
        color: #0a58ca;
        border-bottom: 3px solid #d8c47f;
    }

    .nav-link.active {
        border-bottom: 3px solid #d8c47f;
    }

    .justify-content-center {
        justify-content: center !important;
    }

    /* .align-items-stretch {
        align-items: stretch !important;
    } */

    /* .col {
        flex: 1 0 0%;
    } */


    /* xl width  */
    @media (min-width: 1200px) {

        h4,
        .h4 {
            font-size: 1.5rem;
        }

        h3,
        .h3 {
            font-size: 1.75rem;
        }

        h2,
        .h2 {
            font-size: 2rem;
        }

        h1,
        .h1 {
            font-size: 2.5rem;
        }

    }

    @media (min-width: 1200px) {
        .row-cols-xl-4>* {
            flex: 0 0 auto;
            width: 25%;
        }
    }

    @media (min-width: 1200px) {

        .container-xl,
        .container-lg,
        .container-md,
        .container-sm,
        .container {
            max-width: 1140px;
        }
    }

    @media (min-width: 1200px) {
        .display-4 {
            font-size: 3.5rem;
        }
    }

    @media (min-width: 1400px) {

        .container-xxl,
        .container-xl,
        .container-lg,
        .container-md,
        .container-sm,
        .container {
            max-width: 1320px;
        }
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.125);
        border-radius: 0.25rem;
    }

    .card-img,
    .card-img-top,
    .card-img-bottom {
        width: 100%;
    }

    .card-img,
    .card-img-top {
        border-top-left-radius: calc(0.25rem - 1px);
        border-top-right-radius: calc(0.25rem - 1px);
    }

    .card-body p {
        margin: 2px
    }

    .text-uppercase {
        text-transform: uppercase !important;
    }

    .list-unstyled {
        padding-left: 0;
        list-style: none;
    }


    .text-secondary {
        --bs-text-opacity: 1;
        color: rgba(var(--bs-secondary-rgb), var(--bs-text-opacity)) !important;
    }


    .navbar-toggler-icon {
        display: inline-block;
        width: 1.5em;
        height: 1.5em;
        vertical-align: middle;
        background-repeat: no-repeat;
        background-position: center;
        background-size: 100%;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%280, 0, 0, 0.55%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }

    .h-100 {
        height: 100% !important;
    }

    .w-100 {
        width: 100% !important;
    }

    .btn {
        display: inline-block;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        text-align: center;
        text-decoration: none;
        vertical-align: middle;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-color: transparent;
        border: 1px solid transparent;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        border-radius: 0.25rem;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    @media (prefers-reduced-motion: reduce) {
        .btn {
            transition: none;
        }
    }

    .btn:hover {
        color: #212529;
    }

    .btn-check:focus+.btn,
    .btn:focus {
        outline: 0;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }

    .btn:disabled,
    .btn.disabled,
    fieldset:disabled .btn {
        pointer-events: none;
        opacity: 0.65;
    }

    .btn-outline-dark {
        color: #212529;
        border-color: #212529;
    }

    .btn-outline-dark:hover {
        color: #fff;
        background-color: #212529;
        border-color: #212529;
    }

    .btn-check:focus+.btn-outline-dark,
    .btn-outline-dark:focus {
        box-shadow: 0 0 0 0.25rem rgba(33, 37, 41, 0.5);
    }

    .btn-check:checked+.btn-outline-dark,
    .btn-check:active+.btn-outline-dark,
    .btn-outline-dark:active,
    .btn-outline-dark.active,
    .btn-outline-dark.dropdown-toggle.show {
        color: #fff;
        background-color: #212529;
        border-color: #212529;
    }

    .btn-check:checked+.btn-outline-dark:focus,
    .btn-check:active+.btn-outline-dark:focus,
    .btn-outline-dark:active:focus,
    .btn-outline-dark.active:focus,
    .btn-outline-dark.dropdown-toggle.show:focus {
        box-shadow: 0 0 0 0.25rem rgba(33, 37, 41, 0.5);
    }

    .btn-outline-dark:disabled,
    .btn-outline-dark.disabled {
        color: #212529;
        background-color: transparent;
    }

    .btn-close {
    box-sizing: content-box;
    width: 1em;
    height: 1em;
    padding: 0.25em 0.25em;
    color: #000;
    background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000'%3e%3cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/%3e%3c/svg%3e") center/1em auto no-repeat;
    border: 0;
    border-radius: 0.25rem;
    opacity: 0.5;
  }

  .btn-close:hover {
    color: #000;
    text-decoration: none;
    opacity: 0.75;
  }

  .btn-close:focus {
    outline: 0;
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    opacity: 1;
  }
  
    /* modal  */
    /* The Modal (background) */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        padding: 10vh 0;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        /* Black w/ opacity */
        background-color: rgba(0, 0, 0, 0.4);

    }

    
  .modal-header {
    display: flex;
    flex-shrink: 0;
    align-items: center;
    justify-content: space-between;
    padding: 1rem 1rem;
    border-bottom: 1px solid #dee2e6;
    border-top-left-radius: calc(0.3rem - 1px);
    border-top-right-radius: calc(0.3rem - 1px);
  }

  .modal-header .btn-close {
    padding: 0.5rem 0.5rem;
    margin: -0.5rem -0.5rem -0.5rem auto;
  }

  .modal-title {
    margin-bottom: 0;
    line-height: 1.5;
  }

    /* Modal Content */
    .modal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        border: 1px solid #888;
        width: 50%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.4s;
        animation-name: animatetop;
        animation-duration: 0.4s;
    }

    /* Add Animation */
    @-webkit-keyframes animatetop {
        from {
            top: -300px;
            opacity: 0
        }

        to {
            top: 0;
            opacity: 1
        }
    }

    @keyframes animatetop {
        from {
            top: -300px;
            opacity: 0
        }

        to {
            top: 0;
            opacity: 1
        }
    }

    .modal-body {
        padding: 16px;
    }

    .modal-body p {
        font-size: 20px;
    }

    .search-icon {
        border-radius: 0 !important;
        border-top-right-radius: 5px !important;
        border-bottom-right-radius: 5px !important;
        border: #333 solid 1px;
        padding: 10px;
        font-size: 16px;
        color: #fff;
        background-color: #333;
    }

    .search-icon:hover {
        background-color: #fff;
    }
</style>