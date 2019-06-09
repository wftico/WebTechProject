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
                                <th>Geschmack</th>
                                <th>Geschmack anpassen</th>
                                </tr>
                                ';


                                if ($result->num_rows > 0) {
                                    
                                    while($row = $result->fetch_assoc()) {

                                        echo '
                                        <tr>
                                            <td>'.$row["name"].'</td>
                                            <td id="'.$row["idcss"].'taste">'.$row["geschmack"].'</td>
                                            <td>
                                                <form action="../secure/admin-alter.php#topTaste" method="get">
                                                <input name="buttonClickedTaste" hidden value=\''.$row["idcss"].'\'">
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