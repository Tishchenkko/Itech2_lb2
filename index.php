<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\CSS\style.css">
    <title>lab-2-mongodb</title>
</head>
<body>
    <div>

        <form action="..\PHP\findMessage.php" method="GET">
         <label for="login">find a message from the next user</label>
            <select name="login" id="login">
                <option value="IvanLebid">IvanLebid</option>
             <option value="user2">user2</option>
             <option value="user3">user3</option>
             <option value="user4">user4</option>
    </select>
    <input type="submit" value="Ok">
    </form>
    </div>

   

    <div>
        <form action="..\PHP\traffic.php" >
            <label for="ip">Choose an IP of the user whose total traffic you wanna know</label>
               <select name="ip" id="ip">
                    <option value="192.168.0.1">192.168.0.1</option>
                    <option value="192.167.1.0">192.167.1.0</option>
                    <option value="192.187.3.1">192.187.3.1</option>
                    <option value="192.163.5.2">192.163.5.2</option>
       </select>
       <input type="submit" value="Ok">
       </form>
    </div>

    <div>
        <form action="..\PHP\negativeBalance.php" method="GET">
         <label for="balance">Find user with negative balance</label>
    <input type="submit" value="Ok" id="balance">
    </form>
    </div>
    
    <div>
        <h2>Попередні запити:</h2>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const data = {
                    message: localStorage.getItem('message'),
                    traffic: localStorage.getItem('traffic'),
                    balance: localStorage.getItem('balance')
                };
        
                const outputDiv = document.getElementById('output');
                if (localStorage.length == 0) {
                    outputDiv.innerHTML += 'No previous requests';
                }
                 if (data.message) {
                    resultTable(data.message, ['staticIP', 'message']);
                }
                if (data.traffic) {
                    resultTable(data.traffic, ['adressIp', 'totalTraffic']);
                }
                 if (data.balance) {
                    resultTable(data.balance, ['login', 'staticIP', 'balance', 'message']);
                }
        
                function resultTable(data, columns) {
                     const parsedData = JSON.parse(data);
                    let tableHTML = `
                        <table>
                            <thead>
                                <tr>`;
                    columns.forEach(column => {
                        tableHTML += `<th>${column}</th>`;
                    });
                    tableHTML += `</tr>
                            </thead>
                            <tbody>`;
                    parsedData.forEach(item => {
                        tableHTML += `<tr>`;
                        columns.forEach(column => {
                            tableHTML += `<td>${item[column]}</td>`;
                        });
                        tableHTML += `</tr>`;
                    });
                    tableHTML += `</tbody></table>`;
                    outputDiv.innerHTML += tableHTML;
                }
               
            });
        </script>
       
        <div id="output">

        </div>
    </div>
    

</body>
</html>