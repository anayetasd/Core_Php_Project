<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner's Equity Statement Calculator</title>
    <style>
       
        .equity-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            height: 600px;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
        }

        .input-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        .result {
            margin-top: 20px;
            padding: 10px;
            background-color: #d5f5e3;
            border-radius: 4px;
            text-align: center;
        }

        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="equity-container">
    <h1>Owner's Equity Statement</h1>
    <div class="input-group">
        <label for="beginning-equity">Beginning Equity:</label>
        <input type="number" id="beginning-equity" placeholder="Enter Beginning Equity" />
    </div>
    <div class="input-group">
        <label for="additional-investments">Additional Investments:</label>
        <input type="number" id="additional-investments" placeholder="Enter Additional Investments" />
    </div>
    <div class="input-group">
        <label for="net-income">Net Income:</label>
        <input type="number" id="net-income" placeholder="Enter Net Income" />
    </div>
    <div class="input-group">
        <label for="withdrawals">Withdrawals:</label>
        <input type="number" id="withdrawals" placeholder="Enter Withdrawals" />
    </div>
    <button class="btn" onclick="calculateOwnerEquity()">Calculate Owner's Equity</button>

    <div class="result" id="result" style="display: none;">
        <h3>Owner's Equity: <span id="owner-equity-value"></span></h3>
    </div>

    <div class="error" id="error-message" style="display: none;">
        <p>Please fill out all fields with valid numbers.</p>
    </div>
</div>

<script>
    function calculateOwnerEquity() {
        // Get values from input fields
        let beginningEquity = parseFloat(document.getElementById("beginning-equity").value);
        let additionalInvestments = parseFloat(document.getElementById("additional-investments").value);
        let netIncome = parseFloat(document.getElementById("net-income").value);
        let withdrawals = parseFloat(document.getElementById("withdrawals").value);

        // Check if any of the values are invalid
        if (isNaN(beginningEquity) || isNaN(additionalInvestments) || isNaN(netIncome) || isNaN(withdrawals)) {
            document.getElementById("error-message").style.display = "block";
            document.getElementById("result").style.display = "none";
            return;
        }

        // Calculate owner's equity
        let ownerEquity = beginningEquity + additionalInvestments + netIncome - withdrawals;

        // Display the result
        document.getElementById("owner-equity-value").textContent = ownerEquity.toFixed(2);
        document.getElementById("result").style.display = "block";
        document.getElementById("error-message").style.display = "none";
    }
</script>

</body>
</html>








