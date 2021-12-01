 <?php
    //profile errors clear
    setcookie('error1', '', time() - 1);
    setcookie('error2', '', time() - 1);
    $page = 'inbox';
    include 'php-templates/base.php';
    if (!isset($_GET['id']))
        $_GET['id'] = '';
    // load inquiries 
    // get inquiries from db 
    include '../php-templates/dbconnect.php';
    $sql = "SELECT * FROM inquiry ORDER BY date DESC";
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
        echo "<script>alert(\"this is from php\")</script>";
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
    //todo when clicked, update read value
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
     <?php
        include 'php-templates/nav.php'
        ?>
     <h1 class="title">Inquiries</h1>
     <div class="messaging ">
         <div class="inbox_msg">
             <div class="mesgs">
                 <div class="msg_history">
                     <?php $userIndex = $_GET['id'];

                        if ($userIndex != '') { ?>
                         <h3 class="inq-name"><?php
                                                // print_r($inquiriesArr);
                                                echo ($inquiriesObjArr[$userIndex]->getName());  ?></h3>
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
                     <div class="input_msg_write">
                         <input type="text" class="write_msg" placeholder="Type a message" />
                         <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                     </div>
                 </div>
             </div>
             <div class="inbox_people">
                 <div class="headind_srch">
                     <div class="recent_heading">
                         <h4>Recent</h4>
                     </div>
                     <div class="srch_bar">
                         <div class="stylish-input-group">
                             <input type="text" class="search-bar" placeholder="Search">
                             <span class="input-group-addon">
                                 <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                             </span>
                         </div>
                     </div>
                 </div>
                 <div class="inbox_chat">
                     <?php
                        // $inqCount = count($inquiriesArr);
                        if ($inqCount > 0) {
                            // if (false) { 
                            for ($i = 0; $i < $inqCount; $i++) {
                                $inq = $inquiriesObjArr[$i];
                                $inqRead = $inq->isRead();
                                // $dateTime = new DateTime($inq['date']);
                                // echo $dateTry->format('M j, Y | g:i A');  
                                echo "<a " . ($i == $_GET['id'] ? "type=\"button\" style=\"width:100%;\"" : "href=\"inquiries.php?id=$i\"") . "><div class=\"chat_list " .
                                    ($i == $_GET['id'] ? "active_chat" : "") . "\">
                                    <div class=\"chat_people\">
                                    <div class=\"chat_ib\">
                                        <h5>" . ($inqRead ?  "" : "<b>") .
                                    $inq->getName() . ($inqRead ?  "" : "</b>") . "<span class=\"chat_date\">" .
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
     </div>
 </body>

 </html>