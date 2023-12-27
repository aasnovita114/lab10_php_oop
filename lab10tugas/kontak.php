<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout Sederhana</title>
</head>
<body>
    <div id="container">
    <?php require('header.php'); ?>
        <section id="contact" class="contact">
            <h2>contact</h2>
                        <div class="row">
                            <form action="">
                                <div class="input-group">
                                    <label for="nama_user"><i data-feather="user"></i></label>
                                    <input type="text" placeholder="Nama" id="nama_user">
                                </div>
                                <div class="input-group">
                                    <label for="e-mail"><i data-feather="mail"></i></label>
                                    <input type="text" placeholder="E-mail" id="e-mail">
                                </div>
                                <div class="input-group">
                                    <label for="phone"><i data-feather="phone"></i></label>
                                    <input type="text" placeholder="No hp" id="phone">
                                </div>
                                <div class="input-group">
                                    <label for="message"><i data-feather="message-square"></i></label>
                                    <input type="text" placeholder="Massage" id="phone">
                                </div>
            
                                <button class="btn" type="submit">Send</button>
                            </form>
                        </div>
                    </section>
                    <?php require('footer.php'); ?>
                </body>
                </html>