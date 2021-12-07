<?php
date_default_timezone_set('Asia/Singapore');
$replyAlert = '';
$page = 'inbox';
include 'php-templates/base.php';
//profile errors clear
// if (isset($_COOKIE['error1'])) {
//     unset($_COOKIE['error1']);
setcookie('error1', '', time() - 1);
// }
// if (isset($_COOKIE['error2'])) {
//     unset($_COOKIE['error2']);
setcookie('error2', '', time() - 1);
// }

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
            [$inquiriesArr[$i]['readBool'], $inquiriesArr[$i]['readDate']]
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
//reply to inquiry
if (isset($_POST['reply']) && $_POST['reply-msg'] != '') {
    $msg = $_POST['reply-msg'];
    $theId = $_GET['id'];
    // echo "<script>alert(\"Replied: " . $_POST['reply-msg'] . "\")</script>";
    // echo $_POST['reply-msg'];
    $_POST['reply'] = null;
    $_POST['reply-msg'] = null;

    // mail 
    //todo mail code
    $dateOfInq = $inquiriesObjArr[$theId]->getMonthDateTime();
    $emailOfInqSender = $inquiriesObjArr[$theId]->getSenderEmail();
    include "../phpmailer/send-reply-mail.php";
}
//delete inquiry 
if (isset($_POST['delete'])) {
    $targetId = $inquiriesObjArr[$_GET['id']]->getId();
    if ($targetId != '') {
        $deleteSql = $inquiriesObjArr[$_GET['id']]->deleteStr();
        include '../php-templates/dbconnect.php';
        $conn->query($deleteSql);
        $conn->close();
        echo "<script>alert(\"Successfully deleted the Inquiry.\")</script>";
        echo '<script>
            window.location.href = "inquiries.php";
        </script>';
    }
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
            <?php $userIndex = $_GET['id'];

            if ($userIndex != '') { ?>
                <div class="msg_history">
                    <h3 class="inq-name">
                        <b><?php
                            $currentInqName = $inquiriesObjArr[$userIndex]->getName();
                            $readDate = $inquiriesObjArr[$userIndex]->getReadDate();
                            $readViewedMsg = $readDate === 'Not Read';
                            echo $currentInqName;  ?></b>
                    </h3>
                    <h5 class="inq-name mb-5">
                        <?php echo ($inquiriesObjArr[$userIndex]->getSenderEmail());  ?>
                    </h5>
                    <div class="received_msg" title="<?php echo $readViewedMsg ? '' : ("Read " . $readDate) ?>">
                        <div class="received_withd_msg">
                            <p><?php echo $inquiriesObjArr[$userIndex]->getMsg() ?></p>
                            <span class="time_date"><?php echo $inquiriesObjArr[$userIndex]->getMonthDateTime()
                                                        . ($readViewedMsg ? '' : (' - - <i>Read: ' . $readDate . '</i>')) ?></span>
                        </div>
                    </div>
                </div>
                <?php echo $replyAlert; ?>
                <div class="type_msg">
                    <form class="input_msg_write" method="post">
                        <textarea class="write_msg" placeholder="Type a message" name="reply-msg" required></textarea>
                        <button class="msg_send_btn reply_btn" type="submit" title="Reply" name="reply">
                            <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                        </button>
                    </form>
                    <!-- <form method="post"> -->
                    <button class="msg_send_btn delete_btn" type="button" title="Delete This Inquiry" id="butt_delete">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </button>
                    <!-- </form> -->
                </div>
            <?php
            }
            ?>
        </div>
        <div class="inbox_people">
            <div class="headind_srch row p-0 m-0">
                <div class="recent_heading col-md-6 py-2 px-4">
                    <h4>Inbox</h4>
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
                        echo "<a " . ($i === $_GET['id'] ? "type=\"button\" style=\"width:100%;\"" : "href=\"inquiries.php?id=$i&read=" .
                            ($inqRead ? 1 : 0) . "\"") . " title=\"" . ($inqRead ? '' : 'Unread Message') . "\"><div class=\"chat_list " .
                            ($i === $_GET['id'] ? "active_chat" : "") . "\">
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

            </div>
        </div>
    </div>
    <!-- delete modal  -->
    <div id="delete_modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Delete Inquiry</h2>
                <span class="close">&times;</span>

            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this Inquiry of <?php echo $currentInqName ?>?</p>
            </div>
            <div class="modal-footer">
                <form method="post" class="m-0 p-0">
                    <button class="btn btn-outline-danger px-5" type='submit' id="butt_delete_yes" name="delete">Yes</button>
                </form>
                <button class="btn btn-outline-dark px-5" id="butt_delete_no">No</button>
            </div>
        </div>

    </div>
    <script>
        //save scroll position of the inbox_chat
        const inbox = document.getElementById('inbox')
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) inbox.scrollTo(0, scrollpos);
        });
        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', inbox.scrollTop);
        };
        //delete modal 
        const modal = document.getElementById("delete_modal");
        const buttDelete = document.getElementById("butt_delete");
        const span = document.getElementsByClassName("close")[0];
        const buttDeleteNo = document.getElementById("butt_delete_no");

        // When the user clicks the button, open the modal 
        buttDelete.onclick = function() {
            modal.style.display = "block";
        }
        // When the user clicks on <span> (x) or No, close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
        buttDeleteNo.onclick = function() {
            modal.style.display = "none";
        }


        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }


        //  if (window.history.replaceState) {
        //      window.history.replaceState(null, null, window.location.href)
        //  }
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
             //      //      
             //      //   });
             //  });
             //  alert("alert")

             //  $("#inboxChatId").on("scroll", function() {
             //      $("span").html($("#inboxChatId")[0].scrollTop);
             //  });

         })*/
    </script>
</body>

</html>