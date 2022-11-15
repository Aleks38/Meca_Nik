<html>
   <form action="index.php" method="post">
      <select name="family">
         <option value="" selected="selected">Any family</option>
         <option value="capacitor">capacitor</option>
         <option value="resistor">resistor</option>
         <option value="ferrite bead">ferrite bead</option>
      </select>
      <input name="search" type="submit" value="Search"/>
   </form>
   <head>
      <meta charset = "UTF-8">
      <title>test.php</title>
         <style>
            table {
            border-collapse: collapse;
            width: 50%;
            }
            th, td {
            input: "text";
            text-align: left;
            padding: 8px;
            }
            th {
            background-color: SkyBlue;
            }
            tr:nth-child(odd) {background-color: #f2f2f2;}
            tr:hover {background-color: AliceBlue;} 
         </style>
   </head>

<body>
   <p>
   <?php
      $family = "";
      if(isset($_POST['family'])) {
         $family = $_POST['family'];
      }

      try {
         $con= new PDO('mysql:host=localhost;dbname=mysql', "root", "kelly188");
         $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         if(!empty($family)) {
        $query = 'SELECT * FROM testv2 WHERE family = "'.$family.'"';
         }
         else {
        $query = "SELECT * FROM testv2";
         }

         //first pass just gets the column names
         print "<table>";
         $result = $con->query($query);

         //return only the first row (we only need field names)
         $row = $result->fetch(PDO::FETCH_ASSOC);
         print " <tr>";
         foreach ($row as $field => $value){
        print " <th>$field</th>";
         }
         // end foreach
         print " </tr>";

         //second query gets the data
         $data = $con->query($query);
         $data->setFetchMode(PDO::FETCH_ASSOC);
         foreach($data as $row){
        print " <tr>";
        foreach ($row as $name=>$value){
           print " <td>$value</td>";
        } //end field loop
        print " </tr>";
         } //end record loop
         print "</table>";
      } catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
      } // end try
   ?>
   </p>
</body>

</html>