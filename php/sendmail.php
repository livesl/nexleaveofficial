<?php

 $to = "dalbsranawaka@gmail.com";
        $subject = "DoNotReply!";
        $txt = "You have new request!go to www.nexleave.makemywedding.lk!";
        $headers = "Approval of leave";

        mail($to, $subject, $txt, $headers);

