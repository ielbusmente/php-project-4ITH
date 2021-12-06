<?php $bgNoneRepScroll00 = "none repeat scroll 0 0";
$mainYellow = "#d8c47f";  ?>
<style>
  body {
    margin: 0;
    padding: 0;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    overflow-wrap: break-word;
  }

  img {
    max-width: 100%;
  }

  .inbox_people {
    background: #f8f8f8 <?php echo $bgNoneRepScroll00; ?>;
    float: right;
    overflow: auto;
    border-right: 1px solid #c4c4c4;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    justify-content: space-around;
  }

  .top_spac {
    margin: 20px 0 0;
  }

  .headind_srch {
    width: 100%;
    border-bottom: 1px solid #c4c4c4;
  }

  .recent_heading h4 {
    color: <?php echo $mainYellow; ?>;
    font-size: 21px;
    margin: auto;
  }

  .srch_bar input {
    border: 1px solid #cdcdcd;
    border-width: 0 0 1px 0;
    width: 100%;
    padding: 2px 25px 4px 6px;
    background: none;
  }

  .srch_bar .input-group-addon button {
    background: rgba(0, 0, 0, 0) <?php echo $bgNoneRepScroll00; ?>;
    border: medium none;
    padding: 0;
    color: #707070;
    font-size: 18px;
  }

  .srch_bar .input-group-addon {
    margin: 0 0 0 -27px;
  }

  .chat_ib h5 {
    font-size: 15px;
    color: #464646;
    margin: 0 0 12px 0;
  }

  .chat_ib h5 span {
    font-size: 13px;
    float: right;
  }

  .chat_ib p {
    font-size: 14px;
    color: #989898;
    margin: auto;
  }

  .chat_img {
    float: left;
    width: 11%;
  }

  .chat_ib {
    float: left;
    padding: 0 0 0 15px;
    width: 88%;
  }

  .basic_padding {
    padding: 20px;
    text-align: center;
    color: #333;
  }

  .chat_people {
    overflow: hidden;
    clear: both;
    max-height: 110px;
  }

  .chat_list {
    border-bottom: 1px solid #c4c4c4;
    margin: 0;
    padding: 20px 10px;
    width: 100%;
    max-height: 150px;
    overflow: hidden;
    cursor: pointer;
  }

  .chat_list:hover {
    background: #ebebeb;
  }

  .inbox_chat {
    height: 69vh;
    overflow-y: scroll;
  }

  .active_chat {
    background: #ebebeb;
  }

  .inq-name {
    color: <?php echo $mainYellow; ?>;
  }

  .incoming_msg_img {
    display: inline-block;
    width: 6%;
  }

  .time_date {
    color: #747474;
    display: block;
    font-size: 12px;
    margin: 8px 0 0;
  }

  .received_withd_msg {
    width: 100%;
  }

  .mesgs {
    float: left;
    padding: 15px 15px 0 25px;
    min-width: 60%;
    max-width: 60%;
    width: 60%;
    display: flex;
    flex-wrap: wrap;
    flex-grow: 1;
    overflow: auto;
    flex-direction: column;
    justify-content: space-around;
  }

  .write_msg {
    width: calc(100% - 40px);
    height: 15vh;
  }

  .type_msg {
    border-top: 1px solid #c4c4c4;
    position: relative;
    padding-top: 10px;
  }

  .msg_send_btn {
    border: medium none;
    border-radius: 50%;
    color: #fff;
    cursor: pointer;
    font-size: 17px;
    height: 33px;
    position: absolute;
    width: 33px;
    right: 0;
  }

  .reply_btn {
    background: <?php echo "$mainYellow $bgNoneRepScroll00"; ?>;
    top: 11px;
  }

  .delete_btn {
    background: #d87f7f <?php echo $bgNoneRepScroll00; ?>;
    top: calc(33px + 11px + 10px);
  }

  .messaging {
    padding: 10px;
    width: 100%;
    flex-grow: 1;
    display: flex;
    flex-direction: row;
    align-items: stretch;
  }

  .msg_history {
    height: 55vh;
    overflow-y: auto;
    padding-bottom: 20px;
  }

  .title {
    padding: 10px;
    font-weight: bold;
    font-size: 48px;
    line-height: 58px;
    color: <?php echo $mainYellow; ?>;
  }

  .active-tab {
    border-bottom: <?php echo $mainYellow; ?> solid 5px;
    color: <?php echo $mainYellow; ?> !important;
  }

  a {
    transition: 0.2s;
  }

  a.nav-link:hover {
    border-bottom: <?php echo $mainYellow; ?> solid 5px;
  }

  .update-btn {
    background-color: <?php echo $mainYellow; ?>;
    color: #333;
    transition: 0.2s;
  }

  .update-btn:hover {
    color: <?php echo $mainYellow; ?>;
    background-color: #333;
  }

  .unread h5,
  .unread p {
    font-weight: bold !important;
    color: #333 !important;
  }

  /* modal  */
  /* The Modal (background) */
  .modal {
    display: none;
    position: fixed;
    z-index: 1;
    padding-top: 30vh;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0, 0, 0);
    /* Black w/ opacity */
    background-color: rgba(0, 0, 0, 0.4);
  }

  /* Modal Content */
  .modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 40%;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
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

  /* The Close Button */
  .close {
    color: #ddd;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: #fff;
    text-decoration: none;
    cursor: pointer;
  }

  .modal-header {
    background-color: <?php echo $mainYellow; ?>;
    color: white;
    <?php echo $mPad; ?>
  }

  .modal-body,
  .modal-footer {
    padding: 16px;
  }
</style>