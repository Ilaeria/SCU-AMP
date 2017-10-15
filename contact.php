<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shine</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css" media="screen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- contact-specific styles -->
    <style>
        .contacttable {
            width: 90%;
            margin-left: 0;
            border-left: 5px solid #869dc7;
        }

        .contacttable caption {
            text-align: left;
            padding-bottom: 1em;
        }

        .contacttable th {
            display: none;
        }

        .contacttable tbody td:first-of-type {
            padding: 1px 5px;
            width: 83px;
        }

        .contacttable tbody td:last-of-type {
            font-size: 0.8em;
        }

        h2 {
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <header id="headerHome">
            <h1 class="guestlink"><a href="index.php">Shine</a></h1>
        </header>

        <main id="guestHome">
            <h2>Contact Us</h2>
            <table class="contacttable">
                <caption>You can contact us using any method below.</caption>
                <thead>
                <tr>
                    <th id="contactmethod">Contact Method</th>
                    <th id="contactinformation">Contact Details</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td headers="contactmethod">Email:</td>
                    <td headers="contactinformation"><a href="mailto:admin@localhost">To be advised</a></td>
                </tr>
                <tr>
                    <td headers="contactmethod">Phone:</td>
                    <td headers="contactinformation">To be advised</td>
                </tr>
                <tr>
                    <td headers="contactmethod">Website:</td>
                    <td headers="contactinformation"><a href="http://infotech.scu.edu.au/~smanni15/" target="_blank">http://infotech.scu.edu.au/~smanni15/</a></td>
                </tr>
                <tr>
                    <td headers="contactmethod">Facebook:</td>
                    <td headers="contactinformation"><a href="https://facebook.com/" target="_blank">https://facebook.com/</a></td>
                </tr>
                <tr>
                    <td headers="contactmethod">Instagram:</td>
                    <td headers="contactinformation"><a href="https://www.instagram.com/" target="_blank">https://www.instagram.com/</a></td>
                </tr>
                <tr>
                    <td headers="contactmethod">Twitter:</td>
                    <td headers="contactinformation"><a href="https://twitter.com/" target="_blank">https://twitter.com/</a></td>
                </tr>
                </tbody>
            </table>
        </main>
        <?php include 'html_includes/footer.inc'; ?>
    </div>
</body>
</html>