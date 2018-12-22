@extends('layouts.app')

@section('content')
<div class="container-fluid"  >
    <div class="row"  >
        <div class="col-md-12">
            <div class="section-area">
                <!-- Section heading with the bottom line divider -->
                <div class="section-heading">
                    <h1>Διαχείριση Πελατολογίου</h1>
                    <div class="section-heading-divider"></div>
                </div>

                <!-- Check the session status -->
                <div class="section-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <?php
                        // Create a SELECT SQL query to the database and get all the clients                       
                        $data = DB::select('select * from clients');

                        // Total clients number
                        $totalClients = count($data); 
                    ?>

                    <!-- Output the total number of clients found -->
                    <div class="tableBar">
                        <table>
                            <tr>
                                <td>
                                    <div class="searchbox">
                                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Αναζήτηση με το επώνυμο...">
                                        <i class="fa fa-search fa-lg" aria-hidden="true"></i>
                                    </div>
                                </td>
                                
                                <td class="totalClients">ΣΥΝΟΛΙΚΟΙ ΠΕΛΑΤΕΣ: <span style="font-size: 22px; color: white; font-weight: bold;"><?php echo $totalClients; ?></span></td>
                        
                            </tr>
                        </table>
                    </div>

                    <!-- Display all the clients info -->
                    <table id="myTable" class="client-table">
                        <thead>
                            
                            <tr>
                                <th></th>
                                <th> <strong>ID</strong></th>
                                <th><strong>ονομα</strong></th>
                                <th><strong>Επωνυμο</strong></th>
                                <th><strong>Email</strong></th>
                                <th><strong>κινητο</strong></th>
                                <th><strong>Τζιρος</strong></th>
                                <th><strong># επ</strong></th>
                                <th><strong># υπ</strong></th>
                                <th><strong>Κατασταση</strong></th>
                                <th></th>
                            </tr>
                        </thead> 
                        <tbody>
                            @for ($i = 0; $i < $totalClients; $i++)
                            <?php
                                $totalAmmount = 0;              // Total ammount of money that a client gave us.
                                $firstDate = "";                
                                $cDate = date('Y-m-d');         // Today
                                $cTime = strtotime($cDate);     // Today converted in days
                                $renewList = array();           // List of renew date values for each client.

                                // This block of code calculates some fields located below.
                                $selectedClient = $data[$i]->clientId;
                                $clientCompanies = DB::select("select * from companies where `client_id`='$selectedClient'");
                                $clientTotalCompanies = count($clientCompanies);

                                // Go through all of the client comapanies and count the total ammount of euro.

                                foreach ($clientCompanies as $com) {
                                    $companyData = DB::select("select SUM(total_cost) as total_cost from services where `company_id`='$com->id'");
                                    //print_r ($companyData);
                                    $totalAmmount = $totalAmmount + $companyData[0]->total_cost;

                                    // Get the renew date value from the database.
                                    $renewDateData = DB::select("select * from services where `company_id`='$com->id'");
                                    $clientTotalServices = count($renewDateData);

                                    for ($s = 0; $s < $clientTotalServices; $s++) {
                                        // Convert the renew date value to renew time remaining.
                                        $rDate = $renewDateData[$s]->renew_date;
                                        //echo $renewDateData[$s]->renew_date . "</br>";
                                        $rTime = strtotime($rDate);
                                        $secs = $cTime - $rTime;
                                        //echo $secs . "</br>";

                                        $days = $secs / 86400;

                                        //echo $rDate . "</br> </br>";
                                        if( ($days  < 30) && ($days > -30) ) {
                                            //echo "<td style=\"background: red; color: white; animation: blinker 1s linear infinite;\" id=\"renewDate\">" . $rDate . "</td>";
                                            // Add the renew time remaining value to a list.
                                            array_push($renewList, $rTime);
                                            //echo "Date added. Date: " . $rDate;
                                        }

                                        
                                    }
                                }
                               

                            ?>
                            <tr>
                                <td >
                                    <form method="POST" action="{{URL::to('/profile')}}">
                                        {{csrf_field()}}
                                        <input type="hidden" name="rowId" value="<?php echo $i+1; ?>">
                                        <button type="submit" class="profileButton"><i class="fa fa-user" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                                <td class="clientsTableID"> <strong><?php echo $data[$i]->clientId; ?></strong> </td>
                                <td> <?php echo $data[$i]->clientFirstname; ?> </td>
                                <td> <?php echo $data[$i]->clientSurname; ?> </td>
                                <td> <?php echo $data[$i]->clientEmail; ?> </td>
                                <td> <?php echo $data[$i]->clientMobile; ?> </td>
                                <td> <?php echo $totalAmmount . " &euro;"; ?> </td>
                                <td class="clientsTableID"> <strong><?php echo $clientTotalCompanies; ?></strong> </td>
                                <td class="clientsTableID"> <strong><?php echo $clientTotalServices; ?></strong> </td>
                                <td> 
                                    <?php
                                        // Get the status value from the database.
                                        $actResult = DB::select("select * from clients where `clientId`='$selectedClient'");
                                        
                                        // Check the status value and dispaly the appropriate icon.
                                        if($actResult[0]->is_active == '1') {
                                            echo "<i class=\"fa fa-circle  fa-lg\" style=\"color: #1fea00;\" aria-hidden=\"true\"></i>";
                                        }else {
                                            echo "<i class=\"fa fa-circle  fa-lg\" style=\"color: #ea0000;\" aria-hidden=\"true\"></i>";
                                        }
                                    ?>
                                </td>
                                <?php
                                    if( $renewList ) {
                                        echo "<td style=\"background: red; color: white; animation: blinker 1s linear infinite;\" id=\"renewDate\"><i class=\"fa fa-exclamation-circle fa-2x\"></i></td>";
                                    }
                                ?>
                            </tr>
                           
                            @endfor
                        </tbody>
                    </table> <!-- End of client-table -->

                    <script>
                        function myFunction() {
                            var input, filter, table, tr, td, i, txtValue;
                            input = document.getElementById("myInput");
                            filter = input.value.toUpperCase();
                            table = document.getElementById("myTable");
                            tr = table.getElementsByTagName("tr");
                            
                            for (i = 0; i < tr.length; i++) {
                                td = tr[i].getElementsByTagName("td")[3];
                                if (td) {
                                    txtValue = td.textContent || td.innerText;
                                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                        tr[i].style.display = "";
                                    } else {
                                        tr[i].style.display = "none";
                                    }
                                }       
                            }
                        }
                    </script>

                    <script>
                        $(document).ready(function() {
                            // When page loads, display what exactly the services table contains.
                            document.getElementById("table-filter-text").innerHTML = "Προβολή όλων των υπηρεσιών";

                            // Count how many rows the services table contains.
                            var totalRows = document.getElementById("test").getElementsByTagName("tr").length;
                            
                            // Set an onclick() function to each row.
                            $('#myTable').find('tr').click( function(){
                                // Find the selected company ID
                                var selectedCompany = parseInt($(this).find('td:first').text(), 10);
                                var selectedCompanyName = $(this).find("td").eq(1).text();
                               

                         
                                    // For each row in service table
                                   

                                        // Find the current company ID
                                        var currentCompany = parseInt($(this).find("td").eq(1).text(), 10);

                                        if( selectedCompany == currentCompany) {
                                            // All the services associated with the selected company.
                                            document.getElementById("table-filter-text").innerHTML = "Προβολή των υπηρεσιών της επιχείρησης" + selectedCompanyName + " με ID: " + selectedCompany;
                                            $(this).show();
                                        }else {
                                            // Services rows that are not associated with the specific selected company.
                                            $(this).hide();
                                        }
                                    
                                        // Always show the services header row
                                        $('#test').find('tr:first').show();
                                    });
                             
                                
                            });
                        });
                    </script>
                </div> <!-- End of section-body -->
            </div> <!-- End of section-area -->
        </div> <!-- End of col-md-14 -->
    </div>  <!-- End of row -->
</div> <!-- End of container-fluid -->
@endsection
