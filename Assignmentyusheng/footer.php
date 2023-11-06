<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>

    <style>
        /* Footer styles */
        footer {
            background: #111;
            height: auto;
            width: 100vw;
            font-family: sans-serif;
            padding-top: 40px;
            color: #fff;
            position: absolute
        }

        .footer-content {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
        }

        .footer-content h3 {
            font-size: 1.8rem;
            font-weight: 400;
            text-transform: capitalize;
            line-height: 3rem;
        }

        .socials {
            list-style: none;
            color: #fff;
            align-items: center;
            justify-content: center;
            margin: 1rem 0 3rem 0;
        }

        .socials a {
            text-decoration: none;
            color: #fff;
            padding: 10px
        }

        .socials a i {
            font-size: 1.5rem;
            transition: color .4s ease;
        }

        .socials a:hover {
            color: orange;
        }
    </style>
</head>

<body>
</body>

<footer>
    <div class="footer-content">
        <h3>Follow us</h3>
        <ul class="socials">
            <a href="#"><i i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-reddit"></i></a>
            <a href="#"><i class="fa fa-youtube"></i></a>
        </ul>
    </div>
</footer>

</html>