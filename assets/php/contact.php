<?php

$errors = [];
$errorMessage = "";

if (!empty($_POST)) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    if (empty($errors)) {
        $toEmail = "info@custombrand.ir";
        $emailSubject = "ایمیل جدید از فرم تماس شما";
        $headers = [
            "From" => $email,
            "Reply-To" => $email,
            "Content-type" => "text/html; charset=iso-8859-1",
        ];

        $bodyParagraphs = [
            "نام: {$name} <br>",
            "ایمیل: {$email} <br>",
            "پیام:",
            $message,
        ];
        $body = join(PHP_EOL, $bodyParagraphs);

        if (mail($toEmail, $emailSubject, $body, $headers)) {
            header("Location: ../../contact.html");
        } else {
            $errorMessage = "اوه، مشکلی پیش آمد. لطفا بعدا دوباره امتحان کنید";
        }
    } else {
        $allErrors = join("<br/>", $errors);
        $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
    }
}

?>