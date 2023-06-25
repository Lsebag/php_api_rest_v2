<!DOCTYPE html>
<html>
<head>
    <title>Item Details</title>
    <style>
        ul {
            list-style-type: none;
            padding: 0;
        }
        
        li {
            margin-bottom: 10px;
        }
        
        .button {
            margin-top: 10px;
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
    <h1>Item Details</h1>

    <div id="itemDetails"></div>

    <button class="button" onclick="goBack()">Go Back</button>

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            // Obtenemos el ID del item de la URL
            const urlParams = new URLSearchParams(window.location.search);
            const itemId = urlParams.get('id');

            // Realizamos una petición AJAX para obtener los detalles del item
            fetch(`./items/read.php?id=${itemId}`)
                .then(response => response.json())
                .then(data => displayItemDetails(data))
                .catch(error => console.log(error));
        });

        function displayItemDetails(item) {
            var itemDetailsDiv = document.getElementById('itemDetails');
            itemDetailsDiv.innerHTML = '';

            var itemDetailsList = document.createElement('ul');
            itemDetailsList.innerHTML = `
                <li><strong>ID:</strong> ${item.items[0].id}</li>
                <li><strong>Name:</strong> ${item.items[0].name}</li>
                <li><strong>Description:</strong> ${item.items[0].description}</li>
                <li><strong>Price:</strong> ${item.items[0].price}</li>
                <li><strong>Category ID:</strong> ${item.items[0].category_id}</li>
                <li><strong>Created:</strong> ${item.items[0].created}</li>
            `;
            itemDetailsDiv.appendChild(itemDetailsList);
        }

        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
