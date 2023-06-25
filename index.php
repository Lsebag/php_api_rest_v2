<!DOCTYPE html>
<html>
<head>
    <title>Items</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        tr:hover {background-color: #f5f5f5;}
        
        .button {
            margin: 10px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Items</h1>
    <button class="button" onclick="getItems()">Get Items</button>

    <table id="itemsTable" style="display: none;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category ID</th>
            </tr>
        </thead>
        <tbody id="itemsTableBody"></tbody>
    </table>

    <script>
        function getItems() {
            // Aquí debes realizar una petición AJAX para llamar a la función read en items/read.php
            // Puedes usar la función fetch() de JavaScript para realizar la petición

            fetch('items/read.php')
                .then(response => response.json())
                .then(data => displayItems(data))
                .catch(error => console.log(error));
        }

        function displayItems(items) {
  var itemsTable = document.getElementById('itemsTable');
  var itemsTableBody = document.getElementById('itemsTableBody');
  itemsTableBody.innerHTML = '';

  if (items.items.length > 0) {
    itemsTable.style.display = 'table';

    items.items.forEach(item => {
      var row = document.createElement('tr');
      row.innerHTML = `
        <td>${item.id}</td>
        <td>${item.name}</td>
        <td>${item.description}</td>
        <td>${item.price}</td>
        <td>${item.category_id}</td>
        <td>
          <button class="button" onclick="showItem(${item.id})">Show Item</button>
        </td>
      `;
      itemsTableBody.appendChild(row);
    });
  } else {
    itemsTable.style.display = 'none';

    var noItemsRow = document.createElement('tr');
    var noItemsCell = document.createElement('td');
    noItemsCell.setAttribute('colspan', '6');
    noItemsCell.textContent = 'No items found.';
    noItemsRow.appendChild(noItemsCell);
    itemsTableBody.appendChild(noItemsRow);
  }
}

function showItem(itemId) {
  window.location.href = './item.php?id=' + itemId;
}
    </script>
</body>
</html>
