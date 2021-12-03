<?php ?>
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
    background: #f8f8f8 none repeat scroll 0 0;
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
    color: #d8c47f;
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
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
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
    color: #d8c47f;
  }

  .incoming_msg_img {
    display: inline-block;
    width: 6%;
  }

  .received_msg {
    display: inline-block;
    padding: 0 0 0 10px;
    vertical-align: top;
    width: 92%;
  }

  .received_withd_msg p {
    background: #ebebeb none repeat scroll 0 0;
    border-radius: 3px;
    color: #646464;
    font-size: 14px;
    margin: 0;
    padding: 20px;
    width: 100%;
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
    padding: 30px 15px 0 25px;
    min-width: 60%;
    max-width: 60%;
    width: 60%;
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    justify-content: end;
    flex-grow: 1;
    overflow: auto;
  }

  .sent_msg p {
    background: #d8c47f none repeat scroll 0 0;
    border-radius: 3px;
    font-size: 14px;
    margin: 0;
    color: #fff;
    padding: 5px 10px 5px 12px;
    width: 100%;
  }

  .write_msg {
    width: calc(100% - 40px);
    height: 15vh;
  }

  .outgoing_msg {
    overflow: hidden;
    margin: 26px 0 26px;
  }

  .sent_msg {
    float: right;
    width: 46%;
  }

  .input_msg_write input {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;
    color: #4c4c4c;
    font-size: 15px;
    min-height: 48px;
    width: 100%;
  }

  .type_msg {
    border-top: 1px solid #c4c4c4;
    position: relative;
    padding-top: 10px;
  }

  .msg_send_btn {
    background: #d8c47f none repeat scroll 0 0;
    border: medium none;
    border-radius: 50%;
    color: #fff;
    cursor: pointer;
    font-size: 17px;
    height: 33px;
    position: absolute;
    right: 0;
    top: 11px;
    width: 33px;
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
    height: 58vh;
    overflow-y: auto;
    padding-bottom: 20px;
  }

  .title {
    padding: 10px;
    font-weight: bold;
    font-size: 48px;
    line-height: 58px;
    color: #d8c47f;
  }

  .active-tab {
    border-bottom: #d8c47f solid 5px;
    color: #d8c47f !important;
  }

  a {
    transition: 0.2s;
  }

  a.nav-link:hover {
    border-bottom: #d8c47f solid 5px;
  }

  .update-btn {
    background-color: #d8c47f;
    color: #333;
    transition: 0.2s;
  }

  .update-btn:hover {
    color: #d8c47f;
    background-color: #333;
  }

  .unread h5,
  .unread p {
    font-weight: bold !important;
    color: #333 !important;
  }
</style>