<?php
                                // Load DB credentials from save location
                                include '../secure/db_credentials.php';

                                // Create connection
                                $conn = new mysqli($servername, $username, $password, $dbname);

                                $sql = "SELECT * FROM honigsortiment";
                                $result = $conn->query($sql);
                                $placeholder = "change";
                                $available = "";

                                // create the table of the honey sortiment
                                echo '<table id="honigsort-admin">
                                <tr>
                                <th>Honigsorte</th>
                                <th>Verfügbar</th>
                                <th>Verfübarkeit ändern</th>
                                </tr>
                                ';


                                if ($result->num_rows > 0) {
                                    
                                    while($row = $result->fetch_assoc()) {

                                        // check if the honey should display as available or not
                                        if($row["display"] == "true"){
                                            $available = "Ja";
                                        } else {
                                            $available = "Nein";
                                        }

                                        echo '
                                        <tr>
                                            <td>'.$row["name"].'</td>
                                            <td id="'.$row["idcss"].'available">'.$available.'</td>
                                            <td>
                                                <form action="../secure/admin-sortcontrol.php#topAnchor" method="get">
                                                <input name="buttonClicked" hidden value=\''.$row["idcss"].'\' onclick="cleanURIAvailability()">
                                                <input type="submit" value="Change" onclick="cleanURIAvailability()">
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