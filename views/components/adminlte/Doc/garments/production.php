<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Garments Cost Sheet - Persistent & Deletable</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f9;
      padding: 30px;
    }

    .container {
      overflow-x: auto;
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      min-width: 1300px;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: center;
    }

    th {
      background-color: #f0f0f0;
      position: sticky;
      top: 0;
      z-index: 2;
    }

    input[type="number"], input[type="text"] {
      width: 100px;
      padding: 5px;
      box-sizing: border-box;
    }

    .add-button {
      margin-top: 20px;
      padding: 10px 15px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }

    .add-button:hover {
      background-color: #0056b3;
    }

    .totals {
      font-weight: bold;
    }

    .sticky-wrap {
      max-height: 400px;
      overflow: auto;
    }

    .delete-btn {
      background-color: #dc3545;
      color: white;
      border: none;
      padding: 5px 10px;
      cursor: pointer;
      border-radius: 5px;
    }

    .delete-btn:hover {
      background-color: #c82333;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Garments Production Cost Sheet (Persistent & Editable)</h2>
    <div class="sticky-wrap">
      <table id="costTable">
        <thead>
          <tr>
            <th>Product Name</th>
            <th>Fabric</th>
            <th>Trims</th>
            <th>Accessories</th>
            <th>Printing</th>
            <th>Labor</th>
            <th>Washing</th>
            <th>Finishing</th>
            <th>Overhead</th>
            <th>Profit</th>
            <th>Quantity</th>
            <th>Total Cost</th>
            <th>Unit Cost</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="productBody">
          <!-- Product rows go here -->
        </tbody>
      </table>
    </div>
    <button class="add-button" onclick="addProductRow()">Add New Product</button>
  </div>

  <script>
    const productBody = document.getElementById("productBody");

    // Load saved data
    window.onload = () => {
      const saved = localStorage.getItem("products");
      if (saved) {
        const data = JSON.parse(saved);
        data.forEach(product => addProductRow(product));
      } else {
        addProductRow(); // start with one
      }
    };

    function createInput(value = 0, className = "") {
      const input = document.createElement("input");
      input.type = className === "name-input" ? "text" : "number";
      input.value = value || 0;
      input.className = className;
      input.oninput = () => {
        calculateAllCosts();
        saveData();
      };
      return input;
    }

    function addProductRow(product = {}) {
      const row = document.createElement("tr");

      const nameCell = document.createElement("td");
      nameCell.appendChild(createInput(product.name || "", "name-input"));
      row.appendChild(nameCell);

      const fields = ["fabric", "trims", "accessories", "printing", "labor", "washing", "finishing", "overhead", "profit"];
      fields.forEach(field => {
        const td = document.createElement("td");
        td.appendChild(createInput(product[field], "cost-input"));
        row.appendChild(td);
      });

      const qtyCell = document.createElement("td");
      qtyCell.appendChild(createInput(product.quantity, "qty-input"));
      row.appendChild(qtyCell);

      const totalCell = document.createElement("td");
      totalCell.className = "total-cost totals";
      totalCell.textContent = "0.00";
      row.appendChild(totalCell);

      const unitCell = document.createElement("td");
      unitCell.className = "unit-cost totals";
      unitCell.textContent = "0.00";
      row.appendChild(unitCell);

      const deleteCell = document.createElement("td");
      const delBtn = document.createElement("button");
      delBtn.textContent = "Delete";
      delBtn.className = "delete-btn";
      delBtn.onclick = () => {
        row.remove();
        calculateAllCosts();
        saveData();
      };
      deleteCell.appendChild(delBtn);
      row.appendChild(deleteCell);

      productBody.appendChild(row);
      calculateAllCosts();
      saveData();
    }

    function calculateAllCosts() {
      const rows = productBody.querySelectorAll("tr");

      rows.forEach(row => {
        const costInputs = row.querySelectorAll(".cost-input");
        const qtyInput = row.querySelector(".qty-input");
        const totalCell = row.querySelector(".total-cost");
        const unitCell = row.querySelector(".unit-cost");

        let total = 0;
        costInputs.forEach(input => {
          total += parseFloat(input.value) || 0;
        });

        const quantity = parseFloat(qtyInput.value) || 0;
        const unit = quantity > 0 ? (total / quantity) : 0;

        totalCell.textContent = total.toFixed(2);
        unitCell.textContent = unit.toFixed(2);
      });
    }

    function saveData() {
      const rows = productBody.querySelectorAll("tr");
      const data = [];

      rows.forEach(row => {
        const inputs = row.querySelectorAll("input");
        const product = {
          name: inputs[0].value,
          fabric: inputs[1].value,
          trims: inputs[2].value,
          accessories: inputs[3].value,
          printing: inputs[4].value,
          labor: inputs[5].value,
          washing: inputs[6].value,
          finishing: inputs[7].value,
          overhead: inputs[8].value,
          profit: inputs[9].value,
          quantity: inputs[10].value
        };
        data.push(product);
      });

      localStorage.setItem("products", JSON.stringify(data));
    }
  </script>
</body>
</html>
