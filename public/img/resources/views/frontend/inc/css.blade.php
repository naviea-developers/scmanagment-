<style>
.header .searchbox {
    width: 100%;
    background: #2a8c50 !important;
    padding: 10px;
    border-radius: 50px;
    -webkit-border-radius: 50px;
    -moz-border-radius: 50px;
    -ms-border-radius: 50px;
    -o-border-radius: 50px;
    position: relative;
}


.header .searchbox .col-md-4:first-child img {
    width: 100px;
    margin: 0 auto;
    display: block;
}

.header .searchbox .col-md-4 ul {
    padding: 0px;
}

.header .searchbox .col-md-4 ul li{
    float: left;
    list-style: none;
    margin: 0px 10px;
}

.header .searchbox .col-md-4 ul li a {
    color: #00aeef;
    text-decoration: none;
    transition: .3s linear;
    -webkit-transition: .3s linear;
    -moz-transition: .3s linear;
    -ms-transition: .3s linear;
    -o-transition: .3s linear;
}

.header .searchbox .col-md-4 ul li a:hover {
    color: #6921f5;
    transition: .3s linear;
    -webkit-transition: .3s linear;
    -moz-transition: .3s linear;
    -ms-transition: .3s linear;
    -o-transition: .3s linear;
}


.header .searchbox .col-md-4 .dropdown button {
    background: none;
    border: none;
    outline: none;
}

.header .searchbox .col-md-4 .dropdown button:first-child {
    padding: 0px !important;
}

.header .searchbox .col-md-4 .dropdown button img {
    height: 20px;
    width: 20px;
    object-fit: cover;
}

.searchbox .col-md-4:nth-child(2) a{
    color: #fff !important;
}

.searchbox .col-md-4:nth-child(2) a:hover {
    color: #6921f5 !important;
}

.header .searchbox .bas {
    padding: 5px 15px;
    border-radius: 50px;
    background: none;
    border: 2px solid #f3fcff !important;
    color: #f3fcff !important;
}

.header .searchbox .bas:hover {
    color: #c643ab !important;
}

.dropdown-menu li {
    width: 100%;
    float: left;
}

.header .searchbox .bas {
    padding: 5px 15px;
    border-radius: 50px;
    background: none;
    border: 2px solid #00aeef;
    color: #00aeef;
}


.header .searchbox .sign {
    padding: 5px 15px;
    border-radius: 50px;
    background: #00AEEF;
    border: 2px solid #00AEEF;
    color: #fff !important;
}







footer {
    background: #2a8c50;
    padding: 50px;
    padding-bottom: 10px;
    color: #fff;
}

footer .col-md-4 {
    padding: 50px;
}

footer .col-md-4 img {
    width: 100%;
    margin-top: -38px;
    margin-left: -50px;
}

footer .col-md-2 ul {
    padding: 0px;
}

footer .col-md-2 ul li {
    list-style: none;
}

footer .col-md-2 h5 {
    font-weight: bold;
}

footer .col-md-2 ul li a {
    text-decoration: none;
    color: #fff;
}

footer .col-md-2 ul li a:hover{
    color: #000;
}

footer center {
    margin-top: 15px !important
}




@media only screen and (max-width: 1300px) {
    .searchbox .col-md-4:first-child {
     width: 150px !important;
    }
    .searchbox .col-md-4:last-child {
     width: 400px !important;
     position: absolute;
     right: 10px;
    }

    .searchbox .col-md-4:nth-child(2) {
     width: 400px;
    }
 }


 @media only screen and (max-width: 1000px) {
     .container {
         min-width: 100%;
     }
 }


 @media only screen and (max-width: 900px) {
     .searchbox {
         margin-top: 35px;
     }

     .searchbox .col-md-4:last-child {
         position: absolute;
         top: -45px;
     }

     .searchbox .col-md-4:nth-child(2) {
         position: absolute;
         right: 0;
     }

     .bas {
         border-color: #fff !important;
         color: #fff !important;
     }

 }

 @media only screen and (max-width: 800px) {
     footer .col-md-2 {
         width: 50%;
     }
 }



@media only screen and (max-width: 450px) {

    .header .searchbox .col-md-4 ul li a {
        font-size: 12px;
    }

    .searchbox .col-md-4:nth-child(2) {
        position: absolute;
        right: -85px;
    }

    footer .col-md-2 {
        width: 100%;
    }
}



</style>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
