@extends('Frontend.layouts.master-layout') 
@section('title','- All Universities') 
@section('head') 
<link href="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/css/bootstrap.min.8fe708988952.css" rel="stylesheet">
{{-- <link href="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/css/wnoty.min.af5ceb4c7a82.css" rel="stylesheet" />
<link rel="stylesheet" href="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/css/fontawesome.b9d8f62f5168.css">
<link href="https://d2xtzyi0kjzog2.cloudfront.net/static/node_modules/account/css/select2.min.bc523f920a65.css" rel="stylesheet" />
<link rel="stylesheet" href="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/css/animate.2422239f8973.css">
<link rel="stylesheet" href="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/css/ideabox-popup.min.c0175357c0da.css">
<link rel="stylesheet" href="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/css/tippy.ebd6f8ce46a6.css">
<script src="https://js.hcaptcha.com/1/api.js" async defer></script> --}}




<style>


    .info_slide_dots {
    bottom: 0px !important;
    }

    .show-less {
    height: 1.5em;
    overflow: hidden;
    }

    .show-less-lg {
    height: 9em;
    overflow: hidden;

    }

    .sp-layer {
    background: #fff;
    }

    .logo {
    width: 100px;
    height: 100px;
    }

    html {
    scroll-behavior: smooth;
    }

    body {
    font-family: "Lato", sans-serif;
    }

    /* styles by Boni  start here*/
    .ca-card-title {
    padding-bottom: 0.5em;
    padding-right: 20px;
    display: inline-block;
    font-size: 20px;
    }

    article h3 {
    margin-bottom: 0.5em;
    margin-top: 1em;
    }

    a.nav-link:hover {
    color: #e10707;
    }

    h3 {
    font-weight: 700;
    color: #484848;
    }

    p {
    margin-bottom: 0.5em;
    }

    .mdc-card {
    background: #ffffff;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    }

    .intro-headers {
    font-weight: 700;
    font-size: 16px;
    }

    .card-container p {
    margin-bottom: 0px;
    font-size: 12px;
    }

    .card-container {
    max-width: 232px;
    }

    .card-container .card-body {
    box-shadow: 0px 10px 16px rgba(0, 0, 0, 0.1), 0px 4px 6px rgba(0, 0, 0, 0.06);
    line-height: 14px;
    }

    .title {
    font-family: Lato;
    font-style: normal;
    font-weight: bold;
    font-size: 14px;
    line-height: 16px;
    }

    .question {
    border: 0 solid #d71f27;
    border-left-width: 2px !important;
    }

    .reply-btn {
    color: #d71f27;
    }

    .fa.checked {
    color: #efac4d;
    }

    .fa.unchecked {
    color: #dad8d4;
    }

    .review-types {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: 1fr 1fr;
    grid-auto-columns: 1fr 1fr;
    grid-auto-rows: 1fr 1fr 1fr 1fr;
    grid-gap: 1em 1em;
    }

    .review-item {
    font-size: 12px;
    }

    .review-item .stars {
    font-size: 10px;
    }

    .sticky-nav {
    position: -webkit-sticky;
    position: sticky;
    top: 1.5em;
    margin: 0px !important;

    }

    .sidebar {
    position: absolute;
    top: 0px;
    left: 0;
    width: 100%;
    height: 100%;
    }

    div#masonry {
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    height: 100vw;
    max-height: 400px;
    font-size: 0;
    overflow-x: scroll;
    }

    div#masonry img {
    width: 33.3%;
    }

    /* fallback for earlier versions of Firefox */

    @supports not (flex-wrap: wrap) {
    div#masonry {
    display: block;
    }

    div#masonry img {
    display: inline-block;
    vertical-align: top;
    }
    }

    .nav-pills .nav-link {
    font-weight: 700;
    color: #484848;
    }

    #navbar-sections .nav-link.active {
    color: #484848;
    background: #fff;
    }

    #campus-nav .nav-link.active {
    color: #e10707;
    background: #fff;
    font-weight: 700;
    flex-grow: 1;
    border-bottom: 1px solid;
    }

    #campus-nav .nav-link {
    color: #333;
    background: #fff;
    font-weight: 700;
    flex-grow: 1;
    min-width: max-content;
    }

    #campus-nav .nav {
    justify-content: space-between;
    height: 4rem;
    overflow-x: scroll;
    display: flex;
    flex-wrap: nowrap;
    }

    .navbar {
    background: #ffffff;
    box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.05), 0px 1px 3px rgba(0, 0, 0, 0.1);
    }

    * {
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    }

    .mdc-card__supporting-text {
    font-family: Lato, sans-serif;
    font-weight: 400;
    letter-spacing: 0;
    color: #333;
    font-size: 16px;
    line-height: 1.733!important;
    }

    .divider {
    border-bottom-width: 1px !important;
    border-bottom-style: solid !important;
    border-bottom-color: #ebebeb !important;
    }
    .red-divider {
    border-bottom-width: 5px !important;
    border-bottom-style: solid !important;
    border-bottom-color: #d71f27 !important;
    }
    .section-header,
    .steps-header,
    .steps-name {
    color: #e10707;
    font-weight: 400;
    font-size: 1.4em;
    }

    .steps-header {
    margin-bottom: 20px;
    text-align: center;
    }

    .steps-timeline {
    outline: 1px dashed rgba(255, 0, 0, 0);
    }

    @media screen and (max-width: 500px) {
    .steps-timeline {
    border-left: 2px solid #e10707;
    margin-left: 25px;
    }
    }

    @media screen and (min-width: 500px) {
    .steps-timeline {
    border-top: 2px solid #e10707;
    padding-top: 20px;
    margin-top: 40px;
    margin-left: 10%;
    margin-right: 10%;
    }
    }

    .steps-timeline:after {
    content: "";
    display: table;
    clear: both;
    }

    .steps-one,
    .steps-two,
    .steps-three {
    outline: 1px dashed rgba(0, 128, 0, 0);
    }

    @media screen and (max-width: 500px) {
    .steps-one,
    .steps-two,
    .steps-three {
    margin-left: -25px;
    }
    }

    @media screen and (min-width: 500px) {
    .steps-one,
    .steps-two,
    .steps-three {
    float: left;
    width: 33%;
    margin-top: -50px;
    }
    }

    @media screen and (max-width: 500px) {
    .steps-one,
    .steps-two {
    padding-bottom: 40px;
    }
    }

    @media screen and (min-width: 500px) {
    .steps-one {
    margin-left: -16.65%;
    margin-right: 16.65%;
    }
    }

    @media screen and (max-width: 500px) {
    .steps-three {
    margin-bottom: -100%;
    }
    }

    @media screen and (min-width: 500px) {
    .steps-three {
    margin-left: 16.65%;
    margin-right: -16.65%;
    }
    }

    .steps-img {
    display: block;
    margin: auto;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    }

    @media screen and (max-width: 500px) {
    .steps-img {
    float: left;
    margin-right: 20px;
    }
    }

    .steps-name,
    .steps-description {
    margin: 0;
    }

    @media screen and (min-width: 500px) {
    .steps-name {
    text-align: center;
    }
    }

    .steps-description {
    overflow: hidden;
    }

    @media screen and (min-width: 500px) {
    .steps-description {
    text-align: center;
    }
    }

    .ca-button {
    --mdc-dialog-dark-theme-bg-color: #303030;
    --mdc-persistent-drawer-dark-theme-bg-color: #212121;
    --mdc-permanent-drawer-dark-theme-bg-color: #212121;
    --mdc-theme-background: #fff;
    --mdc-theme-text-primary-on-primary: white;
    --mdc-theme-text-secondary-on-primary: rgba(255, 255, 255, 0.7);
    --mdc-theme-text-hint-on-primary: rgba(255, 255, 255, 0.5);
    --mdc-theme-text-disabled-on-primary: rgba(255, 255, 255, 0.5);
    --mdc-theme-text-icon-on-primary: rgba(255, 255, 255, 0.5);
    --mdc-theme-text-primary-on-accent: white;
    --mdc-theme-text-secondary-on-accent: rgba(255, 255, 255, 0.7);
    --mdc-theme-text-hint-on-accent: rgba(255, 255, 255, 0.5);
    --mdc-theme-text-disabled-on-accent: rgba(255, 255, 255, 0.5);
    --mdc-theme-text-icon-on-accent: rgba(255, 255, 255, 0.5);
    --mdc-theme-text-primary-on-background: rgba(0, 0, 0, 0.87);
    --mdc-theme-text-secondary-on-background: rgba(0, 0, 0, 0.54);
    --mdc-theme-text-hint-on-background: rgba(0, 0, 0, 0.38);
    --mdc-theme-text-disabled-on-background: rgba(0, 0, 0, 0.38);
    --mdc-theme-text-icon-on-background: rgba(0, 0, 0, 0.38);
    --mdc-theme-text-primary-on-light: rgba(0, 0, 0, 0.87);
    --mdc-theme-text-secondary-on-light: rgba(0, 0, 0, 0.54);
    --mdc-theme-text-hint-on-light: rgba(0, 0, 0, 0.38);
    --mdc-theme-text-disabled-on-light: rgba(0, 0, 0, 0.38);
    --mdc-theme-text-icon-on-light: rgba(0, 0, 0, 0.38);
    --mdc-theme-text-primary-on-dark: white;
    --mdc-theme-text-secondary-on-dark: rgba(255, 255, 255, 0.7);
    --mdc-theme-text-hint-on-dark: rgba(255, 255, 255, 0.5);
    --mdc-theme-text-disabled-on-dark: rgba(255, 255, 255, 0.5);
    --mdc-theme-text-icon-on-dark: rgba(255, 255, 255, 0.5);
    --mdc-theme-primary: #d71f27;
    --mdc-theme-accent: #ffd54f;
    white-space: nowrap;
    font-family: Lato, sans-serif;
    -webkit-font-smoothing: antialiased;
    letter-spacing: 0.04em;
    display: inline-block;
    position: relative;
    height: 36px;
    padding: 0 16px;
    border: none;
    border-radius: 2px;
    outline: none;
    background: transparent;
    font-size: 14px;
    font-weight: 600;
    line-height: 36px;
    text-align: center;
    text-decoration: none;
    text-transform: uppercase;
    overflow: hidden;
    vertical-align: middle;
    user-select: none;
    box-sizing: border-box;
    -webkit-appearance: none;
    box-shadow: 0px 3px 1px -2px rgba(0, 0, 0, 0.2),
    0px 2px 2px 0px rgba(0, 0, 0, 0.14), 0px 1px 5px 0px rgba(0, 0, 0, 0.12);
    transition: box-shadow 280ms cubic-bezier(0.4, 0, 0.2, 1);
    direction: ltr;
    --mdc-ripple-surface-width: 0;
    --mdc-ripple-surface-height: 0;
    --mdc-ripple-fg-size: 0;
    --mdc-ripple-left: 0;
    --mdc-ripple-top: 0;
    --mdc-ripple-fg-scale: 1;
    --mdc-ripple-fg-translate-end: 0;
    --mdc-ripple-fg-translate-start: 0;
    will-change: transform, opacity;
    -webkit-tap-highlight-color: transparent;
    background-color: var(--mdc-theme-primary, #3f51b5);
    color: var(--mdc-theme-text-primary-on-primary, white);
    margin: 0 8px 0 0;
    margin-left: 0;
    margin-right: 0;
    right: 0;
    width: 100%;
    }

    .lightbox {
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    display: none;
    background: #7f8c8d;
    perspective: 1000;
    }

    .filter {
    position: absolute;
    width: 100%;
    height: 100%;
    filter: blur(20px);
    opacity: 0.5;
    background-position: center;
    background-size: cover;
    }

    .lightbox img {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) rotateY(0deg);
    max-height: 95vh;
    max-width: calc(95vw - 100px);
    transition: 0.8s cubic-bezier(0.7, 0, 0.4, 1);
    transform-style: preserve-3d;
    }

    .slider-pro img {
    width: 100%;
    cursor: pointer;
    }

    .star-field {
    display: flex;
    }

    .star-rating-wrapper {
    display: flex;
    margin-bottom: 1rem;
    }

    .rating-score {
    margin-left: 1em;
    color: #d71f27;
    font-weight: 700;
    }

    .jq-stars {
    display: inline-block;
    }

    .jq-rating-label {
    font-size: 22px;
    display: inline-block;
    position: relative;
    vertical-align: top;
    font-family: helvetica, arial, verdana;
    }

    .jq-star {
    width: 100px;
    height: 100px;
    display: inline-block;
    cursor: pointer;
    }

    .jq-star-svg {
    padding-left: 3px;
    width: 100%;
    height: 100%;
    }

    .jq-star:hover .fs-star-svg path {
    }

    .jq-star-svg path {
    /* stroke: #000; */
    stroke-linejoin: round;
    }

    /* un-used */
    .jq-shadow {
    -webkit-filter: drop-shadow(-2px -2px 2px #888);
    filter: drop-shadow(-2px -2px 2px #888);
    }

    .program-ratings .jq-star {
    cursor: default;
    }

    .mdc-card__supporting-text,
    p,
    h3,
    h2,
    h1,
    h4,
    span,
    label,
    div,
    strong,
    small {
    font-family: Lato, sans-serif;
    }

    /* lato-regular - latin */
    @font-face {
    font-family: "Lato";
    font-style: normal;
    font-weight: 400;
    src: local("Lato Regular"), local("Lato-Regular"),
    url("/static/assets/fonts/lato-v16-latin-regular.woff2") format("woff2"),
    /* Chrome 26+, Opera 23+, Firefox 39+ */
    url("/static/assets/fonts/lato-v16-latin-regular.woff") format("woff");
    /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
    }

    /* lato-700 - latin */
    @font-face {
    font-family: "Lato";
    font-style: normal;
    font-weight: 700;
    src: local("Lato Bold"), local("Lato-Bold"),
    url("/static/assets/fonts/lato-v16-latin-700.woff2") format("woff2"),
    /* Chrome 26+, Opera 23+, Firefox 39+ */
    url("/static/assets/fonts/lato-v16-latin-700.woff") format("woff");
    /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
    }

    /* lato-900 - latin */
    @font-face {
    font-family: "Lato";
    font-style: normal;
    font-weight: 900;
    src: local("Lato Black"), local("Lato-Black"),
    url("/static/assets/fonts/lato-v16-latin-900.woff2") format("woff2"),
    /* Chrome 26+, Opera 23+, Firefox 39+ */
    url("/static/assets/fonts/lato-v16-latin-900.woff") format("woff");
    /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
    }

    .mdc-select {
    width: 100%;
    max-width: 100%;
    }

    .animation-ctn {
    text-align: center;
    margin-top: 5em;
    }

    @-webkit-keyframes checkmark {
    0% {
    stroke-dashoffset: 100px;
    }

    100% {
    stroke-dashoffset: 200px;
    }
    }

    @-ms-keyframes checkmark {
    0% {
    stroke-dashoffset: 100px;
    }

    100% {
    stroke-dashoffset: 200px;
    }
    }

    @keyframes checkmark {
    0% {
    stroke-dashoffset: 100px;
    }

    100% {
    stroke-dashoffset: 0px;
    }
    }

    @-webkit-keyframes checkmark-circle {
    0% {
    stroke-dashoffset: 480px;
    }

    100% {
    stroke-dashoffset: 960px;
    }
    }

    @-ms-keyframes checkmark-circle {
    0% {
    stroke-dashoffset: 240px;
    }

    100% {
    stroke-dashoffset: 480px;
    }
    }

    @keyframes checkmark-circle {
    0% {
    stroke-dashoffset: 480px;
    }

    100% {
    stroke-dashoffset: 960px;
    }
    }

    @keyframes colored-circle {
    0% {
    opacity: 0;
    }

    100% {
    opacity: 100;
    }
    }

    /* other styles */
    /* .svg svg {
    display: none
    }
    */
    .inlinesvg .svg svg {
    display: inline;
    }

    /* .svg img {
    display: none
    } */

    .icon--order-success svg polyline {
    -webkit-animation: checkmark 0.25s ease-in-out 0.7s backwards;
    animation: checkmark 0.25s ease-in-out 0.7s backwards;
    }

    .icon--order-success svg circle {
    -webkit-animation: checkmark-circle 0.6s ease-in-out backwards;
    animation: checkmark-circle 0.6s ease-in-out backwards;
    }

    .icon--order-success svg circle#colored {
    -webkit-animation: colored-circle 0.6s ease-in-out 0.7s backwards;
    animation: colored-circle 0.6s ease-in-out 0.7s backwards;
    }

    .grid-image {
    width: 273px;
    height: 170px;
    float: left;
    -webkit-box-shadow: 0 0 5px 0 #ccc;
    box-shadow: 0 0 5px 0 #ccc;
    justify-content: center;
    align-content: center;
    display: flex;
    }

    .accomodation-images::-webkit-scrollbar {
    -webkit-appearance: none;
    }

    .accomodation-images::-webkit-scrollbar:vertical {
    width: 11px;
    }

    .accomodation-images::-webkit-scrollbar:horizontal {
    height: 11px;
    }

    .accomodation-images::-webkit-scrollbar-thumb {
    border-radius: 8px;
    border: 2px solid white;
    /* should match background, can't be transparent */
    background-color: rgba(0, 0, 0, 0.5);
    }

    /* Related Program */

    .ca-card-title-three-lines {
    height: 75px;
    width: auto;
    overflow: hidden;
    }
    .ca-card-title-two-lines {
    height: 50px;
    width: auto;
    overflow: hidden;
    }
    .embed-responsive .card-img-top {
    object-fit: cover;
    }

    @media screen and (max-width: 500px) {
    .w-sm-auto {
    width: auto !important;
    }
    }
    .non-valid-req :not(a)::before{
    font-family: "Font Awesome 5 Free";
    content: "\f057";
    margin-right: 5px;
    display: inline-block;
    color:#dc3545;
    }
    .valid-req :not(a)::before{
    font-family: "Font Awesome 5 Free";
    content: "\f058";
    margin-right: 5px;
    display: inline-block;
    color:#28a745;
    }
    .valid-req,.non-valid-req{
    display: flex;
    }
    .show-more-btn {
    color: #484848;
    font-weight: 700;
    width: 100%;
    display: flex;
    position: absolute;
    bottom: 0px;
    justify-content: center;
    padding-top: 35px;
    background: -webkit-linear-gradient(rgba(255,255,255,0) 0%, rgba(255,255,255,1) 70%);
    background: -moz-linear-gradient(rgba(255,255,255,0) 0%, rgba(255,255,255,1) 70%);
    background: -o-linear-gradient(rgba(255,255,255,0) 0%, rgba(255,255,255,1) 70%);
    background: linear-gradient(rgba(255,255,255,0) 0%, rgba(255,255,255,1) 70%);
    }
    .show-less-btn{
    color: #484848;
    width: 100%;
    font-weight: 700;
    }
    @media only screen and (max-width:768px) { 
    #navbar-sections .nav{
    height: 3rem;
    display: flex;
    overflow-x: scroll;
    }
    .program-ratings .rating-left{
    display: flex;
    justify-content: space-between;
    }
    .ca-card-title-two-lines ,.ca-card-title-three-lines{
    height: auto;
    }
    .wordpress-posts .card{
    width: auto!important;
    max-width: 100%!important;
    }
    #introduction .row{
    display: flex;
    }
    }
    /* the fieldset */
    .strong-rating {
    display: inline-block;
    border: 0;
    }

    /* the stars */

    .strong-rating span.star {
    display: inline-block;
    margin: 0;
    max-height: none;
    max-width: none;
    padding: 0;
    }

    .strong-rating span.star:before {
    content: "";
    -webkit-mask: url('/static/assets/star-solid.svg') center center no-repeat;
    mask: url('/static/assets/star-solid.svg') center center no-repeat;
    display: inline-block;
    font-size: 1.25em;
    width:19px;
    height:20px;
    /* use padding not margin */
    padding: 0 4px;
    transition: color 0.3s ease;
    color: #FFB900;
    background: #FFB900;
    }
    .showmore_content		{ position:relative; overflow:hidden; }			
    .showmore_trigger 	{     
    width: 100%;
    cursor: pointer;
    color: #484848;
    font-weight: 700;
    width: 95%;
    display: flex;
    bottom: 0px;
    justify-content: center;}
    .showmore_trigger span	{ display:block; }
    .zsiq_cnt{
    display: none!important;
    }

    .upvote, .downvote{
    color: #C4C4C4;
    }
    .upvote:hover, .downvote:hover{
    color: #d71f27;
    cursor: pointer;
    }

    .pagination li a {


    min-width: 30px;
    height: 28px;
    line-height: 28px;
    display: block;
    background: #fff;
    font-size: 14px;
    color: #333;
    text-decoration: none;
    text-align: center;
    }

    .pagination li.active a {
    height: 30px;
    line-height: 30px;
    background: #aaa;
    color: #fff;

    }
    .vote-count span{
    line-height: 1;
    }

    article a{
    color: #d71f27;
    }
    .author{
    color:#565959!important
    }
    .userQuestion{
    color: #560c10;
    }
    .school-content{
    margin-top: -8rem;
    background: #fff;
    padding: 1.5rem;
    box-shadow: 0 4px 8px rgb(63 92 110 / 15%);
    border-radius: .5rem;
    border-top: 0;
    z-index: 999;
    position: relative;
    }
    .school-page-logo{
    margin-top: -5rem;
    background: #fff;
    padding: 1rem;
    box-shadow: 0 4px 8px rgb(63 92 110 / 15%);
    border-radius: .5rem;
    border-top: 0;
    z-index: 999;
    position: relative;
    width: 130px;

    }
    .mdc-card__supporting-text,
    p,
    h3,
    h2,
    h1,
    h4,
    span,
    label,
    div,
    strong,
    small {
    font-family: Lato, sans-serif;
    }

    /* lato-regular - latin */
    @font-face {
    font-family: 'Lato';
    font-style: normal;
    font-weight: 400;
    src: local('Lato Regular'), local('Lato-Regular'),
        url('/static/assets/fonts/lato-v16-latin-regular.woff2') format('woff2'),
        /* Chrome 26+, Opera 23+, Firefox 39+ */
        url('/static/assets/fonts/lato-v16-latin-regular.woff') format('woff');
    /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
    }

    /* lato-700 - latin */
    @font-face {
    font-family: 'Lato';
    font-style: normal;
    font-weight: 700;
    src: local('Lato Bold'), local('Lato-Bold'),
        url('/static/assets/fonts/lato-v16-latin-700.woff2') format('woff2'),
        /* Chrome 26+, Opera 23+, Firefox 39+ */
        url('/static/assets/fonts/lato-v16-latin-700.woff') format('woff');
    /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
    }

    /* lato-900 - latin */
    @font-face {
    font-family: 'Lato';
    font-style: normal;
    font-weight: 900;
    src: local('Lato Black'), local('Lato-Black'),
        url('/static/assets/fonts/lato-v16-latin-900.woff2') format('woff2'),
        /* Chrome 26+, Opera 23+, Firefox 39+ */
        url('/static/assets/fonts/lato-v16-latin-900.woff') format('woff');
    /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
    }

    body>header {
    position: relative;
    z-index: 50;
    padding-right: 1.5em;
    background-color: var(--mdc-theme-primary);
    }

    body>main {
    padding: 1.5em 0;
    z-index: 5;
    flex: 1;
    }

    body>footer {
    flex: 0;
    }

   



    body>footer .legal p {
    font-size: 70%;
    }

    body>footer .legal__links {
    float: right;
    }

    body>footer>* {
    padding-left: 1.5em;
    padding-right: 1.5em;
    }

    body>footer .secondary-nav {
    box-shadow: rgba(0, 0, 0, 0.3) 0 10px 20px -10px inset;
    }

    body>footer .footer-message {
    background-color: var(--mdc-theme-accent);
    margin-right: 1.5em;
    margin-left: 1.5em;
    line-height: 1.4;
    font-size: 94%;
    }

    body>footer .promo-links p,
    body>footer .sitemap {
    color: white;
    }

    body>footer .promo-links {
    background-color: #777;
    }

    .mdc-typography {
    font-family: Lato, sans-serif;
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    }



    .mdc-typography--headline {
    font-family: Lato, sans-serif;
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    font-size: 1.5rem;
    font-weight: 400;
    letter-spacing: normal;
    line-height: 2rem;
    }

    .mdc-typography--adjust-margin.mdc-typography--headline {
    margin: -0.5rem 0 1rem -0.06em;
    }

    .mdc-typography--title {
    font-family: Lato, sans-serif;
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    font-size: 1.25rem;
    font-weight: 500;
    letter-spacing: 0.02em;
    line-height: 2rem;
    }

    .mdc-typography--adjust-margin.mdc-typography--title {
    margin: -0.5rem 0 1rem -0.05em;
    }

    .mdc-typography--subheading2 {
    font-family: Lato, sans-serif;
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    font-size: 1rem;
    font-weight: 400;
    letter-spacing: 0.04em;
    line-height: 1.75rem;
    }



    .mdc-typography--subheading1 {
    font-family: Lato, sans-serif;
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    font-size: 0.938rem;
    font-weight: 400;
    letter-spacing: 0.04em;
    line-height: 1.5rem;
    }

    .mdc-typography--adjust-margin.mdc-typography--subheading1 {
    margin: -0.313rem 0 0.813rem -0.06em;
    }

    .mdc-typography--body2 {
    font-family: Lato, sans-serif;
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    font-size: 0.875rem;
    font-weight: 500;
    letter-spacing: 0.04em;
    line-height: 1.5rem;
    }

    .mdc-typography--adjust-margin.mdc-typography--body2 {
    margin: -0.25rem 0 0.75rem 0;
    }

    .mdc-typography--body1 {
    font-family: Lato, sans-serif;
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    font-size: 0.875rem;
    font-weight: 400;
    letter-spacing: 0.04em;
    line-height: 1.25rem;
    }

    .mdc-typography--adjust-margin.mdc-typography--body1 {
    margin: -0.25rem 0 0.75rem 0;
    }

    .mdc-typography--caption {
    font-family: Lato, sans-serif;
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    font-size: 0.75rem;
    font-weight: 400;
    letter-spacing: 0.08em;
    line-height: 1.25rem;
    }

    .mdc-typography--adjust-margin.mdc-typography--caption {
    margin: -0.5rem 0 1rem -0.04em;
    }

    .mdc-typography {
    font-family: Lato, sans-serif;
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    }


    .mdc-typography--adjust-margin.mdc-typography--headline {
    margin: -0.5rem 0 1rem -0.06em;
    }

    .mdc-typography--title {
    font-family: Lato, sans-serif;
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    font-size: 1.25rem;
    font-weight: 500;
    letter-spacing: 0.02em;
    line-height: 2rem;
    }

    .mdc-typography--adjust-margin.mdc-typography--title {
    margin: -0.5rem 0 1rem -0.05em;
    }

    .mdc-typography--subheading2 {
    font-family: Lato, sans-serif;
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    font-size: 1rem;
    font-weight: 400;
    letter-spacing: 0.04em;
    line-height: 1.75rem;
    }



    .mdc-typography--subheading1 {
    font-family: Lato, sans-serif;
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    font-size: 0.938rem;
    font-weight: 400;
    letter-spacing: 0.04em;
    line-height: 1.5rem;
    }

    .mdc-typography--adjust-margin.mdc-typography--subheading1 {
    margin: -0.313rem 0 0.813rem -0.06em;
    }

    .mdc-typography--body2 {
    font-family: Lato, sans-serif;
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    font-size: 0.875rem;
    font-weight: 500;
    letter-spacing: 0.04em;
    line-height: 1.5rem;
    }


    .mdc-typography--body1 {
    font-family: Lato, sans-serif;
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    font-size: 0.875rem;
    font-weight: 400;
    letter-spacing: 0.04em;
    line-height: 1.25rem;
    }



    .mdc-typography--caption {
    font-family: Lato, sans-serif;
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    font-size: 0.75rem;
    font-weight: 400;
    letter-spacing: 0.08em;
    line-height: 1.25rem;
    }

    .mdc-typography--adjust-margin.mdc-typography--caption {
    margin: -0.5rem 0 1rem -0.04em;
    }

    .mdc-list--dense {
    padding-top: 4px;
    font-size: .812rem;
    }

    .contact-info span {
    display: block;
    margin-bottom: .25em;
    }

    body>footer .contact-info a,
    body>footer .contact-info a:link,
    body>footer .contact-info a:visited,
    body>footer .contact-info a:hover {
    color: white;
    }

    nav.footer-nav {
    display: flex;
    flex-flow: row wrap;
    align-items: flex-end;
    justify-content: stretch;
    }

    nav.footer-nav>section {
    padding: 0 1em 0 0;
    margin: .5em 1em .5em 0;
    min-width: 10em;
    }

    .footer-nav__brand-links {
    position: relative;
    top: .2em;
    }

    .brand-links__social {
    margin-top: 1em;
    }

    .brand-links__social a,
    .brand-links__social a:link,
    .brand-links__social a:visited,
    .brand-links__social a:hover {
    color: #444;
    }

    .brand-links__logo {
    position: relative;
    left: -1.5em;
    top: .25em
    }

    .footer-nav__sitemap {
    display: flex;
    flex-flow: row wrap;
    justify-content: space-between;
    }

    @media (min-width: 479px) {
    nav.secondary-nav>section {
        flex-basis: 45%;
    }
    }

    nav.footer-nav>section p {
    margin-top: 0;
    }

    /* >>> sitemap nav */

    body>footer .sitemap {
    box-shadow: rgba(0, 0, 0, 0.3) 0 10px 20px -10px inset;
    background-color: #555;
    align-items: flex-start;
    justify-content: flex-start;
    padding-bottom: 2em;
    }

    body>footer .sitemap a:hover {
    text-decoration: underline;
    }

    nav.sitemap>section,
    .sitemap__nav {
    margin: 0;
    padding: 0;
    margin-right: 1em;
    }

    .sitemap__nav__header {
    margin-bottom: .75em;
    }

    body>footer .sitemap__nav ul {
    margin: 0;
    padding: 0;
    }

    body>footer .sitemap__nav ul li.mdc-list-item {
    list-style-type: none;
    padding-left: 0;
    margin-left: 0;
    height: auto;
    }

    body>footer .sitemap__nav a,
    body>footer .sitemap__nav a:link,
    body>footer .sitemap__nav a:visited,
    body>footer .sitemap__nav a:hover {
    color: white;
    }

    /* <<< sitemap nav */

    .mdc-list {
    font-family: Lato, sans-serif;
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    font-size: 1rem;
    font-weight: 400;
    letter-spacing: 0.04em;
    line-height: 1.75rem;
    color: rgba(0, 0, 0, 0.87);
    color: var(--mdc-theme-text-primary-on-background, rgba(0, 0, 0, 0.87));
    margin: 0;
    padding: 8px 16px 0;
    line-height: 1.5rem;
    list-style-type: none;
    }

    .mdc-list--theme-dark,
    .mdc-theme--dark .mdc-list {
    color: white;
    color: var(--mdc-theme-text-primary-on-dark, white);
    }

    .mdc-list--dense {
    padding-top: 4px;
    font-size: .812rem;
    }

    .mdc-list-item {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    height: 48px;
    }

    .mdc-list-item__text {
    display: inline-flex;
    flex-direction: column;
    }


    .mdc-list--dense .mdc-list-item {
    height: 40px;
    }




    a.mdc-list-item {
    color: inherit;
    text-decoration: none;
    }


    .mdc-list-group .mdc-list {
    padding: 0;
    }

    li.mdc-list-item a:hover {
    color: white !important;
    }

    .sitemap {
    box-shadow: rgba(0, 0, 0, 0.3) 0 10px 20px -10px inset;
    background-color: #555;
    align-items: flex-start;
    justify-content: flex-start;
    padding-bottom: 2em;
    }

    .footer-nav {
    margin-top: 50px;
    background-color: #555;
    width: 100vw;
    height: auto;
    position: static;
    top: auto;
    z-index: auto;
    overflow: visible;
    font-family: Lato, Helvetica, Arial, sans-serif;
    }

    .sitemap__nav,
    .footer-nav__brand-links,
    .footer-nav__sitemap {
    display: inline-block;
    color: white;
    }

    ul.mdc-list--dense li a,
    section.footer-nav__brand-links section span a {
    color: white;
    }

    .brand-links__logo {
    height: auto;
    width: auto;
    }

    nav.sitemap>section,
    .sitemap__nav {
    margin: 0;
    padding: 0;
    margin-right: 1em;
    }



    .itemPool {
    text-align: center;
    padding-bottom: 100px;
    }

    .item {
    position: relative;
    background-color: #ffffff;
    margin: 0 auto 20px;
    border-radius: 5px;
    padding: 2% 3%;
    cursor: pointer;
    text-align: left;
    overflow: hidden;
    }

    .item:hover {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }

    .item .uniLogo {
    display: inline-block;
    margin: 10px 15px 10px 0;
    }

    .item .mainContentArea {
    display: inline-block;
    vertical-align: top;
    width: calc(100% - 300px);
    min-width: 295px;
    background: #ffffff;
    position: relative;
    }

    .item .mainContentArea .title {
    font-size: 1.5rem;
    font-weight: 700;
    padding-top: 8px;
    line-height: 1.5rem;
    }

    .item .mainContentArea .spec {
    font-size: .8rem;
    margin-bottom: 10px;
    margin-top: 5px;
    }

    .item .mainContentArea .spec span {
    color: #888;
    }

    .item .mainContentArea .details {
    display: block;
    }

    .item .mainContentArea .details .detail {
    display: inline-block;
    vertical-align: top;
    margin: 5px 20px 0 0;
    }

    .item .mainContentArea .details .detail .name {
    color: #888;
    font-size: .6rem;
    }

    .item .mainContentArea .details .detail .number {
    font-size: 1.3rem;
    font-weight: 700;
    display: inline-block;
    text-transform: uppercase;
    }

    .item .mainContentArea .details .detail .unit {
    font-size: .5rem;
    display: inline-block;
    }

    .item .mainContentArea .details .detail .year {
    font-size: .8rem;
    font-weight: 700;
    display: inline-block;
    }

    .item .actionArea {
    background-color: #fafafa;
    width: 200px;
    height: 100%;
    position: absolute;
    right: 0;
    top: 0;
    text-align: center;
    }

    .item .actionArea .deadline {
    color: #555;
    font-size: .8rem;
    margin: 15px auto 5px;
    }

    .item .actionArea .deadline .date {
    font-size: 1.5rem;
    font-weight: 700;
    }

    .item .actionArea .button {
    display: inline-block;
    }

    .likeOrShare {
    text-align: right;
    height: 35px;
    padding: 10px 15px;
    }

    .likeOrShare.onlyOnMobile {
    position: relative;
    top: 0;
    padding: 0;
    height: 20px;
    }

    .likeOrShare i {
    cursor: pointer;
    font-size: 18px;
    margin-left: 10px;
    }

    .likeOrShare i.fa-heart:hover {
    color: #f55247;
    }

    .likeOrShare i.fa-share:hover {
    color: #6dc067;
    }

    @media only screen and (max-width: 1020px) {


    .item .mainContentArea {
        padding: 2% 3%;
        width: calc(100% - 200px);
    }

    .item .mainContentArea .title {
        padding-top: 2%;
    }
    }

    @media only screen and (max-width: 768px) {
    .item .uniLogo {
        display: flex;
    }

    .item .mainContentArea {
        display: block;
        width: 100%!important;
        min-width: 100%!important;
    }

    .item .actionArea {
        display: none;
    }
    }




    .contentWrapper {
    text-align: center;
    padding: 2.5% 3% 50px;
    max-width: 500px;
    margin: auto;
    }

    .contentWrapper h2 {
    font-size: 18px;
    color: rgba(48, 69, 92, 0.8);
    margin-bottom: 30px;
    font-weight: 500;
    }

    .contentWrapper .button {
    max-width: 280px;
    text-transform: uppercase;
    }

    .applicationList_wrapper {
    text-align: center;
    }

    .applicationList_wrapper .itemList {
    margin: 20px auto;
    }



    .applicationList_wrapper .itemList .item .mainContentArea .spec {
    color: rgba(48, 69, 92, 0.8);
    }

    @media only screen and (max-width: 1020px) {
    .applicationList_wrapper.block {
        background-color: transparent;
        box-shadow: none;
        margin-top: 30px;
    }

    .applicationList_wrapper.block hr {
        display: none;
    }
    }

    @media only screen and (max-width: 900px) {
    .applicationStatus_wrapper .topPart {
        padding-bottom: 180px;
    }

    .stepsWrapper {
        position: absolute;
        left: 0;
        right: 0;
        /*min-width: 460px;*/
    }
    }



    /*Footer */
    .column {
    width: 31%;
    margin: 0px 0.5%;
    display: inline-block;
    vertical-align: top;
    }

    .column.x2 {
    width: 62%;
    margin: 30px 1%;
    }

    .column.x5050 {
    width: 47.5%;
    margin: 10px 1%;
    }

    .column.center {
    display: block;
    margin: 10px auto;
    }


    .button {
    border-radius: 100px;
    border: 1px solid white;
    font-size: 1.3rem;
    font-weight: 100;
    padding: 8px;
    min-width: 150px;
    max-width: 200px;
    margin: auto 0;
    text-align: center;
    cursor: pointer;
    }

    .item-footer {

    justify-content: space-between;
    }

    .button:hover {
    background-color: #ffffff;
    color: rgba(48, 69, 92, 0.8);
    }

    .button.sml {
    font-size: 1rem;
    padding: 6px;
    }

    .button.black_on_white {
    border: 1px solid #555;
    }

    .button.black_on_white:hover {
    background-color: rgba(48, 69, 92, 0.8);
    color: white;
    }

    .button.red {
    border: 1px solid #f55247;
    color: #f55247;
    }

    .button.red:hover {
    background-color: #f55247;
    color: #ffffff;
    }

    .button.red.solid {
    background-color: #f55247;
    color: #ffffff;
    }

    .button.red.solid:hover {
    text-decoration: none;
    opacity: .8;
    }

    .button.green {
    border: 1px solid #6dc067;
    color: #6dc067;
    }

    .button.green:hover {
    background-color: #6dc067;
    color: #ffffff;
    }

    .button.green.solid {
    background-color: #6dc067;
    color: #ffffff;
    }

    .button.green.solid:hover {
    opacity: .8;
    }


    @media only screen and (max-width: 600px) {
    .content {
        border: 10px solid #f3f4f5;
        border-top: 60px solid #f3f4f5;
    }

    .menu-toggle {
        right: 10px;
    }

    .logo_onNav {
        margin: 11px 10px;
    }

    .column {
        width: calc(100% - 20px);
        margin: 10px;
    }

    .column.x2 {
        width: calc(100% - 20px);
        margin: 10px;
    }

    .column.x5050 {
        width: calc(100% - 20px);
        margin: 10px;
    }
    }


    /*Footer*/


    .btn{
    -webkit-font-smoothing: antialiased;
    letter-spacing: 0.04em;
    display: inline-block;
    position: relative;
    height: 36px;
    padding: 0 16px;
    border: none;
    border-radius: 2px;
    outline: none;
    font-size: 14px;
    font-weight: 600;
    line-height: 36px;
    text-align: center;
    text-decoration: none;
    text-transform: uppercase;
    overflow: hidden;
    }

    .current .circle,
    .stepsWrapper.onStep1 .steps:nth-child(3) .circle,
    .stepsWrapper.onStep2 .steps:nth-child(4) .circle,
    .stepsWrapper.onStep3 .steps:nth-child(5) .circle {
    width: 60px;
    height: 60px;
    margin: 0 auto;
    }
    .current .name,
    .stepsWrapper.onStep1 .steps:nth-child(3) .name,
    .stepsWrapper.onStep2 .steps:nth-child(4) .name,
    .stepsWrapper.onStep3 .steps:nth-child(5) .name {
    font-size: 14px;
    font-weight: 500;
    }
    .current.passed .circle:before,
    .stepsWrapper.onStep1 .passed.steps:nth-child(3) .circle:before,
    .stepsWrapper.onStep2 .passed.steps:nth-child(4) .circle:before,
    .stepsWrapper.onStep3 .passed.steps:nth-child(5) .circle:before {
    width: 30px;
    height: 60px;
    }
    .current.notPassed .circle:before,
    .stepsWrapper.onStep1 .notPassed.steps:nth-child(3) .circle:before,
    .stepsWrapper.onStep2 .notPassed.steps:nth-child(4) .circle:before,
    .stepsWrapper.onStep3 .notPassed.steps:nth-child(5) .circle:before {
    width: 2px;
    height: 60px;
    }

    .stepsWrapper {
    position: relative;
    /*min-width: 500px;*/
    min-width: 100%;
    margin: 30px auto;
    display: table;
    }
    .stepsWrapper .line {
    border: 2px white solid;
    margin: auto;
    position: absolute;
    left: 0;
    right: 0;
    top: 34%;
    }
    .stepsWrapper .movingDots {
    opacity: 0.5;
    position: absolute;
    top: 0;
    bottom: 62%;
    right: 16%;
    left: 16%;
    background-image: linear-gradient(to right, white 50%, transparent 0%);
    background-size: 5px 2px;
    background-repeat: repeat-x;
    background-position: 0% center;
    animation-name: demo-3-before;
    animation-duration: 20s;
    animation-timing-function: linear;
    animation-iteration-count: infinite;
    }
    @keyframes demo-3-before {
    0% {
    background-position: 0% bottom;
    }
    100% {
    background-position: 100% bottom;
    }
    }
    .stepsWrapper .steps {
    text-align: center;
    display: table-cell;
    vertical-align: bottom;
    width: 33%;
    }
    .stepsWrapper .steps .circle {
    position: relative;
    display: block;
    margin: 0 auto 23px;
    background: white;
    border-radius: 100px;
    width: 30px;
    height: 30px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .stepsWrapper .steps .circle:before {
    content: "";
    position: absolute;
    height: 30px;
    left: 0;
    right: 0;
    margin: auto;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: contain;
    }
    .stepsWrapper .steps .name {
    font-size: 12px;
    font-weight: 100;
    margin-top: 10px;
    height: 18px;
    }
    .stepsWrapper .steps.passed .circle:before {
    background-image: url("/static/assets/img/tick.svg");
    width: 20px;
    }
    .stepsWrapper .steps.notPassed .circle:before {
    background-image: url("/static/assets/img/attention.svg");
    width: 1px;
    }
    .stepsWrapper.onStep1 .line {
    display: none;
    }
    .stepsWrapper.onStep2 .line {
    width: 30%;
    right: 30%;
    }
    .stepsWrapper.onStep3 .line {
    width: 61%;
    }

    .contentWrapper {
    text-align: center;
    padding: 2.5% 3% 50px;
    max-width: 500px;
    margin: auto;
    }
    .contentWrapper h2 {
    font-size: 18px;
    color: rgba(48, 69, 92, 0.8);
    margin-bottom: 30px;
    font-weight: 500;
    }
    .contentWrapper .button {
    max-width: 280px;
    text-transform: uppercase;
    }

    .applicationList_wrapper {
    text-align: center;
    }
    .applicationList_wrapper .itemList {
    margin: 20px auto;
    }
    .applicationList_wrapper .itemList .item .mainContentArea {
    width: calc(100% - 150px);
    }
    .applicationList_wrapper .itemList .item .mainContentArea .spec {
    color: rgba(48, 69, 92, 0.8);
    }
    @media only screen and (max-width: 1020px) {
    .applicationList_wrapper.block {
    background-color: transparent;
    box-shadow: none;
    margin-top: 30px;
    }
    .applicationList_wrapper.block hr {
    display: none;
    }
    }

    @media only screen and (max-width: 900px) {
    .applicationStatus_wrapper .topPart {
    padding-bottom: 180px;
    }

    .stepsWrapper {
    position: absolute;
    left: 0;
    right: 0;
    /*min-width: 460px;*/
    }
    }
    @media only screen and (max-width: 600px) {
    .stepsWrapper {
    /*&.onStep1{left: 27%;}
    &.onStep2{left: -14%;}
    &.onStep3{left: -51%;}*/
    }
    }
    .current.passed .circle:before, .stepsWrapper.onStep1 .passed.steps:nth-child(3) .circle:before, .stepsWrapper.onStep2 .passed.steps:nth-child(4) .circle:before, .stepsWrapper.onStep3 .passed.steps:nth-child(5) .circle:before {
    width: 30px;
    height: 60px;
    }
    .was-validated .custom-select:invalid + .select2 .select2-selection{
    padding-right: 2.25rem;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23dc3545' viewBox='-2 -2 7 7'%3e%3cpath stroke='%23dc3545' d='M0 0l3 3m0-3L0 3'/%3e%3ccircle r='.5'/%3e%3ccircle cx='3' r='.5'/%3e%3ccircle cy='3' r='.5'/%3e%3ccircle cx='3' cy='3' r='.5'/%3e%3c/svg%3E");
    background-repeat: no-repeat;
    background-position: right calc(0.375em + 0.1875rem) center;
    background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
    border-color: #dc3545!important;
    }
    .was-validated .custom-select:valid + .select2 .select2-selection{
    border-color: #28a745!important;
    padding-right: 2.25rem;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%2328a745' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right calc(0.375em + 0.1875rem) center;
    background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
    }
    .was-validated .custom-select:invalid + .select2.select2-container.select2-container--bootstrap .select2-selection__arrow, select.select2.is-invalid + .select2.select2-container.select2-container--bootstrap .select2-selection__arrow {
    right: 25px!important;
    }
    .was-validated .custom-select:valid + .select2.select2-container.select2-container--bootstrap .select2-selection__arrow, select.select2.is-invalid + .select2.select2-container.select2-container--bootstrap .select2-selection__arrow {
    right: 25px!important;
    }


    .a2a_full_footer{
    display: none;
    }
    @keyframes splide-loading{0%{transform:rotate(0)}to{transform:rotate(1turn)}}.splide__container{position:relative;box-sizing:border-box}.splide__list{display:flex;flex-wrap:wrap;margin:0!important;padding:0!important}.splide__pagination{display:inline-flex;align-items:center;width:95%;flex-wrap:wrap;justify-content:center;margin:0}.splide__pagination li{list-style-type:none;display:inline-block;line-height:1;margin:0}.splide{position:relative;visibility:hidden}.splide.is-active{visibility:visible}.splide__slide{position:relative;box-sizing:border-box;list-style-type:none!important;margin:0}.splide__slide img{vertical-align:bottom}.splide__slider{position:relative}.splide__spinner{position:absolute;top:0;left:0;right:0;bottom:0;margin:auto;display:inline-block;width:20px;height:20px;border-radius:50%;border:2px solid #999;border-left-color:transparent;animation:splide-loading 1s linear infinite}.splide__track{position:relative;z-index:0;overflow:hidden}.splide--draggable>.splide__track>.splide__list>.splide__slide{-webkit-user-select:none;user-select:none}.splide--fade>.splide__track>.splide__list{display:block}.splide--fade>.splide__track>.splide__list>.splide__slide{position:absolute;top:0;left:0;z-index:0;opacity:0}.splide--fade>.splide__track>.splide__list>.splide__slide.is-active{position:relative;z-index:1;opacity:1}.splide--rtl{direction:rtl}.splide--ttb>.splide__track>.splide__list{display:block}.splide--ttb>.splide__pagination{width:auto}.splide__arrow{position:absolute;z-index:1;top:50%;transform:translateY(-50%);width:2em;height:2em;border-radius:50%;display:flex;align-items:center;justify-content:center;border:none;padding:0;opacity:.7;background:#ccc}.splide__arrow svg{width:1.2em;height:1.2em}.splide__arrow:hover{cursor:pointer;opacity:.9}.splide__arrow:focus{outline:none}.splide__arrow--prev{left:1em}.splide__arrow--prev svg{transform:scaleX(-1)}.splide__arrow--next{right:1em}.splide__pagination{position:absolute;z-index:1;bottom:.5em;left:50%;transform:translateX(-50%);padding:0}.splide__pagination__page{display:inline-block;width:8px;height:8px;background:#ccc;border-radius:50%;margin:3px;padding:0;transition:transfrom .2s linear;border:none;opacity:.7}.splide__pagination__page.is-active{transform:scale(1.4);background:#fff}.splide__pagination__page:hover{cursor:pointer;opacity:.9}.splide__pagination__page:focus{outline:none}.splide__progress__bar{width:0;height:3px;background:#ccc}.splide--nav>.splide__track>.splide__list>.splide__slide{border:3px solid transparent}.splide--nav>.splide__track>.splide__list>.splide__slide.is-active{border-color:#000}.splide--nav>.splide__track>.splide__list>.splide__slide:focus{outline:none}.splide--rtl>.splide__arrows .splide__arrow--prev,.splide--rtl>.splide__track>.splide__arrows .splide__arrow--prev{right:1em;left:auto}.splide--rtl>.splide__arrows .splide__arrow--prev svg,.splide--rtl>.splide__track>.splide__arrows .splide__arrow--prev svg{transform:scaleX(1)}.splide--rtl>.splide__arrows .splide__arrow--next,.splide--rtl>.splide__track>.splide__arrows .splide__arrow--next{left:1em;right:auto}.splide--rtl>.splide__arrows .splide__arrow--next svg,.splide--rtl>.splide__track>.splide__arrows .splide__arrow--next svg{transform:scaleX(-1)}.splide--ttb>.splide__arrows .splide__arrow,.splide--ttb>.splide__track>.splide__arrows .splide__arrow{left:50%;transform:translate(-50%)}.splide--ttb>.splide__arrows .splide__arrow--prev,.splide--ttb>.splide__track>.splide__arrows .splide__arrow--prev{top:1em}.splide--ttb>.splide__arrows .splide__arrow--prev svg,.splide--ttb>.splide__track>.splide__arrows .splide__arrow--prev svg{transform:rotate(-90deg)}.splide--ttb>.splide__arrows .splide__arrow--next,.splide--ttb>.splide__track>.splide__arrows .splide__arrow--next{top:auto;bottom:1em}.splide--ttb>.splide__arrows .splide__arrow--next svg,.splide--ttb>.splide__track>.splide__arrows .splide__arrow--next svg{transform:rotate(90deg)}.splide--ttb>.splide__pagination{display:flex;flex-direction:column;bottom:50%;left:auto;right:.5em;transform:translateY(50%)}
    .splide__slide--has-video{cursor:pointer}.splide__slide--has-video:hover .splide__video__play{opacity:1}.splide__slide__container--has-video{cursor:pointer;position:relative}.splide__slide__container--has-video:hover .splide__video__play{opacity:1}.splide__video{position:absolute;top:0;left:0;width:100%;height:100%;background:#000}.splide__video div{height:100%}.splide__video iframe,.splide__video video{width:100%;height:100%}.splide__video__play{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);background:#ccc;width:40px;height:40px;border-radius:50%;border:none;display:flex;justify-content:center;align-items:center;opacity:.7}.splide__video__play:after{content:"";display:inline-block;border-color:transparent transparent transparent #000;border-style:solid;border-width:9px 0 9px 17px;margin-left:4px}
    .header .splide,.header .splide__track,.header .splide__slide{
    height: 24rem;
    }
    .uni-stats{
    flex-basis: 0;
    -ms-flex-positive: 1;
    flex-grow: 1;
    max-width: 100%;
    position: relative;
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;

    }
    @media only screen and (max-width:768px) { 
    .header .splide,.header .splide__track{
        height: auto;
    }
    .uni-stats{
        flex-basis: auto;
        -ms-flex-positive: 1;
        flex-grow: inherit;
        position: relative;
        padding-right: 15px;
        padding-left: 15px;
        flex: 0 0 25%;
    }
    }
    @media only screen and (max-width:425px) { 

    .header .splide__slide{
        height: 14rem;
    }
    .header {
        height: 14rem;
    }
    }
    .splide__pagination{
    bottom: auto;
    }
    .splide_testimonial .splide__arrow--prev{
    left: 0rem;
    }
    .splide_testimonial .splide__arrow--next {
    right: -0.5rem;
    }


</style>
<script>

    var t,n,i;i=function(){var t,n,i,o,r,a,e=Object.prototype.toString,s=void 0!==w?function(e){return w(e)}:setTimeout;try{Object.defineProperty({},"x",{}),t=function(e,t,n,i){return Object.defineProperty(e,t,{value:n,writable:!0,configurable:!1!==i})}}catch(e){t=function(e,t,n){return e[t]=n,e}}function u(e,t){this.fn=e,this.self=t,this.next=void 0}function c(e,t){i.add(e,t),n=n||s(i.drain)}function l(e){var t,n=typeof e;return null==e||"object"!=n&&"function"!=n||(t=e.then),"function"==typeof t&&t}function d(){for(var e=0;e<this.chain.length;e++)f(this,1===this.state?this.chain[e].success:this.chain[e].failure,this.chain[e]);this.chain.length=0}function f(e,t,n){var i,o;try{!1===t?n.reject(e.msg):(i=!0===t?e.msg:t.call(void 0,e.msg))===n.promise?n.reject(TypeError("Promise-chain cycle")):(o=l(i))?o.call(i,n.resolve,n.reject):n.resolve(i)}catch(e){n.reject(e)}}function h(e){var t=this;t.triggered||(t.triggered=!0,t.def&&(t=t.def),t.msg=e,t.state=2,0<t.chain.length&&c(d,t))}function p(e,n,i,o){for(var t=0;t<n.length;t++)!function(t){e.resolve(n[t]).then(function(e){i(t,e)},o)}(t)}function y(e){this.def=e,this.triggered=!1}function v(e){this.promise=e,this.state=0,this.triggered=!1,this.chain=[],this.msg=void 0}function m(e){if("function"!=typeof e)throw TypeError("Not a function");if(0!==this.__NPO__)throw TypeError("Not a promise");this.__NPO__=1;var i=new v(this);this.then=function(e,t){var n={success:"function"!=typeof e||e,failure:"function"==typeof t&&t};return n.promise=new this.constructor(function(e,t){if("function"!=typeof e||"function"!=typeof t)throw TypeError("Not a function");n.resolve=e,n.reject=t}),i.chain.push(n),0!==i.state&&c(d,i),n.promise},this.catch=function(e){return this.then(void 0,e)};try{e.call(void 0,function(e){(function e(n){var i,o=this;if(!o.triggered){o.triggered=!0,o.def&&(o=o.def);try{(i=l(n))?c(function(){var t=new y(o);try{i.call(n,function(){e.apply(t,arguments)},function(){h.apply(t,arguments)})}catch(e){h.call(t,e)}}):(o.msg=n,o.state=1,0<o.chain.length&&c(d,o))}catch(e){h.call(new y(o),e)}}}).call(i,e)},function(e){h.call(i,e)})}catch(e){h.call(i,e)}}var g=t({},"constructor",m,!(i={add:function(e,t){a=new u(e,t),r?r.next=a:o=a,r=a,a=void 0},drain:function(){var e=o;for(o=r=n=void 0;e;)e.fn.call(e.self),e=e.next}}));return t(m.prototype=g,"__NPO__",0,!1),t(m,"resolve",function(n){return n&&"object"==typeof n&&1===n.__NPO__?n:new this(function(e,t){if("function"!=typeof e||"function"!=typeof t)throw TypeError("Not a function");e(n)})}),t(m,"reject",function(n){return new this(function(e,t){if("function"!=typeof e||"function"!=typeof t)throw TypeError("Not a function");t(n)})}),t(m,"all",function(t){var a=this;return"[object Array]"!=e.call(t)?a.reject(TypeError("Not an array")):0===t.length?a.resolve([]):new a(function(n,e){if("function"!=typeof n||"function"!=typeof e)throw TypeError("Not a function");var i=t.length,o=Array(i),r=0;p(a,t,function(e,t){o[e]=t,++r===i&&n(o)},e)})}),t(m,"race",function(t){var i=this;return"[object Array]"!=e.call(t)?i.reject(TypeError("Not an array")):new i(function(n,e){if("function"!=typeof n||"function"!=typeof e)throw TypeError("Not a function");p(i,t,function(e,t){n(t)},e)})}),m},(n=r)[t="Promise"]=n[t]||i(),e.exports&&(e.exports=n[t])}(s={exports:{}}),s.exports),f=new WeakMap;function u(e,t,n){var i=f.get(e.element)||{};t in i||(i[t]=[]),i[t].push(n),f.set(e.element,i)}function h(e,t){return(f.get(e.element)||{})[t]||[]}function p(e,t,n){var i=f.get(e.element)||{};if(!i[t])return!0;if(!n)return i[t]=[],f.set(e.element,i),!0;var o=i[t].indexOf(n);return-1!==o&&i[t].splice(o,1),f.set(e.element,i),i[t]&&0===i[t].length}var y=["autopause","autoplay","background","byline","color","controls","dnt","height","id","loop","maxheight","maxwidth","muted","playsinline","portrait","responsive","speed","texttrack","title","transparent","url","width"];function v(i,e){var t=1<arguments.length&&void 0!==e?e:{};return y.reduce(function(e,t){var n=i.getAttribute("data-vimeo-".concat(t));return!n&&""!==n||(e[t]=""===n?1:n),e},t)}function m(e,t){var n=e.html;if(!t)throw new TypeError("An element must be provided");if(null!==t.getAttribute("data-vimeo-initialized"))return t.querySelector("iframe");var i=document.createElement("div");return i.innerHTML=n,t.appendChild(i.firstChild),t.setAttribute("data-vimeo-initialized","true"),t.querySelector("iframe")}function g(r,e,t){var a=1<arguments.length&&void 0!==e?e:{},s=2<arguments.length?t:void 0;return new Promise(function(t,n){if(!c(r))throw new TypeError("“".concat(r,"” is not a vimeo.com url."));var e="https://vimeo.com/api/oembed.json?url=".concat(encodeURIComponent(r));for(var i in a)a.hasOwnProperty(i)&&(e+="&".concat(i,"=").concat(encodeURIComponent(a[i])));var o=new("XDomainRequest"in window?XDomainRequest:XMLHttpRequest);o.open("GET",e,!0),o.onload=function(){if(404!==o.status)if(403!==o.status)try{var e=JSON.parse(o.responseText);if(403===e.domain_status_code)return m(e,s),void n(new Error("“".concat(r,"” is not embeddable.")));t(e)}catch(e){n(e)}else n(new Error("“".concat(r,"” is not embeddable.")));else n(new Error("“".concat(r,"” was not found.")))},o.onerror=function(){var e=o.status?" (".concat(o.status,")"):"";n(new Error("There was an error fetching the embed code from Vimeo".concat(e,".")))},o.send()})}function b(e){if("string"==typeof e)try{e=JSON.parse(e)}catch(e){return console.warn(e),{}}return e}function E(e,t,n){if(e.element.contentWindow&&e.element.contentWindow.postMessage){var i={method:t};void 0!==n&&(i.value=n);var o=parseFloat(navigator.userAgent.toLowerCase().replace(/^.*msie (\d+).*$/,"$1"));8<=o&&o<10&&(i=JSON.stringify(i)),e.element.contentWindow.postMessage(i,e.origin)}}function T(n,i){var t,e=[];if((i=b(i)).event){if("error"===i.event)h(n,i.data.method).forEach(function(e){var t=new Error(i.data.message);t.name=i.data.name,e.reject(t),p(n,i.data.method,e)});e=h(n,"event:".concat(i.event)),t=i.data}else if(i.method){var o=function(e,t){var n=h(e,t);if(n.length<1)return!1;var i=n.shift();return p(e,t,i),i}(n,i.method);o&&(e.push(o),t=i.value)}e.forEach(function(e){try{if("function"==typeof e)return void e.call(n,t);e.resolve(t)}catch(e){}})}var k=new WeakMap,_=new WeakMap,P=function(){function r(s){var e,u=this,n=1<arguments.length&&void 0!==arguments[1]?arguments[1]:{};if(!/*! @vimeo/player v2.10.0 | (c) 2019 Vimeo | MIT License | https://github.com/vimeo/player.js */
    function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,r),window.jQuery&&s instanceof jQuery&&(1<s.length&&window.console&&console.warn&&console.warn("A jQuery object with multiple elements was passed, using the first element."),s=s[0]),"undefined"!=typeof document&&"string"==typeof s&&(s=document.getElementById(s)),e=s,!Boolean(e&&1===e.nodeType&&"nodeName"in e&&e.ownerDocument&&e.ownerDocument.defaultView))throw new TypeError("You must pass either a valid element or a valid id.");var i=s.ownerDocument.defaultView;if("IFRAME"!==s.nodeName){var t=s.querySelector("iframe");t&&(s=t)}if("IFRAME"===s.nodeName&&!c(s.getAttribute("src")||""))throw new Error("The player element passed isn’t a Vimeo embed.");if(k.has(s))return k.get(s);this.element=s,this.origin="*";var o=new d(function(r,a){function e(e){if(c(e.origin)&&u.element.contentWindow===e.source){"*"===u.origin&&(u.origin=e.origin);var t=b(e.data);if(t&&"error"===t.event&&t.data&&"ready"===t.data.method){var n=new Error(t.data.message);return n.name=t.data.name,void a(n)}var i=t&&"ready"===t.event,o=t&&"ping"===t.method;if(i||o)return u.element.setAttribute("data-ready","true"),void r();T(u,t)}}if(i.addEventListener?i.addEventListener("message",e,!1):i.attachEvent&&i.attachEvent("onmessage",e),"IFRAME"!==u.element.nodeName){var t=v(s,n);g(l(t),t,s).then(function(e){var t,n,i,o=m(e,s);return u.element=o,u._originalElement=s,t=s,n=o,i=f.get(t),f.set(n,i),f.delete(t),k.set(u.element,u),e}).catch(a)}});return _.set(this,o),k.set(this.element,this),"IFRAME"===this.element.nodeName&&E(this,"ping"),this}var e,t,n;return e=r,(t=[{key:"callMethod",value:function(n,e){var i=this,o=1<arguments.length&&void 0!==e?e:{};return new d(function(e,t){return i.ready().then(function(){u(i,n,{resolve:e,reject:t}),E(i,n,o)}).catch(t)})}},{key:"get",value:function(n){var i=this;return new d(function(e,t){return n=a(n,"get"),i.ready().then(function(){u(i,n,{resolve:e,reject:t}),E(i,n)}).catch(t)})}},{key:"set",value:function(n,i){var o=this;return new d(function(e,t){if(n=a(n,"set"),null==i)throw new TypeError("There must be a value to set.");return o.ready().then(function(){u(o,n,{resolve:e,reject:t}),E(o,n,i)}).catch(t)})}},{key:"on",value:function(e,t){if(!e)throw new TypeError("You must pass an event name.");if(!t)throw new TypeError("You must pass a callback function.");if("function"!=typeof t)throw new TypeError("The callback must be a function.");0===h(this,"event:".concat(e)).length&&this.callMethod("addEventListener",e).catch(function(){}),u(this,"event:".concat(e),t)}},{key:"off",value:function(e,t){if(!e)throw new TypeError("You must pass an event name.");if(t&&"function"!=typeof t)throw new TypeError("The callback must be a function.");p(this,"event:".concat(e),t)&&this.callMethod("removeEventListener",e).catch(function(e){})}},{key:"loadVideo",value:function(e){return this.callMethod("loadVideo",e)}},{key:"ready",value:function(){var e=_.get(this)||new d(function(e,t){t(new Error("Unknown player. Probably unloaded."))});return d.resolve(e)}},{key:"addCuePoint",value:function(e,t){var n=1<arguments.length&&void 0!==t?t:{};return this.callMethod("addCuePoint",{time:e,data:n})}},{key:"removeCuePoint",value:function(e){return this.callMethod("removeCuePoint",e)}},{key:"enableTextTrack",value:function(e,t){if(!e)throw new TypeError("You must pass a language.");return this.callMethod("enableTextTrack",{language:e,kind:t})}},{key:"disableTextTrack",value:function(){return this.callMethod("disableTextTrack")}},{key:"pause",value:function(){return this.callMethod("pause")}},{key:"play",value:function(){return this.callMethod("play")}},{key:"unload",value:function(){return this.callMethod("unload")}},{key:"destroy",value:function(){var t=this;return new d(function(e){_.delete(t),k.delete(t.element),t._originalElement&&(k.delete(t._originalElement),t._originalElement.removeAttribute("data-vimeo-initialized")),t.element&&"IFRAME"===t.element.nodeName&&t.element.parentNode&&t.element.parentNode.removeChild(t.element),e()})}},{key:"getAutopause",value:function(){return this.get("autopause")}},{key:"setAutopause",value:function(e){return this.set("autopause",e)}},{key:"getBuffered",value:function(){return this.get("buffered")}},{key:"getColor",value:function(){return this.get("color")}},{key:"setColor",value:function(e){return this.set("color",e)}},{key:"getCuePoints",value:function(){return this.get("cuePoints")}},{key:"getCurrentTime",value:function(){return this.get("currentTime")}},{key:"setCurrentTime",value:function(e){return this.set("currentTime",e)}},{key:"getDuration",value:function(){return this.get("duration")}},{key:"getEnded",value:function(){return this.get("ended")}},{key:"getLoop",value:function(){return this.get("loop")}},{key:"setLoop",value:function(e){return this.set("loop",e)}},{key:"setMuted",value:function(e){return this.set("muted",e)}},{key:"getMuted",value:function(){return this.get("muted")}},{key:"getPaused",value:function(){return this.get("paused")}},{key:"getPlaybackRate",value:function(){return this.get("playbackRate")}},{key:"setPlaybackRate",value:function(e){return this.set("playbackRate",e)}},{key:"getPlayed",value:function(){return this.get("played")}},{key:"getSeekable",value:function(){return this.get("seekable")}},{key:"getSeeking",value:function(){return this.get("seeking")}},{key:"getTextTracks",value:function(){return this.get("textTracks")}},{key:"getVideoEmbedCode",value:function(){return this.get("videoEmbedCode")}},{key:"getVideoId",value:function(){return this.get("videoId")}},{key:"getVideoTitle",value:function(){return this.get("videoTitle")}},{key:"getVideoWidth",value:function(){return this.get("videoWidth")}},{key:"getVideoHeight",value:function(){return this.get("videoHeight")}},{key:"getVideoUrl",value:function(){return this.get("videoUrl")}},{key:"getVolume",value:function(){return this.get("volume")}},{key:"setVolume",value:function(e){return this.set("volume",e)}}])&&i(e.prototype,t),n&&i(e,n),r}();t||(function(e){function n(e){"console"in window&&console.error&&console.error("There was an error creating an embed: ".concat(e))}var t=0<arguments.length&&void 0!==e?e:document;[].slice.call(t.querySelectorAll("[data-vimeo-id], [data-vimeo-url]")).forEach(function(t){try{if(null!==t.getAttribute("data-vimeo-defer"))return;var e=v(t);g(l(e),e,t).then(function(e){return m(e,t)}).catch(n)}catch(e){n(e)}})}(),function(e){var i=0<arguments.length&&void 0!==e?e:document;if(!window.VimeoPlayerResizeEmbeds_){window.VimeoPlayerResizeEmbeds_=!0;var t=function(e){if(c(e.origin)&&e.data&&"spacechange"===e.data.event)for(var t=i.querySelectorAll("iframe"),n=0;n<t.length;n++)if(t[n].contentWindow===e.source){t[n].parentElement.style.paddingBottom="".concat(e.data.data[0].bottom,"px");break}};window.addEventListener?window.addEventListener("message",t,!1):window.attachEvent&&window.attachEvent("onmessage",t)}}()),A.a=P}).call(this,t(0),t(2).setImmediate)},function(e,o,r){(function(e){var t=void 0!==e&&e||"undefined"!=typeof self&&self||window,n=Function.prototype.apply;function i(e,t){this._id=e,this._clearFn=t}o.setTimeout=function(){return new i(n.call(setTimeout,t,arguments),clearTimeout)},o.setInterval=function(){return new i(n.call(setInterval,t,arguments),clearInterval)},o.clearTimeout=o.clearInterval=function(e){e&&e.close()},i.prototype.unref=i.prototype.ref=function(){},i.prototype.close=function(){this._clearFn.call(t,this._id)},o.enroll=function(e,t){clearTimeout(e._idleTimeoutId),e._idleTimeout=t},o.unenroll=function(e){clearTimeout(e._idleTimeoutId),e._idleTimeout=-1},o._unrefActive=o.active=function(e){clearTimeout(e._idleTimeoutId);var t=e._idleTimeout;0<=t&&(e._idleTimeoutId=setTimeout(function(){e._onTimeout&&e._onTimeout()},t))},r(3),o.setImmediate="undefined"!=typeof self&&self.setImmediate||void 0!==e&&e.setImmediate||this&&this.setImmediate,o.clearImmediate="undefined"!=typeof self&&self.clearImmediate||void 0!==e&&e.clearImmediate||this&&this.clearImmediate}).call(this,r(0))},function(e,t,n){(function(e,p){!function(n,i){"use strict";if(!n.setImmediate){var o,r,t,a,s=1,u={},c=!1,l=n.document,e=Object.getPrototypeOf&&Object.getPrototypeOf(n);e=e&&e.setTimeout?e:n,o="[object process]"==={}.toString.call(n.process)?function(e){p.nextTick(function(){f(e)})}:function(){if(n.postMessage&&!n.importScripts){var e=!0,t=n.onmessage;return n.onmessage=function(){e=!1},n.postMessage("","*"),n.onmessage=t,e}}()?(a="setImmediate$"+Math.random()+"$",n.addEventListener?n.addEventListener("message",h,!1):n.attachEvent("onmessage",h),function(e){n.postMessage(a+e,"*")}):n.MessageChannel?((t=new MessageChannel).port1.onmessage=function(e){f(e.data)},function(e){t.port2.postMessage(e)}):l&&"onreadystatechange"in l.createElement("script")?(r=l.documentElement,function(e){var t=l.createElement("script");t.onreadystatechange=function(){f(e),t.onreadystatechange=null,r.removeChild(t),t=null},r.appendChild(t)}):function(e){setTimeout(f,0,e)},e.setImmediate=function(e){"function"!=typeof e&&(e=new Function(""+e));for(var t=new Array(arguments.length-1),n=0;n<t.length;n++)t[n]=arguments[n+1];var i={callback:e,args:t};return u[s]=i,o(s),s++},e.clearImmediate=d}function d(e){delete u[e]}function f(e){if(c)setTimeout(f,0,e);else{var t=u[e];if(t){c=!0;try{!function(e){var t=e.callback,n=e.args;switch(n.length){case 0:t();break;case 1:t(n[0]);break;case 2:t(n[0],n[1]);break;case 3:t(n[0],n[1],n[2]);break;default:t.apply(i,n)}}(t)}finally{d(e),c=!1}}}}function h(e){e.source===n&&"string"==typeof e.data&&0===e.data.indexOf(a)&&f(+e.data.slice(a.length))}}("undefined"==typeof self?void 0===e?this:e:self)}).call(this,n(0),n(4))},function(e,t){var n,i,o=e.exports={};function r(){throw new Error("setTimeout has not been defined")}function a(){throw new Error("clearTimeout has not been defined")}function s(t){if(n===setTimeout)return setTimeout(t,0);if((n===r||!n)&&setTimeout)return n=setTimeout,setTimeout(t,0);try{return n(t,0)}catch(e){try{return n.call(null,t,0)}catch(e){return n.call(this,t,0)}}}!function(){try{n="function"==typeof setTimeout?setTimeout:r}catch(e){n=r}try{i="function"==typeof clearTimeout?clearTimeout:a}catch(e){i=a}}();var u,c=[],l=!1,d=-1;function f(){l&&u&&(l=!1,u.length?c=u.concat(c):d=-1,c.length&&h())}function h(){if(!l){var e=s(f);l=!0;for(var t=c.length;t;){for(u=c,c=[];++d<t;)u&&u[d].run();d=-1,t=c.length}u=null,l=!1,function(t){if(i===clearTimeout)return clearTimeout(t);if((i===a||!i)&&clearTimeout)return i=clearTimeout,clearTimeout(t);try{i(t)}catch(e){try{return i.call(null,t)}catch(e){return i.call(this,t)}}}(e)}}function p(e,t){this.fun=e,this.array=t}function y(){}o.nextTick=function(e){var t=new Array(arguments.length-1);if(1<arguments.length)for(var n=1;n<arguments.length;n++)t[n-1]=arguments[n];c.push(new p(e,t)),1!==c.length||l||s(h)},p.prototype.run=function(){this.fun.apply(null,this.array)},o.title="browser",o.browser=!0,o.env={},o.argv=[],o.version="",o.versions={},o.on=y,o.addListener=y,o.once=y,o.off=y,o.removeListener=y,o.removeAllListeners=y,o.emit=y,o.prependListener=y,o.prependOnceListener=y,o.listeners=function(e){return[]},o.binding=function(e){throw new Error("process.binding is not supported")},o.cwd=function(){return"/"},o.chdir=function(e){throw new Error("process.chdir is not supported")},o.umask=function(){return 0}},function(e,t,n){"use strict";n.r(t);var i=function(){function e(e,t,n){var i;this.Splide=e,this.Components=t,this.Slide=n,this.slide=n.slide,this.player=null,this.elements=null,this.state=(i=1,{set:function(e){i=e},is:function(e){return e===i}}),this.videoId=this.findVideoId(),this.videoId&&(this.init(),this.bind())}var t=e.prototype;return t.init=function(){var n,i;this.elements=(n=this.Splide,i=this.Slide,{init:function(){this.create(),this.toggleWrapper(!1),this.togglePlayButton(!1)},create:function(){var e=i.container?i.container:i.slide,t=n.classes[i.container?"container":"slide"].split(" ")[0]+"--has-video";e.classList.add(t),this.wrapper=document.createElement("div"),this.iframe=document.createElement("div"),this.playButton=document.createElement("button"),this.wrapper.classList.add("splide__video"),this.playButton.classList.add("splide__video__play"),this.wrapper.appendChild(this.iframe),e.appendChild(this.wrapper),e.appendChild(this.playButton)},togglePlayButton:function(e){this.playButton.style.display=e?"flex":"none"},toggleWrapper:function(e){this.wrapper.style.display=e?"block":"none"},hide:function(){this.togglePlayButton(!1),this.toggleWrapper(!0)},show:function(){this.togglePlayButton(!0),this.toggleWrapper(!1)}}),this.elements.init(),this.Splide.root.classList.add(this.Splide.classes.root.split(" ")[0]+"--has-video"),this.Splide.State.is(this.Splide.STATES.CREATED)?this.Splide.on("mounted",this.setup.bind(this)):this.setup()},t.setup=function(){var t=this;this.isAutoplay()||this.elements.togglePlayButton(!0),this.isActive()&&this.state.is(1)&&(this.state.set(2),this.player=this.createPlayer(function(){var e=t.state.is(3);t.state.set(4),(e||t.isAutoplay())&&t.play()}))},t.bind=function(){var e=this;this.Splide.on("click",this.play.bind(this),this.slide).on("move",function(){e.pause(),e.isActive()&&(e.state.is(1)?e.setup():e.isAutoplay()&&e.play())})},t.createPlayer=function(e){return void 0===e&&(e=null),null},t.play=function(){!this.state.is(7)&&this.isActive()&&(this.state.is(2)?this.state.set(3):(this.elements.hide(),this.playVideo(),this.state.set(5)))},t.pause=function(){this.isAutoplay()||this.elements.show(),this.state.is(5)?this.state.set(6):this.state.is(7)&&(this.pauseVideo(),this.state.set(4))},t.playVideo=function(){this.player.play()},t.pauseVideo=function(){this.player.pause()},t.isActive=function(){return this.Slide.isActive()},t.isAutoplay=function(){return this.Splide.options.video.autoplay},t.findVideoId=function(){return""},t.onPlay=function(){this.isActive()?(this.Splide.emit("video:play",this),this.state.set(7)):(this.state.set(7),this.pause())},t.onPause=function(){this.Splide.emit("video:pause",this),this.state.set(4)},t.onEnd=function(){this.Splide.emit("video:end",this),this.state.set(4)},t.destroy=function(){this.player&&(this.player.destroy(),this.player=null)},e}();function r(r){return function(){var e,t,n,i=a(r);if(function(){if("undefined"==typeof Reflect||!Reflect.construct)return;if(Reflect.construct.sham)return;if("function"==typeof Proxy)return 1;try{return Date.prototype.toString.call(Reflect.construct(Date,[],function(){})),1}catch(e){return}}()){var o=a(this).constructor;e=Reflect.construct(i,arguments,o)}else e=i.apply(this,arguments);return t=this,!(n=e)||"object"!=typeof n&&"function"!=typeof n?function(e){if(void 0!==e)return e;throw new ReferenceError("this hasn't been initialised - super() hasn't been called")}(t):n}}function a(e){return(a=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)})(e)}function s(n,i){return{mount:function(){var t=this;i.Elements.getSlides(!1).forEach(function(e){e.slide.getAttribute("data-splide-html-video")&&(t.player=new o(n,i,e))})},destroy:function(){this.player&&this.player.destroy()}}}var o=function(e){var t,n;n=e,(t=i).prototype=Object.create(n.prototype),(t.prototype.constructor=t).__proto__=n;r(i);function i(){return e.apply(this,arguments)||this}var o=i.prototype;return o.createPlayer=function(e){void 0===e&&(e=null);var t=this.Splide.options.video,n=document.createElement("video");return n.src=this.videoId,this.elements.iframe.appendChild(n),n.controls=!t.hideControls,n.loop=t.loop,n.addEventListener("play",this.onPlay.bind(this)),n.addEventListener("pause",this.onPause.bind(this)),n.addEventListener("ended",this.onEnd.bind(this)),n.volume=Math.max(Math.min(t.volume,1),0),n.muted=t.mute,e&&n.addEventListener("loadeddata",e),n},o.findVideoId=function(){return this.slide.getAttribute("data-splide-html-video")},o.destroy=function(){this.player&&(this.player.pause(),this.player.removeAttribute("src"),this.player.load(),this.elements.iframe.removeChild(this.player),this.player=null)},i}(i);function u(r){return function(){var e,t,n,i=c(r);if(function(){if("undefined"==typeof Reflect||!Reflect.construct)return;if(Reflect.construct.sham)return;if("function"==typeof Proxy)return 1;try{return Date.prototype.toString.call(Reflect.construct(Date,[],function(){})),1}catch(e){return}}()){var o=c(this).constructor;e=Reflect.construct(i,arguments,o)}else e=i.apply(this,arguments);return t=this,!(n=e)||"object"!=typeof n&&"function"!=typeof n?function(e){if(void 0!==e)return e;throw new ReferenceError("this hasn't been initialised - super() hasn't been called")}(t):n}}function c(e){return(c=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)})(e)}function l(n,i){var e;return{mount:function(){this.bindAPICallback(),this.loadAPI()},loadAPI:function(){var e=window.YT;if(this.shouldLoadAPI()){var t=document.createElement("script"),n=document.getElementsByTagName("script")[0];t.src=f,n.parentNode.insertBefore(t,n)}else e&&e.loaded&&this.onReady()},shouldLoadAPI:function(){for(var e=document.getElementsByTagName("script"),t=0;t<e.length;t++)if(e[t].getAttribute("src")===f)return!1;return!0},bindAPICallback:function(){void 0!==window.onYouTubeIframeAPIReady&&(e=window.onYouTubeIframeAPIReady),window.onYouTubeIframeAPIReady=this.onYouTubeIframeAPIReady.bind(this)},onYouTubeIframeAPIReady:function(){e&&e(),this.onReady()},onReady:function(){var t=this;i.Elements.getSlides(!1).forEach(function(e){e.slide.getAttribute("data-splide-youtube")&&(t.player=new d(n,i,e))})},destroy:function(){this.player&&this.player.destroy()}}}var d=function(e){var t,n;n=e,(t=i).prototype=Object.create(n.prototype),(t.prototype.constructor=t).__proto__=n;u(i);function i(){return e.apply(this,arguments)||this}var o=i.prototype;return o.createPlayer=function(t){var n=this;void 0===t&&(t=null);var e=this.Splide.options.video;return new YT.Player(this.elements.iframe,{videoId:this.videoId,playerVars:{fs:e.disableFullScreen,controls:e.hideControls,iv_load_policy:3,loop:e.loop,playlist:e.loop?this.videoId:"",rel:0,autoplay:!1},events:{onReady:function(e){n.onPlayerReady(e),t&&t()},onStateChange:this.onPlayerStateChange.bind(this)}})},o.onPlayerReady=function(e){var t=e.target,n=this.Splide.options.video;n.mute&&t.mute(),t.setVolume(Math.max(Math.min(100*n.volume,100),0))},o.onPlayerStateChange=function(e){var t=YT.PlayerState,n=t.PLAYING,i=t.PAUSED,o=t.ENDED;switch(!0){case e.data===n:this.onPlay();break;case e.data===i:this.onPause();break;case e.data===o:this.onEnd()}},o.playVideo=function(){this.player.playVideo()},o.pauseVideo=function(){this.player.pauseVideo()},o.findVideoId=function(){var e=this.slide.getAttribute("data-splide-youtube").match(/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/);return e&&11===e[7].length?e[7]:""},i}(i),f="https://www.youtube.com/player_api",h=n(1);function p(r){return function(){var e,t,n,i=y(r);if(function(){if("undefined"==typeof Reflect||!Reflect.construct)return;if(Reflect.construct.sham)return;if("function"==typeof Proxy)return 1;try{return Date.prototype.toString.call(Reflect.construct(Date,[],function(){})),1}catch(e){return}}()){var o=y(this).constructor;e=Reflect.construct(i,arguments,o)}else e=i.apply(this,arguments);return t=this,!(n=e)||"object"!=typeof n&&"function"!=typeof n?function(e){if(void 0!==e)return e;throw new ReferenceError("this hasn't been initialised - super() hasn't been called")}(t):n}}function y(e){return(y=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)})(e)}function v(n,i){return{mount:function(){var t=this;i.Elements.getSlides(!1).forEach(function(e){e.slide.getAttribute("data-splide-vimeo")&&(t.player=new m(n,i,e))})},destroy:function(){this.player&&this.player.destroy()}}}var m=function(e){var t,n;n=e,(t=i).prototype=Object.create(n.prototype),(t.prototype.constructor=t).__proto__=n;p(i);function i(){return e.apply(this,arguments)||this}var o=i.prototype;return o.createPlayer=function(e){void 0===e&&(e=null);var t=this.Splide.options.video,n=new h.a(this.elements.iframe,{id:this.videoId,controls:!t.hideControls,loop:t.loop});return n.on("play",this.onPlay.bind(this)),n.on("pause",this.onPause.bind(this)),n.on("end",this.onEnd.bind(this)),n.setVolume(Math.max(Math.min(t.volume,1),0)),n.setMuted(t.mute),e&&n.ready().then(e),n},o.findVideoId=function(){var e=this.slide.getAttribute("data-splide-vimeo").match(/vimeo.com\/(\d+)/);return e&&e[1]?e[1]:""},o.onPlay=function(){this.state.is(6)&&!this.isActive()?(this.player.destroy(),this.elements.show(),this.state.set(1)):(this.Splide.emit("video:play",this),this.state.set(7))},i}(i),g={autoplay:!1,hideControls:!1,disableFullScreen:!1,loop:!1,mute:!1,volume:.2};function w(){return(w=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var i in n)Object.prototype.hasOwnProperty.call(n,i)&&(e[i]=n[i])}return e}).apply(this,arguments)}var b="is-playing";window.splide=window.splide||{},window.splide.Extensions=window.splide.Extensions||{},window.splide.Extensions.Video=function(n,i){var t=-1,o=[];return{mount:function(){"object"!=typeof n.options.video&&(n.options.video={}),n.options.video=w({},g,{},n.options.video),[s,l,v].forEach(function(e){var t=e(n,i);o.push(t),t.mount()}),n.on("video:play",function(e){t=e.Slide.index,n.root.classList.add(b)}),n.on("video:pause video:end",function(e){e.Slide.index===t&&(t=-1,n.root.classList.remove(b))})},destroy:function(){o.forEach(function(e){return e.destroy()})}}}}]);
    document.addEventListener( 'DOMContentLoaded', function () {
    if(document.getElementsByClassName('splide').length>0  ){
    new Splide( '.splide', {
    lazyLoad:'nearby',
    heightRatio: 0.5,
    cover:true,
    width: "100%",
    } ).mount();
    }
    } );



</script>



@endsection 
@section('main_contend') 
@include('Frontend.layouts.parts.header-menu')



    <div class="header">
      <div class="splide">
        <div class="splide__track">
          <div class="splide__list">
            <a href="https://upload-china-admissions.imgix.net/uploads/school_pictures/30-1-2020.jpeg?auto=format,enhance,redeye,compress,true" data-fancybox="school-gallery">
              <div class="splide__slide p-splide__slide ">
                <img alt="" class="sp-image" data-splide-lazy="https://upload-china-admissions.imgix.net/uploads/school_pictures/30-1-2020.jpeg?auto=format,enhance,redeye,compress,true" data-caption="" />
              </div>
            </a>
            <a href="https://upload-china-admissions.imgix.net/uploads/school_pictures/bay-t4-set1.jpeg?auto=format,enhance,redeye,compress,true" data-fancybox="school-gallery">
              <div class="splide__slide p-splide__slide ">
                <img alt="" class="sp-image" data-splide-lazy="https://upload-china-admissions.imgix.net/uploads/school_pictures/bay-t4-set1.jpeg?auto=format,enhance,redeye,compress,true" data-caption="" />
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="school-page-logo">
        <div class="mr-2 mr-md-4">
          <img class="logo" src="https://upload-china-admissions.imgix.net/uploads/school_logos/WechatIMG4631.jpeg" alt="2030 School Logo">
        </div>
      </div>
      <div class="mr-md-2  row main position-relative justify-content-between  mb-md-5">
        <div class="col-md-8 col-12 mt-4">
          <div class="mb-4">
            <div class="row">
              <div class="col-sm d-md-flex flex-sm-column flex-md-row mb-4">
                <div>
                  <h3>2030 School</h3>
                  <h5 style="color: #777777;" class="align-items-end d-flex">
                    <div class="d-flex">
                      <i class="fa fa-map-marker" style="margin-right:5px"></i>
                      <p class="m-0">Online</p>
                    </div>
                    <div class="rating-left program-ratings d-flex align-items-end ml-lg-2 ml-2" style="flex-flow: wrap;">
                      <a href="#admissions-reviews">
                        <p class="m-0">
                          <span class="badge badge-warning " id="overall-score"></span>
                        </p>
                      </a>
                      <a href="#admissions-reviews" class="ml-1" style="font-size: 12px;"> ( <span id="review-count"></span> ) </a>
                      <div></div>
                    </div>
                  </h5>
                </div>
              </div>
            </div>
            <div class="d-flex" style="overflow-x: auto;"></div>
          </div>
          <nav id="navbar-sections" class="navbar mb-2">
            <ul class="nav nav-pills flex-column flex-sm-row justify-content-between w-100">
              <li class="nav-item">
                <a class="nav-link" href="#introduction">Introduction</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about-school">School</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#admissions-programs">Programs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#admissions-process">Admissions</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#admissions-reviews">Reviews</a>
              </li>
            </ul>
          </nav>
          <div data-spy="scroll" data-target="#navbar-sections" data-offset="0" class="main-content">
            <div class="row">
              <div class="col-sm">
                <article id="introduction" style="margin-bottom: 0;">
                  <section class="mdc-card__supporting-text">
                    <h3 class="ca-card-title ">📖 Introduction</h3>
                    <p>
                    <p>The 2030 School is a school for the future, a new model of learning about the most important subjects needed to succeed in the global digital age. Learning is personalised and project based in groups of international classmates.</p>
                    </p>
                  </section>
                </article>
              </div>
            </div>
            <div class="mt-1 mb-1 ">
              <div class="divider"></div>
            </div>
            <div class="row">
              <div class="col-sm">
                <article id="about-school" style="margin-bottom: 0;">
                  <section class="mdc-card__supporting-text">
                    <h3 class="ca-card-title mt-5">🏫 About 2030 School</h3>
                    <div id="about-school-short">
                      <p>The 2030 School is a school for the future dreamers, thinkers, and doers.&nbsp;</p>
                      <p>With the accelerating technological innovation and economic changes, there is a huge need for a new model of learning.</p>
                      <p>At 2030 School we believe in the following principles:&nbsp; <br /> &nbsp;- Learning should be personalised to each student <br /> &nbsp;- You learn just as much from your classmates than you do your teacher <br /> &nbsp;- Every student is capable of so much more. </p>
                      <p>Learn the most important skills you need to succeed in the global digital economy, and study together with other likeminded students in groups.&nbsp;</p>
                      <p>We live by the following principles:&nbsp; <br /> &nbsp;&nbsp;&nbsp;- Care - we care about each other as part of our community and we go out of our way to help others <br /> &nbsp; &nbsp;- Fast - we believe that in an accelerating world we need to act and do things fast <br /> &nbsp; &nbsp;- Excellence - excellence is a state of mind. We don&#39;t settle, we strive forward and expect excellence. <br /> &nbsp; &nbsp;- Simplicity - we believe in keeping things simple and focusing on the most important <br /> &nbsp; &nbsp;- Always learning - we believe that always learning and growing is the purpose of life <br /> &nbsp; &nbsp;- Courage - we believe in being brave, to push beyond our limits and go further </p>
                    </div>
                  </section>
                </article>
              </div>
            </div>
            <div class="mt-1 mb-1 ">
              <div class="divider"></div>
            </div>
            <div class="row">
              <div class="col-sm">
                <article id="admissions-programs" style="margin-bottom: 0;">
                  <section class="mdc-card__supporting-text">
                    <h3 class="ca-card-title mt-5">Programs</h3>
                    <p>
                      <a style="text-decoration: none;" href="/search/?utm_source=&utm_campaign=No_programs" class="ca-button btn btn-danger mb-4"> Show similar programs </a>
                    </p>
                    <div class="accordion" id="programs-accordion"></div>
                  </section>
                </article>
              </div>
            </div>
            <div class="row">
              <div class="col-sm">
                <article style="margin-bottom: 0;">
                  <section class="mdc-card__supporting-text">
                    <h3 class="ca-card-title mt-5">🏠 Accommodation</h3>
                    <p>You will need to book the accommodation after you have been accepted.</p>
                    <p>You can choose to live on campus or off campus in private accommodation.</p>
                    <p>How to book:</p>
                    <ul>
                      <li>Make a booking online after you have been accepted (in this case please let us know your choice when you apply).</li>
                      <li>Register when you arrive - its not possible to reserve a room before arriving. You can arrive a few days before and book it</li>
                    </ul>
                  </section>
                </article>
              </div>
            </div>
            <div class="mt-1 mb-1 ">
              <div class="divider"></div>
            </div>
            <div class="row">
              <div class="col-sm">
                <article id="admissions-process" style="margin-bottom: 0;">
                  <section class="mdc-card__supporting-text">
                    <h3 class="ca-card-title mt-5">📬 Admissions Process</h3>
                    <section class="mb-4 mt-2">
                      <div class="d-flex mb-2"></div>
                      <p></p>
                      <p></p>
                    </section>
                    <!-- STEPS -->
                    <section id="Steps" class="steps-section mb-4 mt-2">
                      <h2 class="intro-headers text-center"> 3 Steps to Apply to a Chinese University </h2>
                      <div class="steps-timeline" id="steps-timeline">
                        <div class="steps-one">
                          <img class="steps-img" src="/static/assets/icon/step1.png" alt="Application step 1" />
                          <h3 class="intro-headers text-center">
                            <button class="btn btn-link" style="color:#E10707" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                              <strong>Choose Programs</strong>
                            </button>
                          </h3>
                        </div>
                        <div class="steps-two">
                          <img class="steps-img" src="/static/assets/icon/step2.png" alt="Application step 2" />
                          <h3 class="intro-headers text-center">
                            <button class="btn btn-link" style="color:#E10707" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                              <strong>Apply Online</strong>
                            </button>
                          </h3>
                        </div>
                        <div class="steps-three">
                          <img class="steps-img" src="/static/assets/icon/step3.png" alt="Application step 3" />
                          <h3 class="intro-headers text-center">
                            <button class="btn btn-link" style="color:#E10707" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              <strong>Enroll in China</strong>
                            </button>
                          </h3>
                        </div>
                      </div>
                      <!-- /.steps-timeline -->
                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#Steps">
                        <div class="">
                          <p> Please choose the programs <a style="color:#E10707" target="_blank" href="https://www.china-admissions.com/how-to-choose-programs-at-chinese-universities/">here</a> , "You are advised to select 2-3 programs to increase your chances of getting accepted. </p>
                        </div>
                      </div>
                      <div id="collapseTwo" class="collapse show" aria-labelledby="headingOne" data-parent="#Steps">
                        <div class="">
                          <div class=" mb-0">
                            <p class="intro-headers">Required documents:</p>
                            <ul>
                              <li>Passport</li>
                              <li>Graduation certificate</li>
                              <li>Passport size photo</li>
                            </ul>
                          </div>
                          <div class=" mb-2">
                            <p class="intro-headers">Preparing documents:</p>
                            <p>You can start your application now and send the application documents during your application. Some documents you can send later if you don’t have them right away. Some more info about preparing application documents is <a style="color:#E10707;font-weight: 700" target="_blank" href="https://www.china-admissions.com/study-in-china-guide/application-documents-for-chinese-universities/">here</a>
                            </p>
                          </div>
                          <a class="text" id="processinfo_showmore" href="#processinfo" role="button" style="color:#E10707;font-weight: 700"> Show more </a>
                          <div class="d-none " id="processinfo">
                            <p class="intro-headers">Application process:</p>
                            <p> Applying Online is simple in just a few steps. More information is available <a style="color:#E10707;font-weight: 700" target="_blank" href="https://www.china-admissions.com/how-to-apply-online-to-chinese-universities/"> here</a>. </p>
                            <p>The first steps are to choose the programs, pay the application fee and upload the application documents.</p>
                            <p>Once submitted to China Admissions, we will review your application within 2-3 days and proceed to the university or ask you for further clarification</p>
                            <p>After it has been processed to the university you will receive your unique application ID from each university.</p>
                            <p>The university may contact you directly for further questions. </p>
                            <p>We will then follow up each week with the university for updates. As soon as there is any update we will let you know. If you have made other plans, decide to withdraw / change address at any time please let us know.</p>
                            <p>After you have been accepted you will receive your admissions letter electronically and asked to pay the non-refundable deposit to the university.</p>
                            <p>Once you have paid the deposit the university will issue you the admissions letter and visa form to your home country.</p>
                            <a class="text" id="processinfo_showless" href="#processinfo" role="button" style="color:#484848;font-weight: 700"> Show less </a>
                          </div>
                        </div>
                      </div>
                      <div id="collapseThree" class="collapse show" aria-labelledby="headingOne" data-parent="#Steps">
                        <div class="">
                          <a style="color:#E10707" target="_blank" href="https://www.china-admissions.com/enrolling-at-chinese-universities/">Here</a> is some more information about the enrollment process after you have been accepted.
                        </div>
                      </div>
                    </section>
                  </section>
                </article>
              </div>
            </div>
            <div class="mt-1 mb-1 ">
              <div class="divider"></div>
            </div>
            <div class="row">
              <div class="col-sm">
                <article style="margin-bottom: 0;">
                  <section class="mdc-card__supporting-text" id="question-container">
                    <h3 class="ca-card-title mt-5">❓ Have a Question?</h3>
                    <div class="form-group" style="display: flex;">
                      <i class="fas fa-search" style="position: absolute;margin-top: 12px;left: 32px;"></i>
                      <input type="text" class="form-control fuzzy-search" id="question" placeholder="Search your question or keyword" style="padding-left: 40px;">
                    </div>
                    <div class="">
                      <div class="question-box d-none ">
                        <p>There are no similar questions. Please send us your question below </p>
                        <div class="p-3" style="background: #E5E5E5;">
                          <form id="program-question">
                            <div class="col-lg-4 mb-3">
                              <label for="question-type">Question Type </label>
                              <select class="custom-select" id="question-type" name="category" required>
                                <option selected disabled value="">Choose Option</option>
                                <option value="Intakes">Intakes</option>
                                <option value="Program details">Program details</option>
                                <option value="Admissions">Admissions</option>
                                <option value="Eligibility">Eligibility</option>
                                <option value="English Tests">English Tests</option>
                                <option value="Fees ">Fees</option>
                                <option value="Cost of Living">Cost of Living</option>
                                <option value="Scholarships">Scholarships</option>
                                <option value="Curriculum">Curriculum</option>
                                <option value="Others">Others</option>
                              </select>
                            </div>
                            <div class="col-12 mb-3">
                              <label for="question">Your Question</label>
                              <input type="text" class="form-control" id="question" name="content" placeholder="Write your question and we will reply in 1-2 days" value="" required>
                            </div>
                            <div class="col-md-6">
                              <button class="ca-button w-auto" type="submit">Ask Question</button>
                            </div>
                            <input type="hidden" name="school" value="946">
                          </form>
                        </div>
                      </div>
                      <ul class="questions-answers-container list"></ul>
                      <ul class="pagination"></ul>
                    </div>
                    <div class="see-more mt-2 p-2">
                      <strong>
                        <a style="color: #d71f27;" href="/questions">See more questions about studying in China <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                      </strong>
                    </div>
                  </section>
                </article>
              </div>
            </div>
            <div class="mt-1 mb-1 ">
              <div class="divider"></div>
            </div>
            <div class="row">
              <div class="col-sm">
                <article id="admissions-reviews" style="margin-bottom: 0;">
                  <section class="mdc-card__supporting-text">
                    <h3 class="ca-card-title mt-5">📝 2030 School Reviews</h3>
                    <section class="d-lg-flex">
                      <div class="col-12 col-lg-4 p-0 mb-4">
                        <div class="field  ">
                          <div class="rating-left">
                            <h1>
                              <span class="badge badge-warning overall-score"></span>
                            </h1> ( <span class="review-count">No Reviews</span>) <br>
                            <!-- Review modal -->
                            <div id="review-modal"></div>
                            <!-- /Review modal -->
                            <a class="text" id="write-review" data-toggle="modal" data-target="#reviewModal" href="#" role="button" style="color:#E10707;font-weight: 700"> Write a review </a>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-lg-4 p-0  program-ratings">
                        <div class="field  ">
                          <div class="rating-left">
                            <p class="m-0 intro-headers">📍 Location</p>
                            <div class="star-rating-wrapper">
                              <div class="city-stars"></div>
                            </div>
                          </div>
                          <div class="rating-right">
                            <div class="rating-score"></div>
                          </div>
                        </div>
                        <div class="field ">
                          <div class="rating-left">
                            <p class="m-0 intro-headers">🛏️ Accommodation</p>
                            <div class="star-rating-wrapper">
                              <div class="accommodation-stars"></div>
                            </div>
                          </div>
                          <div class="rating-right">
                            <div class="rating-score"></div>
                          </div>
                        </div>
                        <div class="field ">
                          <div class="rating-left">
                            <p class="m-0 intro-headers">🍜 Food</p>
                            <div class="star-rating-wrapper">
                              <div class="food-stars"></div>
                            </div>
                          </div>
                          <div class="rating-right">
                            <div class="rating-score"></div>
                          </div>
                        </div>
                        <div class="field ">
                          <div class="rating-left">
                            <p class="m-0 intro-headers">🏓 Facilities</p>
                            <div class="star-rating-wrapper">
                              <div class="facilities-stars"></div>
                            </div>
                          </div>
                          <div class="rating-right">
                            <div class="rating-score"></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-lg-4 p-0  program-ratings">
                        <div class="field ">
                          <div class="rating-left">
                            <p class="m-0 intro-headers">💲 Value for money</p>
                            <div class="star-rating-wrapper">
                              <div class="money-for-value-stars"></div>
                            </div>
                          </div>
                          <div class="rating-right">
                            <div class="rating-score"></div>
                          </div>
                        </div>
                        <div class="field ">
                          <div class="rating-left">
                            <p class="m-0 intro-headers">👨‍🏫 Classes</p>
                            <div class="star-rating-wrapper">
                              <div class="classes-stars"></div>
                            </div>
                          </div>
                          <div class="rating-right">
                            <div class="rating-score"></div>
                          </div>
                        </div>
                        <div class="field ">
                          <div class="rating-left">
                            <p class="m-0 intro-headers">🕺 Student experience</p>
                            <div class="star-rating-wrapper">
                              <div class="student-experience-stars"></div>
                            </div>
                          </div>
                          <div class="rating-right">
                            <div class="rating-score"></div>
                          </div>
                        </div>
                        <div class="field ">
                          <div class="rating-left">
                            <p class="m-0 intro-headers">🗣️ Recommend a friend?</p>
                            <div class="star-rating-wrapper">
                              <div class="recommendation-stars"></div>
                            </div>
                          </div>
                          <div class="rating-right">
                            <div class="rating-score"></div>
                          </div>
                        </div>
                      </div>
                    </section>
                  </section>
                </article>
                <article class="p-0 col-sm review-container"></article>
                <section class="mdc-card__supporting-text reviews pt-3"></section>
              </div>
            </div>
            <div class="row">
              <div class="col-sm">
                <article style="margin-bottom: 0;">
                  <section class="mdc-card__supporting-text">
                    <!-- AddToAny BEGIN 
                                  <a class="a2a_dd" href="https://www.addtoany.com/share" style="color:#6c757d;float:right;font-size:2rem"><i class="fas fa-share-alt-square"></i></a><script async src="https://static.addtoany.com/menu/page.js"></script>
                                   AddToAny END -->
                  </section>
                </article>
              </div>
            </div>
          </div>
        </div>
        <!-- left -->
        <div class="d-none d-md-block col-sm-4">
          <div class="sidebar mt-4">
            <div class="sticky-nav mt-4">
              <article style="margin-bottom: 0;">
                <section class="d-flex flex-column p-3 mdc-typography--body1">
                  <a style="text-decoration: none;" href="#admissions-programs" class="ca-button w-100 btn btn-danger mb-4"> See Programs </a>
                  <a href="#question-container" class="btn w-100 btn-secondary"> Request More Info </a>
                  <small class="d-flex justify-content-center mt-2"> 7 students applied to this university</small>
                </section>
              </article>
            </div>
          </div>
        </div>
        <!-- right -->
        <!-- Nav for mobile -->
        <div class="col-12 pl-lg-0 pr-lg-0">
          <div class="col p-0">
            <article id="admissions-related-programs" style="margin-bottom: 0;">
              <section class="mdc-card__supporting-text p-0 p-md-3">
                <h3 class="ca-card-title mt-5">Other Universities in Online</h3>
                <section class="d-lg-flex ">
                  <div class="col-md-4 col-12 p-0">
                    <div class="card w-sm-auto mr-2 pb-2 mt-1 mb-1 ml-auto mr-auto mr-md-2 ml-md-0">
                      <div class="card-body d-flex pl-2 pr-2 pb-2">
                        <div class="p-0 col-lg-3">
                          <img class="" style="width: 60px;height: 60px; background: #fff;padding: 5px;" src="https://upload-china-admissions.imgix.net/uploads/school_logos/Screenshot_2020-11-30_at_3.26.30_PM.png" alt="CA All Stars Logo">
                        </div>
                        <div class="p-0 col-9">
                          <div class="d-flex justify-content-between">
                            <div class="justify-content-start w-100 col-7 p-0">
                              <h3 class="ca-card-title p-0 m-0 ca-card-title-three-lines w-100"> CA All Stars </h3>
                            </div>
                            <div class="col-5 p-0 d-flex align-items-center "></div>
                          </div>
                        </div>
                        <a href="/university/chinese-teachers-all-stars/" class="stretched-link"></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 col-12 p-0">
                    <div class="card w-sm-auto mr-2 pb-2 mt-1 mb-1 ml-auto mr-auto mr-md-2 ml-md-0">
                      <div class="card-body d-flex pl-2 pr-2 pb-2">
                        <div class="p-0 col-lg-3">
                          <img class="" style="width: 60px;height: 60px; background: #fff;padding: 5px;" src="https://upload-china-admissions.imgix.net/uploads/school_logos/Forkaia-Logo.png" alt="Forkaia Logo">
                        </div>
                        <div class="p-0 col-9">
                          <div class="d-flex justify-content-between">
                            <div class="justify-content-start w-100 col-7 p-0">
                              <h3 class="ca-card-title p-0 m-0 ca-card-title-three-lines w-100"> Forkaia </h3>
                            </div>
                            <div class="col-5 p-0 d-flex align-items-center "></div>
                          </div>
                        </div>
                        <a href="/university/forkaia/" class="stretched-link"></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 col-12 p-0">
                    <div class="card w-sm-auto mr-2 pb-2 mt-1 mb-1 ml-auto mr-auto mr-md-2 ml-md-0">
                      <div class="card-body d-flex pl-2 pr-2 pb-2">
                        <div class="p-0 col-lg-3">
                          <img class="" style="width: 60px;height: 60px; background: #fff;padding: 5px;" src="https://upload-china-admissions.imgix.net/uploads/school_logos/35650564_206500803511840_5955579507229327360_o.jpg" alt="Mandarin House (MH) Logo">
                        </div>
                        <div class="p-0 col-9">
                          <div class="d-flex justify-content-between">
                            <div class="justify-content-start w-100 col-7 p-0">
                              <h3 class="ca-card-title p-0 m-0 ca-card-title-three-lines w-100"> Mandarin House (MH) </h3>
                            </div>
                            <div class="col-5 p-0 d-flex align-items-center "></div>
                          </div>
                        </div>
                        <a href="/university/instant-mandarin/" class="stretched-link"></a>
                      </div>
                    </div>
                  </div>
                </section>
                <div class="see-more mt-2">
                  <strong>
                    <a style="color: #d71f27;" href="/universities/?city=Online">See more universities in Online</a>
                  </strong>
                </div>
              </section>
            </article>
          </div>
        </div>
        <div class="col-12 pl-lg-0 pr-lg-0 wordpress-posts d-none mb-4">
          <div class="col p-0">
            <article style="margin-bottom: 0;">
              <section class="mdc-card__supporting-text p-0 p-md-3">
                <h3 class="ca-card-title blog-title-about d-none">Blog Posts About 2030 School</h3>
                <h3 class="ca-card-title blog-title-related d-none">Related Posts</h3>
                <section class="d-lg-flex " id="wordpress-posts"></section>
                <div class="see-more mt-2">
                  <strong>
                    <a style="color: #d71f27;" href="https://china-admissions.com/blog">See more blog posts </a>
                  </strong>
                </div>
              </section>
            </article>
          </div>
        </div>
      </div>
    </div>
    <!-- Subscription start -->
    <!-- Subscription end -->
    <!-- FOOTER START -->
    <!-- FOOTER END -->






  <!-- Subscription start -->
  @include('Frontend.layouts.parts.news-letter')
  <!-- Subscription end -->
  @endsection 

  @section('script') 

  @endsection