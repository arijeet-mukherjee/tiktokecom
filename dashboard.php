<?php

session_start();
$_SESSION['page'] = 'Dashboard';
if(empty($_SESSION))
{
    header('Location: login.php');
}

?>
<!DOCTYPE html>
<head>
    <?php include './layout/head.php';?>
     <!-- Fontfaces CSS-->
    <link href="custom/css/font-face.css" rel="stylesheet" media="all">
    <link href="custom/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="custom/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="custom/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS
    <link href="custom/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    -->
    <!-- Vendor CSS-->
    <link href="custom/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="custom/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="custom/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="custom/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="custom/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="custom/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="custom/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <style>
    /* ----- Overview ----- */
.overview-wrap {
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -webkit-justify-content: space-between;
    -moz-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -moz-box-align: center;
    -ms-flex-align: center;
    align-items: center;
}

@media (max-width: 767px) {
    .overview-wrap {
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -moz-box-orient: vertical;
        -moz-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
    }

    .overview-wrap .button {
        -webkit-box-ordinal-group: 2;
        -webkit-order: 1;
        -moz-box-ordinal-group: 2;
        -ms-flex-order: 1;
        order: 1;
    }

    .overview-wrap h2 {
        -webkit-box-ordinal-group: 3;
        -webkit-order: 2;
        -moz-box-ordinal-group: 3;
        -ms-flex-order: 2;
        order: 2;
    }
}

.overview-item {
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    padding: 30px;
    padding-bottom: 0;
    -webkit-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
    -moz-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
    box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
    margin-bottom: 40px;
}

@media (min-width: 992px) and (max-width: 1519px) {
    .overview-item {
        padding-left: 15px;
        padding-right: 15px;
    }
}

.overview-item--c1 {
    background-image: -moz-linear-gradient(90deg, #3f5efb 0%, #fc466b 100%);
    background-image: -webkit-linear-gradient(90deg, #3f5efb 0%, #fc466b 100%);
    background-image: -ms-linear-gradient(90deg, #3f5efb 0%, #fc466b 100%);
}

.overview-item--c2 {
    background-image: -moz-linear-gradient(90deg, #11998e 0%, #38ef7d 100%);
    background-image: -webkit-linear-gradient(90deg, #11998e 0%, #38ef7d 100%);
    background-image: -ms-linear-gradient(90deg, #11998e 0%, #38ef7d 100%);
}

.overview-item--c3 {
    background-image: -moz-linear-gradient(90deg, #ee0979 0%, #ff6a00 100%);
    background-image: -webkit-linear-gradient(90deg, #ee0979 0%, #ff6a00 100%);
    background-image: -ms-linear-gradient(90deg, #ee0979 0%, #ff6a00 100%);
}

.overview-item--c4 {
    background-image: -moz-linear-gradient(90deg, #45b649 0%, #dce35b 100%);
    background-image: -webkit-linear-gradient(90deg, #45b649 0%, #dce35b 100%);
    background-image: -ms-linear-gradient(90deg, #45b649 0%, #dce35b 100%);
}

.overview-box .icon {
    display: inline-block;
    vertical-align: top;
    margin-right: 15px;
}

.overview-box .icon i {
    font-size: 60px;
    color: #fff;
}

@media (min-width: 992px) and (max-width: 1199px) {
    .overview-box .icon {
        margin-right: 3px;
    }

    .overview-box .icon i {
        font-size: 30px;
    }
}

@media (max-width: 991px) {
    .overview-box .icon {
        font-size: 46px;
    }
}

.overview-box .text {
    font-weight: 300;
    display: inline-block;
}

.overview-box .text h2 {
    font-weight: 300;
    color: #fff;
    font-size: 36px;
    line-height: 1;
    margin-bottom: 5px;
}

.overview-box .text span {
    font-size: 18px;
    color: rgba(255, 255, 255, 0.6);
}

@media (min-width: 992px) and (max-width: 1199px) {
    .overview-box .text {
        display: inline-block;
    }

    .overview-box .text h2 {
        font-size: 20px;
        margin-bottom: 0;
    }

    .overview-box .text span {
        font-size: 14px;
    }
}

@media (max-width: 991px) {
    .overview-box .text h2 {
        font-size: 26px;
    }

    .overview-box .text span {
        font-size: 15px;
    }
}

.overview-chart {
    height: 115px;
    position: relative;
}

.overview-chart canvas {
    width: 100%;
}
.title--sbold {
    font-weight: 600;
}

.title-1 {
    text-transform: capitalize;
    font-weight: 400;
    font-size: 30px;
}

.title-2 {
    text-transform: capitalize;
    font-weight: 400;
    font-size: 24px;
    line-height: 1;
}

.title-3 {
    text-transform: capitalize;
    font-weight: 400;
    font-size: 24px;
    color: #333;
}

.title-3 i {
    margin-right: 13px;
    vertical-align: baseline;
}

.title-4 {
    font-weight: 500;
    font-size: 30px;
    color: #393939;
}

.title-5 {
    text-transform: capitalize;
    font-size: 22px;
    font-weight: 500;
    color: #393939;
}

.title-6 {
    font-size: 24px;
    font-weight: 500;
    color: #fff;
}

.heading-title {
    font-size: 24px;
    font-weight: 500;
    color: #333;
    text-transform: capitalize;
    margin-bottom: 10px;
}

/* ----- Card ----- */
.au-card {
    -webkit-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
    -moz-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
    box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
    padding: 40px;
    padding-right: 35px;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    background: #fff;
    overflow: hidden;
}

.au-card--border {
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
}

.au-card--border .au-card-title {
    -webkit-border-top-left-radius: 3px;
    -moz-border-radius-topleft: 3px;
    border-top-left-radius: 3px;
    -webkit-border-top-right-radius: 3px;
    -moz-border-radius-topright: 3px;
    border-top-right-radius: 3px;
}

.au-card--border .au-card-title .bg-overlay {
    -webkit-border-top-left-radius: 3px;
    -moz-border-radius-topleft: 3px;
    border-top-left-radius: 3px;
    -webkit-border-top-right-radius: 3px;
    -moz-border-radius-topright: 3px;
    border-top-right-radius: 3px;
}

.au-card-bordered {
    border: 1px solid #e5e5e5;
    background: #fff;
    padding: 40px;
    padding-top: 42px;
    padding-right: 55px;
    margin-bottom: 40px;
}

.au-card--bg-blue {
    background-image: -moz-linear-gradient(90deg, #396afc 0%, #2948ff 100%);
    background-image: -webkit-linear-gradient(90deg, #396afc 0%, #2948ff 100%);
    background-image: -ms-linear-gradient(90deg, #396afc 0%, #2948ff 100%);
}

.au-card-top-countries {
    padding: 40px;
    padding-top: 25px;
    padding-bottom: 29px;
}

.au-card--no-shadow {
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
}

.au-card--no-pad {
    padding: 0;
}

.au-card-title {
    position: relative;
    padding: 40px;
    padding-top: 45px;
    padding-bottom: 47px;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    -webkit-border-top-left-radius: 10px;
    -moz-border-radius-topleft: 10px;
    border-top-left-radius: 10px;
    -webkit-border-top-right-radius: 10px;
    -moz-border-radius-topright: 10px;
    border-top-right-radius: 10px;
    -webkit-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
    -moz-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
    box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
}

.au-card-title .bg-overlay {
    -webkit-border-top-left-radius: 10px;
    -moz-border-radius-topleft: 10px;
    border-top-left-radius: 10px;
    -webkit-border-top-right-radius: 10px;
    -moz-border-radius-topright: 10px;
    border-top-right-radius: 10px;
}

.au-card-title h3 {
    position: relative;
    z-index: 2;
    color: #fff;
    font-weight: 400;
}

.au-card-title h3 i {
    color: #fff;
    font-size: 24px;
    margin-right: 12px;
}

.au-task {
    color: #808080;
}

.au-task--border .au-task__title {
    border-left: 1px solid #e5e5e5;
    border-right: 1px solid #e5e5e5;
}

.au-task--border .au-task-list {
    border-left: 1px solid #e5e5e5;
    border-right: 1px solid #e5e5e5;
}

.au-task--border .au-task__footer {
    border: 1px solid #e5e5e5;
    border-top: none;
}

.au-task__title {
    padding: 27px 15px;
    padding-left: 40px;
    padding-bottom: 22px;
    border-bottom: 1px solid #f2f2f2;
    font-size: 14px;
}

.au-task-list {
    height: 424px;
    position: relative;
    overflow-y: auto;
}

.au-task__item {
    border-bottom: 1px solid #f2f2f2;
    -webkit-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

.au-task__item:hover {
    background: #f7f7f7;
}

.au-task__item-inner {
    padding: 26px 15px;
    padding-left: 40px;
}

.au-task__item-inner .task {
    font-size: 16px;
    margin-bottom: 6px;
}

.au-task__item-inner .task a {
    font-size: 16px;
    color: #808080;
    font-weight: 400;
}

.au-task__item-inner .task a:hover {
    color: #333;
}

.au-task__item-inner .time {
    font-size: 14px;
    color: #555;
    text-transform: uppercase;
    font-weight: 600;
}

.au-task__item--danger .au-task__item-inner {
    border-left: 3px solid #fa4251;
}

.au-task__item--warning .au-task__item-inner {
    border-left: 3px solid #ffa037;
}

.au-task__item--primary .au-task__item-inner {
    border-left: 3px solid #4272d7;
}

.au-task__item--success .au-task__item-inner {
    border-left: 3px solid #00ad5f;
}

.au-task__footer {
    text-align: center;
    padding-top: 35px;
    padding-bottom: 45px;
}

.au-message__footer {
    text-align: center;
    padding-top: 35px;
    padding-bottom: 45px;
}

.au-message p {
    color: #808080;
}

.au-message-list {
    height: 424px;
    position: relative;
    overflow-y: auto;
}

.au-message__noti {
    padding: 25px 15px;
    padding-left: 40px;
    padding-bottom: 22px;
    border-bottom: 1px solid #f2f2f2;
}

.au-message__noti p {
    font-size: 14px;
}

.au-message__noti p span {
    font-weight: 600;
}

.au-message__item {
    border-bottom: 1px solid #f2f2f2;
    cursor: pointer;
    -webkit-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

.au-message__item:hover {
    background: #f7f7f7;
}

.au-message__item-inner {
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -webkit-justify-content: space-between;
    -moz-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -moz-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    padding: 19px 40px;
    padding-right: 50px;
    padding-bottom: 25px;
}

@media (min-width: 992px) and (max-width: 1199px) {
    .au-message__item-inner {
        padding: 15px;
        padding-right: 10px;
        padding-bottom: 15px;
    }
}

@media (max-width: 767px) {
    .au-message__item-inner {
        padding: 15px;
        padding-right: 10px;
        padding-bottom: 15px;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -moz-box-orient: vertical;
        -moz-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-align: start;
        -webkit-align-items: flex-start;
        -moz-box-align: start;
        -ms-flex-align: start;
        align-items: flex-start;
    }
}

.au-message__item-time {
    margin-top: 26px;
}

.au-message__item-time span {
    font-size: 14px;
    color: #808080;
}

.au-message__item-text .text {
    margin-left: 60px;
    padding: 7px 0;
    padding-left: 23px;
}

.au-message__item-text .text .name {
    font-size: 16px;
    font-weight: 600;
    color: #666;
    margin-bottom: 2px;
}

.au-message__item-text .text p {
    color: #808080;
}

@media (max-width: 767px) {
    .au-message__item-text .text {
        margin: 0;
        padding: 0;
    }
}

.avatar-wrap {
    position: relative;
    float: left;
}

@media (max-width: 767px) {
    .avatar-wrap {
        float: none;
        display: inline-block;
        margin-bottom: 20px;
    }
}

.online .avatar::after {
    background: #63c76a;
}

.avatar {
    height: 60px;
    width: 60px;
    -webkit-border-radius: 100%;
    -moz-border-radius: 100%;
    border-radius: 100%;
    overflow: hidden;
}

.avatar::after {
    content: '';
    display: block;
    height: 15px;
    width: 15px;
    background: #ccc;
    border: 2px solid #fff;
    -webkit-border-radius: 100%;
    -moz-border-radius: 100%;
    border-radius: 100%;
    position: absolute;
    bottom: 0;
    right: 0;
}

.avatar--small {
    height: 50px;
    width: 50px;
}

.avatar--tiny {
    height: 32px;
    width: 32px;
}

.avatar--tiny::after {
    display: none;
}

.au-message__item.unread .au-message__item-inner {
    border-left: 3px solid #999;
}

.au-message__item.unread .au-message__item-text .text .name {
    color: #333;
}

.au-message__item.unread .au-message__item-text .text p {
    color: #333;
}

.au-chat--border .au-chat__title {
    border-left: 1px solid #e5e5e5;
    border-right: 1px solid #e5e5e5;
}

.au-chat--border .au-chat__content {
    border-left: 1px solid #e5e5e5;
    border-right: 1px solid #e5e5e5;
}

.au-chat--border .au-chat-textfield {
    border: 1px solid #e5e5e5;
    border-top: none;
}

.au-chat__title {
    border-bottom: 1px solid #f2f2f2;
}

.au-chat-info {
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -moz-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    padding: 12px 40px;
}

.au-chat-info .avatar-wrap {
    float: none;
    display: inline-block;
    margin-bottom: 0;
}

.au-chat-info .nick {
    margin-left: 15px;
}

.au-chat-info .nick a {
    font-weight: 600;
    font-size: 16px;
    color: #333;
}

.au-chat-info .nick a:hover {
    color: #666;
}

.au-chat__content {
    height: 400px;
    overflow: auto;
    padding: 30px 40px;
    padding-bottom: 0;
    position: relative;
}

.au-chat__content2 .recei-mess {
    max-width: 240px;
    -webkit-border-top-left-radius: 3px;
    -moz-border-radius-topleft: 3px;
    border-top-left-radius: 3px;
    -webkit-border-bottom-left-radius: 3px;
    -moz-border-radius-bottomleft: 3px;
    border-bottom-left-radius: 3px;
    -webkit-border-top-right-radius: 15px;
    -moz-border-radius-topright: 15px;
    border-top-right-radius: 15px;
    -webkit-border-bottom-right-radius: 15px;
    -moz-border-radius-bottomright: 15px;
    border-bottom-right-radius: 15px;
}

.au-chat__content2 .send-mess {
    max-width: 240px;
    -webkit-border-top-right-radius: 3px;
    -moz-border-radius-topright: 3px;
    border-top-right-radius: 3px;
    -webkit-border-bottom-right-radius: 3px;
    -moz-border-radius-bottomright: 3px;
    border-bottom-right-radius: 3px;
    -webkit-border-top-left-radius: 15px;
    -moz-border-radius-topleft: 15px;
    border-top-left-radius: 15px;
    -webkit-border-bottom-left-radius: 15px;
    -moz-border-radius-bottomleft: 15px;
    border-bottom-left-radius: 15px;
}

.mess-time {
    font-size: 14px;
    color: #999;
}

.recei-mess-wrap {
    text-align: center;
}

.recei-mess {
    background: #f2f2f2;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    border-radius: 8px;
    padding: 12px 25px;
    max-width: 390px;
    margin-bottom: 2px;
    text-align: left;
}

.recei-mess__inner {
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    margin-top: 6px;
}

.recei-mess__inner .avatar--tiny {
    -webkit-align-self: flex-end;
    -ms-flex-item-align: end;
    align-self: flex-end;
    justify-self: flex-start;
    margin-right: 10px;
}

.recei-mess-list {
    width: -webkit-calc(100% - 42px);
    width: -moz-calc(100% - 42px);
    width: calc(100% - 42px);
}

.recei-mess-list .recei-mess:last-child {
    margin-bottom: 0;
}

.send-mess-wrap {
    text-align: center;
    margin-top: 20px;
}

.send-mess__inner {
    margin-top: 6px;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: end;
    -webkit-justify-content: flex-end;
    -moz-box-pack: end;
    -ms-flex-pack: end;
    justify-content: flex-end;
}

.send-mess {
    background: #4272d7;
    color: #fff;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    border-radius: 8px;
    padding: 12px 25px;
    max-width: 390px;
    margin-bottom: 2px;
    text-align: left;
}

.au-chat-textfield {
    padding: 40px;
    padding-top: 32px;
    padding-bottom: 50px;
}

.au-inbox-wrap {
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    width: 200%;
    -webkit-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

.au-inbox-wrap.show-chat-box {
    -webkit-transform: translateX(-50%);
    -moz-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    -o-transform: translateX(-50%);
    transform: translateX(-50%);
}

.au-message {
    width: 50%;
}

.au-chat {
    width: 50%;
}

.task-progress {
    border: 1px solid  #e5e5e5;
    background: #fff;
    padding: 40px;
    padding-top: 42px;
    padding-right: 55px;
    padding-bottom: 74px;
    margin-bottom: 40px;
}

.task-progress .title-3 {
    margin-bottom: 32px;
}

.task-progress .au-progress {
    padding: 11px 0;
}

.recent-report2 {
    border: 1px solid #e5e5e5;
    background: #fff;
    padding: 40px;
    padding-top: 42px;
    padding-right: 55px;
    padding-bottom: 51px;
    margin-bottom: 40px;
}

.recent-report2 .recent-rep2-chart {
    height: 230px;
}

.recent-report2 .chart-info {
    margin-bottom: 45px;
}

@media (min-width: 992px) and (max-width: 1519px) {
    .recent-report2 .chart-info {
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -moz-box-orient: vertical;
        -moz-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
    }
}

@media (max-width: 991px) {
    .recent-report2 .chart-info {
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -moz-box-orient: vertical;
        -moz-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
    }
}

.recent-report2 .chart-info__left {
    -webkit-align-self: flex-end;
    -ms-flex-item-align: end;
    align-self: flex-end;
    margin-bottom: -5px;
}

@media (min-width: 992px) and (max-width: 1519px) {
    .recent-report2 .chart-info__left {
        -webkit-align-self: auto;
        -ms-flex-item-align: auto;
        align-self: auto;
        margin-bottom: 30px;
        margin-top: 20px;
    }
}

@media (max-width: 991px) {
    .recent-report2 .chart-info__left {
        -webkit-align-self: auto;
        -ms-flex-item-align: auto;
        align-self: auto;
        margin-bottom: 30px;
        margin-top: 20px;
    }
}

.user-data {
    border: 1px solid #e5e5e5;
    background: #fff;
    padding-top: 44px;
}

.user-data .title-3 {
    padding-left: 40px;
    padding-right: 55px;
}

.user-data .filters {
    padding-left: 40px;
    padding-right: 55px;
}

.user-data__footer {
    padding: 29px 0;
    text-align: center;
}

.map-data {
    border: 1px solid #e5e5e5;
    background: #fff;
    padding: 40px;
    padding-top: 44px;
    padding-right: 60px;
}

.recent-report3, .chart-percent-3 {
    background: #fff;
    border: 1px solid #e5e5e5;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    padding-top: 45px;
    padding-left: 40px;
    padding-right: 50px;
    padding-bottom: 50px;
}

.recent-report3 .title-wrap {
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -webkit-justify-content: space-between;
    -moz-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    margin-bottom: 27px;
}

.recent-report3 .title-wrap .chart-info-wrap {
    margin-top: 3px;
}

.recent-report3 .title-wrap .chart-note {
    font-size: 14px;
    margin-right: 30px;
}

.chart-percent-3 {
    padding-bottom: 60px;
}

.chart-percent-3 .chart-note {
    display: block;
    font-size: 14px;
}

/* ----- Charts ----- */
#chartjs-tooltip {
    opacity: 1;
    position: absolute;
    background: rgba(0, 0, 0, 0.7);
    color: white;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    -webkit-transition: all .1s ease;
    -o-transition: all .1s ease;
    -moz-transition: all .1s ease;
    transition: all .1s ease;
    pointer-events: none;
    -webkit-transform: translate(-50%, 0);
    -moz-transform: translate(-50%, 0);
    -ms-transform: translate(-50%, 0);
    -o-transform: translate(-50%, 0);
    transform: translate(-50%, 0);
}

.recent-report {
    padding-bottom: 65px;
    margin-bottom: 60px;
}

.chart-info {
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -webkit-justify-content: space-between;
    -moz-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -webkit-box-align: baseline;
    -webkit-align-items: baseline;
    -moz-box-align: baseline;
    -ms-flex-align: baseline;
    align-items: baseline;
    margin-bottom: 30px;
    font-size: 14px;
}

.chart-note {
    text-transform: capitalize;
    display: inline-block;
    margin-right: 12px;
    font-size: 14px;
}

.chart-note .dot {
    margin-right: 7px;
}

.chart-statis {
    display: inline-block;
    margin-right: 35px;
}

.chart-statis i {
    font-size: 18px;
    margin-right: 5px;
}

.chart-statis .label {
    display: block;
    text-transform: capitalize;
    line-height: 1.2;
}

.chart-statis .index {
    font-size: 18px;
    color: #333;
}

.recent-report__chart canvas {
    height: 250px;
    width: 100%;
}

.chart-percent-card {
    margin-bottom: 60px;
    padding-top: 47px;
}

.chart-percent-card .chart-note {
    margin-bottom: 8px;
}

.incre i {
    color: #63c76a;
}

.decre i {
    color: #ff4b5a;
}

.dot {
    display: inline-block;
    width: 10px;
    height: 10px;
    -webkit-border-radius: 100%;
    -moz-border-radius: 100%;
    border-radius: 100%;
}

.dot--blue {
    background: #00b5e9;
}

.dot--green {
    background: #00ad5f;
}

.dot--red {
    background: #fa4251;
}

.chart-note-wrap {
    margin-top: 20px;
}

.percent-chart {
    padding-right: 65px;
    padding-bottom: 40px;
    padding-top: 27px;
}

@media (min-width: 992px) and (max-width: 1519px) {
    .percent-chart {
        padding-right: 0;
    }
}

.statistic-chart {
    padding-top: 22px;
}

.statistic-chart-1, .top-campaign, .chart-percent-2 {
    background: #fff;
    padding: 0 40px;
    padding-top: 45px;
    padding-bottom: 50px;
    -webkit-box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);
    -moz-box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);
    box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
}

.statistic-chart-1 {
    padding-bottom: 42px;
    margin-bottom: 40px;
}

.statistic-chart-1-note {
    margin-top: 18px;
    padding-left: 8px;
}

.statistic-chart-1-note span {
    font-size: 14px;
    color: #808080;
}

.statistic-chart-1-note .big {
    font-size: 18px;
    color: #393939;
}

.top-campaign {
    padding-bottom: 97px;
    margin-bottom: 40px;
}

.chart-percent-2 {
    margin-bottom: 40px;
    padding-bottom: 70px;
}

.chart-percent-2 .chart-info {
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    -moz-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    margin-bottom: 0;
    margin-top: 30px;
}

.chart-percent-2 .chart-info .chart-note {
    margin-right: 34px;
}

.chart-percent-2 .chart-info .chart-note:last-child {
    margin-right: 0;
}

/* ----- Table ----- */
.table {
    margin: 0;
}

.table-responsive.table--no-card {
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    -webkit-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
    -moz-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
    box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
}

.table-earning thead th {
    background: #333;
    font-size: 16px;
    color: #fff;
    vertical-align: middle;
    font-weight: 400;
    text-transform: capitalize;
    line-height: 1;
    padding: 22px 40px;
    white-space: nowrap;
}

.table-earning thead th.text-right {
    padding-left: 15px;
    padding-right: 65px;
}

.table-earning tbody td {
    color: #808080;
    padding: 12px 40px;
    white-space: nowrap;
}

.table-earning tbody td.text-right {
    padding-left: 15px;
    padding-right: 65px;
}

.table-earning tbody tr:hover td {
    color: #555;
    cursor: pointer;
}

.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fff;
}

.table-striped tbody tr:nth-of-type(even) {
    background-color: #f5f5f5;
}

.table-top-countries tbody td {
    white-space: nowrap;
    font-size: 14px;
    color: #fff;
    padding: 14px 5px;
    border-top: none;
    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
}

.table-top-countries tbody tr:last-child td {
    border-bottom: none;
}

.table-wrap {
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -webkit-justify-content: space-between;
    -moz-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
}

@media (min-width: 992px) and (max-width: 1519px) {
    .table-wrap {
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -moz-box-orient: vertical;
        -moz-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
    }
}

@media (max-width: 991px) {
    .table-wrap {
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -moz-box-orient: vertical;
        -moz-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
    }
}

.table-style1 {
    max-width: 280px;
    margin-bottom: 30px;
}

.table-style1 .table tr:last-child td {
    border-bottom: none;
}

.table-style1 .table tr td:last-child {
    padding-right: 30px;
}

.table-style1 .table td {
    font-size: 14px;
    color: #808080;
    border-top: none;
    border-bottom: 1px solid #f2f2f2;
    padding: 12px 6px;
    vertical-align: middle;
}

.table-data {
    height: 472px;
    overflow-y: auto;
}

.table-data thead tr td {
    font-size: 12px;
    font-weight: 600;
    color: #808080;
    text-transform: uppercase;
}

.table-data .table td {
    border-top: none;
    border-bottom: 1px solid #f2f2f2;
    padding-top: 23px;
    padding-bottom: 33px;
    padding-left: 40px;
    padding-right: 10px;
}

.table-data .table tr td:last-child {
    padding-right: 24px;
}

.table-data tbody tr:hover td .more {
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -o-transform: scale(1);
    transform: scale(1);
}

.table-data__info h6 {
    font-size: 14px;
    color: #808080;
    text-transform: capitalize;
    font-weight: 400;
}

.table-data__info span a {
    font-size: 12px;
    color: #999;
}

.table-data__info span a:hover {
    color: #666;
}

.more {
    display: inline-block;
    cursor: pointer;
    width: 30px;
    height: 30px;
    background: #e5e5e5;
    -webkit-border-radius: 100%;
    -moz-border-radius: 100%;
    border-radius: 100%;
    position: relative;
    -webkit-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
    -moz-transition: all 0.4s ease;
    transition: all 0.4s ease;
    -webkit-transform: scale(0);
    -moz-transform: scale(0);
    -ms-transform: scale(0);
    -o-transform: scale(0);
    transform: scale(0);
}

.more i {
    font-size: 20px;
    color: #808080;
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}

.role {
    display: inline-block;
    line-height: 30px;
    font-size: 14px;
    color: #fff;
    padding: 0 15px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    text-transform: capitalize;
}

.role.admin {
    background: #fa4251;
}

.role.user {
    background: #00b5e9;
}

.role.member {
    background: #57b846;
}

.table-top-campaign.table td {
    border-top: none;
    border-bottom: 1px solid #e5e5e5;
    font-size: 14px;
    padding: 12px 6px;
}

.table-top-campaign.table tr td:first-child {
    color: #808080;
}

.table-top-campaign.table tr td:last-child {
    color: #4272d7;
    text-align: right;
}

.table-top-campaign.table tr:last-child td {
    border-bottom: none;
}

@media (min-width: 1200px) {
    .table-responsive-data2 {
        overflow: visible;
    }
}

.table-data2 {
    border-collapse: collapse;
    overflow: visible;
}

.table-data2.table thead th {
    font-size: 12px;
    color: #555;
    text-transform: uppercase;
    border: none;
    font-weight: 600;
    vertical-align: top;
    padding: 15px 40px;
    padding-right: 10px;
}

.table-data2.table thead th:first-child {
    padding-right: 0;
}

.table-data2.table tbody {
    background: #fff;
}

.table-data2.table tbody tr td:first-child {
    -webkit-border-top-left-radius: 3px;
    -moz-border-radius-topleft: 3px;
    border-top-left-radius: 3px;
    -webkit-border-bottom-left-radius: 3px;
    -moz-border-radius-bottomleft: 3px;
    border-bottom-left-radius: 3px;
    vertical-align: top;
}

.table-data2.table tbody tr td:first-child .au-checkbox {
    margin-top: 5px;
}

@media (max-width: 1199px) {
    .table-data2.table tbody tr td:first-child {
        vertical-align: middle;
    }

    .table-data2.table tbody tr td:first-child .au-checkbox {
        margin-top: 0;
    }
}

.table-data2.table tbody tr td:last-child {
    -webkit-border-top-right-radius: 3px;
    -moz-border-radius-topright: 3px;
    border-top-right-radius: 3px;
    -webkit-border-bottom-right-radius: 3px;
    -moz-border-radius-bottomright: 3px;
    border-bottom-right-radius: 3px;
    padding-right: 35px;
}

.table-data2.table tbody td {
    font-size: 14px;
    color: #808080;
    vertical-align: middle;
    padding: 25px 40px;
    padding-right: 10px;
    border: none;
}

.table-data2.table tbody td.desc {
    color: #4272d7;
}

.table-data2 .spacer {
    height: 5px;
    background: transparent;
}

.tr-shadow {
    -webkit-box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);
    -moz-box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);
    box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);
}

.table-data__tool {
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -webkit-justify-content: space-between;
    -moz-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    margin-bottom: 28px;
}

.table-data__tool .table-data__tool-left > div {
    margin-right: 12px;
}

.table-data__tool .table-data__tool-right > button {
    margin-right: 12px;
}

@media (max-width: 991px) {
    .table-data__tool {
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -moz-box-orient: vertical;
        -moz-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
    }

    .table-data__tool .table-data__tool-right {
        margin-top: 10px;
    }

    .table-data__tool .table-data__tool-right > button {
        margin-right: 0;
        margin-bottom: 10px;
    }
}

.table-data-feature {
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: end;
    -webkit-justify-content: flex-end;
    -moz-box-pack: end;
    -ms-flex-pack: end;
    justify-content: flex-end;
}

.table-data-feature .item {
    display: block;
    height: 30px;
    width: 30px;
    position: relative;
    -webkit-border-radius: 100%;
    -moz-border-radius: 100%;
    border-radius: 100%;
    background: #e5e5e5;
    margin-right: 5px;
}

.table-data-feature .item:last-child {
    margin-right: 0;
}

.table-data-feature .item i {
    font-size: 20px;
    color: #808080;
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}

.block-email {
    font-size: 14px;
    color: #808080;
    display: inline-block;
    background: #f2f2f2;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    line-height: 30px;
    padding: 0 14px;
}

.status--process {
    color: #00ad5f;
}

.status--denied {
    color: #fa4251;
}

.table-data3 thead {
    background: #333;
}

.table-data3 thead tr th {
    font-size: 16px;
    color: #fff;
    font-weight: 400;
    text-transform: capitalize;
    padding: 18px 40px;
    padding-right: 10px;
}

.table-data3 thead tr th:first-child {
    -webkit-border-top-left-radius: 3px;
    -moz-border-radius-topleft: 3px;
    border-top-left-radius: 3px;
}

.table-data3 thead tr th:last-child {
    -webkit-border-top-right-radius: 3px;
    -moz-border-radius-topright: 3px;
    border-top-right-radius: 3px;
}

.table-data3 thead tr th:last-child {
    text-align: right;
    padding-right: 50px;
}

.table-data3 tbody tr td:last-child {
    text-align: right;
    padding-right: 50px;
}

.table-data3 tbody tr {
    border-left: 1px solid #e5e5e5;
    border-right: 1px solid #e5e5e5;
}

.table-data3 tbody tr:last-child td:first-child {
    -webkit-border-bottom-left-radius: 8px;
    -moz-border-radius-bottomleft: 8px;
    border-bottom-left-radius: 8px;
}

.table-data3 tbody tr:last-child td:last-child {
    -webkit-border-bottom-right-radius: 8px;
    -moz-border-radius-bottomright: 8px;
    border-bottom-right-radius: 8px;
}

.table-data3 tbody td {
    border-bottom: 1px solid #f5f5f5;
    background: #fff;
    font-size: 14px;
    color: #808080;
    padding: 12px 40px;
    padding-right: 10px;
}

.table-data3 tbody td.process {
    color: #00ad5f;
}

.table-data3 tbody td.denied {
    color: #fa4251;
}

/* ----- Footer ----- */
.copyright {
    text-align: center;
    padding: 60px 0;
    padding-top: 20px;
}

.copyright p {
    font-size: 14px;
    color: #666;
    line-height: -webkit-calc(24/14);
    line-height: -moz-calc(24/14);
    line-height: calc(24/14);
}

/* ----- Breadcrumb ----- */
.au-breadcrumb {
    height: 75px;
    background: #fff;
    position: relative;
    z-index: 0;
}

@media (max-width: 991px) {
    .au-breadcrumb {
        height: 130px;
    }

    .au-breadcrumb.m-t-75 {
        margin-top: 0;
    }
}

.au-breadcrumb .section__content {
    top: 50%;
    -webkit-transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    transform: translateY(-50%);
}

.au-breadcrumb-content {
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -webkit-justify-content: space-between;
    -moz-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -moz-box-align: center;
    -ms-flex-align: center;
    align-items: center;
}

@media (max-width: 991px) {
    .au-breadcrumb-content {
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -moz-box-orient: vertical;
        -moz-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -moz-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
    }

    .au-breadcrumb-content .au-breadcrumb-left {
        -webkit-box-ordinal-group: 3;
        -webkit-order: 2;
        -moz-box-ordinal-group: 3;
        -ms-flex-order: 2;
        order: 2;
    }

    .au-breadcrumb-content > button {
        margin-bottom: 15px;
    }
}

.au-breadcrumb-span {
    font-size: 14px;
    color: #999;
    display: inline-block;
}

.au-breadcrumb__list {
    display: inline-block;
    margin-left: 5px;
}

.au-breadcrumb__list li {
    font-size: 14px;
    color: #999;
}

.au-breadcrumb__list .list-inline-item:not(:last-child) {
    margin-right: 5px;
}

.au-breadcrumb__list .active a {
    color: #999;
}

.au-breadcrumb__list .active a:hover {
    color: #333;
}

.au-breadcrumb2 {
    padding-top: 48px;
    padding-bottom: 50px;
}

.au-breadcrumb2 .au-breadcrumb-span {
    color: #808080;
}

.au-breadcrumb2 .au-breadcrumb__list .active a {
    color: #808080;
}

.au-breadcrumb2 .au-breadcrumb__list .active a:hover {
    color: #666;
}

.au-breadcrumb2 .au-breadcrumb__list li {
    color: #808080;
}

@media (max-width: 991px) {
    .au-breadcrumb2 .au-breadcrumb-left {
        margin-top: 20px;
    }
}

.au-breadcrumb3 .au-breadcrumb__list .active a:hover {
    color: #ccc;
}

.line-seprate {
    height: 1px;
    width: 100%;
    background: #e5e5e5;
    border: none;
    margin-top: 20px;
    margin-bottom: 0;
}

.welcome2 {
    background: #393939;
}

.welcome2-inner {
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -webkit-justify-content: space-between;
    -moz-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
}

.welcome2-inner .welcome2-greeting {
    width: -webkit-calc(100% - 500px);
    width: -moz-calc(100% - 500px);
    width: calc(100% - 500px);
}

.welcome2-inner form {
    height: 45px;
}

@media (max-width: 991px) {
    .welcome2-inner {
        -webkit-box-orient: vertical;
        -webkit-box-direction: reverse;
        -webkit-flex-direction: column-reverse;
        -moz-box-orient: vertical;
        -moz-box-direction: reverse;
        -ms-flex-direction: column-reverse;
        flex-direction: column-reverse;
    }

    .welcome2-inner.m-t-60 {
        margin-top: 0;
    }

    .welcome2-inner .welcome2-greeting {
        width: 100%;
    }

    .welcome2-inner form {
        margin-bottom: 30px;
        margin-top: 30px;
        -webkit-align-self: flex-start;
        -ms-flex-item-align: start;
        align-self: flex-start;
    }
}

.welcome2-greeting h1 {
    margin-bottom: 12px;
}

.welcome2-greeting p {
    font-size: 14px;
    color: #808080;
}

/* ----- Statistic ----- */
.statistic {
    padding-top: 57px;
}

.statistic__item {
    border: 1px solid #e5e5e5;
    background: #fff;
    padding: 20px 30px;
    position: relative;
    min-height: 180px;
    overflow: hidden;
    margin-bottom: 40px;
}

@media (min-width: 992px) and (max-width: 1199px) {
    .statistic__item {
        padding: 20px 10px;
    }
}

.statistic__item h2 {
    font-size: 36px;
    font-weight: 300;
    color: #4272d7;
}

@media (min-width: 992px) and (max-width: 1199px) {
    .statistic__item h2 {
        font-size: 22px;
    }
}

.statistic__item .desc {
    font-size: 18px;
    text-transform: uppercase;
    font-weight: 300;
    color: rgba(128, 128, 128, 0.6);
}

@media (min-width: 992px) and (max-width: 1199px) {
    .statistic__item .desc {
        font-size: 13px;
    }
}

.statistic__item .icon {
    display: inline-block;
    position: absolute;
    bottom: -50px;
    right: -7px;
}

.statistic__item .icon i {
    font-size: 180px;
    color: #808080;
    opacity: .2;
    line-height: 1;
    vertical-align: baseline;
}

.statistic__item--green {
    background: #00b26f;
}

.statistic__item--orange {
    background: #ff8300;
}

.statistic__item--blue {
    background: #00b5e9;
}

.statistic__item--red {
    background: #fa4251;
}

/* ----- Statistic 2 ----- */
.statistic2 {
    padding-top: 50px;
}

.statistic2 .statistic__item {
    border: none;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    -webkit-box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);
    -moz-box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);
    box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);
}

.statistic2 .statistic__item h2 {
    color: #fff;
}

.statistic2 .statistic__item .desc {
    color: rgba(255, 255, 255, 0.6);
}

/* ----- Progress ----- */
.au-progress .au-progress__bar {
    height: 10px;
    position: relative;
    background: #d9d9d9;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
}

.au-progress .au-progress__bar .au-progress__inner {
    position: absolute;
    width: 0;
    top: 0;
    left: 0;
    bottom: 0;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    -webkit-transition: width 1s ease-in-out;
    -o-transition: width 1s ease-in-out;
    -moz-transition: width 1s ease-in-out;
    transition: width 1s ease-in-out;
    background-color: #4272d7;
    overflow: visible;
}

.au-progress__title {
    font-size: 14px;
    color: #808080;
    display: inline-block;
    margin-bottom: 9px;
}

.au-progress__value {
    font-size: 14px;
    color: #808080;
    position: absolute;
    top: -28px;
    right: -15px;
}

/* ----- Alert ----- */
.au-alert {
    border: 1px solid #fff;
    background: #fff;
    border-left: 3px solid #fff;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
    margin: 0;
    -webkit-border-top-right-radius: 3px;
    -moz-border-radius-topright: 3px;
    border-top-right-radius: 3px;
    -webkit-border-bottom-right-radius: 3px;
    -moz-border-radius-bottomright: 3px;
    border-bottom-right-radius: 3px;
    padding: 0;
    padding: 15px 30px;
}

.au-alert.alert-dismissible .close {
    font-size: 16px;
    color: black;
    opacity: 0.2;
    padding: 0 23px;
    top: 0;
    bottom: 0;
}

.au-alert > i {
    font-size: 30px;
    color: #00ad5f;
    vertical-align: middle;
    margin-right: 10px;
}

.au-alert .content {
    font-size: 16px;
    color: #808080;
}

.au-alert-success {
    background: #e5f6eb;
    border-color: #d9f1e3;
    border-left-color: #00ad5f;
}

.au-alert--70per {
    width: 70.5%;
    margin: 0 auto;
}

@media (max-width: 991px) {
    .au-alert--70per {
        width: 95%;
    }
}

/* Switch */
.switch.switch-default {
    position: relative;
    display: inline-block;
    vertical-align: top;
    width: 40px;
    height: 24px;
    background-color: transparent;
    cursor: pointer;
}

.switch.switch-default .switch-input {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
}

.switch.switch-default .switch-label {
    position: relative;
    display: block;
    height: inherit;
    font-size: 10px;
    font-weight: 600;
    text-transform: uppercase;
    background-color: #fff;
    border: 1px solid #f2f2f2;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    -webkit-transition: opacity background .15s ease-out;
    -o-transition: opacity background .15s ease-out;
    -moz-transition: opacity background .15s ease-out;
    transition: opacity background .15s ease-out;
}

.switch.switch-default .switch-input:checked ~ .switch-label::before {
    opacity: 0;
}

.switch.switch-default .switch-input:checked ~ .switch-label::after {
    opacity: 1;
}

.switch.switch-default .switch-handle {
    position: absolute;
    top: 2px;
    left: 2px;
    width: 20px;
    height: 20px;
    background: #fff;
    border: 1px solid #f2f2f2;
    -webkit-border-radius: 1px;
    -moz-border-radius: 1px;
    border-radius: 1px;
    -webkit-transition: left .15s ease-out;
    -o-transition: left .15s ease-out;
    -moz-transition: left .15s ease-out;
    transition: left .15s ease-out;
}

.switch.switch-default .switch-input:checked ~ .switch-handle {
    left: 18px;
}

.switch.switch-default.switch-lg {
    width: 48px;
    height: 28px;
}

.switch.switch-default.switch-lg .switch-label {
    font-size: 12px;
}

.switch.switch-default.switch-lg .switch-handle {
    width: 24px;
    height: 24px;
}

.switch.switch-default.switch-lg .switch-input:checked ~ .switch-handle {
    left: 22px;
}

.switch.switch-default.switch-sm {
    width: 32px;
    height: 20px;
}

.switch.switch-default.switch-sm .switch-label {
    font-size: 8px;
}

.switch.switch-default.switch-sm .switch-handle {
    width: 16px;
    height: 16px;
}

.switch.switch-default.switch-sm .switch-input:checked ~ .switch-handle {
    left: 14px;
}

.switch.switch-default.switch-xs {
    width: 24px;
    height: 16px;
}

.switch.switch-default.switch-xs .switch-label {
    font-size: 7px;
}

.switch.switch-default.switch-xs .switch-handle {
    width: 12px;
    height: 12px;
}

.switch.switch-default.switch-xs .switch-input:checked ~ .switch-handle {
    left: 10px;
}

.switch.switch-text {
    position: relative;
    display: inline-block;
    vertical-align: top;
    width: 48px;
    height: 24px;
    background-color: transparent;
    cursor: pointer;
}

.switch.switch-text .switch-input {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
}

.switch.switch-text .switch-label {
    position: relative;
    display: block;
    height: inherit;
    font-size: 10px;
    font-weight: 600;
    text-transform: uppercase;
    background-color: #fff;
    border: 1px solid #f2f2f2;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    -webkit-transition: opacity background .15s ease-out;
    -o-transition: opacity background .15s ease-out;
    -moz-transition: opacity background .15s ease-out;
    transition: opacity background .15s ease-out;
}

.switch.switch-text .switch-label::before,
  .switch.switch-text .switch-label::after {
    position: absolute;
    top: 50%;
    width: 50%;
    margin-top: -.5em;
    line-height: 1;
    text-align: center;
    -webkit-transition: inherit;
    -o-transition: inherit;
    -moz-transition: inherit;
    transition: inherit;
}

.switch.switch-text .switch-label::before {
    right: 1px;
    color: #e9ecef;
    content: attr(data-off);
}

.switch.switch-text .switch-label::after {
    left: 1px;
    color: #fff;
    content: attr(data-on);
    opacity: 0;
}

.switch.switch-text .switch-input:checked ~ .switch-label::before {
    opacity: 0;
}

.switch.switch-text .switch-input:checked ~ .switch-label::after {
    opacity: 1;
}

.switch.switch-text .switch-handle {
    position: absolute;
    top: 2px;
    left: 2px;
    width: 20px;
    height: 20px;
    background: #fff;
    border: 1px solid #f2f2f2;
    -webkit-border-radius: 1px;
    -moz-border-radius: 1px;
    border-radius: 1px;
    -webkit-transition: left .15s ease-out;
    -o-transition: left .15s ease-out;
    -moz-transition: left .15s ease-out;
    transition: left .15s ease-out;
}

.switch.switch-text .switch-input:checked ~ .switch-handle {
    left: 26px;
}

.switch.switch-text.switch-lg {
    width: 56px;
    height: 28px;
}

.switch.switch-text.switch-lg .switch-label {
    font-size: 12px;
}

.switch.switch-text.switch-lg .switch-handle {
    width: 24px;
    height: 24px;
}

.switch.switch-text.switch-lg .switch-input:checked ~ .switch-handle {
    left: 30px;
}

.switch.switch-text.switch-sm {
    width: 40px;
    height: 20px;
}

.switch.switch-text.switch-sm .switch-label {
    font-size: 8px;
}

.switch.switch-text.switch-sm .switch-handle {
    width: 16px;
    height: 16px;
}

.switch.switch-text.switch-sm .switch-input:checked ~ .switch-handle {
    left: 22px;
}

.switch.switch-text.switch-xs {
    width: 32px;
    height: 16px;
}

.switch.switch-text.switch-xs .switch-label {
    font-size: 7px;
}

.switch.switch-text.switch-xs .switch-handle {
    width: 12px;
    height: 12px;
}

.switch.switch-text.switch-xs .switch-input:checked ~ .switch-handle {
    left: 18px;
}

.switch.switch-icon {
    position: relative;
    display: inline-block;
    vertical-align: top;
    width: 48px;
    height: 24px;
    background-color: transparent;
    cursor: pointer;
}

.switch.switch-icon .switch-input {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
}

.switch.switch-icon .switch-label {
    position: relative;
    display: block;
    height: inherit;
    font-family: FontAwesome;
    font-size: 10px;
    font-weight: 600;
    text-transform: uppercase;
    background-color: #fff;
    border: 1px solid #f2f2f2;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    -webkit-transition: opacity background .15s ease-out;
    -o-transition: opacity background .15s ease-out;
    -moz-transition: opacity background .15s ease-out;
    transition: opacity background .15s ease-out;
}

.switch.switch-icon .switch-label::before,
  .switch.switch-icon .switch-label::after {
    position: absolute;
    top: 50%;
    width: 50%;
    margin-top: -.5em;
    line-height: 1;
    text-align: center;
    -webkit-transition: inherit;
    -o-transition: inherit;
    -moz-transition: inherit;
    transition: inherit;
}

.switch.switch-icon .switch-label::before {
    right: 1px;
    color: #e9ecef;
    content: attr(data-off);
}

.switch.switch-icon .switch-label::after {
    left: 1px;
    color: #fff;
    content: attr(data-on);
    opacity: 0;
}

.switch.switch-icon .switch-input:checked ~ .switch-label::before {
    opacity: 0;
}

.switch.switch-icon .switch-input:checked ~ .switch-label::after {
    opacity: 1;
}

.switch.switch-icon .switch-handle {
    position: absolute;
    top: 2px;
    left: 2px;
    width: 20px;
    height: 20px;
    background: #fff;
    border: 1px solid #f2f2f2;
    -webkit-border-radius: 1px;
    -moz-border-radius: 1px;
    border-radius: 1px;
    -webkit-transition: left .15s ease-out;
    -o-transition: left .15s ease-out;
    -moz-transition: left .15s ease-out;
    transition: left .15s ease-out;
}

.switch.switch-icon .switch-input:checked ~ .switch-handle {
    left: 26px;
}

.switch.switch-icon.switch-lg {
    width: 56px;
    height: 28px;
}

.switch.switch-icon.switch-lg .switch-label {
    font-size: 12px;
}

.switch.switch-icon.switch-lg .switch-handle {
    width: 24px;
    height: 24px;
}

.switch.switch-icon.switch-lg .switch-input:checked ~ .switch-handle {
    left: 30px;
}

.switch.switch-icon.switch-sm {
    width: 40px;
    height: 20px;
}

.switch.switch-icon.switch-sm .switch-label {
    font-size: 8px;
}

.switch.switch-icon.switch-sm .switch-handle {
    width: 16px;
    height: 16px;
}

.switch.switch-icon.switch-sm .switch-input:checked ~ .switch-handle {
    left: 22px;
}

.switch.switch-icon.switch-xs {
    width: 32px;
    height: 16px;
}

.switch.switch-icon.switch-xs .switch-label {
    font-size: 7px;
}

.switch.switch-icon.switch-xs .switch-handle {
    width: 12px;
    height: 12px;
}

.switch.switch-icon.switch-xs .switch-input:checked ~ .switch-handle {
    left: 18px;
}

.switch.switch-3d {
    position: relative;
    display: inline-block;
    vertical-align: top;
    width: 40px;
    height: 24px;
    background-color: transparent;
    cursor: pointer;
}

.switch.switch-3d .switch-input {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
}

.switch.switch-3d .switch-label {
    position: relative;
    display: block;
    height: inherit;
    font-size: 10px;
    font-weight: 600;
    text-transform: uppercase;
    background-color: #f8f9fa;
    border: 1px solid #f2f2f2;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    -webkit-transition: opacity background .15s ease-out;
    -o-transition: opacity background .15s ease-out;
    -moz-transition: opacity background .15s ease-out;
    transition: opacity background .15s ease-out;
}

.switch.switch-3d .switch-input:checked ~ .switch-label::before {
    opacity: 0;
}

.switch.switch-3d .switch-input:checked ~ .switch-label::after {
    opacity: 1;
}

.switch.switch-3d .switch-handle {
    position: absolute;
    top: 0;
    left: 0;
    width: 24px;
    height: 24px;
    background: #fff;
    border: 1px solid #f2f2f2;
    -webkit-border-radius: 1px;
    -moz-border-radius: 1px;
    border-radius: 1px;
    -webkit-transition: left .15s ease-out;
    -o-transition: left .15s ease-out;
    -moz-transition: left .15s ease-out;
    transition: left .15s ease-out;
    border: 0;
    -webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    -moz-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}

.switch.switch-3d .switch-input:checked ~ .switch-handle {
    left: 16px;
}

.switch.switch-3d.switch-lg {
    width: 48px;
    height: 28px;
}

.switch.switch-3d.switch-lg .switch-label {
    font-size: 12px;
}

.switch.switch-3d.switch-lg .switch-handle {
    width: 28px;
    height: 28px;
}

.switch.switch-3d.switch-lg .switch-input:checked ~ .switch-handle {
    left: 20px;
}

.switch.switch-3d.switch-sm {
    width: 32px;
    height: 20px;
}

.switch.switch-3d.switch-sm .switch-label {
    font-size: 8px;
}

.switch.switch-3d.switch-sm .switch-handle {
    width: 20px;
    height: 20px;
}

.switch.switch-3d.switch-sm .switch-input:checked ~ .switch-handle {
    left: 12px;
}

.switch.switch-3d.switch-xs {
    width: 24px;
    height: 16px;
}

.switch.switch-3d.switch-xs .switch-label {
    font-size: 7px;
}

.switch.switch-3d.switch-xs .switch-handle {
    width: 16px;
    height: 16px;
}

.switch.switch-3d.switch-xs .switch-input:checked ~ .switch-handle {
    left: 8px;
}

.switch-pill .switch-label, .switch.switch-3d .switch-label,
.switch-pill .switch-handle,
.switch.switch-3d .switch-handle {
    -webkit-border-radius: 50em !important;
    -moz-border-radius: 50em !important;
    border-radius: 50em !important;
}

.switch-pill .switch-label::before, .switch.switch-3d .switch-label::before {
    right: 2px !important;
}

.switch-pill .switch-label::after, .switch.switch-3d .switch-label::after {
    left: 2px !important;
}

.switch-primary > .switch-input:checked ~ .switch-label {
    background: #4272d7 !important;
    border-color: #2858be;
}

.switch-primary > .switch-input:checked ~ .switch-handle {
    border-color: #2858be;
}

.switch-primary-outline > .switch-input:checked ~ .switch-label {
    background: #fff !important;
    border-color: #4272d7;
}

.switch-primary-outline > .switch-input:checked ~ .switch-label::after {
    color: #4272d7;
}

.switch-primary-outline > .switch-input:checked ~ .switch-handle {
    border-color: #4272d7;
}

.switch-primary-outline-alt > .switch-input:checked ~ .switch-label {
    background: #fff !important;
    border-color: #4272d7;
}

.switch-primary-outline-alt > .switch-input:checked ~ .switch-label::after {
    color: #4272d7;
}

.switch-primary-outline-alt > .switch-input:checked ~ .switch-handle {
    background: #4272d7 !important;
    border-color: #4272d7;
}

.switch-secondary > .switch-input:checked ~ .switch-label {
    background: #868e96 !important;
    border-color: #6c757d;
}

.switch-secondary > .switch-input:checked ~ .switch-handle {
    border-color: #6c757d;
}

.switch-secondary-outline > .switch-input:checked ~ .switch-label {
    background: #fff !important;
    border-color: #868e96;
}

.switch-secondary-outline > .switch-input:checked ~ .switch-label::after {
    color: #868e96;
}

.switch-secondary-outline > .switch-input:checked ~ .switch-handle {
    border-color: #868e96;
}

.switch-secondary-outline-alt > .switch-input:checked ~ .switch-label {
    background: #fff !important;
    border-color: #868e96;
}

.switch-secondary-outline-alt > .switch-input:checked ~ .switch-label::after {
    color: #868e96;
}

.switch-secondary-outline-alt > .switch-input:checked ~ .switch-handle {
    background: #868e96 !important;
    border-color: #868e96;
}

.switch-success > .switch-input:checked ~ .switch-label {
    background: #28a745 !important;
    border-color: #1e7e34;
}

.switch-success > .switch-input:checked ~ .switch-handle {
    border-color: #1e7e34;
}

.switch-success-outline > .switch-input:checked ~ .switch-label {
    background: #fff !important;
    border-color: #28a745;
}

.switch-success-outline > .switch-input:checked ~ .switch-label::after {
    color: #28a745;
}

.switch-success-outline > .switch-input:checked ~ .switch-handle {
    border-color: #28a745;
}

.switch-success-outline-alt > .switch-input:checked ~ .switch-label {
    background: #fff !important;
    border-color: #28a745;
}

.switch-success-outline-alt > .switch-input:checked ~ .switch-label::after {
    color: #28a745;
}

.switch-success-outline-alt > .switch-input:checked ~ .switch-handle {
    background: #28a745 !important;
    border-color: #28a745;
}

.switch-info > .switch-input:checked ~ .switch-label {
    background: #17a2b8 !important;
    border-color: #117a8b;
}

.switch-info > .switch-input:checked ~ .switch-handle {
    border-color: #117a8b;
}

.switch-info-outline > .switch-input:checked ~ .switch-label {
    background: #fff !important;
    border-color: #17a2b8;
}

.switch-info-outline > .switch-input:checked ~ .switch-label::after {
    color: #17a2b8;
}

.switch-info-outline > .switch-input:checked ~ .switch-handle {
    border-color: #17a2b8;
}

.switch-info-outline-alt > .switch-input:checked ~ .switch-label {
    background: #fff !important;
    border-color: #17a2b8;
}

.switch-info-outline-alt > .switch-input:checked ~ .switch-label::after {
    color: #17a2b8;
}

.switch-info-outline-alt > .switch-input:checked ~ .switch-handle {
    background: #17a2b8 !important;
    border-color: #17a2b8;
}

.switch-warning > .switch-input:checked ~ .switch-label {
    background: #ffc107 !important;
    border-color: #d39e00;
}

.switch-warning > .switch-input:checked ~ .switch-handle {
    border-color: #d39e00;
}

.switch-warning-outline > .switch-input:checked ~ .switch-label {
    background: #fff !important;
    border-color: #ffc107;
}

.switch-warning-outline > .switch-input:checked ~ .switch-label::after {
    color: #ffc107;
}

.switch-warning-outline > .switch-input:checked ~ .switch-handle {
    border-color: #ffc107;
}

.switch-warning-outline-alt > .switch-input:checked ~ .switch-label {
    background: #fff !important;
    border-color: #ffc107;
}

.switch-warning-outline-alt > .switch-input:checked ~ .switch-label::after {
    color: #ffc107;
}

.switch-warning-outline-alt > .switch-input:checked ~ .switch-handle {
    background: #ffc107 !important;
    border-color: #ffc107;
}

.switch-danger > .switch-input:checked ~ .switch-label {
    background: #ff4b5a !important;
    border-color: #ff182b;
}

.switch-danger > .switch-input:checked ~ .switch-handle {
    border-color: #ff182b;
}

.switch-danger-outline > .switch-input:checked ~ .switch-label {
    background: #fff !important;
    border-color: #ff4b5a;
}

.switch-danger-outline > .switch-input:checked ~ .switch-label::after {
    color: #ff4b5a;
}

.switch-danger-outline > .switch-input:checked ~ .switch-handle {
    border-color: #ff4b5a;
}

.switch-danger-outline-alt > .switch-input:checked ~ .switch-label {
    background: #fff !important;
    border-color: #ff4b5a;
}

.switch-danger-outline-alt > .switch-input:checked ~ .switch-label::after {
    color: #ff4b5a;
}

.switch-danger-outline-alt > .switch-input:checked ~ .switch-handle {
    background: #ff4b5a !important;
    border-color: #ff4b5a;
}

.switch-light > .switch-input:checked ~ .switch-label {
    background: #f8f9fa !important;
    border-color: #dae0e5;
}

.switch-light > .switch-input:checked ~ .switch-handle {
    border-color: #dae0e5;
}

.switch-light-outline > .switch-input:checked ~ .switch-label {
    background: #fff !important;
    border-color: #f8f9fa;
}

.switch-light-outline > .switch-input:checked ~ .switch-label::after {
    color: #f8f9fa;
}

.switch-light-outline > .switch-input:checked ~ .switch-handle {
    border-color: #f8f9fa;
}

.switch-light-outline-alt > .switch-input:checked ~ .switch-label {
    background: #fff !important;
    border-color: #f8f9fa;
}

.switch-light-outline-alt > .switch-input:checked ~ .switch-label::after {
    color: #f8f9fa;
}

.switch-light-outline-alt > .switch-input:checked ~ .switch-handle {
    background: #f8f9fa !important;
    border-color: #f8f9fa;
}

.switch-dark > .switch-input:checked ~ .switch-label {
    background: #343a40 !important;
    border-color: #1d2124;
}

.switch-dark > .switch-input:checked ~ .switch-handle {
    border-color: #1d2124;
}

.switch-dark-outline > .switch-input:checked ~ .switch-label {
    background: #fff !important;
    border-color: #343a40;
}

.switch-dark-outline > .switch-input:checked ~ .switch-label::after {
    color: #343a40;
}

.switch-dark-outline > .switch-input:checked ~ .switch-handle {
    border-color: #343a40;
}

.switch-dark-outline-alt > .switch-input:checked ~ .switch-label {
    background: #fff !important;
    border-color: #343a40;
}

.switch-dark-outline-alt > .switch-input:checked ~ .switch-label::after {
    color: #343a40;
}

.switch-dark-outline-alt > .switch-input:checked ~ .switch-handle {
    background: #343a40 !important;
    border-color: #343a40;
}


    </style>

    <!-- Main CSS-->
    
</head>

<body>
<?php include './layout/sidebar.php';?>
<!-- Main content -->
<div class="main-content" id="panel">
    <!-- Topnav -->
       
                        
    <?php include './layout/topnav.php';?>
     <nav class="navbar navbar-dark bg-primary text-right">
        <!-- Navbar content -->
        <a href="logout.php?key=M1g4Vlk2QllHOFFJTDA3amt1cWpsUnNKOmhoWkNlSEg0SzFuVVJ2" class="dropdown-item text-green">
                            <i class="ni ni-user-run  text-green"></i>
                            <span>Logout</span>
                        </a>
        </nav>
                       
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- Card stats -->
               
            </div>
        </div>
    </div>
    <!-- Page content -->
     <!-- Added from here-->
     
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">overview</h2>
                                    <a src="create_table.php" class=" btn btn-primary text-white btn-icon-only rounded-circle mt-3 mb-3">
                                           <i class="fa fa-plus"></i>Add Item</a>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2>10368</h2>
                                                <span>truck owners</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                            <div class="text">
                                                <h2>388,688</h2>
                                                <span>orders completed</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2>1,086</h2>
                                                <span>this week</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-money"></i>
                                            </div>
                                            <div class="text">
                                                <h2>$1,060,386</h2>
                                                <span>total earnings</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="au-card recent-report">
                                    <div class="au-card-inner">
                                        <h3 class="title-2">recent reports</h3>
                                        <div class="chart-info">
                                            <div class="chart-info__left">
                                                <div class="chart-note">
                                                    <span class="dot dot--blue"></span>
                                                    <span>products</span>
                                                </div>
                                                <div class="chart-note mr-0">
                                                    <span class="dot dot--green"></span>
                                                    <span>services</span>
                                                </div>
                                            </div>
                                            <div class="chart-info__right">
                                                <div class="chart-statis">
                                                    <span class="index incre">
                                                        <i class="zmdi zmdi-long-arrow-up"></i>25%</span>
                                                    <span class="label">products</span>
                                                </div>
                                                <div class="chart-statis mr-0">
                                                    <span class="index decre">
                                                        <i class="zmdi zmdi-long-arrow-down"></i>10%</span>
                                                    <span class="label">services</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="recent-report__chart">
                                            <canvas id="recent-rep-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="au-card chart-percent-card">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 tm-b-5">char by %</h3>
                                        <div class="row no-gutters">
                                            <div class="col-xl-6">
                                                <div class="chart-note-wrap">
                                                    <div class="chart-note mr-0 d-block">
                                                        <span class="dot dot--blue"></span>
                                                        <span>products</span>
                                                    </div>
                                                    <div class="chart-note mr-0 d-block">
                                                        <span class="dot dot--red"></span>
                                                        <span>services</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="percent-chart">
                                                    <canvas id="percent-chart"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-9">
                                <h2 class="title-1 m-b-25">Earnings By Items</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>date</th>
                                                <th>order ID</th>
                                                <th>name</th>
                                                <th class="text-right">price</th>
                                                <th class="text-right">quantity</th>
                                                <th class="text-right">total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>2018-09-29 05:57</td>
                                                <td>100398</td>
                                                <td>iPhone X 64Gb Grey</td>
                                                <td class="text-right">$999.00</td>
                                                <td class="text-right">1</td>
                                                <td class="text-right">$999.00</td>
                                            </tr>
                                            <tr>
                                                <td>2018-09-28 01:22</td>
                                                <td>100397</td>
                                                <td>Samsung S8 Black</td>
                                                <td class="text-right">$756.00</td>
                                                <td class="text-right">1</td>
                                                <td class="text-right">$756.00</td>
                                            </tr>
                                            <tr>
                                                <td>2018-09-27 02:12</td>
                                                <td>100396</td>
                                                <td>Game Console Controller</td>
                                                <td class="text-right">$22.00</td>
                                                <td class="text-right">2</td>
                                                <td class="text-right">$44.00</td>
                                            </tr>
                                            <tr>
                                                <td>2018-09-26 23:06</td>
                                                <td>100395</td>
                                                <td>iPhone X 256Gb Black</td>
                                                <td class="text-right">$1199.00</td>
                                                <td class="text-right">1</td>
                                                <td class="text-right">$1199.00</td>
                                            </tr>
                                            <tr>
                                                <td>2018-09-25 19:03</td>
                                                <td>100393</td>
                                                <td>USB 3.0 Cable</td>
                                                <td class="text-right">$10.00</td>
                                                <td class="text-right">3</td>
                                                <td class="text-right">$30.00</td>
                                            </tr>
                                            <tr>
                                                <td>2018-09-29 05:57</td>
                                                <td>100392</td>
                                                <td>Smartwatch 4.0 LTE Wifi</td>
                                                <td class="text-right">$199.00</td>
                                                <td class="text-right">6</td>
                                                <td class="text-right">$1494.00</td>
                                            </tr>
                                            <tr>
                                                <td>2018-09-24 19:10</td>
                                                <td>100391</td>
                                                <td>Camera C430W 4k</td>
                                                <td class="text-right">$699.00</td>
                                                <td class="text-right">1</td>
                                                <td class="text-right">$699.00</td>
                                            </tr>
                                            <tr>
                                                <td>2018-09-22 00:43</td>
                                                <td>100393</td>
                                                <td>USB 3.0 Cable</td>
                                                <td class="text-right">$10.00</td>
                                                <td class="text-right">3</td>
                                                <td class="text-right">$30.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <h2 class="title-1 m-b-25">Top countries</h2>
                                <div class="au-card au-card--bg-blue au-card-top-countries m-b-40">
                                    <div class="au-card-inner">
                                        <div class="table-responsive">
                                            <table class="table table-top-countries">
                                                <tbody>
                                                    <tr>
                                                        <td>United States</td>
                                                        <td class="text-right">$119,366.96</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Australia</td>
                                                        <td class="text-right">$70,261.65</td>
                                                    </tr>
                                                    <tr>
                                                        <td>United Kingdom</td>
                                                        <td class="text-right">$46,399.22</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Turkey</td>
                                                        <td class="text-right">$35,364.90</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Germany</td>
                                                        <td class="text-right">$20,366.96</td>
                                                    </tr>
                                                    <tr>
                                                        <td>France</td>
                                                        <td class="text-right">$10,366.96</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Australia</td>
                                                        <td class="text-right">$5,366.96</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Italy</td>
                                                        <td class="text-right">$1639.32</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>
                                            <i class="zmdi zmdi-account-calendar"></i>26 April, 2018</h3>
                                        <button class="au-btn-plus">
                                            <i class="zmdi zmdi-plus"></i>
                                        </button>
                                    </div>
                                    <div class="au-task js-list-load">
                                        <div class="au-task__title">
                                            <p>Tasks for John Doe</p>
                                        </div>
                                        <div class="au-task-list js-scrollbar3">
                                            <div class="au-task__item au-task__item--danger">
                                                <div class="au-task__item-inner">
                                                    <h5 class="task">
                                                        <a href="#">Meeting about plan for Admin Template 2018</a>
                                                    </h5>
                                                    <span class="time">10:00 AM</span>
                                                </div>
                                            </div>
                                            <div class="au-task__item au-task__item--warning">
                                                <div class="au-task__item-inner">
                                                    <h5 class="task">
                                                        <a href="#">Create new task for Dashboard</a>
                                                    </h5>
                                                    <span class="time">11:00 AM</span>
                                                </div>
                                            </div>
                                            <div class="au-task__item au-task__item--primary">
                                                <div class="au-task__item-inner">
                                                    <h5 class="task">
                                                        <a href="#">Meeting about plan for Admin Template 2018</a>
                                                    </h5>
                                                    <span class="time">02:00 PM</span>
                                                </div>
                                            </div>
                                            <div class="au-task__item au-task__item--success">
                                                <div class="au-task__item-inner">
                                                    <h5 class="task">
                                                        <a href="#">Create new task for Dashboard</a>
                                                    </h5>
                                                    <span class="time">03:30 PM</span>
                                                </div>
                                            </div>
                                            <div class="au-task__item au-task__item--danger js-load-item">
                                                <div class="au-task__item-inner">
                                                    <h5 class="task">
                                                        <a href="#">Meeting about plan for Admin Template 2018</a>
                                                    </h5>
                                                    <span class="time">10:00 AM</span>
                                                </div>
                                            </div>
                                            <div class="au-task__item au-task__item--warning js-load-item">
                                                <div class="au-task__item-inner">
                                                    <h5 class="task">
                                                        <a href="#">Create new task for Dashboard</a>
                                                    </h5>
                                                    <span class="time">11:00 AM</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="au-task__footer">
                                            <button class="au-btn au-btn-load js-load-btn">load more</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-card-title" style="background-image:url('images/bg-title-02.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>
                                            <i class="zmdi zmdi-comment-text"></i>New Messages</h3>
                                        <button class="au-btn-plus">
                                            <i class="zmdi zmdi-plus"></i>
                                        </button>
                                    </div>
                                    <div class="au-inbox-wrap js-inbox-wrap">
                                        <div class="au-message js-list-load">
                                            <div class="au-message__noti">
                                                <p>You Have
                                                    <span>2</span>

                                                    new messages
                                                </p>
                                            </div>
                                            <div class="au-message-list">
                                                <div class="au-message__item unread">
                                                    <div class="au-message__item-inner">
                                                        <div class="au-message__item-text">
                                                            <div class="avatar-wrap">
                                                                <div class="avatar">
                                                                    <img src="images/icon/avatar-02.jpg" alt="John Smith">
                                                                </div>
                                                            </div>
                                                            <div class="text">
                                                                <h5 class="name">John Smith</h5>
                                                                <p>Have sent a photo</p>
                                                            </div>
                                                        </div>
                                                        <div class="au-message__item-time">
                                                            <span>12 Min ago</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="au-message__item unread">
                                                    <div class="au-message__item-inner">
                                                        <div class="au-message__item-text">
                                                            <div class="avatar-wrap online">
                                                                <div class="avatar">
                                                                    <img src="images/icon/avatar-03.jpg" alt="Nicholas Martinez">
                                                                </div>
                                                            </div>
                                                            <div class="text">
                                                                <h5 class="name">Nicholas Martinez</h5>
                                                                <p>You are now connected on message</p>
                                                            </div>
                                                        </div>
                                                        <div class="au-message__item-time">
                                                            <span>11:00 PM</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="au-message__item">
                                                    <div class="au-message__item-inner">
                                                        <div class="au-message__item-text">
                                                            <div class="avatar-wrap online">
                                                                <div class="avatar">
                                                                    <img src="images/icon/avatar-04.jpg" alt="Michelle Sims">
                                                                </div>
                                                            </div>
                                                            <div class="text">
                                                                <h5 class="name">Michelle Sims</h5>
                                                                <p>Lorem ipsum dolor sit amet</p>
                                                            </div>
                                                        </div>
                                                        <div class="au-message__item-time">
                                                            <span>Yesterday</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="au-message__item">
                                                    <div class="au-message__item-inner">
                                                        <div class="au-message__item-text">
                                                            <div class="avatar-wrap">
                                                                <div class="avatar">
                                                                    <img src="images/icon/avatar-05.jpg" alt="Michelle Sims">
                                                                </div>
                                                            </div>
                                                            <div class="text">
                                                                <h5 class="name">Michelle Sims</h5>
                                                                <p>Purus feugiat finibus</p>
                                                            </div>
                                                        </div>
                                                        <div class="au-message__item-time">
                                                            <span>Sunday</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="au-message__item js-load-item">
                                                    <div class="au-message__item-inner">
                                                        <div class="au-message__item-text">
                                                            <div class="avatar-wrap online">
                                                                <div class="avatar">
                                                                    <img src="images/icon/avatar-04.jpg" alt="Michelle Sims">
                                                                </div>
                                                            </div>
                                                            <div class="text">
                                                                <h5 class="name">Michelle Sims</h5>
                                                                <p>Lorem ipsum dolor sit amet</p>
                                                            </div>
                                                        </div>
                                                        <div class="au-message__item-time">
                                                            <span>Yesterday</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="au-message__item js-load-item">
                                                    <div class="au-message__item-inner">
                                                        <div class="au-message__item-text">
                                                            <div class="avatar-wrap">
                                                                <div class="avatar">
                                                                    <img src="images/icon/avatar-05.jpg" alt="Michelle Sims">
                                                                </div>
                                                            </div>
                                                            <div class="text">
                                                                <h5 class="name">Michelle Sims</h5>
                                                                <p>Purus feugiat finibus</p>
                                                            </div>
                                                        </div>
                                                        <div class="au-message__item-time">
                                                            <span>Sunday</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="au-message__footer">
                                                <button class="au-btn au-btn-load js-load-btn">load more</button>
                                            </div>
                                        </div>
                                        <div class="au-chat">
                                            <div class="au-chat__title">
                                                <div class="au-chat-info">
                                                    <div class="avatar-wrap online">
                                                        <div class="avatar avatar--small">
                                                            <img src="images/icon/avatar-02.jpg" alt="John Smith">
                                                        </div>
                                                    </div>
                                                    <span class="nick">
                                                        <a href="#">John Smith</a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="au-chat__content">
                                                <div class="recei-mess-wrap">
                                                    <span class="mess-time">12 Min ago</span>
                                                    <div class="recei-mess__inner">
                                                        <div class="avatar avatar--tiny">
                                                            <img src="images/icon/avatar-02.jpg" alt="John Smith">
                                                        </div>
                                                        <div class="recei-mess-list">
                                                            <div class="recei-mess">Lorem ipsum dolor sit amet, consectetur adipiscing elit non iaculis</div>
                                                            <div class="recei-mess">Donec tempor, sapien ac viverra</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="send-mess-wrap">
                                                    <span class="mess-time">30 Sec ago</span>
                                                    <div class="send-mess__inner">
                                                        <div class="send-mess-list">
                                                            <div class="send-mess">Lorem ipsum dolor sit amet, consectetur adipiscing elit non iaculis</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="au-chat-textfield">
                                                <form class="au-form-icon">
                                                    <input class="au-input au-input--full au-input--h65" type="text" placeholder="Type a message">
                                                    <button class="au-input-icon">
                                                        <i class="zmdi zmdi-camera"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            -->
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
                
    <!-- Ends here -->
    <div class="container-fluid mt-4">

    <?php include './layout/footer.php';?>
    

       <!-- Jquery JS-->
    <script src="custom/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="custom/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="custom/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="custom/vendor/slick/slick.min.js">
    </script>
    <script src="custom/vendor/wow/wow.min.js"></script>
    <script src="custom/vendor/animsition/animsition.min.js"></script>
    <script src="custom/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="custom/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="custom/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="custom/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="custom/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="custom/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="custom/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="custom/js/main.js"></script>
</body>

</html>