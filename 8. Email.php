<?php
// ................ 1 ...............
// Aici(php.ini) se vor modifica valorile pentru a pune in functiune un server SMTP 
/*
    [mail function]
    ; For Win32 only.
    SMTP = localhost
    ; For Win32 only.
    ;sendmail_from = me@localhost.com
    ; For Unix only. You may supply arguments as well
    (default:“sendmail -t -i”).
    ;sendmail_path =
*/

// ................ 2 ...............
/*
    Următorul exemplu de cod setează argumentele pentru funcția mail() și trimite mesajul:
*/

    // $to = "ion.ionescu@yahoo.com"; // Dacă trebuie să trimitem mesajul la mai multe adrese, acestea trebuie separate prin virgulă.
    // $subj = "Test";
    // $mess = "Acest mesaj testeaza functia mail()";
    // $headers = "bcc:suport@barn.edu.yu"; // Argumentul header este opțional
    // $mailsend = mail($to, $subj, $mess, $headers);

// ................ 3 ...............
/*
    Următorul exemplu de cod permite trimiterea atașamentelor:
*/

    // $to = "ion.ionescu@yahoo.com";
    // $subj = "Atasament de proba";
    // $mess = <<< END
    //             Acesta este un text de mesaj.
    //             Acest mesaj trebuie sa ajunga ca atasament.
    //             Sa vedem ce se va intampla.
    //         END;
    // $headers = "Content-disposition: attachment; filename = test.txt ";
    // $headers .= "bcc:suport@barn.edu.yu\n ";
    // $mailsend = mail($to, $subj, $mess, $headers);

/*
    text simplu – text/plain
    text HTML – text/html
    imagine - image/gif, image/jpeg
    înregistrări audio - audio/x-wav, audio/vnd.rn-realaudio
    înregistrări video - video/mpeg, video/avi

    Dacă doriți să trimiteți conținutul unui fișier, care nu trebuie neapărat să fie textual
*/

    // $headers .= "Content-type: image/gif";

// ................ 4 ...............
/*
    Următorul exemplu se ilustrează procedurile pentru expedierea unui atașament binar:
    Numele scriptului: mailGraphic
    Descriere: Trimite un fisier grafic ca atasament la mesaj
*/

    // $filename = "logo.gif";
    // $fh = fopen($filename, "rb");
    // $fileContent = fread($fh, filesize($filename));
    // fclose($fh);

    // $mess = chunk_split(base64_encode($fileContent));
    // $to = "ion.ionescu@yahoo.com";
    // $subj = "Trimiterea unei imagini in atasament";
    // $headers = "Content-disposition: attachment; filename=logo.gif";
    // $headers .= "Content-type: image/gif";
    // $headers .= "Content-Transfer-Encoding: base64";

    // if(!$mailsend = mail($to, $subj, $mess, $headers)){
    //     echo "Mesajul nu a fost trimis";
    // }else{
    //     echo "Mesajul este trimis";
    // }

// ................ 5 ...............
/*
    Următorul exemplu trimite un mail prin HTML
*/
    // $to = "ion.ionescu@yahoo.com";
    // $subj = "Atasament de proba";
    // $text = "Hello my friend.";
    // $headers = "From: " . $from . " ";
    // $headers .= "Reply-To: no reply";
    // $headers .= "MIME-Version: 1.0";
    // $headers .= "Content-Type: text/html; charset=utf-8 ";
    // mail($to, $subject, $test, $headers);

// ................ 6 ...............
/*
    Pentru a trimite un e-mail printr-un server smtp, care nu este serverul
    SMTP default al aplicației, o funcție de web mail nu este suficientă. În
    locul acesteia, trebuie să folosim o soluție gata făcută. De exemplu, PEAR Mail.

    Pentru PEAR Mail avem nevoie de biblioteci PEAR: Mail și Net_SMTP (pear install Mail și pear install Net_SMTP).
*/

    // include "Mail.php";
    // $headers["From"] = "mailExpeditor@mailulMeu.com";
    // $headers["To"] = "mailDestinatar@mojMail.com";
    // $headers["Subject"] = "Subiectul meu";
    // $params["host"] = "ssl://smtp.gmail.com";
    // $params["port"] = "465";
    // $params["auth"] = true;
    // $params["username"] = "numeleMeuDeUtilizator";
    // $params["password"] = "parolaMea";
    // $mail_object =& Mail::factory("smtp", $params);
    // $mail_object->send(mailDestinatar@mail.com, $headers, "Mesajul meu");
?>