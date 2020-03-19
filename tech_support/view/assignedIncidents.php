<?php include('header.php'); ?>
    <div id='main'>
        <h1>Assigned Incidents</h1>
        <ul class="nav">
            <li><a href="../incident_display/index.php?action=displayUnassigned">View Unassigned Incidents</a></li>
        </ul>
        <table>
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Product</th>
                    <th>Incident</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($incidents as $incident): ?>
                <tr>
                    <td><?php echo($incident['firstName'] . " " . $incident['lastName']);?></td>
                    <td><?php echo($incident['name']); ?></td>
                    <td>
                        <table id='no_border'>
                            <tr>
                                <td>ID: </td>
                                <td><?php echo($incident['incidentID']); ?></td>
                            </tr>
                            <tr>
                                <td>Opened: </td>
                                <td>
                                    <?php 
                                        $date = $incident['dateOpened']; 
                                        $datef = date("m/d/Y", strtotime($date));
                                        echo $datef;
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Closed</td>
                                <td>
                                    <?php 
                                        $id = $incident['dateClosed'];
                                        if(strlen($id) == 0)  {
                                            echo('OPEN');
                                        } else {
                                            $date = $incident['dateClosed']; 
                                            $datef = date("m/d/Y", strtotime($date));
                                            echo $datef;
                                        } 
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Title: </td>
                                <td><?php echo($incident['title']); ?></td>
                            </tr>
                            <tr>
                                <td>Description: </td>
                                <td><?php echo($incident['description']); ?></td>
                            </tr>
                        </table>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php include('footer.php'); ?>