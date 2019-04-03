<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bus RSVP | Sneaker District Antwerp</title>
    <link rel="stylesheet" type="text/css" href="assets/css/stylesheet.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/reset.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="msapplication-tap-highlight" content="no" />
    <link rel="canonical" href="https://bus.sneakerdistrict.com">

    <meta name="author" content="Sneaker District">
    <meta name="copyright" content="Sneaker District. Copyright (c) <?php echo date("Y"); ?>"/>

    <meta property='og:locale' content="en_US"/>
    <meta property='og:title' content='Sneaker District webshop for sneakers & apparel'/>
    <meta property='og:description' content='Our Antwerp store is turning 1 year old! We would like to invite you to celebrate this with us. There will be free drinks by Jack Daniel’s and great tunes by MOM Antwerp. Adidas will also release the new Nite Jogger event, so make sure to be there!'/>
    <meta property='og:url' content='https://rsvp.sneakerdistrict.com'/>
    <meta property='og:site_name' content='Sneaker District Bus RSVP'/>
    <meta property='og:image' itemprop='image' content='https://bus.sneakerdistrict.com/assets/images/share-image.jpg'/>
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property='og:type' content='website' />

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@Sneakerdistric1">
    <meta name="twitter:creator" content="@Sneakerdistric1">
    <meta name="twitter:title" content="Sneaker District RSVP">
    <meta name="twitter:description" content="Sneaker District Antwerp is turning 1 and we’ve set the date to
    celebrate this with you! On the 11th of April. On this very night we also release a new model of Adidas, the Nite
     Jogger.">
    <meta name="twitter:image:src" content="https://bus.sneakerdistrict.com/assets/images/share-image.jpg"/>

    <link rel="icon" href="https://bus.sneakerdistrict.com/assets/images/favicon.png" type="image/png" />

</head>
<body>


<section id="inner">
    <!-- background image -->
    <div class="background" id="image"></div>

    <!-- noise canvas -->
    <canvas id="canvas" class="canvas"></canvas>

    <!-- company logos -->
    <header>
        <nav>
            <ul>
                <li>
                    <div class="logo logo-sneakerdistrict"></div>
                </li>
                <li>
                    <div class="logo logo-company"></div>
                </li>
            </ul>
        </nav>
    </header>

    <!-- floating figures -->
    <figure id="figure-1">
        <img src="assets/images/sd-banner.png" alt="Sneaker District">
    </figure>

    <figure id="figure-2">
        <img src="assets/images/sneaker.png" alt="Adidas Nite Jogger">
    </figure>

    <!-- rsvp box -->
    <div class="component rsvp-box">
        <!-- start form -->
        <form action="?" method="POST">
            <div class="grid">
                <fieldset>
                    <legend><h1>sneaker district antwerp</h1>
                        <span><h2>Bus RSVP</h2></span>
                    </legend>

                    <!-- succes message box -->
                    <div class="icon not-visible">
                        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                        </svg>
                    </div>
                   <a target="_blank" href="https://sneakerdistrict.com">
                       <div class="succes-message hide">
                        <p></p>
                       </div>
                   </a>

                    <!-- field boxes -->
                    <div class="fields">
                        <ul>
                            <li><a target="_blank"
                                   href="https://goo.gl/maps/8u4xbvJEyAz">
                                    <span class="detail-title">Pick-up Location</span>
                                    <span>Generaal Vetterstraat 78b<br>1059 BW Amsterdam</span>
                                </a></li>
                            <li><a>
                                    <span class="detail-title">Date</span>
                                    <span>April 11, 2019</span>
                                </a></li>
                            <li><a>
                                    <span class="detail-title">Time</span>
                                    <span>15:30</span>
                                </a></li>
                        </ul>

                        <!-- form fields -->
                        <div class="field-form">

                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" placeholder="Your name" required
                                   data-error-message="Name field is required.">

                            <span class="error-message name-error"></span>

                            <label for="email">Email address</label>
                            <input type="email" id="email" name="email" placeholder="Your email address" required
                                   data-error-message="Email field is required.">
                            <span class="error-message email-error"></span>

                            <h3>EVENT SUMMARY</h3>
                            <p>
                                Our Antwerp store is turning 1 year old! We would like to invite you to celebrate this with us. There will be free drinks by Jack Daniel’s and great tunes by MOM Antwerp, with DJ’s like Kevin Kofii, Faisal and Yones! There we also be a surprise from adidas, as we’re releasing the adidas Nite Jogger at the event. RSVP is limited, so be fast!
                            </p>
                        </div>
                        <button id="submit" class="submit-button" type="button" name="submit">RESERVE A SPOT</button>
                    </div>
                </fieldset>
            </div>
        </form>
        <!-- end form -->
    </div>
    <!-- mobile figures -->
    <figure id="figure-3" class="not-visible">
        <img src="assets/images/nitejogger_transparent.png" alt="Adidas Nite Jogger April 11th">
    </figure>
    <div class="logo-company-mobile not-visible">
        <div class="company-logo"></div>
    </div>
</section>

</body>

<!-- loading js files -->
<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="assets/js/rsvp.js"></script>


</html>