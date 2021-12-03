 <?php
    //profile errors clear
    setcookie('error1', '', time() - 1);
    setcookie('error2', '', time() - 1);
    $page = 'inbox';
    include 'php-templates/base.php';
    if (!isset($_GET['id']))
        $_GET['id'] = '';
    //check if there is a search string
    $searchStr = isset($_GET['search']) ? $_GET['search'] : '';
    // echo "<script>alert(\"this is from php \" + \"" . (new DateTime($searchStr))->format('Y-m-d H:i:s') . "\")</script>";
    //convert string to date 
    $searchStrToDate = '';
    try {
        $searchStrToDate = (new DateTime($searchStr))->format('Y-m-d');
    } catch (Exception $e) {
        $searchStrToDate = $searchStr;
    }
    // load inquiries  
    include '../php-templates/dbconnect.php';
    // get inquiries from db 
    $sql = "SELECT * FROM inquiry WHERE 
        name LIKE '%$searchStr%' OR 
        email LIKE '%$searchStr%' OR 
        date LIKE '%$searchStrToDate%' OR 
        message LIKE '%$searchStr%' 
        ORDER BY date DESC";
    // echo  $sql;
    $inquiriesArr = [];
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
        while ($row = $result->fetch_assoc())
            array_push($inquiriesArr, $row);
    $conn->close();
    // print_r($inquiriesArr);
    //create a Inquiry instance for every array element
    $inqCount = count($inquiriesArr);
    $inquiriesObjArr = [];
    if ($inqCount > 0) {
        // echo "<script>alert(\"this is from php\")</script>";
        include "../php-templates/classes/Inquiry.php";
        for ($i = 0; $i <  $inqCount; $i++) {
            $inquiriesObjArr[$i] = new Inquiry(
                $inquiriesArr[$i]['id'],
                $inquiriesArr[$i]['message'],
                $inquiriesArr[$i]['date'],
                $inquiriesArr[$i]['name'],
                $inquiriesArr[$i]['email'],
                [$inquiriesArr[$i]['readBool'], $inquiriesArr[$i]['readDate']],
            );
        }
    }
    //update read value
    if ($_GET['id'] !== '' && isset($_GET['read'])) {
        // check if it is read 
        if (!$inquiriesObjArr[$_GET['id']]->isRead()) {
            // echo $_GET['read'] . "<br/>";
            $currInqIndex = $_GET['id'];
            // insert readbool true and readdate date(format) where id = id
            // echo $inquiriesObjArr[$currentInqIndex]->getName() . "<br/>";
            // echo $inquiriesObjArr[$currentInqIndex]->isRead();
            // echo $inquiriesObjArr[$currentInqIndex]->getReadDate() . "<br/>";
            // echo date('Y-m-d H:i:s');

            include '../php-templates/dbconnect.php';
            $dateUpdate = new DateTime();
            $conn->query($inquiriesObjArr[$currInqIndex]->viewInquiryStr($dateUpdate->format('Y-m-d H:i:s')));
            $conn->close();
            // echo $inquiriesObjArr[$currInqIndex]->viewInquiryStr(date('Y-m-d H:i:s'));
        }
    }
    if (isset($_POST['reply'])) {
        $msg = $_POST['reply-msg'];
        $theId = $_GET['id'];
        // echo "<script>alert(\"Replied: " . $_POST['reply-msg'] . "\")</script>";
        // echo $_POST['reply-msg'];
        $_POST['reply'] = null;
        $_POST['reply-msg'] = null;

        // mail 
        //todo mail code
        // update database
        include '../php-templates/dbconnect.php';
        $sqlUpdateReply = $inquiriesObjArr[$theId]->replyStr($msg);
        $conn->query($sqlUpdateReply);
        // echo $sqlUpdateReply;
        $conn->close();

        // echo $_GET['id'] . "<br/>";
        // echo $inquiriesObjArr[$_GET['id']]->getName() . "<br/>";
        // echo $inquiriesObjArr[$_GET['id']]->getSenderEmail() . "<br/>";

        header("Location:inquiries.php?id=$theId&read=1");
    }
    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <?php include '../php-templates/meta.php';
        include '../php-templates/adminhead.php';
        include 'php-templates/private-head.php';
        ?>
     <title>Sleepy Inbox</title>

 </head>

 <body>
     <?php include 'php-templates/nav.php' ?>
     <h1 class="title">Inquiries</h1>
     <div class="messaging ">
         <div class="mesgs">
             <div class="msg_history">
                 <?php $userIndex = $_GET['id'];

                    if ($userIndex != '') { ?>
                     <h3 class="inq-name">
                         <b><?php echo ($inquiriesObjArr[$userIndex]->getName());  ?></b>
                     </h3>
                     <h5 class="inq-name mb-5">
                         <?php echo ($inquiriesObjArr[$userIndex]->getSenderEmail());  ?>
                     </h5>
                     <div class="incoming_msg">
                         <div class="received_msg">
                             <div class="received_withd_msg">
                                 <p><?php echo $inquiriesObjArr[$userIndex]->getMsg() ?></p>
                                 <span class="time_date"><?php echo $inquiriesObjArr[$userIndex]->getMonthDateTime() ?></span>
                             </div>
                         </div>
                     </div>
                 <?php } ?>
             </div>
             <div class="type_msg">
                 <form class="input_msg_write" method="post">
                     <textarea class="write_msg" placeholder="Type a message" name="reply-msg"></textarea>
                     <button class="msg_send_btn" type="submit" title="Reply" name="reply"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                 </form>
             </div>
         </div>
         <div class="inbox_people">
             <div class="headind_srch row p-0 m-0">
                 <div class="recent_heading col-md-6 py-2 px-4">
                     <h4>Recent</h4>
                 </div>
                 <div class="srch_bar col-md-6 p-2" title="Press Enter After Typing">
                     <form method="GET">
                         <input type="search" class="search-bar" placeholder="Search - Press Enter After Typing" name='search' value='<?php echo $searchStr ?>'>
                         <span class="input-group-addon">
                             <!-- type="submit" name='search-box'  -->
                             <button id="search-btn"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                         </span>
                     </form>
                 </div>
             </div>
             <div class="inbox_chat" id="inbox">
                 <?php
                    // $inqCount = count($inquiriesArr);
                    if ($inqCount > 0) {
                        // if (false) { 
                        for ($i = 0; $i < $inqCount; $i++) {
                            $inq = $inquiriesObjArr[$i];
                            $inqRead = $inq->isRead();
                            // $dateTime = new DateTime($inq['date']);
                            // echo $dateTry->format('M j, Y | g:i A');  
                            echo "<a " . ($i == $_GET['id'] ? "type=\"button\" style=\"width:100%;\"" : "href=\"inquiries.php?id=$i&read=" .
                                ($inqRead ? 1 : 0) . "\"") . "><div class=\"chat_list " .
                                ($i == $_GET['id'] ? "active_chat" : "") . "\">
                                    <div class=\"chat_people\">
                                    <div class=\"chat_ib " .
                                ($inqRead ?  "" : "unread") . "\"><h5>" .
                                $inq->getName() . "<span class=\"chat_date\">" .
                                $inq->getMonthDate() . "</span></h5><p>" .
                                $inq->getMsg() . "</p></div></div></div></a>";
                        }
                    } else { ?>
                     <div class='basic_padding'>
                         No Inquiries
                     </div>
                 <?php }

                    ?>
                 <script>
                     //  alert('Try')
                 </script>
                 <!-- js to save scroll position of the inbox_chat  -->
                 <script>
                     const inbox = document.getElementById('inbox')
                     document.addEventListener("DOMContentLoaded", function(event) {
                         var scrollpos = localStorage.getItem('scrollpos');
                         if (scrollpos) inbox.scrollTo(0, scrollpos);
                     });
                     window.onbeforeunload = function(e) {
                         localStorage.setItem('scrollpos', inbox.scrollTop);
                     };
                     //  const searchButton = document.getElementById('search-btn')
                     //  searchButton.addEventListener('click', (e) => {
                     //      e.preventDefault()
                     //  })
                     //  const searchBox = document.getElementById('search-box')

                     //  searchBox.addEventListener('keyup', (e) => {
                     //      alert('wiw')
                     //  })

                     /* $(document).ready(function() {
                          //  $("#inboxChatId").on('beforeunload', function() {
                          //      $("#inboxChatId").scrollTop(0);
                          //      //   $("#inboxChatId").click(function() {
                          //      //       alert('fuckl');
                          //      //   });
                          //  });
                          //  alert("alert")

                          //  $("#inboxChatId").on("scroll", function() {
                          //      $("span").html($("#inboxChatId")[0].scrollTop);
                          //  });

                      })*/
                 </script>
             </div>
         </div>
     </div>
 </body>

 </html>