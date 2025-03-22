<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visa Checker System</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #002366, #004080);
            color: white;
            text-align: center;
            padding: 20px;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: auto;
        }

        /* Container */
        .container {
            max-width: 500px;
            width: 100%;
            background: rgba(255, 255, 255, 0.1);
            padding: 25px;
            border-radius: 12px;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Headings */
        h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #fff;
        }

        h2 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #ddd;
        }

        /* Input Fields */
        input, select {
            width: 100%;
            margin: 10px 0;
            padding: 12px;
            border: 1px solid white;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            transition: 0.3s ease-in-out;
        }

        input::placeholder {
            color: #ddd;
        }

        /* Dropdown Styling */
        select {
            appearance: none;
            cursor: pointer;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        option {
            background: #002366;
            color: white;
        }

        /* Buttons */
        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #ffcc00;
            color: #002366;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s ease-in-out;
        }

        button:hover {
            background-color: #ff9900;
        }

        /* Inline Message */
        .message {
            margin-top: 10px;
            font-size: 14px;
            font-weight: bold;
            color: red;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Visa Requirement Checker</h1>

        <!-- Visa Check Using JavaScript -->
        <div>
            <h2>Instant Visa Check</h2>
            <select id="country-select">
                <option value="">Select Your Country</option>
                <option value="USA">USA</option>
                <option value="Canada">Canada</option>
                <option value="India">India</option>
                <option value="UK">UK</option>
                <option value="Australia">Australia</option>
            </select>
            <button onclick="checkVisa()">Check Visa</button>
            <p id="visa-message" class="message"></p>
        </div>

        <!-- Visa Check via PHP Form Submission -->
        <div>
            <h2>Visa Verification via Form</h2>
            <form method="POST">
                <select name="country">
                    <option value="">Select Your Country</option>
                    <option value="USA">USA</option>
                    <option value="Canada">Canada</option>
                    <option value="India">India</option>
                    <option value="UK">UK</option>
                    <option value="Australia">Australia</option>
                </select>
                <button type="submit" name="check_visa">Check Visa</button>
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['check_visa'])) {
                $country = $_POST['country'];

                $visaInfo = [
                    "USA" => "Visa required for most applicants.",
                    "Canada" => "Visa required unless you have an eTA.",
                    "India" => "Visa required before travel.",
                    "UK" => "Visa depends on the duration of stay.",
                    "Australia" => "eVisa available for eligible travelers."
                ];

                if (!empty($country) && isset($visaInfo[$country])) {
                    echo "<p class='message'>{$visaInfo[$country]}</p>";
                } else {
                    echo "<p class='message'>Invalid country selection.</p>";
                }
            }
            ?>
        </div>

        <!-- Visa Application Form -->
        <div>
            <h2>Apply for a Visa</h2>
            <form method="POST" onsubmit="return validateForm()">
                <input type="text" name="full_name" id="full-name" placeholder="Enter Full Name">
                <input type="text" name="passport" id="passport" placeholder="Enter Passport Number (8-10 chars)">
                <select name="apply_country" id="apply-country">
                    <option value="">Select Your Country</option>
                    <option value="USA">USA</option>
                    <option value="Canada">Canada</option>
                    <option value="India">India</option>
                    <option value="UK">UK</option>
                    <option value="Australia">Australia</option>
                </select>
                <button type="submit" name="apply_visa">Apply for Visa</button>
            </form>
        </div>
    </div>

    <script>
        function checkVisa() {
            const country = document.getElementById("country-select").value;
            const visaMessage = document.getElementById("visa-message");

            const visaInfo = {
                "USA": "Visa required for most applicants.",
                "Canada": "Visa required unless you have an eTA.",
                "India": "Visa required before travel.",
                "UK": "Visa depends on the duration of stay.",
                "Australia": "eVisa available for eligible travelers."
            };

            if (country in visaInfo) {
                visaMessage.textContent = visaInfo[country];
                visaMessage.style.color = "white";
            } else {
                visaMessage.textContent = "Please select a country.";
                visaMessage.style.color = "red";
            }
        }

        function validateForm() {
            const name = document.getElementById("full-name").value.trim();
            const passport = document.getElementById("passport").value.trim();
            const country = document.getElementById("apply-country").value;

            if (name === "" || passport === "" || country === "") {
                alert("All fields are required!");
                return false;
            }

            if (passport.length < 8 || passport.length > 10) {
                alert("Invalid passport number!");
                return false;
            }

            alert("Visa application submitted successfully!");
            return true;
        }
    </script>

</body>
</html>
