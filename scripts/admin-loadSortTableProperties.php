<?php
                                // Load DB credentials from save location
                                include '../secure/db_credentials.php';

                                // Create connection
                                $conn = new mysqli($servername, $username, $password, $dbname);

                                $sql = "SELECT * FROM honigsortiment";
                                $result = $conn->query($sql);
                                $placeholder = "change";
                                $property = "";

                                // create the table of the honey sortiment
                                echo '<table id="honigsort-admin">
                                <tr>
                                <th>Honigsorte</th>
                                <th>Merkmal</th>
                                <th>Merkmal anpassen</th>
                                </tr>
                                ';


                                if ($result->num_rows > 0) {
                                    
                                    while($row = $result->fetch_assoc()) {

                                        echo '
                                        <tr>
                                            <td>'.$row["name"].'</td>
                                            <td id="'.$row["idcss"].'property">'.$row["merkmal"].'</td>
                                            <td>
                                                <form action="../secure/admin-alter.php#topProperties" method="get">
                                                <input name="buttonClickedProperties" hidden value=\''.$row["idcss"].'\'">
                                                <input type="submit" value="Anpassen"">
                                                </form>
                                            </td>
                                        </tr>
                                        ';
                                    }
                                } else {
                                    echo "0 results";
                                }

                                echo '</table>';

                                $conn->close();
                            // end php skript
                            ?>