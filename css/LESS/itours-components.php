/* ----------------------------------------------
Component :: Font Setting
------------------------------------------------- */
@import "./_library.less";
@import url("https://fonts.googleapis.com/css?family=Lato:300,400,700|Saira+Condensed:400,500,600&display=swap");
/*
font-family: 'Saira Condensed', sans-serif;
font-family: 'Lato', sans-serif;
*/

/* ----------------------------------------------
Component :: Star Rating
------------------------------------------------- */

.c-staticText {
color: #9e9e9e;
display: block;
font-size: 13px;
font-weight: normal;
line-height: 20px;
}
.c-staticText.sm {
font-size: 10px;
line-height: 12px;
}
.c-starRating {
display: inline-block;
position: relative;
font-family: "itours";
content: "";
font-size: 14px;
text-align: left;
cursor: default;
white-space: nowrap;
line-height: 1.2em;
color: #dbdbdb;
}
.c-starRating.lg {
font-size: 34px;
line-height: 1.2em;
}
.c-starRating::before {
display: block;
position: absolute;
top: 0;
left: 1px;
content: "\6e \6e \6e \6e \6e";
z-index: 0;
}
.c-starRating .stars {
display: block;
overflow: hidden;
position: relative;
background: @white;
padding-left: 1px;
font-family: "itours";
content: "";
}
.c-starRating .stars::before {
content: "\6e \6e \6e \6e \6e";
color: var(--secondary-color);
}

.c-starRating.r-0 .stars {
width: 0;
}
.c-starRating.r-0p5 .stars {
width: 10%;
}
.c-starRating.r-1 .stars {
width: 20%;
}
.c-starRating.r-1p5 .stars {
width: 30%;
}
.c-starRating.r-2 .stars {
width: 40%;
}
.c-starRating.r-2p5 .stars {
width: 50%;
}
.c-starRating.r-3 .stars {
width: 60%;
}
.c-starRating.r-3p5 .stars {
width: 70%;
}
.c-starRating.r-4 .stars {
width: 80%;
}
.c-starRating.r-4p5 .stars {
width: 90%;
}
.c-starRating.r-5 .stars {
width: 100%;
}

.c-starRating.cust {
display: inline-block;
position: relative;
font-family: "itours";
content: "";
font-size: 14px;
text-align: left;
cursor: default;
white-space: nowrap;
line-height: 1.2em;
color: var(--secondary-color);
}
.c-starRating.cust::before {
content: "";
}
.c-starRating.cust.s1 .stars::before {
content: "\6e";
}
.c-starRating.cust.s2 .stars::before {
content: "\6e \6e";
}
.c-starRating.cust.s3 .stars::before {
content: "\6e \6e \6e";
}
.c-starRating.cust.s4 .stars::before {
content: "\6e \6e \6e \6e";
}
.c-starRating.cust.s5 .stars::before {
content: "\6e \6e \6e \6e \6e";
}
.c-starRating.cust.s7 .stars::before {
content: "\6e \6e \6e \6e \6e \6e \6e";
}

.c-amenitiesType2 {
margin: 0;
padding: 0;
}
.c-amenitiesType2 li {
padding: 0;
margin-bottom: 1px;
}
.amenitiesList {
display: block;
background: #f5f5f5;
height: 42px;
line-height: 42px;
font-size: 0.9167em;
letter-spacing: 0.04em;
text-transform: uppercase;
}
.amenitiesList .icon {
display: block;
width: 42px;
float: left;
background: var(--main-primary-color);
line-height: 42px;
color: @white;
font-size: 2em;
margin-right: 15px;
text-align: center;
}
.amenitiesList .icon.it {
width: 42px;
line-height: 42px;
font-size: 19px;
}
.amenitiesList .icon.it::before {
position: relative;
top: 2px;
}

.c-appliedFilters {
background-color: @white;
display: block;
position: relative;
height: auto;
overflow: hidden;
padding: 15px;
margin-bottom: 10px;
}
.c-appliedFilters .blockHeading {
color: #333333;
display: block;
position: relative;
font-size: 14px;
line-height: 20px;
margin-bottom: 10px;
}
.c-appliedFilters .activeFilters {
display: block;
height: auto;
overflow: hidden;
}
.c-appliedFilters .filterItem {
position: relative;
background-color: #f5f5f5;
display: inline-block;
padding: 8px 40px 8px 12px;
font-size: 11px;
text-transform: uppercase;
color: #838383;
line-height: 14px;
min-height: 30px;
margin: 0 8px 8px 0;
box-sizing: border-box;
border-radius: 20px;
}
.c-appliedFilters .filterItem .remove {
position: relative;
position: absolute;
top: 5px;
right: 5px;
height: 20px;
width: 20px;
background-color: transparent;
padding: 0;
border: 0;
outline: none;
border-radius: 50px;
}
.c-appliedFilters .filterItem .remove::before {
color: var(--primary-color);
content: "\79";
font-family: "itours";
font-size: 22px;
line-height: 21px;
display: block;
}

.c-ratingBlock {
margin-bottom: 20px;
padding: 20px;
border: 1px solid #f5f5f5;
}

.c-infoChecklist {
display: block;
margin: 0 0 20px;
padding: 0;
}
.c-infoChecklist li {
position: relative;
padding: 3px 3px 3px 25px;
font-size: 13px;
font-weight: 500;
line-height: 18px;
color: #adadad;
margin-bottom: 5px;
}
.c-infoChecklist li::before {
content: "\4a";
color: #7db921;
font-size: 14px;
font-family: "itours";
position: absolute;
top: 5px;
left: 2px;
line-height: 15px;
}

.c-banktls {
display: block;
position: relative;
}
.c-banktls .bCard {
display: block;
font-family: @secondary-font-family;
position: relative;
margin-bottom: 10px;
}
.c-banktls .bCard .title {
border-bottom: 1px solid #f3f3f3;
display: block;
padding-bottom: 2px;
margin-bottom: 5px;
font-size: 11px;
font-weight: 600;
color: #ababab;
letter-spacing: 0.5px;
text-transform: uppercase;
line-height: 11px;
}
.c-banktls .bCard .info {
display: block;
font-size: 16px;
font-weight: 400;
color: #69a1d4;
}

/* ----------------------------------------------
Component :: Buttons
------------------------------------------------- */
.c-button,
.c-buttonBorder {
border: 0;
background-color: @secondary-button-color;
cursor: pointer;
display: inline-block;
padding: 5px 20px;
height: auto;
line-height: normal;
text-align: center;
text-decoration: none !important;
text-transform: uppercase;
font-size: 12px;
font-weight: 600;
color: @white !important;
outline: 0 !important;
box-sizing: border-box;
letter-spacing: 0.5px;
transition: all ease 0.3s;
}
.g-button{
background-color: green !important;
}
.c-buttonBorder {
border: 1px solid var(--secondary-color);
background-color: @white;
color: var(--secondary-color);
}
.c-buttonBorder:hover {
background-color: var(--secondary-color);
color: @white;
}
.c-button.sm {
font-size: 11px;
padding: 3px 20px 2px;
line-height: 12px;
}
.c-button.md {
font-size: 11px;
font-weight: 600;
padding: 5px 20px 4px;
line-height: 20px;
border-radius: 15px;
}
.c-button.lg {
line-height: 20px;
height: 32px;
box-sizing: border-box;
padding: 6px 20px 5px;
display: block;
width: 100%;
cursor: pointer;
}
.c-button[aria-expanded] {
position: relative;
padding-right: 30px;
}
.c-button[aria-expanded]::before {
position: absolute;
top: 10px;
right: 7px;
height: 8px;
width: 9px;
line-height: 14px;
content: "";
border-top: 4px solid @white;
border-right: 4px solid transparent;
border-bottom: 0;
border-left: 4px solid transparent;
}
.c-button .icon {
color: @white;
display: inline-block;
vertical-align: middle;
font-size: 13px;
line-height: 13px;
margin-right: 5px;
}
.c-button.colGrn {
background-color: #98ce44;
}
.c-button.colDark {
background-color: #333333;
}

.c-tag {
display: inline-block;
padding: 2px 10px;
background: var(--main-primary-color);
font-size: 11px;
color: @white;
border-radius: 30px;
line-height: 11px;
vertical-align: middle;
}
/* ----------------------------------------------
Component :: Headings
------------------------------------------------- */
.c-heading {
font-weight: bold;
display: block;
color: #333;
font-size: 20px;
line-height: 23px;
margin: 15px 0 15px;
}
.c-heading.sm {
font-size: 14px;
line-height: 18px;
margin-bottom: 15px;
}
.c-heading.lg {
font-size: 24px;
line-height: 30px;
margin: 0 0 20px;
}
.c-heading.col-white {
color: @white;
}
.c-midHeading {
display: block;
font-family: @secondary-font-family;
margin-bottom: 10px;
font-size: 11px;
font-weight: 600;
color: #69a1d4;
padding: 2px 2px 1px 2px;
letter-spacing: 0.5px;
text-transform: uppercase;
line-height: 11px;
background: -moz-linear-gradient(
left,
rgba(109, 172, 230, 0.35) 10%,
rgba(1, 2, 3, 0) 87%,
rgba(0, 0, 0, 0) 88%
);
background: -webkit-linear-gradient(
left,
rgba(109, 172, 230, 0.35) 10%,
rgba(1, 2, 3, 0) 87%,
rgba(0, 0, 0, 0) 88%
);
background: linear-gradient(
to right,
rgba(109, 172, 230, 0.35) 10%,
rgba(1, 2, 3, 0) 87%,
rgba(0, 0, 0, 0) 88%
);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#596dace6', endColorstr='#00000000',GradientType=1 );
}
.c-statictext {
display: block;
font-size: 13px;
font-weight: 500;
line-height: 18px;
margin-bottom: 15px;
color: #adadad;
}
.c-pageTitleSect {
background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url("../../images/pagetitle-back.jpg");
background-size: cover;
background-position: center;
background-repeat: no-repeat;
background-attachment: fixed;
display: flex;
align-items: center;
height: 300px;
padding: 20px 0;
}
.c-pageTitleSect .pageTitle {
color: @white;
display: block;
font-size: 18px;
font-weight: 400;
line-height: 22px;
text-align: left;
}

.searchHeading {
font-family: @third-font-family;
}
.searchHeading .pageTitle {
color: @white;
display: inline-block;
font-size: 26px;
font-weight: 600;
line-height: 32px;
text-align: left;
letter-spacing: 1px;
margin-bottom: 20px;
}
.searchHeading .backBtn {
display: inline-block;
padding: 2px 15px;
text-align: left;
background-color: var(--primary-color);
color: @white;
font-size: 14px;
font-weight: 600;
line-height: 17px;
outline: none;
border: 0;
margin-left: 5px;
top: -3px;
position: relative;
text-decoration: none;
border-radius: 10px;
}
.searchHeading .sortSection {
border-right: 1px solid #6d6d6d;
display: inline-block;
position: relative;
padding-right: 10px;
margin: 0 10px 10px 0;
}
.searchHeading .sortSection:last-child {
border: 0;
padding-right: 0;
margin-right: 0;
}
.searchHeading .sortSection .sortTitle {
display: inline-block;
color: @white;
font-size: 13px;
font-weight: 400;
line-height: 18px;
text-align: left;
letter-spacing: 0.5px;
padding-left: 20px;
position: relative;
}
.searchHeading .sortSection .sortTitle .icon {
position: absolute;
top: 2px;
left: 0;
height: 15px;
width: 15px;
color: var(--main-primary-color);
font-size: 13px;
line-height: 13px;
}
.searchHeading .sortSection .dropdown {
display: inline-block;
}
.searchHeading .sortSection .dropdown .btn-dd {
color: @white;
display: inline-block;
padding: 1px 5px;
height: auto;
line-height: 17px;
margin-left: 10px;
border: 1px solid #6d6d6d;
background-color: transparent;
font-size: 13px;
font-weight: 400;
outline: none;
border-radius: 3px;
}
.searchHeading .sortSection .dropdown .btn-dd::after {
vertical-align: middle;
}
.searchHeading .dropdown-menu {
border: 1px solid #eee;
width: 150px;
}
.searchHeading .dropdown-menu .dropdown-item {
display: block;
padding: 3px 0;
margin-bottom: 2px;
font-size: 14px;
cursor: pointer;
}

.c-breadcrumbs ul {
margin: 0;
padding: 0;
float: right;
}
.c-breadcrumbs ul li {
position: relative;
margin-right: 10px;
padding-right: 10px;
vertical-align: middle;
display: inline-block;
}
.c-breadcrumbs ul li:last-child {
margin: 0;
padding: 0;
}
.c-breadcrumbs ul li:not(:last-child)::before {
position: absolute;
content: "/";
color: #5a7ca3;
right: -4px;
top: 0;
font-size: 12px;
line-height: 12px;
}
.c-breadcrumbs ul li a {
color: @white;
display: block;
font-size: 10px;
line-height: 10px;
font-weight: 400;
text-transform: uppercase;
outline: none;
text-decoration: none;
letter-spacing: 0.4px;
}
.c-breadcrumbs ul li.st-active a {
color: var(--main-primary-color);
}
/* ----------------------------------------------
Component :: Containers
------------------------------------------------- */
.c-containerDark {
background-color: #f5f5f5;
padding: 50px 0;
}
.c-pageWrapper {
position: relative;
overflow: visible;
}
section.dataContainer {
min-height: 175px;
padding-top: 40px;
text-align: left;
background: @white;
}
section.dataContainer:after {
display: table;
content: "";
clear: both;
}

.dividerSection {
display: table;
width: 100%;
}
.dividerSection .divider {
display: table-cell;
vertical-align: top;
line-height: normal;
}
.dividerSection.type-1 .divider.s1 {
width: 70%;
text-align: left;
}
.dividerSection.type-1 .divider.s2 {
width: 30%;
text-align: right;
}
.dividerSection.vAlign-mid .divider {
vertical-align: middle;
}
.cardList-info .dividerSection.noborder {
margin: 0;
padding: 0;
border: 0;
}

/* ----------------------------------------------
Component :: Header Refactor
------------------------------------------------- */
.c-pageHeader {
position: relative;
display: block;
z-index: 100;
}
.c-pageHeaderTop .pageHeader_top {
background-color: var(--main-primary-color);
padding: 2px 0;
display: block;
height: auto;
overflow: hidden;
}
.c-pageHeaderTop .pageHeader_top .staticText,
.c-pageHeaderTop .pageHeader_top .staticLink {
display: block;
text-align: left;
color: @white;
line-height: 20px;
display: block;
font-size: 11px;
text-transform: uppercase;
outline: none;
text-decoration: none;
padding: 3px 0 0;
}
.c-pageHeaderTop .pageHeader_top .topListing ul {
display: block;
margin: 0;
padding: 0;
}
.c-pageHeaderTop .pageHeader_top .topListing ul li {
float: right;
margin-left: 30px;
}
.c-pageHeaderTop .pageHeader_top .credBalance {
background: rgba(255, 255, 255, 0.3) url(../../images/discount.png) 4px 1px
no-repeat;
display: inline-block;
padding: 3px 20px 2px 25px;
text-align: center;
margin-top: 1px;
position: relative;
border-radius: 15px;
}
.c-pageHeaderTop .pageHeader_top .credBalance .s1,
.c-pageHeaderTop .pageHeader_top .credBalance .s2 {
color: #3f5e79;
display: inline-block;
font-size: 12px;
line-height: 18px;
margin-right: 4px;
}
.c-pageHeaderTop .pageHeader_top .credBalance .s2 {
font-weight: 600;
margin: 0;
}
.c-pageHeader .pageHeader_btm {
box-sizing: border-box;
background-color: @white;
height: 70px;
position: relative;
padding: 10px 0;
box-shadow: 1px 1px 3px #b9b9b9;
}
.pageHeader_btm .btm_logo {
display: flex;
align-items: center;
height: 50px;
border: 0;
outline: none;
}
.pageHeader_btm .btm_logo img {
display: inline-block;
max-height: 45px;
}
.pageHeader_btm .mobile_hamb {
display: none;
background-color: @white;
border: 0;
height: 32px;
width: 32px;
padding: 0;
float: left;
vertical-align: middle;
margin: 8px 10px 0 0;
outline: none;
}
.pageHeader_btm .mobile_hamb::before {
font-family: "itours";
content: "\e004";
color: var(--primary-color);
display: inline-block;
font-size: 30px;
line-height: 32px;
}
.pageHeader_btm .btnUtil {
border: 1px solid #eee;
background-color: @white;
display: inline-block;
height: 42px;
width: 42px;
padding: 0;
text-align: center;
position: relative;
margin-left: 15px;
outline: none;
border-radius: 40px;
-moz-border-radius: 40px;
-webkit-border-radius: 40px;
}
.pageHeader_btm .btnUtil img {
color: @white;
position: relative;
max-height: 26px;
}
.pageHeader_btm .btnUtil .notify {
background: red;
position: absolute;
height: 15px;
width: 15px;
top: 5px;
right: 3px;
text-align: center;
padding: 2px 0;
line-height: 10px;
font-size: 9px;
color: @white;
border-radius: 30px;
}
.pageHeader_btm .c-userProf {
display: inline-block;
}
.pageHeader_btm .c-userProf .dropdown-menu {
background-color: #ffffff;
border: 0;
right: -90px;
left: auto !important;
width: 300px;
padding: 0;
font-family: @secondary-font-family;
border-radius: 0;
-moz-border-radius: 0;
-webkit-border-radius: 0;
box-shadow: 0 0 50px 0 rgba(82, 63, 105, 0.15);
-moz-box-shadow: 0 0 50px 0 rgba(82, 63, 105, 0.15);
-webkit-box-shadow: 0 0 50px 0 rgba(82, 63, 105, 0.15);
}
.pageHeader_btm .menuBar {
display: inline-block;
position: relative;
}
.pageHeader_btm .menuBar ul {
margin: 0;
padding: 0;
display: block;
}
.pageHeader_btm .menuBar li {
display: inline-block;
}
.pageHeader_btm .menuBar li .menuLink {
display: block;
font-size: 12px;
font-weight: 600;
text-transform: uppercase;
line-height: 15px;
color: #999;
padding: 0 17px;
outline: none;
text-decoration: none;
}
.pageHeader_btm .menuBar li.st-active .menuLink {
color: var(--primary-color);
}
.c-pageHeaderTop .pageHeader_top .closeSidebar {
display: none;
}

.menuBar.forMobile {
border-top: 1px solid rgba(255, 255, 255, 0.5);
margin-top: 20px;
display: none;
}
.menuBar.forMobile ul {
margin: 0;
padding: 0;
display: block;
}
.menuBar.forMobile ul li {
display: block;
}
.menuBar.forMobile ul li .menuLink {
border-bottom: 1px solid rgba(255, 255, 255, 0.5);
display: block;
padding: 14px;
font-size: 11px!important;
line-height: 20px;
color: @white;
letter-spacing: 0.5px;
text-transform: uppercase;
}
.menuBar.forMobile ul li.st-active .menuLink {
color: #1c4f7d;
}
.userHeading {
box-sizing: border-box;
background-color: var(--primary-color);
padding: 15px 15px 15px 70px;
position: relative;
min-height: 70px;
}
.userHeading .profIcon {
background-color: rgba(255, 255, 255, 1);
position: absolute;
top: 15px;
left: 15px;
height: 40px;
width: 40px;
border-radius: 50px;
}
.userHeading .profIcon img {
display: inline-block;
height: 30px;
vertical-align: middle;
position: relative;
top: 3px;
left: 5px;
}
.userHeading .userName,
.userHeading .userCode {
color: @white;
display: block;
margin: 0 0 3px;
font-size: 16px;
line-height: 20px;
letter-spacing: 0.4px;
}
.userHeading .userCode {
font-size: 12px;
line-height: 14px;
margin: 0;
}
.userNav {
background-color: @white;
display: block;
position: relative;
padding: 0;
}
.userNav .userNavLink {
border-bottom: 1px solid #f7f8fa;
display: block;
position: relative;
padding: 10px 30px 10px 40px;
text-decoration: none;
transition: all ease 0.3s;
}
.userNav .userNavLink::after {
font-family: "itours";
content: "\66";
position: absolute;
right: 10px;
left: auto;
height: 15px;
width: 10px;
top: 12px;
font-size: 12px;
line-height: 19px;
color: #74788d;
}
.userNav .userNavLink:hover {
background-color: #f7f8fa;
}
.userNav .userNavLink span {
color: #74788d;
display: block;
font-size: 14px;
line-height: 18px;
letter-spacing: 0.3px;
}
.userNav .userNavLink .icon {
display: block;
position: absolute;
height: 20px;
width: 20px;
top: 10px;
left: 10px;
background-color: transparent;
font-size: 17px;
line-height: 24px;
color: #cccccc;
text-align: center;
}
@media (max-width: 768px) {
.menuBar.forMobile {
display: block;
}
.c-pageHeaderTop .pageHeader_top .closeSidebar {
border: 0;
background-color: transparent;
display: inline-block;
position: absolute;
top: 5px;
right: 5px;
height: 34px;
width: 30px;
padding: 0;
z-index: 106;
}
.c-pageHeaderTop .pageHeader_top .closeSidebar::before {
font-family: "itours";
content: "\e003";
display: inline-block;
font-size: 20px;
color: @white;
line-height: 30px;
}
.c-pageHeaderTop {
position: fixed;
top: 0;
left: -400px;
height: 100%;
width: 300px;
background-color: var(--primary-color);
padding: 10px 0;
z-index: 105;
box-shadow: 1px 0 4px #333;
-moz-box-shadow: 1px 0 4px #333;
-webkit-box-shadow: 1px 0 4px #333;
transition: all ease 0.2s;
-moz-transition: all ease 0.2s;
-webkit-transition: all ease 0.2s;
}
.c-pageHeaderTop .pageHeader_top .topListing ul li.forMobile {
float: none;
display: block;
margin: 10px 0;
width: 100%;
}
.c-pageHeaderTop .pageHeader_top .topListing ul li.forMobile {
display: none;
}
.c-pageHeaderTop .pageHeader_top .topListing ul li {
width: 50%;
margin: 0 0 10px;
float: left;
}
.c-pageHeaderTop .credBalance {
margin: 10px 0;
}
.st-sidebarOpen {
overflow: hidden;
}
.st-sidebarOpen::before {
content: "";
position: fixed;
background-color: rgba(0, 0, 0, 0.5);
top: 0;
left: 0;
width: 100%;
height: 100%;
z-index: 104;
}
.c-pageHeader .pageHeader_btm {
height: 56px;
padding: 5px 0;
}
.pageHeader_btm .mobile_hamb {
display: inline-block;
}
.pageHeader_btm .menuBar {
display: none;
}
.pageHeader_btm .btnUtil {
margin-left: 7px;
}
.pageHeader_btm .btnUtil.userProf {
display: none;
}
.pageHeader_btm .c-userProf .dropdown-menu {
transform: translate3d(-245px, 42px, 0px) !important;
right: auto !important;
left: auto !important;
}
.st-sidebarOpen .c-pageHeaderTop {
left: 0;
}
.pageHeader_btm .btm_logo img {
width: 100%;
}
}

/* ----------------------------------------------
Component :: Main page Slider
------------------------------------------------- */
.c-mainSlider {
position: relative;
width: 100%;
padding: 0;
min-height: 100px;
}

/* ----------------------------------------------
Component :: Search Form Container
------------------------------------------------- */
.c-filterContainer {
background: @white;
}
.search-box {
margin-top: -80px;
position: relative;
z-index: 99;
}
ul.c-search-tabs {
border: 0;
margin: 0;
padding: 0;
}
ul.c-search-tabs li {
float: left;
padding-right: 4px;
}
ul.c-search-tabs .nav-link {
border: 0 !important;
color: #333;
display: block;
padding: 0 30px;
background: @white;
font-size: 1em;
font-weight: bold;
height: 40px;
line-height: 40px;
text-decoration: none;
filter: alpha(opacity=40);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=40)";
-moz-opacity: 0.4;
-khtml-opacity: 0.4;
opacity: 0.4;
letter-spacing: 0.04em;
text-transform: uppercase;
border-radius: 0;
}
ul.c-search-tabs .nav-link:hover {
filter: alpha(opacity=70);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=70)";
-moz-opacity: 0.7;
-khtml-opacity: 0.7;
opacity: 0.7;
}
ul.c-search-tabs .nav-link.active {
filter: alpha(opacity=100);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
-moz-opacity: 1;
-khtml-opacity: 1;
opacity: 1;
color: var(--primary-color);
}

.visible-mobile .c-search-tabs li {
float: none;
}
.visible-mobile .c-search-tabs li a {
color: var(--primary-color);
filter: alpha(opacity=100);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
-moz-opacity: 1;
-khtml-opacity: 1;
opacity: 1;
padding: 0 80px;
text-align: center;
}
.visible-mobile .c-search-tabs li a:hover {
filter: alpha(opacity=100);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
-moz-opacity: 1;
-khtml-opacity: 1;
opacity: 1;
}

.search-tab-content {
padding: 30px 0;
}
.search-tab-content .tab-pane {
display: none;
}
.search-tab-content .tab-pane.active {
display: block;
}
.search-tab-content h4.title {
margin: 10px 0;
height: 20px;
}
.search-tab-content .fixheight {
padding-top: 40px;
}

/* search box for mobile */
.search-box .m-search-tabs > li {
display: none;
}

.search-box .bx-wrapper .bx-viewport {
box-shadow: none;
border: none;
left: 0;
}
.search-box .bx-wrapper .bx-prev,
.search-box .bx-wrapper .bx-next {
background: var(--primary-color);
font-family: FontAwesome;
}
.search-box .bx-wrapper .bx-controls-direction a {
width: 30px;
height: 22px;
margin-top: -11px;
}
.search-box .bx-wrapper .bx-controls-direction a.disabled {
display: block;
background: #d9d9d9;
}
.search-box .bx-wrapper .bx-prev:before,
.search-box .bx-wrapper .bx-next:before {
display: block;
position: absolute;
text-indent: 0;
line-height: 20px;
text-align: center;
width: 30px;
color: @white;
}
.search-box .bx-wrapper .bx-prev:before:hover,
.search-box .bx-wrapper .bx-next:before:hover {
color: white;
}
.search-box .bx-wrapper .bx-prev:before {
content: "\f177";
}
.search-box .bx-wrapper .bx-next:before {
content: "\f178";
}

.c-filterContainer .main-search-box {
padding: 20px 0 10px;
}
.c-filterContainer .main-search-box .row {
margin: 0;
}
.c-filterContainer .main-search-box .row > div {
padding: 0;
}
.c-filterContainer .main-search-box .title {
line-height: 43px;
margin: 0;
}
.c-filterContainer .main-search-box button {
font-size: 1em;
}

@media (max-width: 768px) {
ul.c-search-tabs .nav-link {
padding: 0 15px;
}
}

/* ----------------------------------------------
Component :: Destinations
------------------------------------------------- */
.c-graySection {
background-color: #f5f5f5;
display: block;
padding: 50px 0;
}
.c-cardType-01 {
display: block;
position: relative;
text-align: left;
background: @white;
margin-bottom: 30px;
}
.c-cardType-01 figure {
min-height: 120px;
margin-bottom: 0;
}
.c-cardType-01 img {
width: 100%;
height: auto;
}
.c-cardType-01 .cardDetails {
display: block;
padding: 15px;
}
.c-cardType-01 .cardTitle {
display: block;
font-size: 16px;
line-height: 20px;
margin: 0;
color: #2d3e52;
font-weight: 500;
font-family: @secondary-font-family;
letter-spacing: 0.5px;
transition: color ease 0.3s;
-moz-transition: color ease 0.3s;
-webkit-transition: color ease 0.3s;
}
.c-cardType-01 .cardTitle small {
display: block;
font-size: 12px;
color: #838383;
text-transform: uppercase;
display: block;
margin-top: 5px;
}
.c-cardType-01 .cardDetails .priceTag {
color: #7db921;
font-size: 18px;
line-height: 22px;
display: block;
font-family: @secondary-font-family;
font-weight: lighter;
}
.c-cardType-01 .cardDetails .priceTag small {
display: block;
color: #838383;
font-size: 11px;
line-height: 14px;
text-transform: uppercase;
}
.c-cardType-01 .cardDetails .c-link:hover .cardTitle {
color: var(--primary-color);
}
.cardTitle .hotelStar {
margin: 0;
display: inline-block;
}
.cardTitle .hotelStar .c-starRating {
margin: 0;
font-size: 11px;
}
.c-cardType-01 .cardDetails .vSection {
border-top: 1px solid #f5f5f5;
padding: 7px 0;
margin: 0;
}
.c-discount {
color: @white;
background: url(../../discount-ribin.png) no-repeat;
line-height: 80px;
text-transform: uppercase;
font-weight: bold;
font-size: 0.9167em;
letter-spacing: 0.04em;
text-indent: -3px;
display: block;
position: absolute;
left: -4px;
top: -4px;
width: 100px;
height: 102px;
z-index: 1;
}
.c-discount .discount-text {
display: inline-block;
-webkit-transform: rotate(-45deg);
-moz-transform: rotate(-45deg);
-ms-transform: rotate(-45deg);
-o-transform: rotate(-45deg);
transform: rotate(-45deg);
writing-mode: lr-tb;
width: 117px;
height: 30px;
line-height: 25px;
top: -3px;
position: relative;
left: -16px;
text-align: center;
font-size: 9px;
}
.c-discount .discount-text > span {
display: inline-block;
}

/* ----------------------------------------------
Component :: Why Us card type
------------------------------------------------- */
.c-cardPallet {
display: block;
position: relative;
background: @white;
padding: 40px 0;
margin-bottom: 0;
}
.c-cardPallet .imageBox {
height: 70px;
width: 70px;
display: block;
margin: 0 auto 25px;
text-align: center;
}
.c-cardPallet .imageBox img {
height: 70px;
width: 70px;
}
.c-cardPallet .cardPalletBox {
display: block;
margin-top: -1px;
margin-right: -5px;
}
.c-cardPallet .cardPalletBox article {
border-top: 1px solid #f5f5f5;
border-right: 1px solid #f5f5f5;
margin: 0;
padding: 15px;
text-align: center;
}
.c-cardPallet .cardPalletBox .boxTitle {
color: #333;
display: block;
font-size: 16px;
font-weight: 700;
line-height: 20px;
text-align: center;
margin: 0 0 10px;
text-transform: uppercase;
font-family: @secondary-font-family;
}
.c-cardPallet .cardPalletBox .boxSubTitle {
color: #999;
display: block;
font-size: 13px;
line-height: 18px;
text-align: center;
margin: 0;
}

/* ----------------------------------------------
Component :: Amazing Destination
------------------------------------------------- */
.c-destinatioBanner {
display: block;
position: relative;
background-image: url(../../images/global-map.jpg);
background-attachment: fixed;
background-position: 50% 0;
background-repeat: no-repeat;
background-size: auto auto;
overflow: hidden;
padding: 70px 0;
}
.c-destinatioBanner .sectionTitle {
text-align: center;
color: @white;
display: block;
font-size: 20px;
line-height: 26px;
margin: 0 0 30px;
}
.c-destinatioBanner .sectionSubTitle {
text-align: center;
color: #7c9abd;
display: block;
font-size: 14px;
line-height: 18px;
margin: 0 0 30px;
}
.c-destinatioBanner .icon-box {
display: block;
text-align: center;
}
.c-destinatioBanner .icon-box i {
color: var(--secondary-color);
display: inline-block;
text-align: center;
font-size: 5em;
vertical-align: baseline;
}
.c-destinatioBanner .icon-box .box-title {
color: @white;
font-size: 16px;
display: block;
margin: 10px 0;
font-weight: 500;
font-family: @secondary-font-family;
letter-spacing: 0.5px;
text-transform: uppercase;
}
.c-destinatioBanner .description {
display: block;
color: #7c9abd;
font-size: 13px;
line-height: 20px;
margin-bottom: 15px;
}

/* ----------------------------------------------
Component :: Footer
------------------------------------------------- */
.c-footer {
display: block;
position: relative;
}
.c-footer .footer-wrapper {
padding: 80px 0 0;
}
.c-footer .discover li {
line-height: 2.6667em;
font-size: 1.0833em;
}
.c-footer h2 {
margin-bottom: 20px;
}
.c-footer .travel-news li {
margin-bottom: 30px;
}
.c-footer .travel-news li .s-title {
margin-bottom: 5px;
}
.c-footer .travel-news li .date {
color: #9e9e9e;
}
.c-footer .travel-news li .thumb {
float: left;
width: 70px;
}
.c-footer .travel-news li:after {
clear: both;
content: " ";
display: table;
}
.c-footer .travel-news li .description {
padding-left: 78px;
}
.c-footer .travel-news li .description span.date {
display: block;
margin-top: 5px;
font-size: 0.9133em;
}
.c-footer .bottom {
background-color: #f9f9f9;
height: 60px;
}
.c-footer .c-footerLink li {
display: block;
list-style-type: none;
}
.c-footer .c-footerLink li a {
position: relative;
display: block;
padding: 7px 0;
font-size: 12px;
line-height: 18px;
color: #999;
text-decoration: none;
cursor: pointer;
transition: all ease 0.3s;
-moz-transition: all ease 0.3s;
-webkit-transition: all ease 0.3s;
}
.c-footer .c-footerLink li a:hover {
color: var(--primary-color);
}
.c-footer .c-footerLink li a::before {
content: "\69";
margin-right: 8px;
color: #d9d9d9;
display: block;
float: left;
font-size: 10px;
font-family: "itours";
}

.c-footer .c-bottom {
min-height: 200px;
border-top: 1px solid #eee;
padding: 20px 0;
}
.c-footer .c-bottom::after {
content: "";
background: url("../../images/footer-b.png") no-repeat bottom;
background-size: cover;
opacity: 0.2;
bottom: 0;
left: 0;
height: 200px;
width: 100%;
position: absolute;
z-index: -1;
}
.c-footerLogos {
display: block;
position: relative;
}
.c-footerLogos ul {
padding: 0;
margin: 0;
}
.c-footerLogos ul li {
background: transparent;
display: inline-block;
margin: 0 10px;
max-height: 60px;
max-width: 100px;
text-align: center;
}
.c-footerLogos ul li img {
display: inline-block;
height: 60px;
}
.c-footerSocial {
text-align: right;
}
.c-footerSocial .social-icons li {
float: none;
display: inline-block;
}
.c-footerText {
padding: 20px 0;
text-align: center;
}
.c-footerText span {
display: block;
font-size: 14px;
color: #333;
}
@media (max-width: 768px) {
.c-footerLogos {
margin-bottom: 20px;
text-align: center;
}
.c-footerSocial {
text-align: center;
}
}
/* ----------------------------------------------
Component :: Card Slider
------------------------------------------------- */
.c-cardSlider {
position: relative;
box-shadow: none;
border: none;
margin: 0;
-webkit-border-radius: 0 0 0 0;
-moz-border-radius: 0 0 0 0;
-ms-border-radius: 0 0 0 0;
border-radius: 0 0 0 0;
background: none;
}
.js-cardSlider .owl-nav {
position: absolute;
top: -35px;
right: 0;
}
.js-cardSlider.owl-carousel .owl-nav button.owl-prev,
.js-cardSlider.owl-carousel .owl-nav button.owl-next {
background-color: var(--primary-color);
padding: 4px !important;
display: inline-block;
text-align: center;
width: 25px;
height: 25px;
color: @white;
font-size: 18px;
box-sizing: border-box;
outline: none;
}
.js-cardSlider.owl-carousel .owl-nav button.owl-prev {
margin-right: 10px;
}
.js-cardSlider.owl-carousel .owl-nav button span {
display: inline-block;
font-size: 26px;
color: @white;
line-height: 13px;
padding: 0px;
}

/* ----------------------------------------------
Component :: Hotel List card
------------------------------------------------- */
.c-cardList {
display: block;
position: relative;
margin-bottom: 20px;
}
.c-cardListTable {
background-color: #ffffff;
display: table;
table-layout: fixed;
width: 100%;
padding: 0;
box-shadow: 0 0 4px #e6e6e6;
-moz-box-shadow: 0 0 4px #e6e6e6;
-webkit-box-shadow: 0 0 4px #e6e6e6;
/* border: 1px solid gray; */
border-radius: 20px;
padding: 4px;
box-shadow: rgb(0 0 0 / 24%) 0px 3px 8px;
}
.c-cardListTable .cardList-image {
display: table-cell;
vertical-align: top;
width: 270px;
height: 160px;
position: relative;
max-height: 160px;
max-width: 270px;
overflow: hidden;
}
.c-cardListTable .cardList-image img {
background-size: cover;
background-position: center;
width: 250px;
height: 180px;
border-top-left-radius: 20px;
border-bottom-left-radius: 20px;
}

.c-cardListTable .cardList-image .flag span {
display: block;
margin-top: 15px;
width: 250px;
height: 130px;
}

.c-cardListTable .cardList-image .hotelType {
position: absolute;
bottom: 10px;
right: 10px;
display: inline-block;
font-size: 11px;
color: var(--main-primary-color);
line-height: 11px;
letter-spacing: 0.5px;
text-transform: uppercase;
font-weight: 600;
font-family: @secondary-font-family;
background: @white;
padding: 4px 10px 2px;
z-index: 3;
box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
}
.c-cardListTable .cardList-image .hotelType .icon {
color: var(--main-primary-color);
display: inline-block;
font-size: 11px;
line-height: 11px;
vertical-align: middle;
position: relative;
top: 0px;
margin-right: 2px;
}

.c-cardListTable .cardList-info {
box-sizing: border-box;
vertical-align: middle;
position: relative;
// cursor: pointer;
z-index: 2;
}
.c-cardListTable .cardList-info .expandSect {
opacity: 1;
display: inline-block;
background-color: var(--primary-color);
color: @white;
padding: 3px 10px 2px;
font-size: 11px;
font-weight: 600;
text-align: center;
bottom: 15px;
right: 32%;
border: 0;
line-height: 14px;
position: absolute;
outline: none;
font-family: @secondary-font-family;
text-transform: uppercase;
transition: all ease 0.3s;
border-radius: 20px;
z-index: -1;
}
.c-cardListTable .cardList-info:hover .expandSect {
opacity: 1;
}
.cardList-info .dividerSection {
padding: 0 0 10px;
margin-bottom: 10px;
border-bottom: 1px solid #f5f5f5;
}
.cardList-info .dividerSection .divider.s1 {
padding: 10px;
}
.cardList-info .dividerSection .divider.s2 {
text-align: center;
padding: 30px;
border-left: 1px solid #f5f5f5;
}
.cardList-info .dividerSection .divider.b2cs2 {
text-align: center;
padding: 8%;
border-left: 1px solid #f5f5f5;
}
.cardList-info .cardTitle,
.cartItem .itemTitle {
display: block;
font-size: 18px;
line-height: 22px;
margin: 0 0 3px;
color: #2d3e52;
font-weight: 600;
font-family: @secondary-font-family;
letter-spacing: 0.5px;
}
.cardList-info .cardInfoLine,
.cartInfo .cardInfoLine {
position: relative;
display: block;
font-size: 12px;
color: #838383;
text-transform: uppercase;
padding-left: 18px;
font-family: @secondary-font-family;
letter-spacing: 0.5px;
margin-bottom: 5px;
line-height: 14px;
}

.cardList-info .cardInfoLine:not(.cust)::before,
.cartInfo .cardInfoLine:not(.cust)::before {
color: var(--main-primary-color);
font-size: 12px;
line-height: 16px;
position: absolute;
left: 0;
top: -2px;
font-family: "itours";
content: "\5c";
}
.cardList-info .cardInfoLine.cust .icon {
color: var(--secondary-color);
font-size: 12px;
line-height: 11px;
position: absolute;
left: 0;
top: 0px;
}
.cardList-info .cardInfoLine.guests::before {
content: "\e8b7";
}
.cardList-info .cardInfoLine.guests span {
font-weight: 600;
color: var(--primary-color);
}
.cardList-info .priceTag {
color: #7db921;
font-size: 18px;
line-height: 22px;
display: block;
font-family: @secondary-font-family;
font-weight: lighter;
}
.cardList-info .priceTag small {
display: block;
color: #adadad;
font-size: 11px;
line-height: 14px;
text-transform: uppercase;
}
.cardList-info .priceTag.inline {
font-size: 16px;
line-height: 20px;
margin-bottom: 5px;
}
.cardList-info .priceTag.inline small {
display: inline-block;
vertical-align: middle;
margin-right: 6px;
}

.cardList-info .priceTag .p-old {
display: block;
margin-bottom: 8px;
}
.cardList-info .priceTag .p-old .o_lbl {
background-color: #f5f5f5;
display: block;
padding: 2px 5px 1px;
text-align: center;
font-size: 11px;
font-weight: 600;
color: #999;
line-height: 11px;
text-transform: uppercase;
margin-bottom: 2px;
}
.cardList-info .priceTag .p-old .o_price {
display: block;
padding: 2px 5px;
text-align: center;
font-size: 14px;
color: #e01933;
line-height: 14px;
font-weight: 600;
text-decoration: line-through;
}
.cardList-info .priceTag .p-old .o_price .p_currency,
.cardList-info .priceTag .p-old .o_price .p_cost {
display: inline-block;
text-decoration: line-through;
}

.cardList-info .hotelInfo {
display: block;
color: #adadad;
font-size: 13px;
line-height: 18px;
}
.cardList-info .hotelInfo.cust {
padding-left: 20px;
position: relative;
}
.cardList-info .hotelInfo.cust::before {
color: var(--secondary-color);
font-size: 14px;
line-height: 15px;
position: absolute;
left: 0;
top: 4px;
font-family: "itours";
content: "\43";
}
.cardList-info .dividerSection.infoSection {
border: 0;
margin: 0;
padding: 0;
}

.c-cardList .cardList-info .cardTitle,
.c-cardList .infoSection {
margin-bottom: 7px;
}
.c-cardList .infoSection .cardInfoLine {
display: inline-block;
margin-right: 10px;
padding-right: 10px;
border-right: 2px solid #eee;
}
.c-cardList .infoSection .cardInfoLine:last-child {
border: 0;
margin-right: 0;
padding-right: 0;
}
.c-cardList .cardDescription {
display: block;
text-transform: none;
line-height: 18px;
font-size: 13px;
letter-spacing: 0.2px;
position: relative;
top: -2px;
}
.c-cardList.activity .cardList-info {
vertical-align: top;
}
.c-cardList .priceTag .price_main {
display: block;
color: #7db921;
font-size: 22px;
line-height: 22px;
font-weight: 600;
}
.c-cardList .priceTag .price_main .p_currency {
font-size: 18px;
line-height: 14px;
font-weight: normal;
position: relative;
top: -2px;
padding-right: 2px;
}
.c-cardList .priceTag .price_main .p_currency,
.c-cardList .priceTag .price_main .p_cost,
.infoCard .infoCard_price .p_currency,
.infoCard .infoCard_price .p_cost {
display: inline-block;
margin-top: 20px!important;
}
.c-cardList .priceTag .price_sub {
display: block;
color: #999;
font-size: 16px;
line-height: 22px;
font-weight: 400;
}

.c-tagSection {
display: block;
margin: 0 0 10px;
min-height: 24px;
}
.c-tagSection .tag {
color: #333;
display: inline-block;
margin: 0 4px 4px 0;
height: 20px;
font-size: 11px;
line-height: 21px;
background-color: rgb(204, 234, 231);
padding: 0 12px;
font-family: @secondary-font-family;
text-transform: uppercase;
font-weight: 500;
letter-spacing: 0.3px;
border-radius: 20px;
}

@media (max-width: 768px) {
.c-cardListTable .cardList-info .expandSect {
display: none;
}
}

/* -------- Amenity List --------- */

.c-aminityList {
display: block;
position: relative;
}
.c-aminityList ul {
display: block;
margin: 0;
padding: 0;
height: auto;
overflow: hidden;
}
.c-aminityList ul li {
background-color: @white;
border: 1px solid #eee;
display: inline-block;
height: 30px;
width: 30px;
box-sizing: border-box;
margin-right: 7px;
vertical-align: top;
text-align: center;
padding: 2px 0;
position: relative;
cursor: pointer;
border-radius: 40px;
-moz-border-radius: 40px;
-webkit-border-radius: 40px;
}
.c-aminityList ul li .icon {
display: inline-block;
color: #cccccc;
font-size: 20px;
line-height: 23px;
vertical-align: middle;
transition: color ease 0.3s;
}
.c-aminityList ul li:hover .icon {
color: var(--primary-color);
}
.c-aminityList.sm ul li {
height: 25px;
width: 25px;
}
.c-aminityList.sm ul li .icon {
font-size: 18px;
line-height: 18px;
}

.c-aminityListBlock {
display: block;
height: auto;
overflow: hidden;
}
.c-aminityListBlock ul {
display: block;
}
.c-aminityListBlock ul li {
float: left;
height: auto;
overflow: hidden;
padding-right: 1px;
background: -moz-linear-gradient(
top,
rgba(255, 255, 255, 0) 4%,
rgba(206, 206, 206, 1) 50%,
rgba(232, 232, 232, 0) 96%
);
background: -webkit-linear-gradient(
top,
rgba(255, 255, 255, 0) 4%,
rgba(206, 206, 206, 1) 50%,
rgba(232, 232, 232, 0) 96%
);
background: linear-gradient(
to bottom,
rgba(255, 255, 255, 0) 4%,
rgba(206, 206, 206, 1) 50%,
rgba(232, 232, 232, 0) 96%
);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00ffffff', endColorstr='#00e8e8e8',GradientType=0 );
}
.c-aminityListBlock ul li:last-child {
padding-right: 0;
}
.c-aminityListBlock ul li .amenity {
height: auto;
width: 70px;
background-color: @white;
}
.c-aminityListBlock ul li .amenity.st-last {
width: 40px;
}
.c-aminityListBlock ul li .amenity.st-lasts {
width: 95px !important;
}
.c-aminityListBlock ul li .amenity.st-last .num {
color: var(--primary-color);
display: block;
font-size: 17px;
font-weight: 600;
line-height: 18px;
margin: 5px 0;
}
.c-aminityListBlock ul li img {
display: block;
margin: 0 auto 6px;
height: 22px;
width: 22px;
}
.c-aminityListBlock ul li span {
padding: 0 4px;
box-sizing: border-box;
word-wrap: break-word;
display: block;
text-align: center;
font-size: 10px;
color: #999;
line-height: 10px;
text-transform: uppercase;
letter-spacing: 0.3px;
font-family: @secondary-font-family;
}

.cardList-info .c-starRating .rating {
color: #adadad;
text-align: center;
font-family: @secondary-font-family;
font-size: 11px;
text-transform: uppercase;
padding: 2px 0;
margin: 0;
line-height: 12px;
}

.cardList-accordian {
border: 0;
padding: 10px 15px;
background-color: @white;
border-radius: 0;
-moz-border-radius: 0;
-webkit-border-radius: 0;
box-shadow: 0 1px 4px #e6e6e6;
-moz-box-shadow: 0 1px 4px #e6e6e6;
-webkit-box-shadow: 0 1px 4px #e6e6e6;
}

/* -- Car -- */
@media (max-width: 990px) {
.c-cardListTable .cardList-image,
.c-cardListTable .cardList-image span {
width: 170px;
}
.c-cardListTable .cardList-image img{
width:auto;
}
.hotelInfo.cust {
display: none;
}
}

@media (max-width: 600px) {
.c-cardListTable .cardList-image {
vertical-align: middle;
}
.cardList-info .dividerSection.infoSection .divider.s1 {
display: none;
}
.cardList-info .cardTitle {
font-size: 16px;
line-height: 20px;
}
}

@media (max-width: 480px) {
.c-cardListTable {
display: block;
}
.c-cardListTable .cardList-image,
.c-cardListTable .cardList-image span,
.c-cardList.activity > .c-cardListTable .cardList-image,
.c-cardList.activity > .c-cardListTable .cardList-image img {
display: block;
width: 100%;
}
.cardList-info .dividerSection .divider.s1 {
padding-right: 10px;
}
.cardList-info .dividerSection .divider.s2 {
padding-right: 0;
}
.cardList-info .dividerSection.infoSection {
display: block;
}
.cardList-info .dividerSection.infoSection .divider.s1 {
padding: 0;
display: block;
width: 100%;
margin-bottom: 20px;
}
.cardList-info .dividerSection.infoSection .divider.s2 {
border: 0;
padding: 0;
display: block;
width: 100%;
}
.hotelInfo.cust {
display: block;
}

.c-cardList.activity .cardList-info .dividerSection .divider.s1,
.c-cardList.activity .cardList-info .dividerSection .divider.s2 {
width: 100%;
display: block;
}
.c-cardList.activity .cardList-info .dividerSection .divider.s1 {
margin-bottom: 20px;
}
.c-cardList.activity .cardList-info .dividerSection .divider.s2 {
border: 0;
padding-left: 0;
text-align: left;
}
.c-cardList.activity .cardList-info .priceTag {
float: left;
}
.c-cardList.activity .cardList-info .c-starRating {
float: right;
}
}
/* ----------------------------------------------
Component :: Hotel List Section
------------------------------------------------- */
.c-cardListHolder {
padding-bottom: 6px;
margin-bottom: 6px;
border-bottom: 1px solid #eee;
}
.c-cardListHolder:last-child {
padding-bottom: 0;
border: 0;
}

.c-cardListTable.type-2,
.c-cardListTable.type-3 {
cursor: auto;
background-color: #f9f9f9;
box-shadow: none;
}
.c-cardListTable.type-2 .btn-radio {
position: absolute;
opacity: 0;
}
.c-cardListTable.type-2 .btn-radio:checked ~ .cardList-info {
border-color: #7db921;
}
.c-cardListTable.type-2 .cardList-image,
.c-cardListTable.type-2 .cardList-image img {
width: 140px;
}
.c-cardListTable.type-2 .cardList-info,
.c-cardListTable.type-3 .cardList-info {
display: block;
position: relative;
border: 1px solid transparent;
box-sizing: border-box;
padding: 7px 10px 7px 40px;
margin-bottom: 0;
transition: all ease 0.3s;
-moz-transition: all ease 0.3s;
-webkit-transition: all ease 0.3s;
}
.c-cardListTable.type-3 .cardList-info {
padding: 7px;
border: 0;
}
.c-cardListTable.type-2:hover .cardList-info {
border-color: #7db921;
}
.c-cardListHolder:last-child {
border: 0;
margin: 0;
padding: 0;
}
.c-cardListHolder.type-1 .infoCard {
padding: 7px;
background-color: #f9f9f9;
margin-bottom: 0;
}
.c-cardListTable.type-2 .cardList-info::before {
font-family: "itours";
// content: "\26";
position: absolute;
font-size: 24px;
top: 3px;
left: 3px;
color: #d6d6d6;
line-height: 24px;
transition: all ease 0.3s;
-moz-transition: all ease 0.3s;
-webkit-transition: all ease 0.3s;
}
.c-cardListTable.type-2 .btn-radio:checked ~ .cardList-info::before {
color: #7db921;
content: "\27";
}
.c-cardListTable.type-2 .cardList-info .cardTitle,
.c-cardListTable.type-3 .cardList-info .cardTitle {
font-size: 14px;
line-height: 18px;
color: #999;
}

.flexGrid {
display: table;
box-sizing: border-box;
width: 100%;
}
.flexGrid .gridItem {
vertical-align: top;
display: table-cell;
padding: 0 10px;
width: 30%;
border-right: 1px solid #eee;
}
.flexGrid .gridItem:first-child {
padding-left: 0;
}
.flexGrid .gridItem:last-child {
padding-right: 0;
border: 0;
}
.infoCard {
display: block;
margin-bottom: 7px;
position: relative;
font-family: @secondary-font-family;
height: auto;
overflow: hidden;
}
.infoCard .infoCard_label {
display: block;
padding: 1px 0;
font-size: 11px;
text-transform: uppercase;
color: #ababab;
font-weight: 600;
margin-bottom: 2px;
line-height: 11px;
letter-spacing: 0.4px;
background: -moz-linear-gradient(
left,
rgba(242, 242, 242, 1) 12%,
rgba(0, 0, 0, 0) 100%
);
background: -webkit-linear-gradient(
left,
rgba(242, 242, 242, 1) 12%,
rgba(0, 0, 0, 0) 100%
);
background: linear-gradient(
to right,
rgba(242, 242, 242, 1) 12%,
rgba(0, 0, 0, 0) 100%
);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f2f2f2', endColorstr='#00000000',GradientType=1 );
}
.infoCard .infoCard_data {
display: block;
padding: 0;
font-size: 15px;
line-height: 18px;
color: #808080;
font-weight: 600;
margin-bottom: 0;
text-transform: none;
}
.infoCard .infoCard_data.sm {
font-size: 12px;
line-height: 15px;
}
.infoCard .infoCard_data.color-1 {
color: var(--primary-color);
}
.infoCard .infoCard_data.color-2 {
color: var(--secondary-color);
}
.infoCard .infoCard_price,
.infoCard .infoCard_price .p_currency,
.infoCard .infoCard_price .p_cost {
display: block;
padding: 0;
font-size: 18px;
line-height: 22px;
color: var(--primary-color);
font-weight: 600;
margin-bottom: 0;
}
.infoCard .infoCard_price .p_currency,
.infoCard .infoCard_price .p_cost {
display: inline-block;
}
.infoCard .infoCard_price.strike .p_currency,
.infoCard .infoCard_price.strike .p_cost {
color: red;
}
.infoCard .infoCard_price.strike .p_cost {
text-decoration: line-through;
}
.infoCard .infoCard_priceTax {
display: block;
font-size: 12px;
padding: 0;
line-height: 14px;
color: #ccc;
}
.infoCard .infoCard_notifi {
display: inline-block;
padding: 2px 10px;
background-color: #7db921;
color: @white;
font-weight: 600;
font-size: 10px;
line-height: 11px;
text-align: center;
letter-spacing: 0.4px;
text-transform: uppercase;
position: relative;
top: -1px;
border-radius: 20px;
}
.infoCard .infoCard_notifi.type-2 {
background-color: #ff8c8c;
}
.infoCard .policyLink {
color: var(--secondary-color);
background-color: transparent;
display: inline-block;
font-size: 11px;
line-height: 12px;
letter-spacing: 0.4px;
outline: none;
border: 0;
text-decoration: underline;
padding: 1px 0;
margin: 5px 0 0;
height: auto;
}

@media (max-width: 768px) {
.c-cardListHolder {
border: 0;
display: block;
margin: 0 16px 16px 0;
width: calc(50% - 8px);
float: left;
padding: 0;
}
.c-cardListHolder:nth-child(2n) {
margin-right: 0;
}
.c-cardListHolder .c-cardListTable.type-2 .cardList-image,
.c-cardListHolder .c-cardListTable.type-2 .cardList-image img {
display: none;
width: 100%;
}
.c-cardListHolder .c-cardListTable .cardList-info {
padding: 0 0 0 30px;
display: block;
width: 100%;
}
.c-cardListHolder .flexGrid,
.c-cardListHolder .flexGrid .gridItem {
display: block;
width: 100%;
padding: 0;
height: auto;
overflow: hidden;
}
.c-cardListHolder .flexGrid {
padding: 6px;
box-sizing: border-box;
}
.c-cardListHolder .flexGrid .gridItem {
border: 0;
margin-bottom: 10px;
}
.c-cardListHolder .styleForMobile {
height: auto;
overflow: hidden;
}
.c-cardListHolder .infoCard {
margin-bottom: 10px;
}
.c-cardListHolder .M-infoCard {
width: 100%;
}
.c-cardListHolder .styleForMobile .infoCard,
.c-cardListHolder .M-policyLink {
width: 100%;
}
.c-cardListHolder .M-policyLink {
text-align: right;
}
}

@media (max-width: 560px) {
.c-cardListTable .cardList-info,
.cardList-info .dividerSection .divider.s1,
.cardList-info .dividerSection .divider.s2 {
display: block;
width: 100%;
}
.cardList-info .dividerSection .divider.s1 {
padding-bottom: 0;
}
.cardList-info .dividerSection .divider.s2 {
padding: 10px;
}
.cardList-info .priceTag {
display: flex;
flex-direction: row;
width: 100%;
}
.cardList-info .dividerSection .divider.s2 .c-starRating {
display: none;
}
.cardList-info .priceTag .p-old {
width: 50%;
padding: 0 2px;
}
.c-cardListHolder {
border: 0;
display: block;
margin: 0 0 16px 0;
width: 100%;
float: none;
padding: 0;
}
}

/* ----------------------------------------------
Component :: Car List Section
------------------------------------------------- */
.for-transfer .sortSection {
border: 0;
margin: 0 0 10px 0;
padding: 0;
}
.for-transfer .sortIcon {
display: inline-block;
margin: 0 20px;
position: relative;
top: 2px;
}
.for-transfer .sortIcon::before {
color: var(--main-primary-color);
font-family: "itours";
content: "\75";
display: block;
font-size: 14px;
line-height: 14px;
}
.for-transfer .sortIcon.round::before {
content: "\e014";
}
.c-cardList.type-transfer {
box-shadow: none;
transition: all ease 0.3s;
}
.c-cardList.type-transfer:hover {
box-shadow: 0 0 4px #999;
}
.c-cardList.type-transfer .cardTitle {
text-transform: uppercase;
letter-spacing: 0.2px;
}
.c-cardList.type-transfer .cardTitle .tag {
color: #333;
display: inline-block;
margin-left: 4px;
height: 17px;
font-size: 11px;
line-height: 18px;
background-color: rgb(204, 234, 231);
padding: 0 12px;
text-transform: uppercase;
font-weight: 600;
letter-spacing: 0.3px;
border-radius: 20px;
position: relative;
top: -2px;
}
.c-cardList.type-transfer .infoSection .cardInfoLine {
margin-bottom: 0;
}
.c-cardList.type-transfer .c-cardListTable .cardList-image {
text-align: center;
height: 120px;
width: 250px;
}
.c-cardList.type-transfer .c-cardListTable .cardList-image img {
display: inline-block;
max-height: 120px;
max-width: 250px;
vertical-align: middle;
}
.c-cardList.type-transfer .typeOverlay {
background-color: rgba(0, 0, 0, 0.15);
position: absolute;
height: 100%;
width: 100%;
top: 0;
left: 0;
z-index: 2;
}

@media (max-width: 768px) {
.c-cardList.type-transfer .c-cardListTable .cardList-image,
.c-cardList.type-transfer .c-cardListTable .cardList-image img {
display: block;
height: auto;
width: 100%;
max-height: 300px;
}
.c-cardList.type-transfer .cardList-info .priceTag {
align-items: center;
justify-content: center;
margin-bottom: 10px;
}
}

/* ----------------------------------------------
Component :: Tabs
------------------------------------------------- */
.c-compTabs {
display: block;
position: relative;
box-sizing: border-box;
}
.c-compTabs .nav-tabs {
margin: 0;
padding: 0;
border-color: #f5f5f5;
}
.c-compTabs .nav-tabs .nav-item {
display: inline-block;
margin: 0 2px 0 0;
}
.c-compTabs .nav-tabs .nav-item .nav-link {
border: 0;
border-bottom: 1px solid transparent;
background-color: var(--main-primary-color);
display: block;
color: @white;
font-size: 14px;
text-transform: uppercase;
letter-spacing: 1px;
font-weight: 600;
font-family: @secondary-font-family;
padding: 5px 15px;
line-height: 18px;
border-radius: 0;
border-bottom-left-radius: 15px;
border-top-right-radius: 15px;
}
.c-compTabs .nav-tabs .nav-item .nav-link.active {
background-color: var(--secondary-color);
color: @white;
}
.c-compTabs .tab-pane {
position: relative;
height: auto;
overflow: hidden;
padding: 10px 0;
}

.c-halfText {
display: block;
}
.c-halfText .sect {
display: inline-block;
color: #ababab;
font-size: 12px;
font-weight: 400;
line-height: 13px;
text-transform: uppercase;
margin-right: 5px;
letter-spacing: 0.4px;
}
.c-halfText .sect.s2 {
color: var(--primary-color);
margin: 0;
font-weight: 600;
}
@media (max-width: 600px) {
.c-compTabs .nav-tabs .nav-item {
width: calc(50% - 7px);
margin: 0 5px 5px 0;
}
}

/* ----------------------------------------------
Component :: Result Sort Strip
------------------------------------------------- */
/* .c-sortSection {
background: @white;
padding: 10px 15px;
margin-bottom: 20px;
}
.c-sortSection .sortTitle {
color: #2d3e52;
display: block;
margin-right: 20px;
line-height: 34px;
font-size: 14px;
}
.c-sortSection .sortButton {
display: inline-block;
position: relative;
outline: none;
background-color: #f5f5f5 !important;
height: 34px;
padding: 0 45px 0 15px;
line-height: 34px;
color: #9e9e9e;
font-weight: normal;
margin-right: 20px;
}
.c-sortSection .sortButton .sortIcon {
position: absolute;
height: 34px;
width: 34px;
top: 0;
right: 0;
background-color: #d9d9d9;
}
.c-sortSection .sortButton .sortIcon::before,
.c-sortSection .sortButton .sortIcon::after {
color: @white;
font-size: 18px;
position: absolute;
top: 7px;
left: 14px;
font-family: "soap-icons";
content: "\e886";
line-height: 12px;
}
.c-sortSection .sortButton .sortIcon::after {
top: 16px;
content: "\e88c";
}
.c-sortSection .sortButton.st-active .sortIcon {
background-color: var(--secondary-color);
}

@media (max-width: 560px) {
.c-sortSection .sortButton {
width: calc(50% - 15px);
margin: 0 10px 10px 0;
}
} */

.c-infoDivider {
border-bottom: 1px solid #eee;
margin-bottom: 10px;
padding-bottom: 10px;
display: table;
width: 100%;
}
.c-infoDivider .infoTitle,
.c-infoDivider .infoDescription {
display: table-cell;
padding: 10px;
vertical-align: top;
}
.c-infoDivider .infoTitle {
width: 200px;
border-right: 1px solid #eee;
}
.c-infoDivider .policyHeading {
margin: 0;
}
.policyHeading {
color: #838383;
display: block;
font-size: 14px;
line-height: 18px;
font-weight: 400;
margin: 0 0 10px;
}
.policyListing {
margin: 0;
padding: 0 0 0 20px;
display: block;
}
.policyListing li {
list-style-type: disc;
color: #adadad;
font-size: 13px;
line-height: 18px;
margin-bottom: 7px;
}
.policyListing li:last-child {
margin-bottom: 0;
}
@media (max-width: 560px) {
.c-infoDivider,
.c-infoDivider .infoTitle,
.c-infoDivider .infoDescription {
display: block;
}
.c-infoDivider .infoTitle {
width: 100%;
border: 0;
}
}

/* ----------------------------------------------
Component :: Review Section
------------------------------------------------- */
.c-reviewDivider {
border-bottom: 1px solid #eee;
margin-bottom: 10px;
padding-bottom: 10px;
display: table;
width: 100%;
}
.c-reviewDivider .infoTitle,
.c-reviewDivider .infoDescription {
display: table-cell;
padding: 10px;
vertical-align: top;
}
.c-reviewDivider .infoTitle {
width: 170px;
border-right: 1px solid #eee;
}
.c-reviewDivider .userImage {
border: 1px solid #eee;
margin: 0 auto;
height: 60px;
width: 60px;
box-sizing: border-box;
margin-bottom: 10px;
border-radius: 200px;
}
.c-reviewDivider .userImage img {
height: 60px;
width: 60px;
border-radius: 200px;
}
.c-reviewDivider .userTitle,
.c-reviewDivider .userDate {
color: #333;
display: block;
text-align: center;
font-size: 14px;
line-height: 18px;
margin-bottom: 5px;
}
.c-reviewDivider .userDate {
font-size: 10px;
line-height: 12px;
color: #838383;
}
.c-reviewDivider .reviewTitle {
color: var(--primary-color);
display: block;
font-size: 14px;
line-height: 20px;
font-style: italic;
margin: 0;
}
.c-reviewDivider .reviewText {
display: block;
color: #adadad;
font-size: 13px;
line-height: 20px;
margin-top: 20px;
}
.c-reviewDivider .reviewRating {
display: block;
text-align: center;
}
.c-reviewDivider .reviewRating .c-starRating {
display: inline-block;
vertical-align: middle;
}
.c-reviewDivider .reviewRating .rating {
vertical-align: middle;
display: inline-block;
color: #838383;
text-align: center;
font-family: @secondary-font-family;
font-size: 20px;
font-weight: 600;
text-transform: uppercase;
padding: 0;
margin-left: 10px;
}

@media (max-width: 600px) {
.c-reviewDivider {
display: block;
}
.c-reviewDivider .infoTitle {
display: block;
position: relative;
height: 50px;
width: 100%;
padding: 0;
text-align: left;
padding: 5px 0 5px 70px;
border: 0;
}
.c-reviewDivider .userImage {
position: absolute;
left: 0;
text-align: left;
top: 0;
height: 52px;
width: 52px;
}
.c-reviewDivider .userImage img {
height: 50px;
width: 50px;
}
.c-reviewDivider .userTitle,
.c-reviewDivider .userDate {
text-align: left;
margin: 0 0 5px 0;
}
.c-reviewDivider .reviewRating,
.c-reviewDivider .reviewText {
text-align: left;
margin-top: 10px;
line-height: 18px;
}
.c-reviewDivider .reviewRating .rating {
font-size: 16px;
}
}

/* ----------------------------------------------
Component :: Search Filter Sidebar
------------------------------------------------- */
.c-filterTitle {
background-color: @white;
display: block;
padding: 10px 10px 10px 45px;
height: 45px;
text-align: left;
position: relative;
margin-bottom: 10px;
}
.c-filterTitle .icon {
position: absolute;
height: 25px;
width: 25px;
top: 10px;
left: 10px;
background-color: transparent;
color: var(--secondary-color);
font-size: 20px;
text-align: center;
padding: 3px;
}
.c-filterTitle span {
color: #333;
display: block;
line-height: 25px;
font-size: 16px;
font-weight: 400;
}
.c-filterBox {
background-color: @white;
display: block;
padding: 10px;
min-height: 45px;
position: relative;
margin-bottom: 10px;
}

.c-accordion .card {
background-color: @white;
display: block;
padding: 5px;
position: relative;
margin-bottom: 10px;
border: 0;
border-radius: 0;
}
.c-accordion .card .card-header {
background-color: transparent;
padding: 0;
margin: 0;
border: 0;
border-radius: 0;
}
.c-accordion .card .btn-link {
background-color: @white;
border: 0;
color: #333333;
display: block;
padding: 10px 40px 10px 10px;
height: auto;
text-align: left;
outline: none;
position: relative;
font-size: 14px;
line-height: 20px;
text-decoration: none;
width: 100%;
}

.c-accordion .card .btn-link::before {
position: absolute;
height: 20px;
width: 20px;
top: 10px;
right: 5px;
font-size: 22px;
display: inline-block;
// font-family: "itours";
content: "+";
color: var(--primary-color);
text-align: center;
line-height: 20px;
}
.c-accordion .card .btn-link[aria-expanded="true"]::before {
content: "-";
}
.c-accordion .card .card-body {
padding: 10px;
}
.c-priceRange .priceRangeSlider {
height: 20px;
margin-bottom: 5px;
}

/* 5.1.2. Filters */
.filters-container.toggle-container {
background: none;
}
.filters-container.toggle-container .panel {
border: none;
margin-bottom: 4px;
background: @white;
}
.filters-container.toggle-container .panel .panel-title {
padding-left: 5px;
}
.filters-container.toggle-container .panel .panel-content {
padding: 10px 20px 20px;
}
.search-results-title {
background: @white;
padding: 0 20px;
margin: 0;
border-bottom: 4px solid #f5f5f5;
line-height: 3em;
}
.search-results-title > i {
color: var(--secondary-color);
font-size: 20px;
margin-right: 10px;
}

.filters-container .reviews {
margin: 0;
letter-spacing: 0.04em;
}

.c-checkSquare {
display: block;
position: relative;
}
.c-checkSquare li {
display: block;
margin-bottom: 2px;
}
.c-checkSquare li .filterCheckbox {
color: #999;
border: 0;
background-color: #f9f9f9;
display: block;
width: 100%;
padding: 7px 5px 7px 35px;
text-align: left;
line-height: 26px;
height: auto;
position: relative;
outline: none;
}
.c-checkSquare .filterCheckbox::after {
font-family: "itours";
content: "\76";
position: absolute;
height: 15px;
width: 15px;
top: 13px;
left: 10px;
color: #ccc;
font-size: 15px;
line-height: 16px;
}
.c-checkSquare .filterCheckbox.st-checked {
background-color: var(--primary-color);
color: @white;
}
.c-checkSquare .filterCheckbox.st-checked::after {
color: @white;
}
.c-checkSquare .c-starRating {
vertical-align: middle;
background-color: transparent;
}
.c-checkSquare .c-starRating .stars {
background-color: transparent;
}

/* ----------------------------------------------
Component :: Image Gallery
------------------------------------------------- */
.c-photoGallery .js-photoGallery {
position: relative;
}
.c-photoGallery .js-photoGallery .owl-nav {
position: absolute;
height: 40px;
width: 100%;
top: 50%;
margin-top: -20px;
z-index: 5;
}
.c-photoGallery .js-photoGallery .owl-nav .owl-prev,
.c-photoGallery .js-photoGallery .owl-nav .owl-next {
display: inline-block;
padding: 10px !important;
background-color: rgba(255, 255, 255, 0.5) !important;
width: 40px;
height: 40px;
box-sizing: border-box;
outline: none;
}
.c-photoGallery .js-photoGallery .owl-nav .owl-prev {
float: left;
}
.c-photoGallery .js-photoGallery .owl-nav .owl-next {
float: right;
}
.c-photoGallery .js-photoGallery .owl-nav .icon {
display: block;
color: var(--primary-color);
font-size: 20px;
line-height: 20px;
}

/* ----------------------------------------------
Component :: Day By Activity
------------------------------------------------- */
.cardListInfo-row {
display: block;
position: relative;
}
.cardListInfo-row .ListInfo-col {
background-color: #f3f9ff;
width: 100%;
padding-left: 60px;
margin: 0 0 5px;
position: relative;
min-height: 65px;
}
.cardListInfo-row .ListInfo-col .dayCount {
font-family: @secondary-font-family;
background-color: #537190;
position: absolute;
top: 0;
left: 0;
width: 60px;
height: 100%;
padding: 10px;
box-sizing: border-box;
}
.cardListInfo-row .dayCount .s1,
.cardListInfo-row .dayCount .s2 {
display: block;
color: @white;
text-align: left;
font-size: 14px;
font-weight: 600;
margin-bottom: 8px;
line-height: 12px;
letter-spacing: 0.5px;
}
.cardListInfo-row .dayCount .s2 {
font-size: 32px;
line-height: 26px;
margin: 0;
}
.cardListInfo-row .ListInfo-col .dayInfo {
display: block;
position: relative;
padding: 10px;
}
.cardListInfo-row .ListInfo-col .dayInfo .h1 {
color: #537190;
display: block;
margin: 0 0 8px;
font-size: 14px;
font-weight: 600;
}
.cardListInfo-row .ListInfo-col .staticText {
color: #537190;
display: block;
margin: 0 0 5px;
font-size: 12px;
position: relative;
padding-left: 13px;
}
.cardListInfo-row .ListInfo-col .staticText::before {
position: absolute;
top: 0;
left: -3px;
font-size: 17px;
color: #537190;
font-family: "itours";
content: "\31";
}
.cardListInfo-row .ListInfo-col .itemList {
display: block;
height: auto;
overflow: hidden;
margin-top: 8px;
text-align: left;
}
.cardListInfo-row .ListInfo-col .itemList .item {
border: 1px solid #537190;
color: #537190;
display: inline-block;
padding: 5px 10px 5px 30px;
position: relative;
font-size: 11px;
line-height: 12px;
margin: 0 5px 5px 0;
border-radius: 30px;
}
.cardListInfo-row .itemList .item .icon {
position: absolute;
top: 4px;
left: 7px;
height: 15px;
width: 15px;
color: #537190;
font-size: 14px;
line-height: 13px;
display: inline-block;
}

/* ----------------------------------------------
Component :: Flex Cards
------------------------------------------------- */
.c-flexCards {
display: flex;
flex-direction: row;
flex-wrap: wrap;
}
.c-flexCards .f_card {
padding: 10px;
background-color: #537190;
width: calc(25% - 10px);
margin: 0 10px 10px 0;
font-family: @secondary-font-family;
}
.f_card .currency_icon,
.f_card .currency_amount,
.f_card .currency_for {
display: block;
color: @white;
font-size: 26px;
font-weight: 600;
line-height: 26px;
margin-bottom: 5px;
}
.f_card .currency_icon {
font-size: 14px;
color: #96b4d4;
line-height: 12px;
}
.f_card .currency_for {
font-size: 14px;
font-weight: 400;
letter-spacing: 0.3px;
margin-bottom: 0;
line-height: 14px;
}
@media (max-width: 600px) {
.c-flexCards .f_card {
padding: 10px;
display: inline-block;
width: calc(50% - 10px);
flex: none;
}
}

@media (max-width: 480px) {
.c-flexCards .f_card {
padding: 10px;
display: inline-block;
width: 100%;
flex: none;
margin: 0 0 10px;
}
}

/* ----------------------------------------------
Component :: Select 2 Dropdown
------------------------------------------------- */
.c-select2DD {
box-sizing: border-box;
display: block;
width: 100%;
}
.c-select2DD .select2-container {
width: 100% !important;
}
.c-select2DD .select2-container--default .select2-selection--single {
background-color: #f5f5f5;
height: 34px;
border: 0;
border-radius: 0;
}
.c-select2DD
.select2-container--default
.select2-selection--single
.select2-selection__rendered {
padding: 8px 0 8px 10px;
line-height: 18px;
font-size: 12px;
color: #838383;
}
.c-select2DD
.select2-container--default
.select2-selection--single
.select2-selection__arrow {
background: var(--main-bg-color);
width: 24px;
height: 32px;
}
.c-select2DD
.select2-container--default
.select2-selection--single
.select2-selection__arrow
b {
border-color: #ffffff transparent transparent transparent;
}
.c-select2DD
.select2-container--default.select2-container--open
.select2-selection--single
.select2-selection__arrow
b {
border-color: transparent transparent #ffffff transparent;
}
.c-select2DD .select2-hidden-accessible {
outline: none !important;
}
.c-select2DD.st-clear {
margin-top: -1px;
width: 80px;
}
.c-select2DD.st-clear .select2-container--default .select2-selection--single {
height: 26px;
background-color: transparent;
}
.c-select2DD.st-clear
.select2-container--default
.select2-selection--single
.select2-selection__rendered {
padding: 6px 20px 6px 5px;
line-height: 14px;
color: #ffffff;
font-size: 10px;
text-transform: uppercase;
text-align: right;
}
.c-select2DD.st-clear
.select2-container--default
.select2-selection--single
.select2-selection__arrow {
background-color: transparent;
height: 10px;
width: 10px;
top: 9px;
}

.select2-container--open .select2-dropdown--below {
border: 1px solid #eee;
box-sizing: border-box;
border-radius: 0;
-moz-border-radius: 0;
-webkit-border-radius: 0;
}
.select2-container--default .select2-results__option[aria-selected="true"] {
background-color: var(--secondary-color);
color: @white;
}
.select2-container--default .select2-search--dropdown .select2-search__field {
border: 1px solid #e2e2e2;
padding: 8px;
line-height: 18px;
font-size: 12px;
color: #838383;
outline: none;
border-radius: 5px;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
}

/* ----------------------------------------------
Component :: Checkbox Group
------------------------------------------------- */
.c-checkGroup {
position: relative;
height: 30px;
min-width: 38px;
float: left;
margin-right: 2px;
}
.c-checkGroup .form-check-inline .form-check-input {
position: relative;
z-index: 1;
}
.c-checkGroup .form-check-label {
cursor: pointer;
color: #999;
display: block;
position: absolute;
top: 0;
left: 0;
padding: 6px;
background: #f3f3f3;
line-height: 15px;
font-size: 12px;
font-weight: 600;
}

.c-checkGroup .form-check-input:checked ~ .form-check-label {
background-color: var(--secondary-color);
color: @white;
}
.c-checkGroup .form-check-input:checked ~ .form-check-label .icon-star {
color: @white;
}

.c-addRoom {
display: block;
position: relative;
}
.c-addRoom .roomInfo {
background-color: #f5f5f5;
border: 0;
box-sizing: border-box;
font-size: 12px;
font-weight: normal;
text-align: left;
color: #838383 !important;
height: 34px;
display: block;
position: relative;
padding: 8px 30px 8px 10px;
line-height: 18px;
width: 100%;
outline: none;
border-radius: 0;
}
.c-addRoom .roomInfo::before {
background-color: var(--secondary-color);
content: "";
position: absolute;
top: 0;
right: 0;
height: 34px;
width: 24px;
}
.c-addRoom .roomInfo::after {
position: absolute;
right: 8px;
top: 15px;
border-color: #fff transparent transparent transparent;
border-style: solid;
border-width: 5px 4px 0 4px;
content: "";
}
.nytCount {
float: right;
padding: 2px 5px;
font-size: 11px;
background: var(--primary-color);
color: @white;
font-weight: 600;
line-height: 12px;
border-radius: 3px;
position: relative;
top: 2px;
}

/* ----------------------------------------------
Component :: Modal
------------------------------------------------- */
.c-modal .modal-header {
border-bottom: 0;
background-color: var(--secondary-color);
padding: 10px;
}
.c-modal .modal-header .modal-title {
color: @white;
display: block;
font-size: 14px;
font-weight: 600;
line-height: 18px;
letter-spacing: 0.5px;
font-family: @secondary-font-family;
}
.c-modal .modal-header .close {
padding: 13px;
}
.c-modal .modal-footer {
padding: 10px;
}
.c-modal .c-lineDiv .form-group {
margin-bottom: 10px;
}
.c-modal .c-lineDiv .form-group label {
margin-bottom: 2px;
font-size: 10px;
line-height: 12px;
}

.c-modifyFilter {
margin-bottom: 10px;
}
.c-modifyFilter .c-accordion .card,
.c-modifyFilter .c-accordion .card .btn-link {
background-color: var(--main-primary-color);
color: @white;
position: relative;
}
.c-modifyFilter .c-accordion .card {
padding: 1px;
}
.c-modifyFilter .c-accordion .card .btn-link::before {
color: @white;
}
.c-modifyFilter .c-accordion .card .card-body {
background-color: @white;
}

/* ----------------------------------------------
Component :: Range Slider
------------------------------------------------- */
.slider-container {
width: 100%;
height: 40px;
margin-top: 20px;
}
.slider-container .back-bar {
background-color: #f5f5f5;
height: 10px;
position: relative;
border-radius: 5px;
}
.slider-container .back-bar .selected-bar {
background-color: var(--primary-color);
position: absolute;
height: 100%;
}
.slider-container .back-bar .pointer {
position: absolute;
width: 20px;
height: 20px;
top: -5px;
cursor: col-resize;
opacity: 1;
z-index: 2;
background: #2d3e52;
border: 2px solid @white;
border-radius: 50%;
}
.slider-container .back-bar .pointer.last-active {
z-index: 3;
}
.slider-container .back-bar .pointer-label {
color: #2d3e52;
position: absolute;
top: 20px;
font-size: 10px;
font-weight: 600;
white-space: nowrap;
line-height: 1;
}
.slider-container .back-bar .pointer-label.low {
top: -20px;
}
.slider-container .back-bar .focused {
z-index: 10;
}
.slider-container .clickable-dummy {
cursor: pointer;
position: absolute;
width: 100%;
height: 100%;
z-index: 1;
}
.slider-container .scale {
display: none;
}
.slider-container.slider-readonly .clickable-dummy,
.slider-container.slider-readonly .pointer {
cursor: auto;
}

.loadMoreContainer {
display: block;
margin: 20px 0;
text-align: center;
}
.loadMoreContainer .loadBtn {
background-color: var(--secondary-color);
border: 0;
display: inline-block;
color: @white;
font-family: @secondary-font-family;
font-size: 16px;
font-weight: 600;
line-height: 23px;
padding: 10px 30px;
text-transform: uppercase;
letter-spacing: 0.5px;
outline: none;
border-radius: 50px;
}
.loadMoreContainer .loadBtn .icon {
display: inline-block;
font-size: 16px;
line-height: 16px;
color: @white;
margin-right: 5px;
vertical-align: middle;
}

/* ----------------------------------------------
Component :: Shopping Cart Page
------------------------------------------------- */
.c-cartContainer {
background-color: @white;
display: block;
position: relative;
margin-bottom: 20px;
font-family: @secondary-font-family;
}
.c-cartContainer .cartHeading {
display: block;
background-color: var(--primary-color);
padding: 10px;
text-align: left;
font-size: 18px;
font-weight: 600;
color: @white;
}
.c-cartContainer .cartBody {
display: block;
background-color: @white;
text-align: left;
}
.c-cartContainer .cartBody .cartItem {
border-bottom: 1px solid #eeeeee;
padding: 10px;
}
.cartItem .cartImage {
display: block;
position: relative;
margin-bottom: 20px;
}
.cartItem .cartImage img {
width: 100%;
}
.cartItem .itemTitle {
font-size: 16px;
line-height: 20px;
margin-bottom: 6px;
}
.cartItem .cardInfoLine {
display: inline-block;
margin-right: 10px;
}
.cartItem .infoSection .sortIcon {
display: inline-block;
margin: 0 12px 0 0;
position: relative;
top: 2px;
}
.cartItem .infoSection .sortIcon::before {
color: var(--secondary-color);
font-family: "itours";
content: "\75";
display: block;
font-size: 14px;
line-height: 14px;
}
.cartItem .infoSection .sortIcon.round::before {
content: "\e014";
}

.cartItem .roomType {
background-color: #f5f5f5;
padding: 15px 10px 5px;
margin: 10px 0 5px;
position: relative;
}
.cartItem .roomType .rHeading {
position: absolute;
background-color: #999;
padding: 2px 4px;
color: @white;
font-size: 10px;
top: -5px;
left: 10px;
line-height: 10px;
border-radius: 3px;
}

.cartItem .roomType .roomTitle {
display: block;
margin-bottom: 4px;
}
.cartItem .roomType .roomTitle .s1,
.cartItem .roomType .roomTitle .s2 {
display: block;
font-size: 14px;
line-height: 18px;
font-weight: 600;
float: left;
}
.cartItem .roomType .roomTitle .s2 {
color: var(--primary-color);
float: right;
}
.cartItem .cartHeader {
display: block;
position: relative;
padding-right: 50px;
}
.cartItem .cartHeader .deleteHotel {
position: absolute;
background-color: #e6e6e6;
padding: 3px 2px 3px 3px;
border: 0;
top: 0;
right: 0;
z-index: 3;
height: 28px;
width: 28px;
border-radius: 20px;
text-align: center;
}
.cartItem .cartHeader .deleteHotel:before {
font-family: "itours";
content: "\e001";
display: inline-block;
font-size: 15px;
line-height: 23px;
color: #333;
}

.c-cartContainer.cartPricing {
display: block;
padding: 10px;
background-color: #2d3e52;
}
.c-cartContainer.cartPricing .sTitle {
border-bottom: 1px solid rgba(255, 255, 255, 0.2);
display: block;
padding: 0 0 10px;
margin-bottom: 10px;
color: @white;
font-size: 16px;
font-weight: 600;
line-height: 21px;
letter-spacing: 0.5px;
text-transform: uppercase;
}
.c-cartContainer.cartPricing .sBlock {
border: 1px solid rgba(255, 255, 255, 0.1);
display: block;
padding: 15px 10px 10px;
margin: 15px 0 30px;
position: relative;
}
.c-cartContainer.cartPricing .sBlock .sBlock_title {
position: absolute;
background-color: @white;
padding: 2px 4px;
color: #2d3e52;
font-size: 10px;
top: -7px;
left: 10px;
line-height: 10px;
border-radius: 1px;
}
.c-cartContainer.cartPricing .sBlock .sBlock_price {
margin-bottom: 10px;
}
.c-cartContainer.cartPricing .sBlock .sBlock_price .pLabel {
display: block;
color: rgba(255, 255, 255, 0.5);
font-size: 16px;
line-height: 18px;
font-weight: 600;
text-transform: uppercase;
letter-spacing: 0.5px;
}
.c-cartContainer.cartPricing .sBlock .sBlock_price .pLabel.cost {
text-align: right;
color: var(--primary-color);
}
.c-cartContainer.cartPricing .sBlock .sBlock_price .pLabel.cost.colWhite {
color: @white;
}
.c-cartContainer.cartPricing .sBlock .sBlock_price.cDivider {
margin-top: 10px;
margin-bottom: 0;
padding-top: 10px;
}
.c-cartContainer.cartPricing .sBlock.gTotal {
padding-top: 10px;
}
.c-cartContainer.cartPricing .sBlock.gTotal .sBlock_price {
margin-bottom: 0;
}
.c-cartContainer.cartPricing .sBlock.gTotal .pLabel {
font-size: 20px;
line-height: 22px;
}

.c-cartContainer.cartPricing .sPromocode {
display: block;
margin-bottom: 20px;
}
.c-cartContainer.cartPricing .sPromocode .sLabel {
display: block;
font-size: 13px;
color: @white;
font-weight: 600;
line-height: 16px;
letter-spacing: 0.5px;
margin-bottom: 5px;
}
.c-cartContainer.cartPricing .sPromocode .promoTxt {
display: block;
border: 1px solid rgba(255, 255, 255, 0.2);
background-color: rgba(255, 255, 255, 0.1);
outline: none !important;
padding: 10px;
line-height: 20px;
height: 40px;
color: @white;
font-size: 18px;
font-weight: 600;
letter-spacing: 1px;
width: 100%;
}
.c-cartContainer.cartPricing .sPromocode .promoBtn,
.c-cartContainer.cartPricing .btnCheckout {
background-color: var(--primary-color);
border: 0;
display: block;
padding: 10px;
line-height: 20px;
height: 40px;
color: @white;
font-size: 16px;
font-weight: 600;
text-align: center;
letter-spacing: 0.5px;
width: 100%;
outline: none !important;
}
.c-cartContainer.cartPricing .btnCheckout.sm {
padding: 6px 10px;
font-size: 14px;
font-weight: 600;
height: 32px;
}

.c-cartContainer.cartPricing .btnCheckout {
background-color: #7db921;
}

.c-travellerDtls {
padding: 10px;
display: block;
position: relative;
}
.c-travellerDtls .section {
margin: 20px 0;
padding: 20px 10px 10px;
display: block;
position: relative;
border: 1px solid #eee;
}
.c-travellerDtls .section .title {
position: absolute;
padding: 3px 10px 2px;
font-size: 12px;
color: @white;
top: -8px;
left: 10px;
font-weight: 600;
background-color: var(--primary-color);
line-height: 12px;
text-transform: uppercase;
}
.c-travellerDtls .c-infoRow label {
display: block;
font-size: 14px;
line-height: 18px;
color: #f90a0a !important;
margin: 8px 0 0;
}
.c-travellerDtls .c-infoRow,
.c-travellerDtls .c-infoRow .formField {
margin-bottom: 10px;
}
.c-travellerDtls .c-infoRow .infoRow_txtbox {
border: 1px solid #ccc;
display: block;
padding: 7px 10px;
font-size: 14px;
line-height: 18px;
color: #333;
width: 100%;
outline: none;
height: 34px;
border-radius: 4px;
}

/* ----------------------------------------------
Component :: Shopping Cart Modal
------------------------------------------------- */
.shoppingCartModal.modal .modal-dialog {
max-width: 450px;
}
.shoppingCartModal.modal .modal-body {
background: #f9f9f9;
}
.c-cartItem {
background-color: @white;
border: 1px solid #efefef;
box-sizing: border-box;
display: block;
padding: 15px 10px 15px 60px;
min-height: 50px;
position: relative;
font-family: @secondary-font-family;
margin-bottom: 10px;
}
.c-cartItem:last-child {
border: 0;
}
.c-cartItem .icon {
position: absolute;
width: 45px;
height: 45px;
background-color: var(--primary-color);
left: 7px;
top: 15px;
display: inline-block;
border-radius: 100px;
-moz-border-radius: 100px;
-webkit-border-radius: 100px;
}
.c-cartItem .icon:before {
position: relative;
top: 12px;
left: 11px;
font-size: 22px;
color: @white;
}
.c-cartItem .ci-title,
.ci-body .ci-subtitle {
color: #333333;
display: block;
font-size: 15px;
font-weight: 600;
line-height: 20px;
margin-bottom: 3px;
}
.ci-body .ci-subtitle {
float: left;
color: #999999;
font-size: 12px;
line-height: 14px;
margin-bottom: 0;
}
.ci-body {
background-color: #f9f9f9;
border-bottom: 1px solid #f1f1f1;
padding: 5px;
}
.ci-body .ci-cost {
color: var(--primary-color);
float: right;
font-size: 12px;
font-weight: 600;
line-height: 14px;
text-transform: uppercase;
}
.ci-header .ci-title {
float: left;
}
.ci-header .ci-btnRemove {
float: right;
}
.ci-header .ci-btnRemove button {
display: block;
border: 0;
background-color: transparent;
padding: 0;
position: relative;
top: -10px;
right: -5px;
line-height: 6px;
outline: none !important;
border-radius: 20px;
height: 22px;
width: 22px;
}
.ci-header .ci-btnRemove button::before {
color: var(--primary-color);
content: "\79";
font-family: "itours";
font-size: 16px;
line-height: 14px;
position: relative;
display: inline-block;
left: 0;
top: 0;
}
/* ----------------------------
Promo Code
------------------------------- */
.c-promoNotify {
margin-bottom: 20px;
display: block;
position: relative;
padding: 5px 60px 5px 30px;
border: 1px solid rgba(195, 230, 203, 0.7);
background-color: rgba(195, 230, 203, 0.5);
font-size: 14px;
color: #b0f9c1;
line-height: 18px;
}
.p_code {
color: @white;
letter-spacing: 0.5px;
font-weight: 600;
}
.c-promoNotify::before {
font-family: "itours";
content: "\27";
position: absolute;
height: 15px;
width: 15px;
color: #b0f9c1;
top: 7px;
left: 5px;
line-height: 15px;
font-size: 16px;
}
.c-promoNotify .removePromo {
border: 0;
color: #333;
position: absolute;
background-color: @white;
top: 7px;
right: 5px;
line-height: 8px;
font-size: 10px;
padding: 3px 7px;
border-radius: 10px;
}
.c-promoNotify.st-success {
border: 1px solid rgba(195, 230, 203, 0.7);
background-color: rgba(195, 230, 203, 0.5);
color: #b0f9c1;
}
.c-promoNotify.st-success::before {
content: "\27";
color: #b0f9c1;
}
.c-promoNotify.st-fail {
border: 1px solid rgba(245, 198, 203, 0.7);
background-color: rgba(245, 198, 203, 0.5);
color: #fdbdc3;
}
.c-promoNotify.st-fail::before {
content: "\61";
color: #fdbdc3;
}
/* ----------------------------------------------
Component :: User Profile
------------------------------------------------- */
.c-userBlock {
display: block;
padding: 15px;
background-color: @white;
margin-bottom: 20px;
font-family: @secondary-font-family;
box-shadow: 0 0 13px 0 rgba(82, 63, 105, 0.05);
border-radius: 4px;
}
.c-userBlock .u_pInfo {
display: block;
position: relative;
min-height: 80px;
padding-left: 90px;
margin-bottom: 15px;
}
.c-userBlock .u_pInfo img {
position: absolute;
top: 0;
left: 0;
height: 75px;
width: 75px;
}
.c-userBlock .u_pInfo .c-heading {
color: #48465b;
margin-bottom: 0;
font-weight: 700;
}
.c-userBlock .u_pInfo .c-heading.sm {
font-weight: 500;
color: #74788d;
margin-top: 5px;
line-height: 16px;
}
.c-userBlock .u_pInfo .btnContainer {
display: block;
margin-top: 5px;
text-align: left;
}
.c-userBlock .u_pInfo .btnContainer .c-btn {
display: inline-block;
background-color: #5578eb;
border: 0;
color: @white;
font-weight: 600;
padding: 0.3rem 1rem;
outline: 0 !important;
vertical-align: middle;
font-size: 12px;
line-height: 12px;
text-transform: uppercase;
}

.c-userBlock .u_pData {
margin: 0 -15px;
padding: 0 15px;
background-color: #f5f5f5;
}
.c-userBlock .u_pData .infoRow {
padding: 5px 0;
border-bottom: 1px solid #eee;
}
.c-userBlock .u_pData .infoRow:last-child {
border: 0;
}
.c-userBlock .u_pData .infoRow .lbl_sm,
.c-userBlock .u_pData .infoRow .lbl_md {
color: #000;
display: block;
padding: 3px 0;
font-size: 12px;
font-weight: 600;
line-height: 14px;
}
.c-userBlock .u_pData .infoRow .lbl_md {
color: #999999;
}

.c-userBlock .u_links {
display: block;
padding: 20px 0;
}
.c-userBlock .u_links .u_tab {
border: 0;
background-color: #f9f9f9;
display: block;
width: 100%;
padding: 5px 0 5px 42px;
margin-bottom: 10px;
position: relative;
text-align: left;
height: 32px;
font-size: 14px;
line-height: 22px;
font-weight: 500;
color: #464e5f;
letter-spacing: 0.1px;
outline: none;
border-radius: 5px;
transition: all ease 0.3s;
}
.c-userBlock .u_links .u_tab .icon {
display: inline-block;
position: absolute;
top: 0;
left: 0;
height: 32px;
width: 32px;
background-color: #eee;
text-align: center;
font-size: 20px;
vertical-align: middle;
display: inline-block;
line-height: 38px;
border-radius: 4px;
transition: all ease 0.3s;
}
.c-userBlock .u_links .u_tab:hover,
.c-userBlock .u_links .u_tab.active {
background-color: #eeeeee;
}
.c-userBlock .u_links .u_tab:hover .icon,
.c-userBlock .u_links .u_tab.active .icon {
background-color: var(--primary-color);
color: #ffffff;
}

.c-userBlock.st-details .c-heading {
border-bottom: 1px solid var(--primary-color);
display: block;
padding: 0 70px 10px 0;
margin-bottom: 10px;
position: relative;
font-size: 18px;
font-weight: 700;
}
.c-userBlock.st-details .c-subHeading {
background: #f3f3f3;
border-bottom: 1px solid #e7e7e7;
display: block;
padding: 5px;
margin: 10px 0;
position: relative;
font-size: 13px;
font-weight: 700;
color: #333;
text-transform: uppercase;
}
.c-userBlock.st-details .st-cancleEdit,
.c-userBlock.st-details .saveProfile,
.c-userBlock.st-details .st-editable .st-editProfile {
display: none;
}
.c-userBlock.st-details .st-editable .st-cancleEdit,
.c-userBlock.st-details .st-editable .saveProfile {
display: inline-block;
}

.c-userBlock.st-details .formField {
display: block;
margin-bottom: 15px;
font-family: @secondary-font-family;
}
.c-userBlock.st-details .formField label {
font-family: @secondary-font-family;
display: block;
font-size: 12px;
line-height: 14px;
font-weight: 600;
color: #999;
margin-bottom: 4px;
text-transform: uppercase;
}
.c-userBlock.st-details .formField .txtBox {
background-color: @white;
color: #464e5f;
border: 1px solid #eeeeee;
box-sizing: border-box;
display: block;
padding: 6px;
font-size: 14px;
line-height: 22px;
font-weight: 600;
outline: none;
width: 100%;
}
.c-userBlock.st-details .formField .txtBox[readonly] {
background-color: #f9f9f9;
border: 0;
padding: 0;
}
.c-userBlock.st-details .conditionalDiv {
display: none;
}
.c-userBlock.st-details .st-editable .conditionalDiv {
display: block;
}

.c-userProfileAccord .card {
margin-bottom: 15px;
border: 0 !important;
border-radius: 0;
}
.c-userProfileAccord .card-header {
padding: 0;
border: 1px solid #eee;
margin: 0 !important;
border-radius: 0;
}
.c-userProfileAccord .card-header .btnShow {
border: 0;
background-color: transparent;
display: block;
padding: 5px 40px 5px 5px;
position: relative;
text-align: left;
text-decoration: none;
outline: none;
width: 100%;
border-radius: 0;
box-shadow: none;
}
.c-userProfileAccord .card-header .btnShow > span {
display: inline-block;
text-transform: uppercase;
font-size: 13px;
font-weight: 700;
color: #333;
letter-spacing: 0.1px;
}
.c-userProfileAccord .card-header .btnShow::before {
font-family: "itours" !important;
content: "\71";
position: absolute;
top: 3px;
right: 5px;
font-size: 14px;
line-height: 14px;
color: #999999;
}
.c-userProfileAccord .card-body {
border: 0;
padding: 10px 0;
}

.c-table .table {
width: 100% !important;
}
.c-table .table th {
border-bottom: 0;
background-color: var(--primary-color);
line-height: 20px;
vertical-align: top;
padding: 7px 5px;
color: @white;
}
.c-table .table td {
color: #333333;
vertical-align: top;
padding: 7px 5px;
font-size: 13px;
font-weight: 500;
}
.c-table .table tfoot tr td {
border-bottom: 0;
background-color: var(--primary-color);
line-height: 20px;
vertical-align: top;
padding: 7px 5px;
color: @white;
}
.c-table .dataTables_filter input[type="search"] {
background-color: @white;
color: #464e5f;
border: 1px solid #eeeeee;
box-sizing: border-box;
display: inline-block;
padding: 4px;
font-size: 14px;
line-height: 18px;
font-weight: 400;
outline: none;
width: 200px;
}
.c-table table.dataTable thead .sorting,
.c-table table.dataTable thead .sorting_desc,
.c-table table.dataTable thead .sorting_asc {
background-image: none;
position: relative;
padding-right: 18px;
}
.c-table table.dataTable thead .sorting::before,
.c-table table.dataTable thead .sorting_desc::before,
.c-table table.dataTable thead .sorting_asc::before {
color: rgba(255, 255, 255, 0.5);
position: absolute;
top: 10px;
right: 5px;
font-size: 10px;
line-height: 11px;
font-family: "itours" !important;
content: "\6f";
}
.c-table table.dataTable thead .sorting_desc::before {
content: "\71";
}
.c-table table.dataTable thead .sorting_asc::before {
content: "\70";
}
.c-table .tableBtn {
background-color: var(--primary-color);
border: 0;
box-sizing: border-box;
display: inline-block;
height: 22px;
width: 22px;
line-height: 22px;
margin-right: 5px;
padding: 0;
text-align: center;
outline: none;
border-radius: 2px;
}
.c-table .tableBtn .icon {
font-size: 15px;
line-height: 15px;
display: inline-block;
vertical-align: middle;
color: @white;
position: relative;
top: 1px;
}

.readOnly_info {
display: block;
margin-bottom: 15px;
font-family: @secondary-font-family;
}
.readOnly_info .lbl {
display: block;
font-size: 12px;
line-height: 14px;
font-weight: 600;
color: #999;
margin-bottom: 2px;
text-transform: uppercase;
}
.readOnly_info .info {
background-color: #f3f3f3;
color: #464e5f;
box-sizing: border-box;
display: block;
font-size: 14px;
line-height: 20px;
font-weight: 600;
outline: none;
padding: 2px;
}
.c-tableINfo {
margin-top: 30px;
}
.c-tableINfo .infoCard {
display: block;
background-color: #f3f3f3;
border: 1px solid #eeeeee;
padding: 10px;
border-radius: 4px;
}
.c-tableINfo .infoCard .lbl {
display: block;
font-size: 13px;
line-height: 15px;
font-weight: 700;
color: #999999;
margin-bottom: 5px;
text-transform: uppercase;
}
.c-tableINfo .infoCard .info {
display: block;
font-size: 16px;
line-height: 20px;
font-weight: 700;
color: var(--primary-color);
text-transform: uppercase;
}
.wAuto {
width: auto !important;
}
.c-table.st-dataTable .datepicker-wrap:after {
display: none;
}
/* ----------------------------------------------
Component :: Utilities
------------------------------------------------- */


.c-customeBtn {
border: 0;
outline: none;
display: inline-block;
padding: 3px 10px 3px 30px;
margin-right: 5px;
font-size: 10px;
text-transform: uppercase;
color: @white !important;
background-color: var(--primary-color);
height: auto;
line-height: 19px;
position: relative;
text-decoration: none !important;
letter-spacing: 0.5px;
border-radius: 0;
}
.c-customeBtn .icon {
position: absolute;
top: 0;
left: 0;
color: @white;
font-size: 14px;
line-height: 14px;
background-color: #597ea0;
height: 25px;
width: 25px;
padding: 6px 5px;
}
.c-customeBtn.xs {
padding: 4px 5px 4px 25px;
font-size: 9px;
line-height: 12px;
}
.c-customeBtn.xs .icon {
font-size: 14px;
line-height: 14px;
height: 19px;
width: 19px;
padding: 3px 2px 3px;
}
.c-customeBtn.red {
background-color: #dc3545;
}
.c-customeBtn.red .icon {
background-color: #a9323d;
}

.form-group .error {
// background-color: #ffebed;
color: #a9323d;
display: block;
font-size: 10px;
line-height: 11px;
position: relative;
padding-left: 16px;
margin-top: 3px;
}
.form-group .error::before {
color: #a9323d;
font-family: "itours";
content: "\61";
position: absolute;
top: 0;
left: 0;
font-size: 11px;
line-height: 12px;
}

.c-emptyList {
display: block;
margin-bottom: 50px;
text-align: center;
}
.c-emptyList .imgDiv {
height: 150px;
width: 150px;
margin: 0 auto 50px;
}
.c-emptyList .imgDiv img {
display: block;
height: 150px;
width: 150px;
}
.c-emptyList .infoDiv {
font-family: @secondary-font-family;
color: #2d3e52;
display: block;
font-size: 26px;
font-weight: 700;
text-align: center;
line-height: 32px;
}

.infoSection .cardInfoLine.cust .icon {
color: var(--main-primary-color);
font-size: 12px;
line-height: 16px;
position: absolute;
left: 0;
top: 0;
}
.infoSection .cardInfoLine.noicon {
padding-left: 0;
margin-bottom: 0;
}
.infoSection .cardInfoLine.noicon:before {
content: "";
}

.c-link,
.c-link > * {
border: 0;
text-decoration: none !important;
outline: none;
line-height: normal;
transition: all ease 0.3s;
-moz-transition: all ease 0.3s;
-webkit-transition: all ease 0.3s;
}
.c-link:hover,
.c-link:hover > * {
color: var(--primary-color);
}
.text-center {
text-align: center !important;
}
.text-left {
text-align: left !important;
}
.pad0 {
padding: 0 !important;
}
.p0-left {
padding-left: 0;
}
.p0-right {
padding-right: 0;
}
.pad0-btm {
padding-bottom: 0 !important;
}
.p20-top {
padding-top: 20px;
}
.m0 {
margin: 0 !important;
}
.m20-top {
margin-top: 20px;
}
.m26-top {
margin-top: 26px;
}
.m5-btm {
margin-bottom: 5px !important;
}
.m10-btm {
margin-bottom: 10px !important;
}
.m20-btm {
margin-bottom: 20px;
}
.m5-l {
margin-left: 5px;
}
.overflow-hidden {
overflow: hidden;
}
.full-width {
width: 100% !important;
}
.text-right {
text-align: right;
}
.t-uppercase {
text-transform: uppercase;
}
.noFloat {
float: none !important;
}
.txt-bold {
font-weight: 700;
}
.txt-light {
font-weight: 300;
}
.pull-right {
float: right;
}
.onlyForMobile {
display: none !important;
}
.onlyForDesktop {
display: block !important;
}
.tooltip-inner {
font-size: 11px;
}
.c-lineDiv:not(:first-child),
.c-lineDiv:not(:last-child) {
position: relative;
margin-bottom: 10px;
}
.icon-star {
display: inline-block;
position: relative;
font-family: "itours" !important;
content: "";
font-size: 14px;
text-align: left;
cursor: default;
white-space: nowrap;
line-height: 13px;
color: #fdb712;
font-style: normal;
top: 2px;
}
.icon-star::before {
display: block;
content: "\35";
}
.c-dayNight {
color: #838383;
display: block;
font-size: 12px;
line-height: 18px;
margin: 0;
text-transform: uppercase;
}
.c-dayNight strong {
color: #333;
display: inline-block;
margin-right: 3px;
font-size: 15px;
}

.selector.st-clean {
border: 1px solid #ccc;
background: @white;
border-radius: 4px;
}
.selector.st-clean span.c-custom-select {
height: 32px;
outline: none !important;
}
.selector.st-clean span.c-custom-select {
background-color: @white;
border: 0;
border-radius: 4px;
}
.selector.st-clean span.c-custom-select:before {
color: #999;
background-color: @white;
}
.selector.st-clean span.c-custom-select:after {
border-color: #999 transparent transparent transparent;
}

@media (max-width: 768px) {
.onlyForMobile {
display: block !important;
}
.onlyForDesktop {
display: none !important;
}
.M-m20-btm {
margin-bottom: 20px;
}
.M-p50-btm {
padding-bottom: 50px !important;
}
.M-m0 {
margin: 0 !important;
}
.c-alert {
font-size: 13px;
width: 300px;
margin-left: -150px;
}
}

/* Loader */
.timeline-item {
box-sizing: border-box;
background: @white;
border: 1px solid #e5e6e9;
padding: 10px;
width: 100%;
height: 160px;
}
@keyframes placeHolderShimmer {
0% {
background-position: -468px 0;
}
100% {
background-position: 468px 0;
}
}

.animated-background {
animation-duration: 1s;
animation-fill-mode: forwards;
animation-iteration-count: infinite;
animation-name: placeHolderShimmer;
animation-timing-function: linear;
background: #f6f7f8;
background: linear-gradient(to right, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
background-size: 800px 104px;
height: 130px;
position: relative;
}
.background-masker {
background: @white;
position: absolute;
}
.imageDiv {
top: 0;
left: 150px;
height: 130px;
width: 20px;
background: @white;
position: absolute;
}
.line-1,
.line-2,
.line-3,
.line-4,
.line-5 {
top: 0;
background: @white;
position: absolute;
left: 170px;
height: 10px;
width: calc(100% - 170px);
}
.line-1 {
top: 20px;
}
.line-2 {
top: 40px;
}
.line-3 {
top: 60px;
}
.line-4 {
top: 80px;
}
.line-5 {
top: 100px;
height: 40px;
}

.galleryLoader {
background: #ffffff url("../../images/loader.gif") center center no-repeat;
position: relative;
height: 150px;
width: 100%;
}
.js-dynamicLoad {
overflow: hidden;
height: 0;
opacity: 0;
}
.currency-icon {
margin-right: 3px;
}
.c-hide {
display: none !important;
}
.c-show {
display: block !important;
}
.pdf-button-link {
background-color: transparent;
border: 0;
text-decoration: underline;
font-size: 14px;
font-weight: 600;
color: var(--primary-color);
margin-bottom: 10px;
}

.c-bookingInfo .close {
position: absolute !important;
top: 10px;
right: 10px;
z-index: 5;
}
.c-bookingInfo .tab-pane {
padding: 15px 0px;
}
.c-bookingInfo .profile_box legend {
font-size: 16px;
}
.c-bookingInfo .serviceTitle {
background-color: #ededf3;
font-size: 14px;
padding: 2px;
}
.c-bookingInfo .profile_box {
margin-bottom: 20px;
}
.c-bookingInfo .boldText {
letter-spacing: 0.5px;
display: inline-block;
padding: 5px 10px;
font-size: 16px;
font-weight: 600;
line-height: 22px;
font-family: @secondary-font-family;
text-transform: uppercase;
background-color: var(--primary-color);
color: @white;
margin-right: 5px;
}
.c-table.st-dataTable .dataTables_length {
display: none;
}

/* ---- Radio button set ----- */
.radioCheck {
display: block;
margin-bottom: 20px;
}
.radioCheck,
.radioCheck .sect {
font-family: @secondary-font-family;
display: inline-block;
position: relative;
float: left;
}
.radioCheck .sect .radio_txt {
display: inline-block;
position: absolute;
top: 0;
left: 0;
opacity: 0;
}
.radioCheck .sect.s1 .radio_lbl {
border-radius: 3px 0 0 3px;
}
.radioCheck .sect.s2 .radio_lbl {
border-radius: 0 3px 3px 0;
}
.radioCheck .sect .radio_lbl {
color: #999;
cursor: pointer;
background-color: #eee;
display: block;
padding: 12px 25px 9px;
font-size: 14px;
font-weight: 600;
text-transform: uppercase;
text-align: center;
margin: 0;
transition: all ease 0.3s;
}
.radioCheck .sect .radio_txt:checked ~ .radio_lbl {
color: @white;
background-color: var(--main-bg-color);
}

/* Checkbox */
.checFilterOpt {
display: block;
position: relative;
margin-bottom: 5px;
min-height: 26px;
}
.checFilterOpt .filterChk {
display: inline-block;
position: absolute;
top: 0;
left: 0;
opacity: 0;
z-index: 2;
}

.checFilterOpt .lblfilterChk {
background-color: #f9f9f9;
cursor: pointer;
display: block;
position: relative;
padding: 7px 10px 7px 30px;
margin: 0;
text-transform: uppercase;
font-family: @secondary-font-family;
font-weight: 500;
font-size: 14px;
line-height: 14px;
color: #999999;
}
.checFilterOpt .lblfilterChk::before {
background-color: #ccc;
font-family: "itours";
content: "";
position: absolute;
top: 6px;
left: 5px;
height: 16px;
width: 16px;
font-size: 12px;
line-height: 16px;
text-align: center;
padding: 0 0 0 1px;
display: inline-block;
}

.checFilterOpt .filterChk:checked ~ .lblfilterChk {
color: @white;
background-color: var(--primary-color);
}
.checFilterOpt .filterChk:checked ~ .lblfilterChk::before {
background-color: @white;
color: var(--primary-color);
content: "\4a";
}
.seat_availability{
color: #fff;
padding: 7px 25px;
display:inline-block;
margin-right:-4px;
padding: 4px 9px;
}
.danger_bg {
background: #ff5b5b;
}
.info_bg {
background: #33b5e5;
}

/* --- iPad media queries */
@media only screen and (max-device-width: 769px) and (min-device-width: 320px) and (orientation: portrait) {
.pageHeader_top .section-1,
.pageHeader_top .section-2,
.pageHeader_top .section-3,
.sPromocode .sections {
width: 100% !important;
max-width: 100% !important;
flex: 0 0 100% !important;
margin-bottom: 10px;
}
.container-iPad .for-iPad {
width: 50% !important;
max-width: 50% !important;
flex: 0 0 50% !important;
margin-bottom: 10px;
}
}
@media (max-width: 768px) {
.c-table {
overflow-x: auto;
}
}
.c-hide{display: none !important;}