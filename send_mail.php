<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // קבלת נתונים מהטופס
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // אימות כתובת האימייל
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p>כתובת האימייל לא חוקית. אנא נסו שוב.</p>";
        exit;
    }

    // הגדרות המייל
    $to = "ruti@moovme.co.il"; // החלף בכתובת המייל שלך
    $subject = "הודעה חדשה מאתר צור קשר";
    $body = "שם: $name\nאימייל: $email\nהודעה:\n$message";
    $headers = "From: $email";

    // שליחת המייל
    if (mail($to, $subject, $body, $headers)) {
        echo "<p>תודה שיצרתם קשר! אחזור אליכם בהקדם.</p>";
    } else {
        echo "<p>משהו השתבש, נסו שוב מאוחר יותר.</p>";
    }
}
?>
