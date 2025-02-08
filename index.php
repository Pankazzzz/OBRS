<?php include "db.php"; ?>
<?php session_start(); ?>

<?php
$msg = '';
$destination = '';
$arrival = '';

if (isset($_POST['continue'])) {
    $arrival = mysqli_real_escape_string($con, $_POST['arrival']);
    $destination = mysqli_real_escape_string($con, $_POST['destiny']);
    $date = mysqli_real_escape_string($con, $_POST['date']);

    $_SESSION['arrival'] = $arrival;
    $_SESSION['destiny'] = $destination;
    $_SESSION['date'] = $date;
    header('location:booking-table.php');
    die();
} else {
    $msg = "Please enter correct details";
}
?>

<?php
$sql1 = "SELECT * FROM arrival";
$sql2 = "SELECT * FROM destination";
$res = mysqli_query($con, $sql1);
$res1 = mysqli_query($con, $sql2);
?>

<?php include "header.php"; ?>

<div class="hero">
    <div class="highway"></div>
    <div class="city"></div>
    <div class="bus" id="buss">
        <img src="buss.png" alt="Bus">
        <div class="wheel">
            <img src="wheel.png" class="frontwheel" alt="Front Wheel">
            <img src="wheel.png" class="backwheel" alt="Back Wheel">
        </div>
    </div>
</div>

<div class="select-container">
    <h2>BOOK YOUR TICKET NOW</h2>
    <p class="text-center p-text">Fast, reliable, and secure bus reservations at your fingertips.</p>

    <form method="post" action="index.php">
        <div class="inline">
            <!-- Arrival Selection -->
            <div class="select-box">
                <div class="options-container">
                    <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                        <div class="option">
                            <input type="radio" class="radio" id="<?php echo $row['arrival']; ?>" name="arrival" value="<?php echo $row['arrival']; ?>">
                            <label for="<?php echo $row['arrival']; ?>"><?php echo $row['arrival']; ?></label>
                        </div>
                    <?php } ?>
                </div>
                <div class="selected">Select Arrival</div>
                <div class="search-box">
                    <input type="text" placeholder="Start typing...">
                </div>
            </div>

            <!-- Destination Selection -->
            <div class="select-box">
                <div class="options-container">
                    <?php while ($row1 = mysqli_fetch_assoc($res1)) { ?>
                        <div class="option">
                            <input type="radio" class="radio" id="<?php echo $row1['destination']; ?>" name="destiny" value="<?php echo $row1['destination']; ?>">
                            <label for="<?php echo $row1['destination']; ?>"><?php echo $row1['destination']; ?></label>
                        </div>
                    <?php } ?>
                </div>
                <div class="selected">Select Destination</div>
                <div class="search-box">
                    <input type="text" placeholder="Start typing...">
                </div>
            </div>

            <!-- Date Selection -->
            <input type="date" id="travel-date" class="datepicker" min="<?php echo date("Y-m-d"); ?>" name="date" value="<?php echo date("Y-m-d"); ?>" max="2029-12-31" required>

            <input class="login-submit" type="submit" name="continue" value="Continue Booking">
        </div>
    </form>
</div>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhatsApp Icon</title>
    <link rel="stylesheet" href="style.css">
    <script>
        // JavaScript to detect dark mode
        document.addEventListener("DOMContentLoaded", function () {
            const prefersDarkMode = window.matchMedia("(prefers-color-scheme: dark)");
            const whatsappIcon = document.getElementById("whatsapp-icon");

            function updateIconColor() {
                if (prefersDarkMode.matches) {
                    whatsappIcon.style.fill = "white"; // Light icon in dark mode
                } else {
                    whatsappIcon.style.fill = "green"; // Dark icon in light mode
                }
            }

            updateIconColor();
            prefersDarkMode.addEventListener("change", updateIconColor);
        });
    </script>
    <style>
        /* Floating WhatsApp Button */
        .whatsapp-float {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #25d366;
            color: white;
            font-size: 30px;
            width: 60px;
            height: 60px;
            text-align: center;
            border-radius: 50%;
            line-height: 60px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }
        .whatsapp-float:hover {
            background-color: #1ebe5d;
        }
        .whatsapp-icon svg {
            width: 40px;
            height: 40px;
        }
    </style>
</head>
<body>

<!-- WhatsApp Button -->
<a href="https://wa.me/9022575112" class="whatsapp-float" target="_blank">
    <i class="fab fa-whatsapp whatsapp-icon"></i>
</a>

<!-- FAQ Section -->
<div class="accordion">
    <div class="accordion-item">
        <div class="accordion-item-header">
            How do I book a bus ticket online?
        </div>
        <div class="accordion-item-body">
            <div class="accordion-item-body-content">
                Booking a bus ticket is simple. Select your departure and destination, pick a date, choose a seat, and pay securely.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <div class="accordion-item-header">
            What payment methods are accepted?
        </div>
        <div class="accordion-item-body">
            <div class="accordion-item-body-content">
                We accept credit/debit cards, PayPal, net banking, UPI, and other secure payment methods for a hassle-free transaction.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <div class="accordion-item-header">
            Can I cancel or reschedule my booking?
        </div>
        <div class="accordion-item-body">
            <div class="accordion-item-body-content">
                Yes, you can cancel or reschedule your booking through the "Manage Booking" section. Cancellation charges may apply.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <div class="accordion-item-header">
            How do I get my e-ticket?
        </div>
        <div class="accordion-item-body">
            <div class="accordion-item-body-content">
                Once booked, your e-ticket is sent instantly via email and SMS. You can also download it from your account.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <div class="accordion-item-header">
            Is customer support available 24/7?
        </div>
        <div class="accordion-item-body">
            <div class="accordion-item-body-content">
                Yes! Our support team is available 24/7 to assist you with any issues related to booking, payments, or travel concerns.
            </div>
        </div>
    </div>
</div>

<!-- OBRS Highlights -->
<div class="services-1">
    <h1>WHY CHOOSE OBRS?</h1>
    <div class="cen-1">
        <div class="service-1">
            <i class="fas fa-bus-alt"></i>
            <h2>2500+</h2>
            <p>BUS PARTNERS</p>
        </div>

        <div class="service-1">
            <i class="fas fa-route"></i>
            <h2>1000+</h2>
            <p>ROUTES</p>
        </div>

        <div class="service-1">
            <i class="fab fa-angellist"></i>
            <h2>10 LAKH+</h2>
            <p>HAPPY CUSTOMERS</p>
        </div>

        <div class="service-1">
            <i class="fas fa-bolt"></i>
            <h2>30 SECONDS</h2>
            <p>FAST REFUNDS</p>
        </div>

        <div class="service-1">
            <i class="fas fa-phone"></i>
            <h2>24/7</h2>
            <p>CUSTOMER SUPPORT</p>
        </div>

        <div class="service-1">
            <i class="fab fa-whatsapp"></i>
            <h2>LIVE CHAT</h2>
            <p>ON WHATSAPP</p>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
