    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>CRUD STUDY</title>
        <script type="text/javascript">
        // JavaScript function to show confirmation dialog
        function confirmDelete() {
            return confirm('Are you sure you want to delete this book?');
        }
    </script>
    </head>
    <body>
        <h1> Library Management System</h1>

        <button type = "button">
            <a href = "create.php">Create</a>
        </button>    

        <h3> Inventory </h3>
            <table border="1" >
                <tr> 
                    <th> Title </th>
                    <th> Author </th>
                    <th> Edit </th>
                    <th> Delete </th>

                </tr>
                
                <?php
                include ('DB.php');

                $SQLi = "SELECT * FROM mylibrary";
                $result = mysqli_query($Conn, $SQLi);

                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>
                            <td>" . $row['Title'] . "</td>
                            <td>" . $row['Author'] . "</td>
                            
                            <td>
                            <form action = 'update.php' method = 'POST'>
                            <input type = 'hidden'     name = 'Id'        value = '".$row['Id'].     "'>
                            <input type = 'hidden'     name = 'Title'     value = '".$row['Title'].  "'>
                            <input type = 'hidden'     name = 'Author'    value = '".$row['Author']. "'>
                            <button type = 'submit'> Edit </button>

                            </form>
                            </td>

                        
                            <td>
                            <form action='delete.php' method='POST' onsubmit='return confirmDelete();'>
                            <input type ='hidden'     name = 'Id'        value = '".$row['Id']."'>
                            <button type='submit'> Delete</button>

                            </form>
                            </td>

                        </tr>";
                    
                        }
                ?>

            </table>

    </body>
    </html>