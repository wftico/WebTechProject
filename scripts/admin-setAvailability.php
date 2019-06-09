<!-- Begin of PHP alter DB entries skript -->
<?php
            if($_GET['buttonClicked']){
            
                // current issue: not sanitized, page refresh (F5) instantly triggers the IF GET
                // also the form doesn't resend, can't change the state twice after another on the same honey

                // should be sanitized !
                $id = $_GET['buttonClicked'];

                // Start DB connection 
                // Load DB credentials from save location
                include '../secure/db_credentials.php';

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                $sql = "SELECT * FROM honigsortiment";
                $sqlDisplay ="UPDATE honigsortiment SET display='true' WHERE idcss='$id'";
                $sqlDontDisplay ="UPDATE honigsortiment SET display='false' WHERE idcss='$id'";

            
                $result = $conn->query($sql); 
                
                while($row = $result->fetch_assoc()) {

                    $dummy = $row["idcss"];

                    // wenn die ID zum DB Eintrag passt
                    if($dummy == $id){
                        if($row["display"] == "true"){
                            // dann auf nicht display setzen
                            if (mysqli_query($conn, $sqlDontDisplay)) {
                                echo '
                                <script type="text/javascript">
                                var td = document.getElementById("'.$id.'available");
                                td.innerHTML = "Nein";
                                </script>
                                ';
                            } else {
                                echo "Error updating record: " . mysqli_error($conn);
                            }
                        } else {
                            // auf display setzen
                            if (mysqli_query($conn, $sqlDisplay)) {
                                echo '
                                <script type="text/javascript">
                                var td = document.getElementById("'.$id.'available");
                                td.innerHTML = "Ja";
                                </script>
                                ';
                            } else {
                                echo "Error updating record: " . mysqli_error($conn);
                            }
                        }
                    } 

                }
                
                $conn->close();
            }
            ?>